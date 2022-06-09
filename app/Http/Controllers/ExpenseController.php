<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){  
 
            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $data = Expense::with('expense_category','payment')->where('user_id', auth()->id())->whereBetween('entry_date', [$start_date, $end_date])->get();
                } else {
                    $data = Expense::with('expense_category','payment')->where('user_id', auth()->id())->get();
                }
            } else {
                $data = Expense::with('expense_category','payment')->where('user_id', auth()->id())->get();
            }        

            return Datatables::of($data)
            ->editColumn('updated_at', function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H-i-s');
            })
            ->addColumn('category_name', function($each){
                return $each->expense_category ? $each->expense_category->name : '-';
            })
            ->addColumn('payment_method', function($each){
                
                return $each->payment ? '<span class="badge bg-success">'.$each->payment->name .'</span>' : '-';
            })
            ->addColumn('actions', function($each){
                
                $edit_icon = '<a href="' . route('editExpense', $each->id) . '" class="text-warning"><i class="far fa-edit"></i></a>';

                $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon .'</div>';

            })
            ->rawColumns(['payment_method','actions'])
            ->make(true);
        }

        $expenses = Expense::where('user_id', auth()->id())->latest()->get();

        return view('Expense.expense', [
            'expenses' => $expenses,
        ]);
    }

    public function create()
    {
        $payments = Payment::get()->pluck('name', 'id');
        $expense_categories = ExpenseCategory::whereUserId(auth()->id())->with('expense')->get()->pluck('name', 'id');

        return view('Expense/create-expense', [
            'expense_categories' => $expense_categories,
            'payments' => $payments
        ]);
    }

    public function store(ExpenseRequest $request)
    {
        Expense::create($request->validated() + [
            'user_id' => auth()->id()
        ]);

        return redirect()->route('indexExpense')->with('success', 'Expense created successfully');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();

        return 'success';
    }

    public function edit(Expense $expense)
    {
        $payments = Payment::get()->pluck('name', 'id');
        $expenses = Expense::where('user_id', auth()->id())->latest()->get();
        $expense_categories = ExpenseCategory::get()->pluck('name', 'id');
        return view('Expense/edit-expense', [
            'expenses' => $expenses,
            'expense' => $expense,
            'expense_categories' => $expense_categories,
            'payments' => $payments
        ]);
    }

    public function update(Expense $expense, ExpenseRequest $request)
    {
        $expense->update($request->validated());

        return redirect()->route('indexExpense')->with('updated', 'Expense updated successfully');
    }
}
