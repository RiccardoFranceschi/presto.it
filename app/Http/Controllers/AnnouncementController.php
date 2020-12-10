<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Category;
use App\Models\Announcement;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('search');
        
        
    }

    public function create()
    {

        return view('announcement.create');
    }

    public function store(AnnouncementRequest $request) {
            
        
        // $a = new Announcement();

        // $a->title = $request->input('title');
        // $a->body = $request->input('body');
        // $a->category_id = $request->input('category');

        // $a->save();
       
        $category = Category::find($request->input('category'));

        //DOBBIAMO COLLEGARE OLTRE CHE LA CATEGORIA ANCHE L'UTENTE. 
        //-Abbiamo bisogno dell'utente
        $user = Auth::user();
        //-Abbiamo bisogno dell'annuncio che stiamo creando
        $announcement = $category->announcements()->create($request->validated());
        //ABBIAMO ENTRAMBE LE ENTITA', POSSIAMO FARE LA  RELAZIONE
        $announcement->user()->associate($user);
        
        return redirect()->back()->with('message', 'il tuo annuncio è stato creato con successo!');

    }

    public function show($announcement) {
     

        $announcement = Announcement::find($announcement);
        


        return view('announcement.show', compact('announcement'));

    }


    public function search(Request $request) {
      
        $result = $request->input('result');

        // $announcements = Announcement::search($result)->where('visible', true)->get();

        $announcements = Announcement::search($result)->get();
       
        dd($announcements);
        // return view('search.results', compact('announcements', 'result'));
    }
}
