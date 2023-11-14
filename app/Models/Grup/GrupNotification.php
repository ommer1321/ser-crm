<?php

namespace App\Models\Grup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class GrupNotification extends Model
{
    use HasFactory;
    protected $table = 'grup_notifications';
    protected $fillable = [
        'notification_uuid',
        'grup_id',
        'sender_id',
        'user_id',
        'message',
        'model',
        'model_id',
        'is_sended',

    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->notification_uuid = Str::uuid();
        });
    }


    public function userInfo()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }


    // Get Methods

    // public function getModelAttribute()
    // {
    //     switch ($this->attributes['model']) {
    //         case 'task':
    //             return   $this->attributes['model']  =  'tasks';
    //             break;

    //         case 'task_comment':
    //             return     $this->attributes['model']  =  'tasks';
    //             break;


    //         case 'news':
    //             // $message_of_model = 'news  mesajı';
    //             break;

    //         case 'friendship_request':
    //             // $message_of_model = 'friendship_request mesajı';
    //             break;


    //         default:
    //             $this->attributes['model']  =  'details.task';
    //             break;
    //     }
    // }
}
