<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWorkThirdYear extends Model
{
    use HasFactory;
    protected $table = 'home_work_third_years';

    protected $fillable = ['course_id','serial_number','week','link', 'created_at', 'updated_at',];

    protected $hidden = ['created_at', 'updated_at',];

    public $timestamps = true;
}
