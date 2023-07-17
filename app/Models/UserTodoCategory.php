<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTodoCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category', 'user_id'];

    public function userCategory(){
        return $this->belongsTo(User::class);
    }
    

}
