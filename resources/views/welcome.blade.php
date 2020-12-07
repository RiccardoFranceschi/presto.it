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
                 <h2>Gli articoli più recenti</h2>
             </div>
        </div>
        @foreach ($announcements as $announcement)
          
            @include('announcement.announcement')
            
        @endforeach
     </div>   
</x-layout>