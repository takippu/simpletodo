<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';

    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    public function usertodo(){
        return $this->belongsTo(User::class);
    }

    public function todoCategory(){
        return $this->belongsTo(TodoCategory::class);
    }
}
