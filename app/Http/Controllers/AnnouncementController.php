<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $categories = Category::all();

        View::share('categories', $categories);

    }

    public function create()
    {

        return view('announcement.create');
    }

    public function store(AnnouncementRequest $request)
    {

        $a = new Announcement();

        $a->title = $request->input('title');
        $a->body = $request->input('body');
        $a->category_id = $request->input('category');
        $a->save();

        return redirect()->back()->with('message', 'Il tuo annuncio è stato creato con successo!');

    }
}
