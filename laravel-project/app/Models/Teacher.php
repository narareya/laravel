<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $with = ['subject'];

    protected $fillable = [
        'name',
        'subject_id',
        'email', 
        'phone',
        'address',
    ];

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function classrooms() {
        return $this->hasMany(Classroom::class, 'teacher_id');
    }
    
}
