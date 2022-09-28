<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribedSecondYear extends Model
{
    use HasFactory;
    protected $table = 'subscribed_second_years';
    protected $fillable = ['student_id','course_id','serial_number','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    ############################################ Start Relations ############################################
    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CourseSecondYear::class,'course_id','id');
    }
    ############################################ End Relations ##############################################
}
