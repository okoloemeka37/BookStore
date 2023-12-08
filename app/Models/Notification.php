<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;
    protected $fillable=[
        'from_id','user_id','description','status','book_id','type','for_text','book_title'
    ];
    function book(){
        return $this->belongsTo(Books::class);
    }
}
