

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::model($tbl_persondatas[0], ['url'=>['updatelanguage'], 'method'=>'post', 'class'=>'form-horizontal',  'enctype' =>'multipart/form-data']) !!}
    <div class="box-body">
    {!! Form::hidden('per_code', null, ['class'=>'form-control']); !!}

      <!-- ភាសាបរទេស -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ឃ. ភាសាបរទេស</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">           
            <div class="col-md-12 col-ms-12">
              {!! Form::label('per_language', 'ភាសាបរទេស', ['class'=>'control-label']); !!}
              {!! Form::text('per_language', null, ['class'=>'form-control', 'placeholder'=>'ភាសាបរទេស']); !!}
              {!! $errors->has('per_language')?$errors->first('per_language'):'' !!}
            </div>
          </div>
        </div>
      </div> 
        <!-- END ភាសាបរទេស -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}