<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFirstYear extends Model
{
    use HasFactory;
    protected $table = 'course_first_years';
    protected $fillable = ['name','serial_number','price','discount','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
}
