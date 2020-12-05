<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body','category_id'];
    
    public function announcements(){
        return $this->hasMany(Announcement::class);
    }
}
