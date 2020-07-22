@extends('layouts.app')

@section('content')
<div class="content" id="block2">
    <div class="container">
        <div class="row">
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
            <div class="col-12">
                <h1 class="display-3">RP Point List</h1>
                <div class="d-none d-md-block mb-3">You can find all the points of all the role play servers in fivem.
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="7%" class="d-none d-md-table-cell">Id</th>
                            <th width="90%">Server</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servers as $server)

                            <tr height="60">
                                <td class="d-none d-md-table-cell"><strong>{{ $server->id }}</strong></td>
                                <td>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('servers', ['id' => $server->id ]) }}"
                                                title="{{ $server->title }}">{{ $server->title }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
