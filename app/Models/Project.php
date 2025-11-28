<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Correct namespace
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory; // Use the trait correctly

    // Fields that can be mass assigned
    protected $fillable = [
        'name',
        'description',
        'deadline',
    ];

    // Optional: automatically cast 'deadline' to a date
    protected $casts = [
        'deadline' => 'date',
    ];
}
