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
        <div class="container">
            <h1 class="display-4 text-first font-weight-bold text-center">{{ __('ui.welcome') }}</h1>
            <div class="row mt-5 align-items-center">
                <div class="col-md-8 offset-md-2 bg-first col-offset-2 bg_light px-3 py-4 d-flex rounded shadow align-items-center flex-wrap">
                    <div class="col-12 col-md-8">
                        <form action="{{route('search.results')}}" method="GET">
                            <input type="text" class="form-control" name="result" placeholder="es. Notebook, Smart Tv ecc." id="exampleInputEmail1" aria-describedby="emailHelp" />
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="nav-link btn btn-primary border-0 bg-accent font-weight-bold w-100">{{__('ui.cerca')}}</button>  
                        </form>  
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
    
    
    <!-- affidabilità sito -->
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <div class="card shadow border-0 text-center p-4">
                <i class="fas fa-user fa-3x mx-auto text-accent"></i>
                <h3 class="p mt-5 mt-3 text-first font-weight-bold">{{__('ui.garantito')}}</h3>
                <p>
                    {{__('ui.Garantiamo l\'integrità e la funzionalità dei prodotti rivenduti')}}
                </p>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <div class="card shadow border-0 text-center p-4">
                <i class="fas fa-dollar-sign fa-3x mx-auto text-accent"></i>
                <h3 class="p mt-5 mt-3 text-first font-weight-bold">{{__('ui.sicuro')}}</h3>
                <p>
                    {{__('ui.Pagamenti sicuri con modalità Paypal, Bonifico e Contrassegno.')}}          </p>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <div class="card shadow border-0 text-center p-4">
                <i class="fas fa-truck fa-3x mx-auto text-accent"></i>
                <h3 class="p mt-5 mt-3 text-first font-weight-bold">{{__('ui.veloce')}}</h3>
                <p>{{__('ui.Spedizioni veloci in tutta Italia con consegna in 24/48 ore.')}}</p>
                </div>
            </div>
        </div>    
    </div>    
    
    
    <!-- Annunci più recenti -->
    <div class="container my-5 py-5">
        <div class="row text-center">
            <div class="col-12">
                <h2 class="h1 text-first font-weight-bold">{{__('ui.gli annunci più recenti')}}</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($announcements as $announcement)
            
            <div class="col-12 col-md-6 my-3">
                <div class="card opacity-custom shadow text-center border-0">
                    <div class="card-header bg-white border-bottom text-uppercase d-flex">
                        
                        <div class="p-0 mr-auto "></div>
                        <div class="p-0 "><i class="far fa-heart fa-lg"></i></div>
                    </div>
                    <div class="col-12 p-0">
                        <div class="row">
                            <div class="col-6 border-right justify-content-center">
                                     @if ($announcement->images->first())
                                        <img src=" {{Storage::url($announcement->images->first()->file) }}" alt="" class=" img-fluid float-left rounded-0 p-4 ">
                                     @endif
                                    
                                
                            </div>
                            <div class="col-6 ">
                                <p class="card-text text-uppercase font-weight-bold display-custom text-truncate text-left text-first pt-3">{{ $announcement->title }}</p>
                                <p class="card-text text-uppercase font-weight-lighter display-price text-first text-left ">{{$announcement->price}}€</p>
                                <p class="card-text font-weight-light text-muted text-left text-truncate pb-4 ">{{ $announcement->body }}</p>
                                <a href="{{ route('announcement.show', compact('announcement')) }}" class="btn btn-primary border-0 bg-accent font-weight-bold ">{{__('ui.scopri di piu')}}'
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex bg-white d-flex">
                        <div class="p-0 mr-auto ">
                            <span class="font-weight-bold">{{__('ui.categorie')}}: <a href="{{ route('announcement.category', [$announcement->category->name_it, $announcement->category->id])}}" class="text-decoration-none">{{ $announcement->category->name }}</a></span>
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
    
    <div class="container">
        <div class="row my-5 py-5 align-items-center">
            <div class="col-12 bg-first bg_light px-3 py-4 d-flex rounded shadow align-items-center flex-wrap">
                <div class="col-12 col-md-8">
                    <h3 class="text-center text-second">{{__('ui.Vuoi diventare un revisore di annunci?')}}</h3>
                </div>
                <div class="col-12 col-md-4">
                    <a href="{{ route('contacts') }}" class="nav-link btn btn-primary border-0 bg-accent font-weight-bold">{{__('ui.clicca qui')}}!</a>
                </div> 
            </div>
        </div>
    </div>
</x-layout>