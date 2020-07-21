<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['name', 'surname', 'profession', 'experience', 'salary'];
}
