<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;


use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('search');
        
        
    }

    public function create(Request $request)
    {

        $uniqueSecret = $request->old(
            'uniqueSecret',
     base_convert(sha1(uniqid(mt_rand())),16, 36));
        return view('announcement.create', compact('uniqueSecret'));

       // return view('announcement.create');
    }
    
    public function store(AnnouncementRequest $request) {
        
        $user = Auth::user();
        
        $a = new Announcement();
        
        $a->title = $request->input('title');
        $a->body = $request->input('body');
        $a->price = $request->input('price');
        $a->category_id = $request->input('category');
        //$a->image = $request->input('image');
        $a->user_id= $user->id;
            
        $a->save();
       
        $uniqueSecret=$request->input('uniqueSecret');
        //dd($uniqueSecret);

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        //dd($images);
    

        foreach ($images as $image){
            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName = "public/announcement/{$a->id}/{$fileName}";
           Storage::move($image, $newFileName);


           dispatch(new ResizeImage(
             $newFileName,
                300,
                150,
           ));

           dispatch(new ResizeImage(
            $newFileName,
               400,
               300,
          ));

            $i->file = $newFileName;
            $i->announcement_id = $a->id;

            $i->save();

            dispatch(new GoogleVisionSafeSearchImage($i->id));
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        // $category = Category::find($request->input('category'));
        //DOBBIAMO COLLEGARE OLTRE CHE LA CATEGORIA ANCHE L'UTENTE. 
        //-Abbiamo bisogno dell'utente
        //-Abbiamo bisogno dell'annuncio che stiamo creando
        // $announcement = $category->announcements()->create($request->validated());
        //ABBIAMO ENTRAMBE LE ENTITA', POSSIAMO FARE LA  RELAZIONE
        // $announcement->user()->associate($user);
        return redirect('/')->with('message', 'il tuo annuncio è stato creato con successo!');

    }

    public function show($announcement) {
     

        $announcement = Announcement::find($announcement);
        


        return view('announcement.show', compact('announcement'));

    }


    public function search(Request $request) {
      
        $result = $request->input('result');

        // $announcements = Announcement::search($result)->where('visible', true)->get();

        $announcements = Announcement::search($result)->where('is_accepted', true)->get();
        
        // ->query(function ($builder) {
        //     $builder->with(['announcements']); })
       
        // dd($announcements);
        return view('search.results', compact('announcements', 'result'));
    }

    public function uploadImage(Request $request){

//dd($request->input());

        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id'=>$fileName
            ]
           
            );}

       public function removeImage(Request $request)
            {
                $uniqueSecret = $request->input('uniqueSecret');

                $fileName = $request->input('id');
                session()->push("removedimages.{$uniqueSecret}", $fileName);

                Storage::delete($fileName);
                return response()->json('ok');
        
            }

            public function getImages(Request $request)
            {
                $uniqueSecret = $request->input('uniqueSecret');

                $images = session()->get("images.{$uniqueSecret}", []);
                $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

                $images = array_diff($images, $removedImages);

                $data = [];

                foreach ($images as $image){
                    $data[] = [
                        'id' =>$image,
                        'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120)
                    ];
                }

                return response()->json($data);
            }

            
}
