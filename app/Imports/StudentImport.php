<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class StudentImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'student_id' => [
                Rule::unique('students')->where(function ($query) use ($row) {
                    return $query->where('student_id', $row[0]);
                }),
            ],
            // Add more validation rules for other columns if needed
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = implode(', ', $errors);
            throw new \Exception('Validation error: ' . $message);
        }
        // dd($row);
        return new Student([
            'student_id' => $row[0], 
            'student_nid' => $row[1],
            'student_name_ar' => $row[2],
            'student_name_en' => $row[3],
            'college_en' => $row[4],
            'college_ar' => $row[5],
            'college_code' => $row[6],
            'university_id' => $row[7],
            'university_name' => $row[8],
            'degree_en' => $row[9],
            'degree_ar' => $row[10],
            'major_en' => $row[11],
            'major_ar' => $row[12],
            'graduation_term' => $row[13],
            'gender' => $row[14],
            'nationality' => $row[15],
            'date_of_birth' => $row[16],
            'program_code' => $row[17],
            'gpa' => $row[18],
            'cumulative_gpa_hours' => $row[19],
            'academic_grade' => $row[20],
            'academic_semester' => $row[21],
            'academic_year' => $row[22],
            'honours' => $row[23],
            'status' => $row[24],
        ]);
    }
    public function startRow(): int
    {
        return 2; // Skip the first row (header row)
    }
}