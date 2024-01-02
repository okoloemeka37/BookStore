<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable=['books_id','user_id','parent_id','content'];

    function user(){
        return  $this->belongsTo(User::class);
    }
    function Book(){
        return $this->belongsTo(Books::class);
    }
}
