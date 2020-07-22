<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Server;

class DashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function data()
    {
        if (\Auth::user()->permissions == "administrator") {

            $id_user = \Auth::user()->id;
            $servers = Server::orderBy('id', 'DESC')->get();

            $money = Server::where('paid', 'false')->sum('price');

            return view('dashboard.data', ['servers' => $servers, 'money' => $money]);
        } elseif (\Auth::user()->permissions == "editor") {

            $id_user = \Auth::user()->id;
            $servers = Server::where('id_user', $id_user)->orderBy('id', 'DESC')->get();

            $money = Server::where('id_user', $id_user)->where('paid', 'false')->sum('price');

            return view('dashboard.data', ['servers' => $servers, 'money' => $money]);
        } else {
            return redirect()->route('dashboard.data');
        }
    }

    public function server($id)
    {
        if (\Auth::user()->permissions == "administrator") {

            $server = Server::find($id);

            return view('dashboard.server', [
                'server' => $server
            ]);
        } elseif (\Auth::user()->permissions == "editor") {

            $user = \Auth::user();
            $server = Server::find($id);

            if ($user && $server && $server->id_user == $user->id) {
                return view('dashboard.server', [
                    'server' => $server
                ]);
            } else {
                return redirect()->route('dashboard.data');
            }
        } else {
            return redirect()->route('dashboard.data');
        }
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $server = Server::find($id);

        if (\Auth::user()->permissions == "administrator") {
            return view('dashboard.edit', [
                'server' => $server
            ]);
        } else {
            if ($user && $server && $server->id_user == $user->id) {
                return view('dashboard.edit', [
                    'server' => $server
                ]);
            } else {
                return redirect()->route('dashboard.data');
            }
        }
    }

    public function update(Request $request)
    {
        $validate = $this->validate($request, [
            'title'  => 'required',
            'description' => 'required'
        ]);

        $id = $request->input('id');
        $title = $request->input('title');
        $description = $request->input('description');

        $server = Server::find($id);
        $server->title = $title;
        $server->description = $description;

        $server->update();

        return redirect()->route('dashboard.data')->with([
            'message' => 'El server se ha añadido de manera correcta!!'
        ]);
    }
}
