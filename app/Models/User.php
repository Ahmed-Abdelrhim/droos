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
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        return $this->hasMany(WaitingListThirdYear::class,'student_id','id');
    }

    public function waitingListSecondYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WaitingListSecondtYear::class,'student_id','id');
    }

    public function waitingListFirstYear(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WaitingListFirstYear::class,'student_id','id');
    }
    ############################################ End Relations ##############################################
}
