@extends('layouts.app')

@section('content')

<div class="content" id="block2">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <div class="d-none d-md-block">
                    @if($server->status == 'approved')
                        <div class="alert alert-success" role="alert">
                            Your server has been approved
                        </div>
                    @elseif($server->status == 'pending')
                        <div class="alert alert-warning " role="alert">
                            Your server is under review
                        </div>
                    @else
                        <div class="alert alert-alert" role="alert">
                            Your server has been denied
                        </div>
                    @endif
                </div>
                <h1>{{ $server->title }}</h1>
                <div class="card bg-light mt-3 mb-3">
                    <div class="card-body">
                        <h3 class="card-title"><i class="fa fa-file-text-o"></i> Data</h3>
                        <hr>
                        <div class="card-text">
                            {!! $server->description !!}
                        </div>
                    </div>
                </div>

                @if(Auth::user()->permissions == 'administrator')
                    @if($server->status == 'approved')
                        <a class="btn btn-danger text-white">Deny</a>
                        <a href="{{ route('dashboard.edit', ['id' => $server->id ]) }}"
                            class="btn btn-secondary text-white">Edit</a>
                    @else
                        <a class="btn btn-success text-white">Approve</a>
                        <a href="{{ route('dashboard.edit', ['id' => $server->id ]) }}"
                            class="btn btn-secondary text-white">Edit</a>
                    @endif
                @elseif(Auth::user()->permissions == 'editor')
                    <a href="{{ route('dashboard.edit', ['id' => $server->id ]) }}"
                        class="btn btn-secondary text-white">Edit</a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
