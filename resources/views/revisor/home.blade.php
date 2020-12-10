<x-layout>
    @if($announcement)

    <div class="container min-vh-100">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">Annuncio # {{ $announcement->id }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><h3>Utente</h3></div>
                        <div class="col-md-10">
                            # {{ $announcement->user->id }},
                            {{ $announcement->user->name }},
                            {{ $announcement->user->email }},
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-2"><h3>Titolo</h3></div>
                    <div class="col-md-10">{{ $announcement->title }}</div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-2"><h3>Descrizione</h3></div>
                    <div class="col-md-10">{{ $announcement->body }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"><h3>Immagini</h3></div>
                        <div class="col-md-10">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/300×150.png" alt="" class="rounded">
                                </div>
                                <div class="col-md-8">
                                    ... ... ...
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <img src="https://via.placeholder.com/300×150.png" alt="" class="rounded">
                                </div>
                                <div class="col-md-8">
                                    ... ... ...
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-6">
                        <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                        </div>
                        <div class="col-md-6 text-right">
                            <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            </div>

                    </div>




                </div>
                </div>



            </div>
        </div>
    </div>

    @else
    <div class="container mt-5 min-vh-100">
        <div class="row">
            <div class="col-12 mt-5 pt-5 text-center">
                <h3>Non ci sono annunci da revisionare</h3>
            </div>
        </div>
    </div>
    @endif





</x-layout>