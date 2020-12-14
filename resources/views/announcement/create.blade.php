<x-layout>
  <div class="container my-4 py-4">

  </div>
  <div class="container shadow py-5 my-5">
    
    <div class="row my-3 py-3">
      <div class="col-12 text-center">
        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
      </div>
    </div>
    
    {{-- <div class="row">
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
    </div> --}}
    
    
    <div class="row mb-5">
      <div class="col-12">
        <h2 class="text-center font-weight-bold">Crea il tuo annuncio!</h2>
      </div>
    </div>
    
    
    <div class="row">
      <div class="col-12 col-md-8 mx-auto">      
       {{-- <h3>DEBUG::SECRET {{$uniqueSecret}}</h3>  --}}
        <form action="{{route('announcement.store')}}" method="POST">
          @csrf

          <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">

          <div class="form-group">
            <label for="exampleFormControlInput1" class="font-weight-bold lead">Titolo</label>
            <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Titolo" value="{{old('title')}}">
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
          <div class="form-group">
            <label for="category" class="font-weight-bold lead">{{__('ui.categorie')}}</label>
             <select class="form-control" name="category" id="category">
              @foreach ($categories as $category)
              <option value="{{$category->id}}"
                {{old('category') == $category->id ? 'selected' : ''}}
                > {{$category->name}}
              </option> 
              @endforeach 

              
            </select>
          </div>
           <div class="form-group">
            <label for="exampleFormControlTextarea1" class="font-weight-bold lead">Descrizione</label>
            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" value="{{old('body')}}"></textarea>
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
          <div class="form-group">
            <label for="exampleFormControlInput1" class="font-weight-bold lead">Prezzo</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">€</div>
              </div>
              <input type="number" class="form-control" name="price" id="exampleFormControlInput1" placeholder="es: 122.50">
            </div>
          </div>
          <div class="form-group row">
              <label for="images" class="col-md-12 col-form-label text-md-right">Immagini</label>
              <div class="col-md-12">
                <div class="dropzone" id="drophere"></div>
                @error('images')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                </div>
          </div>
          <button class="btn btn-primary bg-first btn-lg w-100 font-weight-bold lead">Crea nuovo post</button>
        </form>
      </div>
    </div>
  </div>
</x-layout>