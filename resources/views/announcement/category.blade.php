<x-layout>

    <!-- Annunci più recenti -->
     <div class="container my-5 py-5">
         <div class="row justify-content-center">
             <div class="col-12 col-md-8">
             <h2>Annunci per categoria: {{ $category->name}}</h2>
             </div>
        </div>
        @foreach ($announcements as $announcement)
            
            @include('announcement.announcement')
            
        @endforeach
        <div class="row">
            <div class="col-12">
                {{$announcements->links()}}
            </div>
        </div>
     </div>   

</x-layout>