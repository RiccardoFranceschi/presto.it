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
    <header class="header">
    </header>
    
    
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
                <div class="card opacity-custom text-center border-0">
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
                            <span class="font-weight-bold">Category: <a href="{{ route('announcement.category', [$announcement->category->name, $announcement->category->id]) }}" class="text-decoration-none">{{ $announcement->category->name }}</a></span>
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