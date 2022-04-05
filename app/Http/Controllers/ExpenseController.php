<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Payment;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', auth()->id())->latest()->get();

        return view('Expense.expense', [
            'expenses' => $expenses,
        ]);
    }

    public function create()
    {
        $payments = Payment::get()->pluck('name', 'id');
        $expense_categories = ExpenseCategory::get()->pluck('name', 'id');

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

        return redirect()->route('indexExpense');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('indexExpense');
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

        return redirect()->route('indexExpense');
    }
}
