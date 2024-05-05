<?php

namespace App\Imports;

use App\Models\StudentTermCourse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class StudentTermCourseImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'student_term_course_id' => [
                Rule::unique('student_term_course')->where(function ($query) use ($row) {
                    return $query->where('student_term_course_id', $row[0]);
                }),
            ],
            // Add more validation rules for other columns if needed
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = implode(', ', $errors);
            throw new \Exception('Validation error: ' . $message);
        }
        return new StudentTermCourse([
            'student_term_course_id' => $row[0], 
            'studen_term_id' => $row[1],
            'course_id' => $row[2],
            'letter_grade' => $row[3],
            'points' => $row[4],
            'class_nbr' => $row[5],
        ]);
    }
    public function startRow(): int
    {
        return 2; // Skip the first row (header row)
    }
}