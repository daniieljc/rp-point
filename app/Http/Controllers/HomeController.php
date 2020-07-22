<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::where('status', 'approved')->orderBy('id', 'desc')->get();

        return view('home', ['servers' => $servers]);
    }
}
