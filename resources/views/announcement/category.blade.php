<x-layout>

    <div class="container my-3 py-3">

    </div>

    <!-- Annunci più recenti -->
     <div class="container my-5 py-5 min-vh-100">
         <div class="row justify-content-center">
             <div class="col-12 col-md-8">
             <h1 class="display-5 font-weight-bold text-center text-first">{{__('ui.annunci per categorie')}} {{ $category->name}}
            
              @if (App::getLocale()=='it')
              {{$category->name_it}}

              @elseif (App::getLocale()=='es')
              {{$category->name_es}}

              @elseif (App::getLocale()=='gb')
              {{$category->name_en}}
                  
              @endif
            
            
            </h1>


             </div>
        </div>
        <div class="row">
            @foreach ($announcements as $announcement)
            
            <div class="col-12 col-md-6 my-3">
                <div class="card opacity-custom text-center border-0">
                    <div class="card-header bg-white border-bottom text-uppercase d-flex">
                        
                        <div class="p-0 mr-auto "></div>
                        <div class="p-0 "><i class="far fa-heart fa-lg"></i></div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-6 border-right justify-content-center">
                                <img src="/media/monitor-msi.jpg" alt="" class=" img-fluid float-left rounded-0 p-4 ">
                            </div>
                            <div class="col-6 ">
                                <p class="card-text text-uppercase font-weight-bold display-custom text-truncate text-first text-left pt-3">{{ $announcement->title }}</p>
                                <p class="card-text text-uppercase font-weight-lighter display-price text-first text-left ">{{$announcement->price}}€</p>
                                <p class="card-text font-weight-light text-muted text-left text-truncate pb-4 ">{{ $announcement->body }}</p>
                                <a href="{{ route('announcement.show', compact('announcement')) }}" class="btn btn-primary border-0 bg-accent font-weight-bold ">{{__('ui.scopri di piu')}}'
                                </a>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer d-flex bg-white d-flex">
                            <div class="p-0 mr-auto ">
                            <span class="font-weight-bold">{{'ui.categorie'}}: <a href="{{ route('announcement.category', [$announcement->category->name_it, $announcement->category->id]) }}" class="text-decoration-none">{{ $announcement->category->name }}</a></span>
                        </div>
                        <div class="p-0">
                            <i>{{ $announcement->created_at->format('d/m/Y') }} - {{ $announcement->user->name }}</i>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                {{$announcements->links()}}
            </div>
        </div>
     </div>   

</x-layout>