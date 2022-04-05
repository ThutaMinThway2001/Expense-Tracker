<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function income_category()
    {
        return $this->belongsTo(IncomeCategory::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
