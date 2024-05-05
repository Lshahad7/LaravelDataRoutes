<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\StudentTerm;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['student_id','student_nid', 'student_name_ar', 'student_name_en', 'college_en', 'college_ar', 'college_code', 'university_id', 'university_name', 'degree_en', 'degree_ar', 'major_en', 'major_ar', 'graduation_term', 'gender', 'nationality', 'date_of_birth', 'program_code', 'gpa', 'cumulative_gpa_hours', 'academic_grade', 'academic_semester', 'academic_year', 'honours', 'status'];
    
    public function terms()
    {
        return $this->hasMany(StudentTerm::class, 'student_id','student_id');
    }
}

?>