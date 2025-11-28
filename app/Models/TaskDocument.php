<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskDocument extends Model
{
    protected $table = 'task_documents'; // ensure correct table

    protected $fillable = [
        'filename',
        'filepath',
    ];
}
