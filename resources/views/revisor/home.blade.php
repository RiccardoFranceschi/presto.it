<x-layout>
    <div class="container my-3 py-3">

    </div>
    @if($announcement)

    <div class="container min-vh-100 my-5 py-5">
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

                            @foreach ($announcement->images as $image)
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($image->file) }}" alt="" class="rounded">
                                </div>
                                <div class="col-md-8">
                                    {{$image->id }} <br>
                                    {{$image->file }} <br>
                                    {{Storage::url($image->file) }} <br>
                                </div>
                    </div>
                    @endforeach

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
                <h3 class="h1 font-weight-bold text-first">Non ci sono annunci da revisionare</h3>
            </div>
        </div>
    </div>
    @endif


    {{-- <!-- Modal -->
  <div class="modal fade" id="deletepost" tabindex="-1" aria-labelledby="deletepostLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletepostLabel">Stai cancellando l'annuncio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare l'annuncio?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Chiudi</button>
           <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
             @csrf   
             <button data-toggle="modal" type="submit" data-target="#deletepost" title="Cancella il post" class="btn btn-danger">Conferma</button>
           </form>
        </div>
      </div>
    </div>
  </div> --}}




</x-layout>