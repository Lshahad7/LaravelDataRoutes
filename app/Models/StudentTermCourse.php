<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;

class StudentTermCourse extends Model
{
    protected $table = 'student_term_course';
    protected $fillable = ['student_term_course_id', 'studen_term_id', 'course_id', 'letter_grade', 'points', 'class_nbr'];
    public function studentCourse()
    {
        return $this->HasMany(Course::class, 'course_id', 'course_id');
    }
}

?>