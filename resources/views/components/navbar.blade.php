<nav class="navbar navbar-expand-lg navbar-light bg-first fixed-top">
<a class="navbar-brand" href="{{route('welcome')}}"><img class="logo ml-3" src="/media/logo-rocket.png" alt="" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color: #fff; font-size: 26px"></i></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link font-weight-bold " href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="" id="categoriesDropdown" class="nav-link dropdown-toggle font-weight-bold " role="buttom"
                    data-toggle="dropdown">
                    {{__('ui.categorie')}} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right bg-first" aria-labelledby="categoriesDropdown">
                    
                    @switch(App::getLocale())
                        @case('it')
                            @foreach ($categories as $category)
                                <a href="{{ route('announcement.category', [$category->name_it, $category->id]) }}"
                                    class="nav-link font-weight-bold">
                                    {{ $category->name_it }}
                                </a>
                            @endforeach
                        @break
                        @case('es')
                            @foreach ($categories as $category)
                                <a href="{{ route('announcement.category', [$category->name_es, $category->id]) }}"
                                    class="nav-link font-weight-bold">
                                    {{ $category->name_es }}
                                </a>
                            @endforeach
                        @break
                        @case('gb')
                            @foreach ($categories as $category)
                                <a href="{{ route('announcement.category', [$category->name_en, $category->id]) }}"
                                    class="nav-link font-weight-bold">
                                    {{ $category->name_en }}
                                </a>
                            @endforeach
                        @break
                    @endswitch
                    
                </div>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                @endif
            @else

             @if(Auth::user()->is_revisor)
             <li class="nav-item">
             <a class="nav-link font-weight-bold" href="{{ route('revisor.home')}}">
                {{__('ui.da revisionare')}}
             <span class="badge badge-pill badge-warning">{{\App\Models\Announcement::ToBeRevisionedCount()}}</span>
            </a>
             </li>
             @endif


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li class="nav-item"> <a href="{{ route('announcement.create') }}" class="nav-link btn btn-primary border-0 bg-accent font-weight-bold"><i class="fas fa-plus pr-2"></i>
               {{__('ui.nuovo annuncio')}}</a> </li>
               <li class="nav-item">
                @include('layouts._locale', ['lang'=> 'it', 'nation'=>'it'])
              </li>
               <li class="nav-item">
                  @include('layouts._locale', ['lang'=> 'es', 'nation'=>'es'])
                </li>
                <li class="nav-item">
                    @include('layouts._locale', ['lang'=> 'gb', 'nation'=>'gb'])
                  </li>
        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
    </div>
</nav>
