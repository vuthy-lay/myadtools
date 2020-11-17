

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::model($tbl_persondatas[0], ['url'=>['updateaddress'], 'method'=>'post', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
    <div class="box-body">
    {!! Form::hidden('existed_per_code', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_code : 'null', ['class'=>'form-control']); !!}
    {!! Form::hidden('existed_staff_code', $tbl_staffdatas->count()!=0 ? $tbl_staffdatas[0]->staff_code : 'null', ['class'=>'form-control']); !!}

      <!-- អាសយដ្ឋានបច្ចុប្បន្ន -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">គ. អាសយដ្ឋានបច្ចុប្បន្ន</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12">           
              <div class="col-md-12 col-ms-12">
                {!! Form::label('per_current_address', 'អាស័យដ្ឋានបច្ចុប្បន្ន', ['class'=>'control-label']); !!} 
                {!! Form::text('per_current_address', null, ['class'=>'form-control', 'placeholder'=>'អាស័យដ្ឋានបច្ចុប្បន្ន']); !!}
                {!! $errors->has('per_current_address')?$errors->first('per_current_address'):'' !!}
              </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_phone_number', 'លេខទូរស័ព្ទ', ['class'=>'control-label']); !!}
              {!! Form::text('per_phone_number', null, ['class'=>'form-control', 'placeholder'=>'លេខទូរស័ព្ទ']); !!}
              {!! $errors->has('per_phone_number')?$errors->first('per_phone_number'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_code', 'លេខអត្តសញ្ញាណប័ណ្ណ', ['class'=>'control-label']); !!}
              {!! Form::text('per_code', null, ['class'=>'form-control', 'placeholder'=>'លេខអត្តសញ្ញាណប័ណ្ណ']); !!}
              {!! $errors->has('per_code')?$errors->first('per_code'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('staff_code', 'លេខកូតបុគ្គលិក', ['class'=>'control-label']); !!}
              {!! Form::text('staff_code', $tbl_staffdatas->count()!=0 ? $tbl_staffdatas[0]->staff_code : 'null', ['class'=>'form-control', 'placeholder'=>'លេខកូតបុគ្គលិក']); !!}
              {!! $errors->has('staff_code')?$errors->first('staff_code'):'' !!}
            </div>
          </div>
        </div>
      </div> 
        <!-- END អាសយដ្ឋានបច្ចុប្បន្ន -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}