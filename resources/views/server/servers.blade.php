@extends('layouts.app')

@section('content')

<div class="content" id="block2">
    <div class="container">
        <div class="row mb-2 py-2 mx-auto">
            <div class="col-12">
                <div align="center">
                    <script type="application/javascript">
                        var ad_idzone = "3910494",
                            ad_width = "728",
                            ad_height = "90"

                    </script>
                    <script type="application/javascript" src="https://a.exdynsrv.com/ads.js"></script>
                    <noscript>
                        <iframe
                            src="https://syndication.exdynsrv.com/ads-iframe-display.php?idzone=3910494&output=noscript&type=728x90"
                            width="728" height="90" scrolling="no" marginwidth="0" marginheight="0"
                            frameborder="0"></iframe>
                    </noscript>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <div class="d-none d-md-block">
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                    class="text-dark">Servers</a></li>
                            <li class="breadcrumb-item active">{{ $server->title }}</li>
                        </ol>
                    </nav>
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
            </div>
        </div>
    </div>
</div>

@endsection
