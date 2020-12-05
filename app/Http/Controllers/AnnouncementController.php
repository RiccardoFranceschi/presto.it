<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Validator;

use function Ramsey\Uuid\v1;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $categories = Category::all();

        View::share('categories',$categories);
    }

    public function create() {

        return view('announcement.create');
    }

    public function store(AnnouncementRequest $request) {
            
        
        // $a = new Announcement();

        // $a->title = $request->input('title');
        // $a->body = $request->input('body');

        // $a->save();

        
        // Announcement::create([
            //    'title'=>$request->input('title'),
            //    'body'=>$request->input('body')
            // ]);

        Announcement::create($request->validated());
        return redirect('/')->with('message', 'il tuo annuncio è stato creato con successo!');

    }
}
