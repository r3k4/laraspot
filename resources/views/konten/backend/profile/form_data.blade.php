
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


         <button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
     </div>

{!! Form::close() !!}        