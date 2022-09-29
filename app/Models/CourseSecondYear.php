<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LecturesSecondYear;
class CourseSecondYear extends Model
{
    use HasFactory;
    protected $table = 'course_second_years';
    protected $fillable = ['name','serial_number','price','cover','discount','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    public function subscribed(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SubscribedSecondYear::class,'course_id','id');
    }

    public function lectures(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(LecturesSecondYear::class,'course_id','id');
    }
}
