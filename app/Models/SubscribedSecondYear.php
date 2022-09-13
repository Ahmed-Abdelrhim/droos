<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribedSecondYear extends Model
{
    use HasFactory;
    protected $table = 'subscribed_second_years';
    protected $fillable = ['student_id','serial_number','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
}