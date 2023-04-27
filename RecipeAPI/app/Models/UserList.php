<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_id',
        'title',
        
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_user_list', 'user_list_id', 'user_id');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'user_list_recipe', 'user_list_id', 'recipe_id');
    }

}
