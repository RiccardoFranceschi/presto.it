<x-layout>
    <x-slot name="title">Presto.it - Home</x-slot>
    {{-- <h1 class="text-center">Benvenuti in presto!</h1>
    <div class="container my-5 py-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div> --}}
    
    <!-- Header-->
    <header class="header d-flex align-items-center">
        <div class="container ">
               <h1 class="text-second text-center">Presto.it</h1>
            <div class="row bg-first mt-5 align-items-center">
                <div class="col-12 bg_light px-3 py-4 d-flex rounded shadow align-items-center flex-wrap">
                  <div class="col-12 col-md-4">
                    <div class="form-group">
                      <label class="d-md-block text-second font-weight-bold" for="exampleInputEmail1">Cosa cerchi?</label>
                      <input type="text" class="form-control" placeholder="es. Notebook, Smart Tv ecc." id="exampleInputEmail1"
                        aria-describedby="emailHelp" />
                    </div>
                  </div>
                  <div class="col-12 col-md-3">
                    <div class="form-group">
                      <label class="d-md-block text-second font-weight-bold" for="exampleFormControlSelect1">Categoria</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>Computer</option>
                        <option>TV, Audio</option>
                        <option>Videogiochi</option>
                        <option>Telefonia</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-3">
                    <div class="form-group">
                      <label class="d-md-block text-second font-weight-bold" for="exampleFormControlSelect1">Dove?</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>Umbria</option>
                        <option>Molise</option>
                        <option>Abruzzo</option>
                        <option>Toscana</option>
                        <option>Marche</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-2 pt-3">
                    <button type="submit" class="btn bg-accent font-weight-bold text-second w-100">
                      Cerca
                    </button>
                  </div>
                </div>
              </div>
        </div>
    </header>

   <div class="container">
       <div class="row"><div class="col-12">
           @if(session('announcement.created.success'))
           <div class="alert alert-success">
               Annuncio creato correttamente
           </div>
           @endif

           @if (session('access.denied.revisor.only'))
           <div class="alert alert-danger">
               Accesso non consentito - solo per revisorsi
           </div>
           @endif
           
    </div></div>
   </div>
    
    
    <!-- Annunci più recenti -->
    <div class="container my-5 py-5">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-4 font-weight-bold">Gli articoli più recenti</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($announcements as $announcement)
            
            <div class="col-12 col-md-6 my-3">
                <div class="card opacity-custom shadow text-center border-0">
                    <div class="card-header bg-white border-bottom text-uppercase d-flex">
                        
                        <div class="p-0 mr-auto ">Lorem ipsum dolor</div>
                        <div class="p-0 "><i class="far fa-heart fa-lg"></i></div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-6 border-right justify-content-center">
                                <img src="https://picsum.photos/400/500" alt="" class=" img-fluid float-left rounded-0 p-4 ">
                            </div>
                            <div class="col-6 ">
                                <p class="card-text text-uppercase font-weight-bold display-custom text-truncate text-left pt-3">{{ $announcement->title }}</p>
                                <p class="card-text text-uppercase font-weight-lighter display-price text-left ">€20</p>
                                <p class="card-text font-weight-light text-muted text-left text-truncate pb-4 ">{{ $announcement->body }}</p>
                                <a href="{{ route('announcement.show', compact('announcement')) }}" class=" btn btn-custom ">SCOPRI DI PIU'
                                </a>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer d-flex bg-white d-flex">
                            <div class="p-0 mr-auto ">
                            <span class="font-weight-bold">Category: <a href="{{ route('announcement.category', [$announcement->category->name, $announcement->category->id])}}" class="text-decoration-none">{{ $announcement->category->name }}</a></span>
                        </div>
                        <div class="p-0">
                            <i>{{ $announcement->created_at->format('d/m/Y') }} - {{ $announcement->user->name }}</i>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>   
</x-layout>