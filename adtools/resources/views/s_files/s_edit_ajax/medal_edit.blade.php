

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::model($tbl_staff_medaldatas[0], ['url'=>['updatemedal'], 'method'=>'post', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
  <div class="box-body">
  {!! Form::hidden('staff_code', null, ['class'=>'form-control']); !!}
  {!! Form::hidden('per_code', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_code : '', ['class'=>'form-control']); !!}

       <!-- Medal -->
       <div class="box box-success box-header with-border">
        <h3 class="box-title">ឆ. ការលើសរសើរ ជូនវង្វាន់ និងផ្ដល់គ្រឿងឥស្សរិយយស</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-12 col-ms-12">
              {!! Form::label('staff_medal_tittle', 'បរិយាយ', ['class'=>'control-label']); !!}
              {!! Form::textarea('staff_medal_tittle', null, ['class'=>'form-control', 'placeholder'=>'បរិយាយ']); !!}
              {!! $errors->has('staff_medal_tittle')?$errors->first('staff_warning_desc'):'' !!}
            </div>
          </div>
        </div>
      </div>
            <!-- End_Medal -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}