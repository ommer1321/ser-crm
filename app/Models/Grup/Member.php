<?php

namespace App\Models\Grup;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['member_id', 'member_uuid', 'grup_id', 'status'];
    // protected  $appends = [];



    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->member_uuid = Str::uuid();
    //     });
    // }
// hata veriyor yukleme esnasında 

    // Relationship Functions 

    public function grup()
    {
        return $this->belongsTo(Grup::class, 'grup_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'member_id', 'id');
    }


}
