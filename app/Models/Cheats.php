<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheats extends Model
{
    use HasFactory;
    protected $table = 'cheats';

    protected $fillable = ['students_id','cheats_number','created_at', 'updated_at',];

    protected $hidden = ['created_at', 'updated_at',];

    public $timestamps = true;
}
