<?php

namespace App\Models\Grup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupNewsTaggedUser extends Model
{
    use HasFactory;

    protected $table = 'grup_news_tagged_users';
    protected $fillable = [
        'news_id',
        'grup_id',
        'user_id',
      
    ];

   // Relations
   public function user()
   {

       return $this->hasOne(User::class, 'user_id', 'id');
   }


}
