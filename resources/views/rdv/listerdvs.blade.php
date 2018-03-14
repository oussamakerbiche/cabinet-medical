@extends('layouts.app')

@section('content')

<div class="container">
<div class="card border-primary mb-3" style="width: 100%;">
  <div class="card-body">
  <div style="float: left">le nombre total des rendez vous est : {{$nbrtotal}} </div>
<div style="float: right">le nombre des patiens en attente est : {{$nbrenatt}}</div>
 <div style="margin: 0 auto; width: 230px; color :#64dd17;">le nombre des patiens consultés : {{$nbrtotal - $nbrenatt}}</div>

  </div>
</div>

</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">	
<div style="height:540px;overflow: scroll;">	
<table class="table table-bordered" >
				<thead>
				     <tr>
					     <th>Nom de patien</th>
					     <th>N° de patien</th>
						 <th>Etat</th>
					     <th>Actions</th>
				      </tr>
				</thead>
				<tbody >
                @foreach($listerdv as $li)
					    <tr>
					    	<td align="center">{{$li-> nom}}</td>
						    <td align="center">{{$li-> num}}</td>
							<td align="center">
							@if($li-> etat == 1)
							En attente
							@else
							Consulté
							@endif
							</td>

						    <td align="center">
							@if($li-> etat == 1)
							<form action="{{url('rdv/'.$li->id)}}" method="post">
							<input type="hidden" name="_method" value="PUT">
									       @csrf
						                    
										 <button type="submit" class="btn btn-success">Consulter</button>

						     </form>  
							
							@else

						    	    <form action="{{url('')}}" method="post">
									       @csrf
						                       {{method_field('DELETE')}}
						                       <button type="submit" class="btn btn-danger">Suppimer</button>

						            </form>    
							@endif		        
						     </td>

					
					    </tr>
					 @endforeach


</tbody>
</table>
</div>
</div>
</div>
</div>

@endsection