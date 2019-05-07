<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\Partidas as Partidas;

class HomeController extends Controller
{
    /**
     * Muestra la pantalla principal
     */
    public function index()
    {
			// Si el usuario esta logueado, le muestro tambien su historial de partidas
			$historial = [];
			if (Auth::check()) {
				$historial = Partidas::where('usuario_id', Auth::user()->id)
               ->orderBy('fecha', 'desc')
               ->get();
			}
			
      return view('home', compact('historial'));
    }
}
