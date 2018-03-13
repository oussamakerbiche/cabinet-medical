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
     @if ($liste -> etat == 1 and $enatt-> num != $liste->num and $enatt-> num +1  != $liste->num)

  <li class="list-group-item d-flex justify-content-between align-items-center">
  <font>En attente&nbsp;</font>
    <span class="badge badge-primary badge-pill">{{$liste -> num}} &nbsp;&nbsp;</span>
    <i class="far fa-pause-circle" style="font-size:20px;color:#333333" ></i>
    </li> 

    @elseif($enatt-> num == $liste->num and  $liste -> etat == 1)

    <li class="list-group-item d-flex justify-content-between align-items-center">
    <i class="fas fa-arrow-right" style="font-size:20px;color:#28A745"></i>&nbsp;
    <font style="color:#28A745"> En cours&nbsp;</font>
      <span class="mybg badge badge-success badge-pill">{{$liste -> num}} &nbsp;&nbsp;</span>
      
      
    </li>
    @elseif($enatt-> num +1  == $liste->num and  $liste -> etat == 1)

        <li class="list-group-item d-flex justify-content-between align-items-center">
        <font style="color:#FFC107"> Suivant&nbsp;</font>
        <span class="badge badge-warning badge-pill">{{$liste -> num}} &nbsp;&nbsp;</span>
       
        <i class="fas fa-bell"  style="font-size:20px;color:#FFC107"></i>
        
        </li>
    
    @else 

    <li class="list-group-item d-flex justify-content-between align-items-center">
    <font style="color:#64dd17"> Consulté&nbsp;</font>
      <span class="badge badge-success badge-pill">{{$liste -> num}}</span>
      <i class="fas fa-check" style="font-size:20px;color:#64dd17" ></i>
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
