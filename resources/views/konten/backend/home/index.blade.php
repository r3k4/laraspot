@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <hr>
                    <img src="data:image/png;base64, {!! base64_encode( QrCode::format('png')->size(200)->merge('/public/img/logo.png')->generate(request()->url()) ) !!} ">


                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
