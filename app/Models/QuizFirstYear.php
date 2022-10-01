<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizFirstYear extends Model
{
    use HasFactory;

    protected $table = 'quiz_first_years';

    protected $fillable = ['course_id','serial_number','week','link', 'created_at', 'updated_at',];

    protected $hidden = ['created_at', 'updated_at',];

    public $timestamps = true;

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseFirstYear::class,'course_id','id');
    }
}
