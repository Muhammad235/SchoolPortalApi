<?php

namespace App\Http\Resources;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $studentClass = StudentClass::find($this->student_class_id);

        return [
            'id' => (string) $this->id,
            'details' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'address' => $this->address,
                'class' => $studentClass->grade,
                'gender' => $this->gender,
            ]
        ];
    }
}
