<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeCategoryRequest;
use App\Models\Income;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncomeCategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $incomeCs = IncomeCategory::query();
            return DataTables::of($incomeCs)
            ->editColumn('updated_at', function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H-i-s');
            })
            ->addColumn('actions', function($each){
                
                $edit_icon = '<a href="' . route('editIncomeCategory', $each->id) . '" class="text-warning"><i class="far fa-edit"></i></a>';
                if($each->income->isEmpty()){
                    $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';
                }else{
                    $delete_icon = '';
                }

                return '<div class="action-icon">' . $edit_icon . $delete_icon .'</div>';

            })
            ->rawColumns(['actions'])
            ->make(true);
        }
    
        $income_categories = IncomeCategory::whereUserId(auth()->id())->with('income')->latest()->get();
        // return $income_categories->income;
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

        return 'success';
    }
}
