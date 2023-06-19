<?php

namespace App\Models\Grup;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GrupNews extends Model
{
    use HasFactory;

    protected $table = 'grup_news';
    protected $fillable = [
        'news_uuid',
        'posted_user_id',
        'title',
        'note',
        'tages',
        'images_paths',
        'tagged_users',
        'student_feedback',
        'status',
        'pimmed',
        'is_deleted'
    ];

    // Relations
    public function post_tagged_user()
    {

        return $this->hasMany(GrupNewsTaggedUser::class, 'news_id', 'id');
    }

    public function news_comments()
    {

        return $this->hasMany(GrupNewsComments::class, 'news_id', 'id')->orderBy('updated_at','asc');
    }
    public function posted_user()
    {

        return $this->hasOne(User::class, 'id', 'posted_user_id');
    }













    // Set Functions
    public function setTitleAttribute($value)
    {

        $this->attributes['title']  = Str::title($value);
    }


    public function setNoteAttribute($value)
    {

        $this->attributes['note']  = Str::ucfirst($value);
    }






    // Get Functions
    public function getFirstLetterAttribute()
    {
        return  $this->attributes['first_letter'] =   Str::title(Str::substr($this->attributes['name'], 0, 1));
    }



















    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->news_uuid = Str::uuid();
        });
    }
}
