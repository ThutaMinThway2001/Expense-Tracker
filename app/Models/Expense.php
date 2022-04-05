<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
