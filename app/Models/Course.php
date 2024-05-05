<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Term;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['course_id', 'course_name', 'course_credit', 'course_code'];
    
}

?>