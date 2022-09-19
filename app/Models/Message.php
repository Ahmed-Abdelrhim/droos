<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = ['name','email','phone_number','msg','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

}
