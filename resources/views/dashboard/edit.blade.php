@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <form method="post" action="{{ route('dashboard.update') }}" name="server_form"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id" value="{{ $server->id }}" />

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title"><strong>Title</strong> <small class="text-muted">required</small></label>
                            <input type="text"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                id="title" name="title" placeholder="Enter the server name..." maxlength="170"
                                value="{{ $server->title }}">

                            @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="description"><strong>Description</strong> <small
                                    class="text-muted">required</small></label>
                            <textarea
                                class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                name="description" id="description" rows="15">{{ $server->description }}</textarea>

                            @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary mt-2" value="Update Server">
                </form>
            </div>
        </div>
    </div>
</div>

@stack('scripts')

<script src="https://cdn.tiny.cloud/1/gp830uvzuhs9x8km3hknwjcy32gnlq37e6y8mr8rsifgoz21/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#description',
        plugins: 'advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable autosave',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        autosave_interval: "10s",
        autosave_retention: "30m",
        autosave_restore_when_empty: true
    });

</script>

@endsection
