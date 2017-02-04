@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Profile</div>

                <div class="panel-body">

                 {!! Form::open(['route' => 'backend.profile.update_profile']) !!}



                     <div class="form-group{{ $errors->has('password_lama') ? ' has-error' : '' }}">
                         {!! Form::label('password_lama', 'Password Lama : ') !!}
                         {!! Form::password('password_lama', ['id' => 'password_lama', 'placeholder' => 'password lama...', 'class' => 'form-control']) !!}                     

                        @if ($errors->has('password_lama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_lama') }}</strong>
                            </span>
                        @endif

                     </div>



                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                         {!! Form::label('password', 'Password : ') !!}
                         {!! Form::password('password', ['id' => 'password', 'placeholder' => 'password...', 'class' => 'form-control']) !!}                     

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                     </div>


                     <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                         {!! Form::label('password_confirmation', 're-enter Password : ') !!}
                         {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'placeholder' => 're-enter password...', 'class' => 'form-control']) !!}
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                     </div>

                     <div class="form-group">
                        <button id="oke" type="button" class="btn btn-info"  >
                            help
                        </button>

                        <button onClick="ntaps(123)" type="button" class="btn btn-info"  >
                            ntaps
                        </button>

                         <button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
                     </div>

                {!! Form::close() !!}                   


 

                </div>
            </div>
        </div>
    </div>
 
</div>
 


@endsection


@section('custom_script')
<script type="text/javascript">

function ntaps(id){
    $('#myModal').modal('show');
    $('.modal-body').html(id);
}


    $('#oke').click(function(){
        $('#myModal').modal('show');
        $('.modal-body').load('{!! url("/oke") !!}')
    })
</script>

@endsection