<x-layout>
    <x-slot name="title">Presto.it - Dettaglio Annuncio</x-slot>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 header-posts"></div>
        </div>
    </div>

    <div class="container my-5 py-5">
        <h2>
            Ecco la pagina del singolo post!
        </h2>
        <div class="row my-5">
            <div class="col-12 col-md-6">
                <div class="col-12 col-md 8">
                    <div>
                         <h2 class="font-weight-bold">{{$announcement->title}}</h2>
                    </div>
    
                    <div class="my-5">
                        <p class="">{{$announcement->category->name}}</p>
                    </div>
    
                    <p class="lead">{{!! $announcement->body !!}}</p>
                    
                    <p>{{$announcement->created_at}}</p>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center">
                <img src="https://via.placeholder.com/400x250.png" class="rounded img-fluid" alt="">
            </div>
        </div>
    </div>


</x-layout>