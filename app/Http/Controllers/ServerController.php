<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Server;

class ServerController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function create()
    {
        if (\Auth::user()->permissions == "administrator" || \Auth::user()->permissions == "editor") {
            return view('server.create');
        } else {
            return redirect()->route('home');
        }
    }

    public function save(Request $request)
    {
        $status = 'pending';

        if (\Auth::user()->permissions == "administrator") {
            $status = 'approved';
        }

        $validate = $this->validate($request, [
            'title'  => 'required',
            'description' => 'required'
        ]);

        $title = $request->input('title');
        $description = $request->input('description');

        $user = \Auth::user();
        $server = new Server();
        $server->id_user = $user->id;
        $server->title = $title;
        $server->description = $description;
        $server->status = $status;
        $server->price = 0;
        $server->paid = 'false';

        $server->save();

        return redirect()->route('home')->with([
            'message' => 'El server se ha añadido de manera correcta!!'
        ]);
    }

    public function server($id)
    {
        $server = Server::find($id);

        return view('server.servers', ['server' => $server]);
    }

    public function request()
    {
        return view('server.request');
    }
}
