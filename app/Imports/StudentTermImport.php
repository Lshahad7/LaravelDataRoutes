<?php

namespace App\Imports;

use App\Models\StudentTerm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class StudentTermImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'student_term_id' => [
                Rule::unique('student_term')->where(function ($query) use ($row) {
                    return $query->where('student_term_id', $row[0]);
                }),
            ],
            // Add more validation rules for other columns if needed
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = implode(', ', $errors);
            throw new \Exception('Validation error: ' . $message);
        }
        return new StudentTerm([
            'student_term_id' => $row[0], 
            'acad_career' => $row[1],
            'university_id' => $row[2],
            'term_id' => $row[3],
            'student_id' => $row[4],
            'status' => $row[5],
            'withdraw' => $row[6],
            'program' => $row[7],
            'acad_level_proj' => $row[8],
            'acad_level_bot' => $row[9],
            'acad_level_eot' => $row[10],
            'nslds_loan_year' => $row[11],
            'ovrd_acad_lvl_proj' => $row[12],
            'ovrd_acad_lvl_all' => $row[13],
            'elg_to_enroll' => $row[14],
            'unt_taken_prgrss' => $row[15],
            'unt_passd_prgrss' => $row[16],
            'unt_taken_gpa' => $row[17],
            'unt_passd_gpa' => $row[18],
            'unt_taken_nogpa' => $row[19],
            'unt_passd_nogpa' => $row[20],
            'unt_inprog_nogpa' => $row[22],
            'unt_inprog_gpa' => $row[21],
            'grade_points' => $row[23],
            'semester_attempted_hours' => $row[24],
            'semester_earned_hours' => $row[25],
            'semester_gpa_hours' => $row[26],
            'semester_points' => $row[27],
            'semester_gpa' => $row[28],
            'unt_term_tot' => $row[29],
            'tot_taken_prgrss' => $row[30],
            'tot_passd_prgrss' => $row[31],
            'tot_taken_gpa' => $row[32],
            'tot_passd_gpa' => $row[33],
            'tot_taken_nogpa' => $row[34],
            'tot_passd_nogpa' => $row[35],
            'tot_inprog_gpa' => $row[36],
            'tot_inprog_nogpa' => $row[37],
            'tot_cumulative' => $row[38],
            'tot_grade_points' => $row[39],
            'cumulative_attempted_hours' => $row[40],
            'cumulative_earned_hours' => $row[41],
            'cumulative_gpa_hours' => $row[42],
            'tot_grd_points_fa' => $row[43],
            'cumulative_gpa' => $row[44],
        ]);
    }
    public function startRow(): int
    {
        return 2; // Skip the first row (header row)
    }
}