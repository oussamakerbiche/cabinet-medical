@extends('layouts.app')

@section('content')
<script>

     function my(){

          var a = parseInt (document.getElementById('nbr').value) ;
          document.getElementById('rslt').innerHTML = a + 1;
          document.getElementById('rslt2').value = a + 1;


    }
    


</script>


<div class="container-fluid">
    <div class="row">
        <div class="col-auto mr-auto">
            <div class="mycard1 card">
                <div class="card-header">
                    <ul class="nav nav-pills nav-justified card-header-pills">
                       
                        <li class="nav-item">Nouveau Rendez Vous</li>
                         <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="myitem nav-item">N°</li>
                        <p id="rslt"></p>
                       

                        
                    </ul>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{url('rdv')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nom du patient</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nom" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <input hidden id="rslt2" type="text" name ="num">

                            </div>
                        </div>

                       

                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Créer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="col-auto">
            <div class="mycard card">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">Nouveau Rendez Vous</li>              
                    </ul>
                </div>

                <div class="card-body">
                </div>
            </div>
        </div>

    </div>
</div>
  <input hidden type="text" id="nbr" value="{{$numrdv -> num}}">

@endsection
