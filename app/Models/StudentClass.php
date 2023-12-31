<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'grade',
    ];


    public function grade(): HasOne
    {
        return $this->hasOne(Student::class);
    }


    public function teacher_class(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

}
