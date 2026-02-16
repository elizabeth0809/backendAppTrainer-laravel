<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserMeasurement extends Model
{
    use  HasFactory;
    protected $table = 'user_measurements';
   protected $fillable = [
        'user_id',
        'weight',
        'age',
        'height',
        'gender',
        'level'
    ];
    public function isMale()
    {
        return $this->gender === 'male';
    }
    public function isfemale()
    {
        return $this->gender === 'male';
    }
    public function isOther()
    {
        return $this->gender === 'other';
    }
    public function isBeginner()
    {
        return $this->level === 'beginner';
    }

    public function isIntermediate()
    {
        return $this->level === 'intermediate';
    }
     public function isAdvanced()
    {
        return $this->level === 'advanced';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

