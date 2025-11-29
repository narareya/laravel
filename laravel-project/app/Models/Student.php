<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $with = ['classroom'];

    protected $fillable = [
        'name',
        'email',
        'birthday',
        'classroom_id',
        'gender',
        'address',
    ];
    

    public function classroom() {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
