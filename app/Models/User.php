<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'user_name',
        'user_detail',
        'email',
        'user_id',
        'phone',
        'address',
        'role',
        'password',
        'friend_allow'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    // Casts

    protected $casts = [
        'email_verified_at' => 'datetime',
        // hata:orta burası çalışmıyor // 'id' => 'uuid', 
    ];




    protected  $appends = ['first_letter'];


    public function getFirstLetterAttribute()
    {
        return  $this->attributes['first_letter'] =   Str::title(Str::substr($this->attributes['name'], 0, 1));
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = Str::uuid();
        });
    }
}
