<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseThirdYear extends Model
{
    use HasFactory;
    protected $table = 'course_third_years';
    protected $fillable = ['name','serial_number','price','cover','discount','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;


    public function subscribed(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubscribedThirdYear::class,'course_id','id');
    }

    public function lectures(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LecturesThirdYear::class,'course_id','id');
    }

    public function homework(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HomeWorkThirdYear::class,'course_id','id');
    }

    public function quiz(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(QuizThirdYear::class,'course_id','id');
    }
}
