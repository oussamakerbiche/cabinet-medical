<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rdv;
use Illuminate\Support\Facades\DB;

class RdvController extends Controller
{
   public function index(){
     $num =  DB::table('rdvs')->latest()->first();
     $rdv = Rdv::all();
     $enatt = DB::table('rdvs')->where('etat', '=', 1)->get()->first();
     if   ($num == null){
            return view('rdv.rdv', ['numrdv' => $num , 'rdvliste'=> $rdv ,'enatt'=>$enatt]);
     }else{
            $num->num = $num->num + 1 ;
           
            return view('rdv.rdv', ['numrdv' => $num , 'rdvliste'=> $rdv ,'enatt'=>$enatt]);
     }
   	

   }

   public function listerdvs()
   {
     $rdv = Rdv::all();
     
     $nbrtotal = DB::table('rdvs')->count();

     $nbrenatt = DB::table('rdvs')
                ->where('etat','=', 1)
                ->count();

     return view('rdv.listerdvs',['listerdv' => $rdv , 'nbrtotal'=>$nbrtotal , 'nbrenatt' => $nbrenatt]);
   }


public function store(Request $request)
{
  $rdv = new Rdv;
$rdv -> nom = $request -> input('nom');
$rdv -> num = $request -> input('num');
$rdv -> save();
session()->flash('success','le rendez vous à été bien pris ');
return redirect('/rdv');
   
}

public function update(Request $request, $id){
  
	$rdv = Rdv::find($id);
	$rdv-> etat = 0;

	$rdv->save();
  return redirect('listerdvs');
 
}

public function destroy(){

  $enatt = DB::table('rdvs')->where('created_at', 'like', '2018-03-14%')->get();
  $rdv = Rdv::all();
  foreach ($rdv as $rd) {
    $rd->delete();
  }
	

	return redirect('listerdvs');

}





}