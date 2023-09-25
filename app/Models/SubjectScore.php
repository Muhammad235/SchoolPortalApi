<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectScore extends Model
{
    use HasFactory;


        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'mathematics',
        'english',
        'biology',
        'civic',
        'physics',
        'chemistry',
        'arabic',
        'health education',
    ];


    public function score()
    {
        return $this->hasOne(Student::class, 'student_id');
    }


}
