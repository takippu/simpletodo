<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    use HasFactory;
    protected $fillable = ['category_name', 'user_id'];

    public function usertodo(){
        return $this->hasMany(TodoList::class);
    }

}
