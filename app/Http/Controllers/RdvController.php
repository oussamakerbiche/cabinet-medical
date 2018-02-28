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
   	return view('rdv.rdv', ['numrdv' => $num]);
   }


public function store(Request $request)
{
  $rdv = new Rdv;
$rdv -> nom = $request -> input('nom');
$rdv -> save();
return redirect('rdv');
   
}
}