<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable=[
            'title','description','price','link','user_id','genre','location','author','image','free','hard_copy'
    ];


    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function notice(){
        return $this->hasMany(Notification::class);
    }
}


