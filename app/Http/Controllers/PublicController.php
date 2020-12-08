<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
   public  function index() {
        
        $announcements = Announcement::orderBy('created_at', 'desc')->take(5)->get();
        return view('welcome', compact('announcements'));
   }

   public function show($announcement) {
     

      $announcement = Announcement::find($announcement);
      


      return view('announcement.show', compact('announcement'));

  }

   public function category($name, $category_id){
      $category = Category::find($category_id);
      $announcements = $category->announcements()->orderBy('created_at', 'desc')->paginate(5);
      return view('announcement.category', compact('category', 'announcements'));
   }
}
