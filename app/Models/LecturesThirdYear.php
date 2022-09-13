<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturesThirdYear extends Model
{
    use HasFactory;
    protected $table = 'lectures_third_years';
    protected $fillable = ['name','cover','serial_number','week','lecture','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
}
