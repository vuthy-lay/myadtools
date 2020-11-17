@extends('layouts.app')

@section('content')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">ព័ត៌មានលំអិត</h3>
  </div>
  <?php
    $LetterCharKh = (new \App\Helpers\helpers)->LetterCharKh();
    $LetterPriorityKh = (new \App\Helpers\helpers)->LetterPriorityKh();
  ?>
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::model($letterinfo[0], ['url'=>['letterin_show', $letterinfo[0]->seq], 'method'=>'get', 'class'=>'form-horizontal']) !!}

    <div class="box-body">
      <div class="form-group">
        {!! Form::label('letter_code', 'លេខកូដលិខិត', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">          
          {!! Form::text('letter_code', null, ['class'=>'form-control', 'placeholder'=>'Letter Code', 'disabled' => 'disabled']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_priority', 'អាទិភាព', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
            {!! Form::text('letter_priority', $LetterPriorityKh[$letterinfo[0]->letter_priority], ['class'=>'form-control', 'placeholder'=>'Letter Code', 'disabled' => 'disabled']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_date', 'កាលបរិច្ឆេទ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('letter_date', null, ['class'=>'form-control', 'disabled' => 'disabled']) !!}
        </div>
      </div>
      <div class="form-group">
        {!! Form::label('letter_source', 'ប្រភព', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('letter_source', null, ['class'=>'form-control', 'placeholder'=>'Letter Source', 'disabled' => 'disabled']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_char', 'លក្ខណៈ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
            {!! Form::text('letter_char', $LetterCharKh[$letterinfo[0]->letter_char], ['class'=>'form-control', 'placeholder'=>'Letter Code', 'disabled' => 'disabled']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_target', 'គោលដៅ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::text('letter_target', null, ['class'=>'form-control', 'placeholder'=>'Letter Target', 'disabled' => 'disabled']); !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('letter_discription', 'បរិយាយ', ['class'=>'col-sm-2 control-label']); !!}
        <div class="col-sm-10">
          {!! Form::textarea('letter_discription', null, ['class'=>'form-control', 'placeholder'=>'Letter Discription ......', 'rows'=>'3', 'disabled' => 'disabled']); !!}
        </div>
      </div> 

      <div class="form-group">      
          <?php
            $GetFileReference = (new \App\Helpers\helpers)->GetFileReference($letterinfo[0]->letter_code);
            for ($i = 0; $i < count($GetFileReference); $i++) {
              $textid = $i+1;
              $tmppdf = $GetFileReference[0]['letter_attachment'];
              echo('<label for="divatt'.$textid.'" class="col-sm-2 control-label">Attachment File '.$textid.'</label>');
              echo('<div class="col-sm-10" id="divatt'.$textid.'">
                <iframe src="data:application/pdf;base64,'.$tmppdf.'" type="application/pdf" class="form-control" style="height:500px;"></iframe>
                </div>');
            }
          ?>
      </div>  

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <a type="button" class="btn btn-default" href='/letterin'>ថយក្រោយ</a>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
</div>
@endsection
