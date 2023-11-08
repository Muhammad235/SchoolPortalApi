<?php

namespace App\Models;

use App\Models\Student;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'student_class_id',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


    public function students()
    {
        return $this->hasMany(Student::class, 'student_class_id');
    }

}
