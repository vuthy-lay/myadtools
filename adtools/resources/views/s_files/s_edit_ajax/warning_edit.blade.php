

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::model($tbl_staff_warningdatas[0], ['url'=>['updatewarning'], 'method'=>'post', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
  <div class="box-body">
  {!! Form::hidden('staff_code', null, ['class'=>'form-control']); !!}
  {!! Form::hidden('per_code', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_code : '', ['class'=>'form-control']); !!}

      <!-- Warning -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ជ. ការទទួលពិន័យ ឬព្រមាន</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-12 col-ms-12">
              {!! Form::label('staff_warning_desc', 'បរិយាយ', ['class'=>'control-label']); !!}
              {!! Form::textarea('staff_warning_desc', null, ['class'=>'form-control', 'placeholder'=>'បរិយាយ']); !!}
              {!! $errors->has('staff_warning_desc')?$errors->first('staff_warning_desc'):'' !!}
            </div>
          </div>
        </div>
      </div>
            <!-- End_Warning -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}