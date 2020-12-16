<x-layout>
    <x-slot name="title">Presto.it - Dettaglio Annuncio</x-slot>
    
    <header class="header-posts d-flex align-items-center">
        <div class="container">
            <h2 class="h1 text-accent font-weight-bold text-center">{{$announcement->category->name_it, $announcement->category->id}}</h2>
        </div>
    </header>

      
    
    <div class="container-xl my-5 py-5">
        
        <div class="row my-5">
            
            <div class="col-12 col-md-6">
                
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <!-- CAROSELLO GRANDE -->
                            <div class="col-12">
                                <div class="bigCarousel">
                                    @foreach ($announcement->images as $image)
                                    <div class="px-2">
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                            <!-- CAROSELLO PICCOLO -->
                            <div class="col-12">
                                <div class="smallCarousel">
                                    @foreach ($announcement->images as $image)
                                    <div class="px-2">
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-6 px-3">
                <h3 class="text-first font-weight-bold">Descrizione prodotto</h3>
                {{-- <p class="category_style">{{$announcement->category->name}}</p> --}}
                <h2 class="">{{$announcement->title}}</h2>

                    <p class="lead">{{$announcement->body}}</p>
                    <p class="text-first font-weight-bold mb-0">Prezzo: <span class="text-accent h4">{{$announcement->price}}€</span></p>
                    <p class="text-first font-weight-bold mb-0">Caricato da: {{ $announcement->user->name }}</p>
                    <p class="text-first font-weight-bold mb-0">Caricato il: {{$announcement->created_at}}</p>

                    <a href="#" class="nav-link btn btn-primary border-0 w-50 bg-accent font-weight-bold">Contatta il venditore
                        <i class="fas fa-chevron-right fa stack-1x"></i>
                      </a>
                    
                </div>
            </div>

           
        </div>
        
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js">
            
            
        </script>
        
        <script>
            
            $('.bigCarousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                fade: true,
                asNavFor: '.smallCarousel'
            });
            $('.smallCarousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.bigCarousel',
                dots: true,
                arrows: false,
                centerMode: true,
                focusOnSelect: true
            });
            
        </script>
    </x-layout>
    