<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class TaskComment extends Model
{
    use HasFactory;

    protected $table = 'task_comments';
    protected $fillable = ['comment_uuid', 'who_commenter_id', 'task_id', 'comment', 'status'];







    public function who_comment_user()
    {
        return $this->belongsTo(User::class,'who_commenter_id');
    }

    public function which_task()
    {
        return $this->belongsTo(Task::class,'task_id');
    }









    // Get Methods



    // Set Methods

    public function setCommentAttribute($value)
    {

        $this->attributes['comment']  =  Str::ucfirst($value);
    }



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->comment_uuid = Str::uuid();
        });
    }
}
