<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class FriendshipAllowStatus extends Model
{
    use HasFactory;
      
    protected $table = 'friendship_allow_statuses';
    protected $fillable = ['who_send','who_get','status'];
    protected  $appends = ['event_time'];

    public function takenRequestHistory()
    {
        return $this->belongsTo(User::class,'who_send');
    }



    public function getEventTimeAttribute()
    {
        $start = Carbon::parse($this->attributes['updated_at']);
        return  $startdiff = $start->diffForHumans(Carbon::now());
    }


}