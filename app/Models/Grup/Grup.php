<?php

namespace App\Models\Grup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Grup\Member;
use App\Models\User;

class Grup extends Model
{
    use HasFactory;
    protected $table = 'grups';
    protected $fillable = ['teacher_id', 'grup_id', 'status', 'branch','name','details'];
    protected  $appends = ['first_letter'];

    

    // Relationship Functions 

   public function members(){

        return $this->hasMany(Member::class,'grup_id','id');
    }

    public function teacher(){

        return $this->hasOne(User::class,'id','teacher_id');
    }




    // Set Functions

    public function setBranchAttribute($value)
    {

        $this->attributes['branch']  =  Str::title($value);
    }

    public function setNameAttribute($value)
    {

        $this->attributes['name']  = Str::title($value);
    }

    public function setDetailsAttribute($value)
    {

        $this->attributes['details']  = Str::ucfirst($value);
    }


    // Get Functions
    public function getFirstLetterAttribute()
    {
        return  $this->attributes['first_letter'] =   Str::title(Str::substr($this->attributes['name'], 0, 1));
    }

}
