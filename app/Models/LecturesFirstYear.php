<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturesFirstYear extends Model
{
    use HasFactory;
    protected $table = 'lectures_first_years';
    protected $fillable = ['course_id','name','lec', 'serial_number', 'week','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
}
