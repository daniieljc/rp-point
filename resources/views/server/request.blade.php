@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3 text-dark" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold">Información</h6>
                    </a>
                    <div class="collapse show" id="collapseCardExample" style="">
                        <div class="card-body">
                            <strong>Requisitos:</strong>
                            <ul>
                                <li>Conocimientos básicos de programación</li>
                                <li>Sentido común y picardia</li>
                            </ul>
                            <strong>En caso de ser seleccionado podrás:</strong>
                            <ul>
                                <li>Añadir servidores</li>
                                <li>Ganar dinero por cada servidor añadido</li>
                            </ul>
                            Para mandar la solicitud rellena el siguiente formulario indicando tus habilidades.
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('requestServer') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="email"><strong>Email</strong> <small class="text-muted">required</small></label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" maxlength="170">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="subjet"><strong>Subjet</strong> <small
                                    class="text-muted">required</small></label>
                            <input type="text" class="form-control" id="subjet" name="subjet"
                                placeholder="Enter the subjet" maxlength="170">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="msg"><strong>Description</strong> <small
                                        class="text-muted">required</small></label>
                                <textarea class="form-control" name="msg" id="msg" rows="10"
                                    maxlength="4500"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary mt-2" value="Register The Server">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
