<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class MonthlyReportController extends Controller
{
    public function index(Request $request)
    {

        dump(request('startDate'));
        dump(request('endDate'));

        $from = request('startDate');
        $to = request('endDate');
        

        $expense_query = Expense::whereUserId(auth()->id())->with('expense_category')
            ->whereBetween('entry_date', [$from, $to]);

        $income_query = Income::whereUserId(auth()->id())->with('income_category')
            ->whereBetween('entry_date', [$from, $to]);

        $expense_total_amount = $expense_query->sum('amount');
        $income_total_amount = $income_query->sum('amount');
        $profit = $income_total_amount - $expense_total_amount;

        $expense_group = $expense_query->orderBy('amount', 'desc')->get()->groupBy('expense_category_id');
        $income_group = $income_query->orderBy('amount', 'desc')->get()->groupBy('income_category_id');

        $expense_summary = [];
        foreach ($expense_group as $expense) {
            foreach ($expense as $line) {
                // return $line;
                if (!isset($expense_summary[$line->expense_category->name])) {
                    $expense_summary[$line->expense_category->name] = [
                        'name' => $line->expense_category->name,
                        'amount' => 0
                    ];
                }

                $expense_summary[$line->expense_category->name]['amount'] += $line->amount;
            }
        }
        // return $expense_summary;

        $income_summary = [];
        foreach ($income_group as $income) {
            foreach ($income as $line) {
                // return $line;
                if (!isset($income_summary[$line->income_category->name])) {
                    $income_summary[$line->income_category->name] = [
                        'name' => $line->income_category->name,
                        'amount' => 0
                    ];
                }

                $income_summary[$line->income_category->name]['amount'] += $line->amount;
            }
        }

        return view(
            'MonthlyReport.monthly-reports',
            [
                'income_summary' => $income_summary,
                'expense_summary' => $expense_summary,
                'expense_total_amount' => $expense_total_amount,
                'income_total_amount' => $income_total_amount,
                'profit' => $profit
            ]
        );
    }

    public function pdfDownload()
    {
        $pdf = PDF::loadView('pdf.monthlyPDF');
        return $pdf->download('monthlyPDF.pdf');
    }
}
