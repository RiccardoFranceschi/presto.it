<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PublicController extends Controller
{
   public  function index() {
        $announcements = Announcement::where('is_accepted', true)
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();
        return view('welcome', compact('announcements'));
   }

   public function show($announcement) {
     

      $announcement = Announcement::find($announcement);
      


      return view('announcement.show', compact('announcement'));

  }

   public function category($name, $category_id){
      $category = Category::find($category_id);
      $announcements = $category->announcements()
      ->where('is_accepted', true)
      ->orderBy('created_at', 'desc')
      ->paginate(5);
      return view('announcement.category', compact('category', 'announcements'));
   }

   public function locale($locale)
   {
      session()->put('locale', $locale);
      return redirect()->back();
   }
}
