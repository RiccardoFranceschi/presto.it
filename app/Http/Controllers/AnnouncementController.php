<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Validator;

use function Ramsey\Uuid\v1;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function create()
    {

        return view('announcement.create');
    }

    public function store(AnnouncementRequest $request) {
            
        
        $a = new Announcement();

        $a->title = $request->input('title');
        $a->body = $request->input('body');
        $a->category_id = $request->input('category');

        $a->save();

        
        Announcement::create($request->validated());
        return redirect('/')->with('message', 'il tuo annuncio è stato creato con successo!');

    }

    public function show($announcement) {
     

        $announcement = Announcement::find($announcement);
        


        return view('announcement.show', compact('announcement'));

    }
}
