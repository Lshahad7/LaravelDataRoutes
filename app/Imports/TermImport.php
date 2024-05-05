<?php

namespace App\Imports;

use App\Models\Term;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class TermImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'term_id' => [
                Rule::unique('terms')->where(function ($query) use ($row) {
                    return $query->where('term_id', $row[0]);
                }),
            ],
            // Add more validation rules for other columns if needed
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $message = implode(', ', $errors);
            throw new \Exception('Validation error: ' . $message);
        }
        return new Term([
            'term_id' => $row[0], 
            'term_desc' => $row[1],
        ]);
    }
    public function startRow(): int
    {
        return 2; // Skip the first row (header row)
    }
}