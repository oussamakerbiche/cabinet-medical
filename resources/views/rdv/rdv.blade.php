@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-auto mr-auto">
            <div class="mycard1 card">
                <div class="card-header">
                   
                    <ul class="nav nav-pills nav-justified card-header-pills">
                       
                        <li class="nav-item">Nouveau Rendez Vous</li>
                         <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="myitem nav-item">N°:&nbsp;</li>
                        @if ($numrdv == null)
                        <label>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                       @else 
                       <label>{{$numrdv -> num}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        @endif
                        
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
                                @if($numrdv == null)
                                <input hidden type="text" value="1" name="num">
                                @else
                                <input hidden type="text" value="{{$numrdv -> num}}" name="num">
                                @endif

                            </div>
                        </div>

                       

                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="sweet();">
                                    Créer
                                </button>
                         <a href="{{url('/')}}" class="btn btn-danger">Annuler</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



<ul class="list-group">
@foreach($rdvliste as $liste)
     @if ($liste -> etat == 1 and $enatt-> num != $liste->num )

  <li class="list-group-item d-flex justify-content-between align-items-center">
  En attente&nbsp;
    <span class="badge badge-primary badge-pill">{{$liste -> num}}</span>
    </li> 

    @elseif($enatt-> num == $liste->num and  $liste -> etat == 1)

    <li class="list-group-item d-flex justify-content-between align-items-center">
    En cours&nbsp;
      <span class="badge badge-success badge-pill">{{$liste -> num}}</span>
      <i class="material-icons" style="font-size:30px;color:#28A745">cached</i>
    </li>
    
    @else

    <li class="list-group-item d-flex justify-content-between align-items-center">
    Consulté&nbsp;
      <span class="badge badge-success badge-pill">{{$liste -> num}}</span>
      <i class="material-icons" style="font-size:30px;color:#28A745">check</i>
    </li>
    @endif
  
@endforeach
</ul>




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
  
  <script>
    
     function sweet(){
                         swal(
                          'le rendez vous à été bien pris ',
                          'You clicked the button!',
                          'success'
                          )

                     }
      
  </script>    

@endsection
