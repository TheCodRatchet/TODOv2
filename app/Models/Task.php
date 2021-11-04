<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected array $fillable = ['title', 'content'];

    public function toggleComplete()
    {
        $this->completed_at = $this->completed_at ? null : now();
    }
}
