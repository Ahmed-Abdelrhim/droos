<?php
//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
//
//class Admin extends Authenticatable
//{
//    use HasApiTokens, HasFactory, Notifiable;
//    protected $table = 'admins';
//    protected $fillable = ['name','email','phone_number','avatar','password','created_at','updated_at'];
//    protected $hidden = ['created_at','updated_at'];
//    public $timestamps = true;
//}


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Admin extends Authenticatable implements HasMedia
{
    use InteractsWithMedia, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'phone_number', 'avatar', 'password', 'created_at', 'updated_at', 'deleted_at'];

    protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = true;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('admins')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('avatar')
                    ->width(45)
                    ->height(45)
                    ->sharpen(10);
            });
    }
}
