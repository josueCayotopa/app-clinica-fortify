<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* public function getUsuarios()
    {
        $userCount = User::count();

        return view('dashboard.index',compact('userCount'));
        
    }

    

    public function index()
    {
        $onlineUsers = User::countOnlineUsers();

        return view('dashboard.index', compact('onlineUsers'));
    } */

    public function dashboard()
    {
        // Contar los usuarios en línea
        $onlineUsers = User::countOnlineUsers();
        
        // Obtener todos los usuarios
        $usuarios = User::getUsuarios();
        
        // Pasar ambos datos a la vista
        return view('dashboard.index', compact('onlineUsers', 'usuarios'));
    }
}
