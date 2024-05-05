<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Term;

class ApiController extends Controller
{
public function getStudents() {
$students = Student::with(['terms' => function ($query) {
$query->select(
'student_term_id',
'term_id',
'student_id',
'status',
'program',
'semester_attempted_hours',
'semester_earned_hours',
'semester_gpa_hours',
'semester_points',
'semester_gpa',
'cumulative_attempted_hours',
'cumulative_earned_hours',
'cumulative_gpa_hours',
'tot_grd_points_fa',
'cumulative_gpa'
)->with(['courses' => function ($query) {
$query->select(
'student_term_course_id',
'studen_term_id',
'course_id',
'letter_grade',
'points',
'class_nbr'
);
}, 'courses.studentCourse']);
}, 'terms.studentTerm' => function ($query) {
$query->select('term_id', 'term_desc');
}])->get([
'student_id',
'university_id',
'university_name',
'student_nid',
'student_name_en',
'college_en',
'degree_en',
'nationality',
'status'
]);

return response()->json($students);
}


}