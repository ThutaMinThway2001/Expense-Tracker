<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Models\Income;
use App\Models\IncomeCategory;
use App\Models\Payment;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', auth()->id())->latest()->get();

        return view('Income/income', [
            'incomes' => $incomes
        ]);
    }

    public function create()
    {
        $payments = Payment::get()->pluck('name', 'id');

        $income_categories = IncomeCategory::get()->pluck('name', 'id');

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

        return redirect()->route('indexIncome');
    }

    public function delete(Income $income)
    {
        $income->delete();

        return redirect()->route('indexIncome');
    }

    public function edit(Income $income)
    {
        $incomes = Income::where('user_id', auth()->id())->latest()->get();
        $income_categories = IncomeCategory::get()->pluck('name', 'id');
        $payments = Payment::get()->pluck('name', 'id');
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

        return redirect()->route('indexIncome');
    }
}
