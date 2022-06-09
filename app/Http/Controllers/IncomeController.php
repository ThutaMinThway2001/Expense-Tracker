<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Models\Income;
use App\Models\IncomeCategory;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class IncomeController extends Controller
{
    public function index(Request $request)
    {        
        if($request->ajax()){  
 
            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $data = Income::with('income_category','payment')->where('user_id', auth()->id())->whereBetween('entry_date', [$start_date, $end_date])->get();
                } else {
                    $data = Income::with('income_category','payment')->where('user_id', auth()->id())->get();
                }
            } else {
                $data = Income::with('income_category','payment')->where('user_id', auth()->id())->get();
            }        

            return Datatables::of($data)
            ->editColumn('updated_at', function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H-i-s');
            })
            ->addColumn('category_name', function($each){
                return $each->income_category ? $each->income_category->name : '-';
            })
            ->addColumn('payment_method', function($each){
                
                return $each->payment ? '<span class="badge bg-success">'.$each->payment->name .'</span>' : '-';
            })
            ->addColumn('actions', function($each){
                
                $edit_icon = '<a href="' . route('editIncome', $each->id) . '" class="text-warning"><i class="far fa-edit"></i></a>';

                $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon .'</div>';

            })
            ->rawColumns(['payment_method','actions'])
            ->make(true);
        }

        $incomes = Income::where('user_id', auth()->id())->latest()->get();

        return view('Income/income', [
            'incomes' => $incomes
        ]);
    }

    public function create()
    {
        $payments = Payment::get()->pluck('name', 'id');

        $income_categories = IncomeCategory::whereUserId(auth()->id())->with('income')->get()->pluck('name', 'id');

        return view('Income/create-income', [
            'income_categories' => $income_categories,
            'payments' => $payments,
        ]);
    }

    public function store(IncomeRequest $request)
    {
        Income::create($request->validated() + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('indexIncome')->with('success', 'Income created successfully');
    }

    public function delete(Income $income)
    {
        $income->delete();

        return 'success';
    }

    public function edit(Income $income)
    {
        $incomes = Income::where('user_id', auth()->id())->latest()->get();
        $income_categories = IncomeCategory::whereUserId(auth()->id())->with('income')->get()->pluck('name', 'id');
        $payments = Payment::whereUserId(auth()->id())->get()->pluck('name', 'id');
        return view('Income/edit-income', [
            'incomes' => $incomes,
            'income' => $income,
            'income_categories' => $income_categories,
            'payments' => $payments
        ]);
    }

    public function update(Income $income, IncomeRequest $request)
    {
        $income->update($request->validated());

        return redirect()->route('indexIncome')->with('updated', 'Income updated successfully');
    }
}
