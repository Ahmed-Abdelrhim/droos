<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\WaitingListFirstYear;
use App\Models\WaitingListSecondtYear;
use App\Models\WaitingListThirdYear;
use App\Models\SubscribedFirstYear;
use App\Models\SubscribedSecondYear;
use App\Models\SubscribedThirdYear;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'parent_number',
        'academic_year',
        'avatar',
        'password',
        'mac_address',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    ############################################ Start Relations ############################################
    public function waitingListThirdYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WaitingListThirdYear::class, 'student_id', 'id');
    }

    public function waitingListSecondYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WaitingListSecondtYear::class, 'student_id', 'id');
    }

    public function waitingListFirstYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WaitingListFirstYear::class, 'student_id', 'id');
    }


    ####### Start Subscribed #######
    public function subscribedThirdYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubscribedThirdYear::class, 'student_id', 'id');
    }

    public function subscribedSecondYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubscribedSecondYear::class, 'student_id', 'id');
    }

    public function subscribedFirstYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubscribedFirstYear::class, 'student_id', 'id');
    }
    ####### End Subscribed #######
    ############################################ End Relations ##############################################


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('students')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('avatar')
                    ->width(100)
                    ->height(100)
                    ->sharpen(10);
            });
    }
}
