<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RdvController extends Controller
{
   public function index(){

   	return view('rdv.rdv');
   }
}
