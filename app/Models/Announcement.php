<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $fillable = ['title', 'body','category_id', 'user_id'];

    public function toSearchableArray()
    {

        $array = [
            'id' => $this->id,
            'title' => $this->name,
            'body' => $this->body,
            'altro' => 'dobbiamo inserire qualcosa',
        ];

        

        return $array;
    }

    
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
 
    static public function ToBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }
}
