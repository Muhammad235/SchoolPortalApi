<?php

namespace App\Http\Resources;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $student = Student::find($this->student_id);

        $studentName = $student->first_name .' '.$student->last_name;

        $StudentClass = StudentClass::find($student->student_class_id);

        return [
            'student_id' => (string) $this->student_id,
            'student_name' => $studentName,
            'grade' => $StudentClass->grade,
            'subject_score' => [
                'mathematics' => $this->mathematics,
                'english' => $this->english,
                'biology' => $this->biology,
                'civic' => $this->civic,
                'physics' => $this->physics,
                'chemistry' => $this->chemistry,
                'health_education' => $this->health_education,
                'chemistry' => $this->chemistry,
            ]
        ];
    }
}


