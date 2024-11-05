<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'due_date',
        'status',
        'assigned_to'

    ]; 
    // In your Task model (Task.php)
protected $casts = [
    'due_date' => 'datetime', // or 'date' if it's just a date and not a datetime
];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
