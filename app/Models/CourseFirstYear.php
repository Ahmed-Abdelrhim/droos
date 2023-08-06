<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubscribedFirstYear;
use App\Models\HomeWorkFirstYear;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CourseFirstYear extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
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


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('courses')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('cover')
                    ->width(462)
                    ->height(317)
                    ->sharpen(10);
            });
    }

}
