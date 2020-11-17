@extends('layouts.app')

@section('content')
<meta charset="utf-8">
<div class="box box-info">
<?php
  $LetterCharKh = (new \App\Helpers\helpers)->LetterCharKh();
?>

  <div class="box-header with-border">
    <h3 class="box-title">ប្ដូរលេខសម្ងាត់</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>'change_password', 'class'=>'form-horizontal']) !!}
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('email', 'អ៊ីម៉ែល', ['class'=>'col-md-4 control-label']); !!}
        <div class="col-md-6">          
          {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required']); !!}
          {!! $errors->has('email')?$errors->first('email'):'' !!}
        </div>
      </div>

       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-md-4 control-label">លេខសម្ងាតថ្មី</label>
          <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <label for="password-confirm" class="col-md-4 control-label">បញ្ចូលលេខសម្ងាត់ថ្មីម្ដងទៀត</label>
          <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
          </div>
      </div>

      {!!$strnotification !!}
      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a type="button" class="btn btn-default" href='/overralinfo'>ថយក្រោយ</a>
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
@endsection
