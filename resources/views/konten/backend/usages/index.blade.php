@extends('layouts.app')

@section('content')
<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-12 ">


            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h3>
                        <i class="fa fa-th-list"></i> Usages
                    </h3> 
                </div>

                <div class="panel-body"> 
                @include($base_view.'komponen.nav_atas')
                

                @include($base_view.'list_data')

                </div>
            </div>
        </div>
    </div>
 
</div>
 


@endsection

 