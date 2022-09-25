<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class WaitingListThirdYear extends Model
{
    use HasFactory;
    protected $table = 'waiting_list_third_years';
    protected $fillable = ['student_id','serial_number','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;


    ############################################ Start Relations ############################################
    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    ############################################ End Relations ##############################################
}
