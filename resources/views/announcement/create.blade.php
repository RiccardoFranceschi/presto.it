<x-layout>
    <div class="container py-5 my-5">

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


        <div class="row mb-5">
          <div class="col-12">
            <h2 class="text-center font-weight-bold">Crea il tuo annuncio!</h2>
          </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-8 mx-auto">         
            <form action="{{route('announcement.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="font-weight-bold lead">Titolo del post</label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Titolo" value="{{old('title')}}">
                    </div>
                    {{-- <div class="form-group">
                      <label for="exampleFormControlSelect1" class="font-weight-bold lead">Scegli la categoria</label>
                      <select class="form-control" name="category" id="exampleFormControlSelect1">
                        <option>Computer</option>
                        <option>Smartphone</option>
                        <option>TV/Audio</option>
                        <option>Gaming</option>
                        <option>Elettrodomestici</option>
                      </select>
                    </div> --}}
                
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1" class="font-weight-bold lead">Testo del post</label>
                      <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" value="{{old('body')}}"></textarea>
                    </div>
                    <button class="btn btn-primary btn-lg w-100 font-weight-bold lead">Crea nuovo post</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>