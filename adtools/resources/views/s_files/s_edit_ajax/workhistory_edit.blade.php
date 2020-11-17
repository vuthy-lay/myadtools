

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>['updateworkhistory'], 'method'=>'post', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
    <div class="box-body">
    {!! Form::hidden('per_code', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_code : '', ['class'=>'form-control']); !!}

      <!-- WorkingHistory -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ច. ប្រវត្តិការងារ</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_stat1', 'កាលបរិច្ឆេទចូលបម្រើការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_stat1', $tbl_person_workhistorydatas->count()!=0 ? $tbl_person_workhistorydatas[0]->per_workhis_date_stat : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលបម្រើការងារ']); !!}
              {!! $errors->has('per_workhis_date_stat1')?$errors->first('per_workhis_date_stat1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_finish1', 'កាលបរិច្ឆេទបញ្ចប់ការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_finish1', $tbl_person_workhistorydatas->count()!=0 ? $tbl_person_workhistorydatas[0]->per_workhis_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការងារ']); !!}
              {!! $errors->has('per_workhis_date_finish1')?$errors->first('per_workhis_date_finish1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_org_name1', 'ក្រសួង/ស្ថាប័ន', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_org_name1', $tbl_person_workhistorydatas->count()!=0 ? $tbl_person_workhistorydatas[0]->per_workhis_org_name : '', ['class'=>'form-control', 'placeholder'=>'ក្រសួង/ស្ថាប័ន']); !!}
              {!! $errors->has('per_workhis_org_name1')?$errors->first('per_workhis_org_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_dpt_name1', 'នាយកដ្ឋាន/អង្គភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_dpt_name1', $tbl_person_workhistorydatas->count()!=0 ? $tbl_person_workhistorydatas[0]->per_workhis_dpt_name : '', ['class'=>'form-control', 'placeholder'=>'នាយកដ្ឋាន/អង្គភាព']); !!}
              {!! $errors->has('per_workhis_dpt_name1')?$errors->first('per_workhis_dpt_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_sub_dpt_name1', 'ការិយាល័យ/ផ្នែក', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_sub_dpt_name1', $tbl_person_workhistorydatas->count()!=0 ? $tbl_person_workhistorydatas[0]->per_workhis_sub_dpt_name : '', ['class'=>'form-control', 'placeholder'=>'ការិយាល័យ/ផ្នែក']); !!}
              {!! $errors->has('per_workhis_sub_dpt_name1')?$errors->first('per_workhis_sub_dpt_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_title_name1', 'មុខតំណែង', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_title_name1', $tbl_person_workhistorydatas->count()!=0 ? $tbl_person_workhistorydatas[0]->per_workhis_title_name : '', ['class'=>'form-control', 'placeholder'=>'មុខតំណែង']); !!}
              {!! $errors->has('per_workhis_title_name1')?$errors->first('per_workhis_title_name1'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_stat2', 'កាលបរិច្ឆេទចូលបម្រើការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_stat2', $tbl_person_workhistorydatas->count()>= 2 ? $tbl_person_workhistorydatas[1]->per_workhis_date_stat : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលបម្រើការងារ']); !!}
              {!! $errors->has('per_workhis_date_stat2')?$errors->first('per_workhis_date_stat2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_finish2', 'កាលបរិច្ឆេទបញ្ចប់ការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_finish2', $tbl_person_workhistorydatas->count()>= 2 ? $tbl_person_workhistorydatas[1]->per_workhis_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការងារ']); !!}
              {!! $errors->has('per_workhis_date_finish2')?$errors->first('per_workhis_date_finish2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_org_name2', 'ក្រសួង/ស្ថាប័ន', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_org_name2', $tbl_person_workhistorydatas->count()>= 2 ? $tbl_person_workhistorydatas[1]->per_workhis_org_name : '', ['class'=>'form-control', 'placeholder'=>'ក្រសួង/ស្ថាប័ន']); !!}
              {!! $errors->has('per_workhis_org_name2')?$errors->first('per_workhis_org_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_dpt_name2', 'នាយកដ្ឋាន/អង្គភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_dpt_name2', $tbl_person_workhistorydatas->count()>= 2 ? $tbl_person_workhistorydatas[1]->per_workhis_dpt_name : '', ['class'=>'form-control', 'placeholder'=>'នាយកដ្ឋាន/អង្គភាព']); !!}
              {!! $errors->has('per_workhis_dpt_name2')?$errors->first('per_workhis_dpt_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_sub_dpt_name2', 'ការិយាល័យ/ផ្នែក', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_sub_dpt_name2', $tbl_person_workhistorydatas->count()>= 2 ? $tbl_person_workhistorydatas[1]->per_workhis_sub_dpt_name : '', ['class'=>'form-control', 'placeholder'=>'ការិយាល័យ/ផ្នែក']); !!}
              {!! $errors->has('per_workhis_sub_dpt_name2')?$errors->first('per_workhis_sub_dpt_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_title_name2', 'មុខតំណែង', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_title_name2', $tbl_person_workhistorydatas->count()>= 2 ? $tbl_person_workhistorydatas[1]->per_workhis_title_name : '', ['class'=>'form-control', 'placeholder'=>'មុខតំណែង']); !!}
              {!! $errors->has('per_workhis_title_name2')?$errors->first('per_workhis_title_name2'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_stat3', 'កាលបរិច្ឆេទចូលបម្រើការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_stat3', $tbl_person_workhistorydatas->count()>= 3 ? $tbl_person_workhistorydatas[2]->per_workhis_date_stat : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលបម្រើការងារ']); !!}
              {!! $errors->has('per_workhis_date_stat3')?$errors->first('per_workhis_date_stat3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_date_finish3', 'កាលបរិច្ឆេទបញ្ចប់ការងារ', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_date_finish3', $tbl_person_workhistorydatas->count()>= 3 ? $tbl_person_workhistorydatas[2]->per_workhis_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការងារ']); !!}
              {!! $errors->has('per_workhis_date_finish3')?$errors->first('per_workhis_date_finish3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_org_name3', 'ក្រសួង/ស្ថាប័ន', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_org_name3', $tbl_person_workhistorydatas->count()>= 3 ? $tbl_person_workhistorydatas[2]->per_workhis_org_name : '', ['class'=>'form-control', 'placeholder'=>'ក្រសួង/ស្ថាប័ន']); !!}
              {!! $errors->has('per_workhis_org_name3')?$errors->first('per_workhis_org_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_dpt_name3', 'នាយកដ្ឋាន/អង្គភាព', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_dpt_name3', $tbl_person_workhistorydatas->count()>= 3 ? $tbl_person_workhistorydatas[2]->per_workhis_dpt_name : '', ['class'=>'form-control', 'placeholder'=>'នាយកដ្ឋាន/អង្គភាព']); !!}
              {!! $errors->has('per_workhis_dpt_name3')?$errors->first('per_workhis_dpt_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_sub_dpt_name3', 'ការិយាល័យ/ផ្នែក', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_sub_dpt_name3', $tbl_person_workhistorydatas->count()>= 3 ? $tbl_person_workhistorydatas[2]->per_workhis_sub_dpt_name : '', ['class'=>'form-control', 'placeholder'=>'ការិយាល័យ/ផ្នែក']); !!}
              {!! $errors->has('per_workhis_sub_dpt_name3')?$errors->first('per_workhis_sub_dpt_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_workhis_title_name3', 'មុខតំណែង', ['class'=>'control-label']); !!}
              {!! Form::text('per_workhis_title_name3', $tbl_person_workhistorydatas->count()>= 3 ? $tbl_person_workhistorydatas[2]->per_workhis_title_name : '', ['class'=>'form-control', 'placeholder'=>'មុខតំណែង']); !!}
              {!! $errors->has('per_workhis_title_name3')?$errors->first('per_workhis_title_name3'):'' !!}
            </div>
          </div>
        </div>
      </div>
            <!-- End_WorkingHistory -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}