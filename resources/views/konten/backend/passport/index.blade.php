@extends('layouts.app')

@section('content')
<div class="container animated fadeIn">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <div class="panel panel-default">
                <div class="panel-heading"> 
                    <h3>
                        <i class="fa fa-th-list"></i> User Profile
                    </h3> 
                </div>

                <div class="panel-body"> 
                    <passport-clients></passport-clients>
                    <passport-authorized-clients></passport-authorized-clients>
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            </div>
        </div>
    </div>
 
</div>

 

@endsection

 @section('custom_script')
<script>
axios.get('/api/user')
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });    
</script>

 @endsection