<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VerificationCode extends Authenticatable
{
    use HasFactory;

    public $table="verificationcodes";

    protected $fillable=['user_id','code','created_at','updated_at'];

    public function attribute()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
