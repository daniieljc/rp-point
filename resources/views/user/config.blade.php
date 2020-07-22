@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data" aria-label="Configuración de mi cuenta">
                    @csrf

                    <div class="form-row center-block center-block">
                        <div class="form-group mx-auto col-md-6">
                            <label for="name"><strong>Name</strong></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Enter your name" value="{{ Auth::user()->name}}">

                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row center-block center-block">
                        <div class="form-group mx-auto col-md-6">
                            <label for="email"><strong>Email Address</strong></label>
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email"
                                placeholder="Enter your email" value="{{ Auth::user()->email}}">

                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <input type="submit" class="btn btn-primary mx-auto col-md-6" value="Update">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
