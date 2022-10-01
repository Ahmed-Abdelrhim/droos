<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturesThirdYear extends Model
{
    use HasFactory;
    protected $table = 'lectures_third_years';
    protected $fillable = ['course_id','name','lec' , 'homework','quiz','serial_number', 'week','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseThirdYear::class,'course_id','id');
    }
}
