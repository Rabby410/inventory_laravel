<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nid_no',
        'name',
        'email',
        'phone',
        'address',
        'experiance',
        'photo',
        'salary',
        'vacation',
        'city',
        'departmnt',
        'store_id',
        'store_name',
    ];
}
