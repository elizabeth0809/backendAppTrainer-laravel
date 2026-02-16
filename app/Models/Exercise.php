<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercises';
    protected $fillable = [
        'name',
        'price',
        'img',
        'modalities'
    ];

    public function inPerson()
    {
        return $this->modalities === 'person';
    }

    public function inHybrid()
    {
        return $this->modalities === 'hybrid';
    }
    public function inOnline()
    {
        return $this->modalities === 'online';
    }
}
