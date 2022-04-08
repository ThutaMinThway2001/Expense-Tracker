<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\MonthlyReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\IncomeCategory;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('loginCreate');
    Route::post('/login', [SessionController::class, 'store'])->name('loginUser');

    Route::get('/register', [RegisterController::class, 'create'])->name('createUser');
    Route::post('/register', [RegisterController::class, 'store'])->name('storeUser');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

    Route::controller(IncomeController::class)->group(function () {
        Route::get('/income', 'index')->name('indexIncome');
        Route::get('/income/create-income', 'create')->name('create');
        Route::post('/income/create-income', 'store')->name('storeIncome');
        Route::get('/income/edit-income/{income}', 'edit')->name('editIncome');
        Route::delete('/income/{income}', 'delete')->name('deleteIncome');
        Route::post('/income/update-income/{income}', 'update')->name('updateIncome');
    });

    Route::controller(IncomeCategoryController::class)->group(function () {
        Route::get('/income/income-category', 'index')->name('indexIncomeCategory');
        Route::post('/income/create-income-category', 'store')->name('storeIncomeCategory');
        Route::get('/income/edit-income-category/{incomeCategory}', 'edit')->name('editIncomeCategory');
        Route::put('/income/update-income-category/{incomeCategory}', 'update')->name('updateIncomeCategory');
        Route::delete('/income/income-category/{incomeCategory}', 'delete')->name('deleteIncomeCategory');
    });

    Route::controller(ExpenseController::class)->group(function () {
        Route::get('/expense', 'index')->name('indexExpense');
        Route::get('/expense/create-expense', 'create')->name('createExpense');
        Route::post('/expense/create-expense', 'store')->name('storeExpense');
        Route::get('/expense/edit-expense/{expense}', 'edit')->name('editExpense');
        Route::delete('/expense/{expense}', 'delete')->name('deleteExpense');
        Route::put('/expense/update-expense/{expense}', 'update')->name('updateExpense');
    });

    Route::controller(ExpenseCategoryController::class)->group(function () {
        Route::get('/expense/expense-category', 'index')->name('indexExpenseCategory');
        Route::post('/expense/create-expense-category', 'store')->name('storeExpenseCategory');
        Route::get('/expense/edit-expense-category/{expenseCategory}', 'edit')->name('editExpenseCategory');
        Route::put('/expense/update-expense-category/{expenseCategory}', 'update')->name('updateExpenseCategory');
        Route::delete('/expense/expense-category/{expenseCategory}', 'delete')->name('deleteExpenseCategory');
    });

    Route::get('/monthly-reports', [MonthlyReportController::class, 'index'])->name('monthlyReports');

    Route::controller(PaymentController::class)->group(function(){
        Route::get('/payment/payment-create', 'create')->name('createPayment');
        Route::post('/payment/payment-create', 'store')->name('storePayment');
        Route::delete('/payment/payment-create/{payment}', 'delete')->name('deletePayment');
    });
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adminPanel');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('/admin/admins', [AdminController::class, 'admins'])->name('admins');
    // Route::get('/admin/edit-user/{user}', [AdminController::class, 'editUser'])->name('editUser');
    Route::delete('/admin/user/delete/{user}', [AdminController::class, 'delete'])->name('deleteUser');
});

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test', function () {
    return view('test');
});
