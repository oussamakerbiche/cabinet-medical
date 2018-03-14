@extends('layouts.app')

@section('content')

<style>

table {
    border-collapse: collapse;
    width: 90%;
    border: 1px solid black;
    margin-left: : 30px
}

th, td{
    text-align: center;
    padding: 8px;
    border: 1px solid black;
    font-family: "Times New Roman", Times, serif;
    font-size: 18px;
}

th {
    background-color: red;
    color: black;
    font-style: italic;
    font-size: 22px;

}
 

</style>

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