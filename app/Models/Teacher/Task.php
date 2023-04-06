<?php

namespace App\Models\Teacher;

use App\Traits\TaskTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory, TaskTrait;
    protected $table = 'tasks';
    protected $fillable = ['note', 'finished_at', 'status', 'title'];
    protected  $appends = ['first_letter', 'status_color', 'mini_note', 'status_tr', 'date_counter', 'percent_time'];






// Casts

    protected $casts = [
        // hata:orta burası çalışmıyor alpaya sor
        // 'id' => 'uuid',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->task_id = Str::uuid();
        });
    }






    // Get Methods

    public function getDateCounterAttribute()
    {
        $now = Carbon::parse(Carbon::now());
        $end = Carbon::parse($this->attributes['finished_at']);
        $diff = $now->diffInDays($end);
        return   $diff;
    }

    public function getPercentTimeAttribute()
    {
        $start = Carbon::parse($this->attributes['created_at']);
        $now = Carbon::parse(Carbon::now());
        $end = Carbon::parse($this->attributes['finished_at']);


        $startdiff = $start->diffInDays($end);
        $nowdiff = $now->diffInDays($end);

        $smallNumber = $nowdiff;
        $bigNumber = $startdiff;

        if (!($startdiff == 0 || $nowdiff == 0)) {

            $percent = 100 - round(($smallNumber / $bigNumber) * 100, 0);

            return  $percent;
        }
    }


    public function getFirstLetterAttribute()
    {
        return  $this->attributes['first_letter'] =   Str::title(Str::substr($this->attributes['title'], 0, 1));
    }

    public function getStatusTrAttribute()
    {



        switch ($this->attributes['status']) {
            case 'green':

                return  $this->attributes['status_tr'] = 'Normal';
                break;

            case 'red':
                return  $this->attributes['status_tr'] = 'Acil';
                break;

            case 'yellow':
                return  $this->attributes['status_tr'] = 'Önemli';
                break;


            default:
                return  $this->attributes['status_tr'] = 'Durumsuz';
                break;
        }
    }

    public function getStatusColorAttribute()
    {


        switch ($this->attributes['status']) {
            case 'green':

                return  $this->attributes['status_color'] = 'success';
                break;

            case 'red':
                return  $this->attributes['status_color'] = 'danger';
                break;

            case 'yellow':
                return  $this->attributes['status_color'] = 'warning';
                break;


            default:
                return  $this->attributes['status_color'] = 'secondary';
                break;
        }
    }

    public function getMiniNoteAttribute()
    {

        if (strlen($this->attributes['note']) > 50) {

            return  $this->attributes['mini_note'] = Str::title(Str::substr($this->attributes['note'], 0, 50) . '..');
        } else {
            return   $this->attributes['mini_note'] = Str::title($this->attributes['note']);
        }
    }

    public function getTitleAttribute()
    {

        return Str::title($this->attributes['title']);
    }

    // Set Methods

    public function setNoteAttribute($value)
    {

        $this->attributes['note']  =  Str::ucfirst($value);
    }

    public function setTitleAttribute($value)
    {

        $this->attributes['title']  = Str::title($value);
    }



}
