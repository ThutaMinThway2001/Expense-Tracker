<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function income(){
        return $this->hasMany(Income::class);
    }
    public function expense(){
        return $this->hasMany(Expense::class);
    }
}
