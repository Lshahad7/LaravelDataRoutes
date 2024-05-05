<?php

namespace App\Imports;

use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class CourseImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'course_id' => [
                Rule::unique('courses')->where(function ($query) use ($row) {
                    return $query->where('course_id', $row[0]);
                }),
            ],
            // Add more validation rules for other columns if needed
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = implode(', ', $errors);
            throw new \Exception('Validation error: ' . $message);
        }
        return new Course([
            'course_id' => $row[0], 
            'course_name' => $row[1],
            'course_credit' => $row[2],
            'course_code' => $row[3],
        ]);
    }
    public function startRow(): int
    {
        return 2; // Skip the first row (header row)
    }
}