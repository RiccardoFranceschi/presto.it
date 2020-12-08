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
            <div class="col-12 col-md-6">

            <div class="row">
                <div class="col-12">
                <div class="row">
                    <!-- CAROSELLO GRANDE -->
                    <div class="col-12">
                        <div class="bigCarousel">
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <!-- CAROSELLO PICCOLO -->
                    <div class="col-12">
                        <div class="smallCarousel">
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                            <div class="px-2">
                                <img src="https://picsum.photos/200" class="mx-auto d-block img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
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

