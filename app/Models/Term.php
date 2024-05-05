<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Term extends Model
{
    protected $table = 'terms';
    protected $fillable = ['term_id', 'term_desc'];
    
}

?>