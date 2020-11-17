@extends('layouts.app')

@section('content')
<meta charset="utf-8">
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">បង្កើត</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>'udtm_create', 'class'=>'form-horizontal']) !!}
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('lov_type', 'Lov Type', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">          
          {!! Form::text('lov_type', null, ['class'=>'form-control', 'placeholder'=>'Lov Type']); !!}
          {!! $errors->has('lov_type')?$errors->first('lov_type'):'' !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('lov_code', 'Lov Code', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('lov_code', null, ['class'=>'form-control', 'placeholder'=>'Lov Code']); !!}
          {!! $errors->has('lov_code')?$errors->first('lov_code'):'' !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('lov_desc', 'Lov Desc', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('lov_desc', null, ['class'=>'form-control', 'placeholder'=>'Lov Desc']); !!}
          {!! Form::hidden('record_stat', 'a', ['class'=>'form-control']); !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('lov_desc_kh', 'Lov Desc Kh', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('lov_desc_kh', null, ['class'=>'form-control', 'placeholder'=>'Lov Desc Kh']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('lov_text', 'Lov Text', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::textarea('lov_text', null, ['class'=>'form-control', 'placeholder'=>'Lov Text ......', 'rows'=>'3']); !!}
        </div>
      </div>   

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a type="button" class="btn btn-default" href='/udtm'>ថយក្រោយ</a>
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
