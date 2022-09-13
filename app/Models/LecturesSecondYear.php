<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturesSecondYear extends Model
{
    use HasFactory;
    protected $table = 'lectures_second_years';
    protected $fillable = ['name','cover','serial_number','week','lecture','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
}
