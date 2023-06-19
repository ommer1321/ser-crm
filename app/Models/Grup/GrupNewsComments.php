<?php

namespace App\Models\Grup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class GrupNewsComments extends Model
{
    use HasFactory;


    
    protected $table = 'grup_news_comments';
    protected $fillable = ['comment_uuid', 'who_commenter_id', 'news_id','grup_id', 'comment', 'status'];







    public function who_comment_user()
    {
        return $this->belongsTo(User::class,'who_commenter_id','id');
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
