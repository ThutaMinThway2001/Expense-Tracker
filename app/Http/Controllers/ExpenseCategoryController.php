<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseCategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $expenseCs = ExpenseCategory::query();
            return DataTables::of($expenseCs)
            ->editColumn('updated_at', function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H-i-s');
            })
            ->addColumn('actions', function($each){
                
                $edit_icon = '<a href="' . route('editExpenseCategory', $each->id) . '" class="text-warning"><i class="far fa-edit"></i></a>';
                if($each->expense->isEmpty()){
                    $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
                }else{
                    $delete_icon = '';
                }

                return '<div class="action-icon">' . $edit_icon . $delete_icon .'</div>';

            })
            ->rawColumns(['actions'])
            ->make(true);
        }
        $expense_categories = ExpenseCategory::whereUserId(auth()->id())->with('expense')->latest()->get();
        // return $expense_categories;
        return view('Expense-Category.expense-category', [
            'categories' => $expense_categories
        ]);
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $attributes['user_id'] = auth()->id();

        ExpenseCategory::create($attributes);

        return redirect()->back();
    }
    public function edit(ExpenseCategory $expenseCategory)
    {
        // $expenses = Expense::where('user_id', auth()->id())->latest()->get();
        return view('Expense-Category.edit-expense-category', [
            // 'expenses' => $expenses,
            'expenseCategory' => $expenseCategory
        ]);
    }

    public function update(ExpenseCategory $expenseCategory)
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $expenseCategory->update($attributes);

        return redirect()->route('indexExpenseCategory');
    }
    public function delete(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        return 'success';
    }
}
