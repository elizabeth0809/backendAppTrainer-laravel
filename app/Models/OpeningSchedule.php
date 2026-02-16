<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpeningSchedule extends Model
{
   use  HasFactory;
   protected $table = 'opening_schedules';
   protected $fillable = [
        'name',
        'day',
        'start_time',
        'endtime',

    ];
    public function inMon()
    {
        return $this->day === 'mon';
    }

    public function inTue()
    {
        return $this->day === 'tue';
    }
    public function inWed()
    {
        return $this->day === 'wed';
    }
    public function inThu()
    {
        return $this->day === 'thu';
    }
    public function inFri()
    {
        return $this->day === 'fri';
    }
    public function inSat()
    {
        return $this->day === 'sat';
    }
    public function inSun()
    {
        return $this->day === 'sun';
    }
}
