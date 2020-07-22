@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="row">

            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total income
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $money }}€
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">total servers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($servers) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-server fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servers as $server)
                    <tr>
                        <th scope="row">{{ $server->id }}</th>
                    <td><a href="{{ route('dashboard.server', ['id' => $server->id ]) }}">{{$server->title}}</a></td>
                        <td>{{ $server->status }}</td>
                        <td>{{ $server->price }}€</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
