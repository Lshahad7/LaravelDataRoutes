<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Term;
use App\Models\StudentTermCourse;

class StudentTerm extends Model
{
    protected $table = 'student_term';
    protected $fillable = ['student_term_id', 'acad_career', 'university_id', 'term_id', 'student_id', 'status', 'withdraw', 'program', 'acad_level_proj', 'acad_level_bot', 'acad_level_eot', 'nslds_loan_year', 'ovrd_acad_lvl_proj', 'ovrd_acad_lvl_all', 'elg_to_enroll', 'unt_taken_prgrss', 'unt_passd_prgrss', 'unt_taken_gpa', 'unt_passd_gpa', 'unt_taken_nogpa', 'unt_passd_nogpa', 'unt_inprog_nogpa', 'unt_inprog_gpa', 'grade_points', 'semester_attempted_hours', 'semester_earned_hours', 'semester_gpa_hours', 'semester_points', 'semester_gpa', 'unt_term_tot', 'tot_taken_prgrss', 'tot_passd_prgrss', 'tot_taken_gpa', 'tot_passd_gpa', 'tot_taken_nogpa', 'tot_passd_nogpa', 'tot_inprog_gpa', 'tot_inprog_nogpa', 'tot_cumulative', 'tot_grade_points', 'cumulative_attempted_hours', 'cumulative_earned_hours', 'cumulative_gpa_hours', 'tot_grd_points_fa', 'cumulative_gpa'];
    public function studentTerm()
    {
        return $this->belongsTo(Term::class, 'term_id', 'term_id');
    }
    public function courses()
    {
        return $this->hasMany(StudentTermCourse::class, 'studen_term_id', 'student_term_id');
    }
}

?>