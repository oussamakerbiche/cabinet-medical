@extends('layouts.app')

@section('content')

<div class="container">

<blockquote class="blockquote text-center">

<p class="mb-0">le nombre total des rendez vous est : {{$nbrtotal}}</p>
<p class="mb-0">le nombre des patiens en attente est : {{$nbrenatt}}</p>
<p class="mb-0 text-success">le nombre des patiens consultés : {{$nbrtotal - $nbrenatt}}</p>
</blockquote>

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