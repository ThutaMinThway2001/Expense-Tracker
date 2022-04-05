<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeCategoryRequest;
use App\Models\Income;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        $income_categories = IncomeCategory::all();
        return view('Income-Category.income-category', [
            'categories' => $income_categories,
        ]);
    }
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $attributes['user_id'] = auth()->id();

        IncomeCategory::create($attributes);

        return redirect()->back();
    }
    public function edit(IncomeCategory $incomeCategory)
    {
        $income_categories = IncomeCategory::get()->pluck('name', 'id');
        return view('Income-Category.edit-income-category', [
            'incomeCategory' => $incomeCategory,
            'income_categories' => $income_categories
        ]);
    }

    public function update(IncomeCategory $incomeCategory, IncomeCategoryRequest $request)
    {
        $incomeCategory->update($request->validated());

        return redirect()->route('indexIncomeCategory');
    }

    public function delete(IncomeCategory $incomeCategory)
    {
        $incomeCategory->delete();

        return redirect()->route('indexIncomeCategory');
    }
}
