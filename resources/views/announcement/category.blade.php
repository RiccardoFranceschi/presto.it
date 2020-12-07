<x-layout>

    <!-- Annunci più recenti -->
     <div class="container my-5 py-5">
         <div class="row justify-content-center">
             <div class="col-12 col-md-8">
             <h2>Annunci per categoria: {{ $category->name}}</h2>
             </div>
        </div>
        @foreach ($announcements as $announcement)
            
            <div class="row justify-content-center">
                <div class="col-md-8 my-3">
                    <div class="card text-center">
                        <div class="card-header">
                        {{$announcement->title}}
                        </div>
                        <div class="card-body">
                            <img src="https://via.placeholder.com/300x150.png" alt="" class="rounded img-fluid float-left">
                        <p class="card-text">{{$announcement->body}}</p>
                        <a href="{{route('announcement.show', compact('announcement'))}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                        <strong>Category: <a href="#">{{$announcement->category->name}}</a></strong>
                        <i>{{$announcement->created_at->format('d/m/Y')}} - </i>
                        {{$announcement->user->name}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12">
                {{$announcements->links()}}
            </div>
        </div>
     </div>   

</x-layout>