<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'todo_id'];

    public function categoryTodo(){
        return $this->hasMany(Todo::class);
    }

}
