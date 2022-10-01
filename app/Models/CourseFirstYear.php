<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubscribedFirstYear;
use App\Models\HomeWorkFirstYear;
class CourseFirstYear extends Model
{
    use HasFactory;
    protected $table = 'course_first_years';
    protected $fillable = ['name','serial_number','price','cover','discount','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;



    public function subscribed(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubscribedFirstYear::class,'course_id','id');
    }

    public function lectures(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LecturesFirstYear::class,'course_id','id');
    }

    public function homework(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HomeWorkFirstYear::class,'course_id','id');
    }

    public function quiz(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(QuizFirstYear::class,'course_id','id');
    }

}
