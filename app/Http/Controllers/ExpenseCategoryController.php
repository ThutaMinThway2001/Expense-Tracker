<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $expense_categories = ExpenseCategory::all();
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

        return redirect()->route('indexExpenseCategory');
    }
}
