@extends('layouts.app')

@section('content')
<meta charset="utf-8">
<div class="box box-info">
<?php
  $LetterCharKh = (new \App\Helpers\helpers)->LetterCharKh();
?>

  <div class="box-header with-border">
    <h3 class="box-title">បង្កើតលិខិតចូល</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>'letterin_create', 'class'=>'form-horizontal', 'files' => true]) !!}
    <div class="box-body">
      <div class="form-group">
        {!! Form::label('letter_code', 'លេខកូដលិខិត', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">          
          {!! Form::text('letter_code', null, ['class'=>'form-control', 'placeholder'=>'Letter Code']); !!}
          {!! $errors->has('letter_code')?$errors->first('letter_code'):'' !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_subject', 'ចំណងជើង ឬកម្មវត្ថុ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">          
          {!! Form::textarea('letter_subject', null, ['class'=>'form-control', 'placeholder'=>'Letter Subject', 'rows'=>'3']); !!}
          {!! $errors->has('letter_subject')?$errors->first('letter_subject'):'' !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_priority', 'អាទិភាព', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
            <label>ធម្មតា {!! Form::radio('letter_priority', 'l', true, ['class'=>'col-sm-2 control-label']) !!}</label>
        </div>
        <div class="col-sm-10">
            <label>ប្រញាប់ {!! Form::radio('letter_priority', 'h', false, ['class'=>'col-sm-2 control-label']) !!}</label>
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_date', 'ថ្ងៃខែឆ្នាំ ចូល', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::date('letter_date', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
          {!! $errors->has('letter_date')?$errors->first('letter_date'):'' !!}
        </div>
        {!! Form::hidden('letter_type', 'i', ['class'=>'col-sm-10 form-control']);!!}
      </div>
      <div class="form-group">
        {!! Form::label('letter_source', 'ប្រភព', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('letter_source', null, ['class'=>'form-control', 'placeholder'=>'Letter Source']); !!}
          {!! $errors->has('letter_source')?$errors->first('letter_source'):'' !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_char', 'លក្ខណៈ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
            {!! Form::select('letter_char', $LetterCharKh, 'k',['class'=>'form-control', 'onchange'=>'LetterCharFunction()']) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_target', 'គោលដៅ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('letter_target', null, ['class'=>'form-control', 'placeholder'=>'Letter Target', 'disabled' => 'disabled']); !!}
          {!! $errors->has('letter_target')?$errors->first('letter_target'):'' !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_discription', 'បរិយាយ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::textarea('letter_discription', null, ['class'=>'form-control', 'placeholder'=>'Letter Discription ......', 'rows'=>'3']); !!}
        </div>
      </div> 

      <div class="form-group">
        {!! Form::label('letter_attachment[]', 'ឯកសារពាក់ព័ន្ធ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::file('letter_attachment[]', ['class' => 'field', 'multiple' => 'multiple', 'accept' => '.pdf']) !!}
          {!! $errors->has('letter_attachment')?$errors->first('letter_attachment'):'' !!}
          {!! Form::hidden('record_stat', 'a', ['class'=>'form-control']); !!}
        </div>
      </div>   

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a type="button" class="btn btn-default" href='/letterin'>ថយក្រោយ</a>
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    <script>
      function LetterCharFunction(){
        if (document.getElementById("letter_char").value == "k") {
            document.getElementById("letter_target").disabled = true;
        }else{
          document.getElementById("letter_target").disabled = false;
        }
      }
      
    </script>
@endsection
