<x-layout>
    <x-slot name="title">Presto.it - Dettaglio Annuncio</x-slot>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 header-posts"></div>
        </div>
    </div>
    
    <div class="container-xl my-3 py-3">
        
        <div class="row my-5">
            
            <div class="col-12 col-md-5">
                
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
                                    {{-- <div class="px-2">
                                        @foreach ($announcement->images as $image)
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                        @endforeach
                                    </div>
                                    <div class="px-2">
                                        @foreach ($announcement->images as $image)
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                        @endforeach
                                    </div>
                                    <div class="px-2">
                                        @foreach ($announcement->images as $image)
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                        @endforeach
                                    </div> --}}
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
                                    {{-- <div class="px-2">
                                        @foreach ($announcement->images as $image)
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                        @endforeach
                                    </div>
                                    <div class="px-2">
                                        @foreach ($announcement->images as $image)
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                        @endforeach
                                    </div>
                                    <div class="px-2">
                                        @foreach ($announcement->images as $image)
                                        <img src="{{ $image->getUrl(300, 150) }}" alt="" class="mx-auto d-block img-fluid">
                                        @endforeach
                                    </div>
                                     --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-12 col-md-7 px-3">
                <p class="category_style">{{$announcement->category->name}}</p>
                <h2 class="font-weight-bold">{{$announcement->title}}</h2>
                
                {{-- <div class="card-body">
                    <p>
                        {{-- @foreach ($announcement->images as $image)
                            <img src="{{ $image->getUrl(300, 150) }}" alt="" class="rounded float-left">
                            @endforeach --}}
                            {{-- {{ $announcement->body }}
                        </p>
                    </div> --}}
                    
                    
                    
                    <p class="lead">{{$announcement->body}}</p>
                    
                    <p>{{$announcement->created_at}}</p>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3>Annunci in evidenza</h3>
                    
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
            
            
            // $('.fade').slick({
            //     dots: true,
            //     infinite: true,
            //     speed: 500,
            //     fade: true,
            //     cssEase: 'linear'
            // });
        </script>
    </x-layout>
    