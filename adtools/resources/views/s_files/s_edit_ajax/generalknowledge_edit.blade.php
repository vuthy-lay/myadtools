

<meta charset="utf-8">
  <!-- /.box-header -->
  <!-- form start -->
  {!! Form::open(['url'=>['updategeneralknowledge'], 'method'=>'post', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
    <div class="box-body">
    {!! Form::hidden('per_code', $tbl_persondatas->count()!=0 ? $tbl_persondatas[0]->per_code : '', ['class'=>'form-control']); !!}

      <!-- Knowlege -->
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ង. កម្រិតវប្បធម៌ទូទៅ បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន (កម្រិតវប្បធម៌ទូទៅ)</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level1', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level1', $tbl_person_knowledgedatas->count()!=0 ? $tbl_person_knowledgedatas[0]->per_knowledge_level : '', ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level1')?$errors->first('per_knowledge_level1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name1', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name1', $tbl_person_knowledgedatas->count()!=0 ? $tbl_person_knowledgedatas[0]->per_knowledge_level : '', ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name1')?$errors->first('per_knowledge_school_name1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place1', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place1', $tbl_person_knowledgedatas->count()!=0 ? $tbl_person_knowledgedatas[0]->per_knowledge_school_place : '', ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place1')?$errors->first('per_knowledge_school_place1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate1', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate1', $tbl_person_knowledgedatas->count()!=0 ? $tbl_person_knowledgedatas[0]->per_knowledge_certificate : '', ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate1')?$errors->first('per_knowledge_certificate1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start1', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start1', $tbl_person_knowledgedatas->count()!=0 ? $tbl_person_knowledgedatas[0]->per_knowledge_date_start : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start1')?$errors->first('per_knowledge_date_start1'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish1', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish1', $tbl_person_knowledgedatas->count()!=0 ? $tbl_person_knowledgedatas[0]->per_knowledge_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish1')?$errors->first('per_knowledge_date_finish1'):'' !!}
            </div>
          </div>
        </div>
      </div>
      <div class="box box-success box-header with-border">
        <h3 class="box-title">ង១. កម្រិតវប្បធម៌ទូទៅ បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន (បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន)</h3>
        <div class="box-body">
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level2', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level2', $tbl_person_knowledgedatas->count() >=2 ? $tbl_person_knowledgedatas[1]->per_knowledge_level : '', ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level2')?$errors->first('per_knowledge_level2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name2', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name2', $tbl_person_knowledgedatas->count() >=2 ? $tbl_person_knowledgedatas[1]->per_knowledge_school_name : '', ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name2')?$errors->first('per_knowledge_school_name2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place2', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place2', $tbl_person_knowledgedatas->count() >=2 ? $tbl_person_knowledgedatas[1]->per_knowledge_school_place : '', ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place2')?$errors->first('per_knowledge_school_place2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate2', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate2', $tbl_person_knowledgedatas->count() >=2 ? $tbl_person_knowledgedatas[1]->per_knowledge_certificate : '', ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate2')?$errors->first('per_knowledge_certificate2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start2', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start2', $tbl_person_knowledgedatas->count() >=2 ? $tbl_person_knowledgedatas[1]->per_knowledge_date_start : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start2')?$errors->first('per_knowledge_date_start2'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish2', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish2', $tbl_person_knowledgedatas->count() >=2 ? $tbl_person_knowledgedatas[1]->per_knowledge_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish2')?$errors->first('per_knowledge_date_finish2'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level3', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level3', $tbl_person_knowledgedatas->count() >=3 ? $tbl_person_knowledgedatas[2]->per_knowledge_level : '', ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level3')?$errors->first('per_knowledge_level3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name3', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name3', $tbl_person_knowledgedatas->count() >=3 ? $tbl_person_knowledgedatas[2]->per_knowledge_school_name : '', ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name3')?$errors->first('per_knowledge_school_name3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place3', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place3', $tbl_person_knowledgedatas->count() >=3 ? $tbl_person_knowledgedatas[2]->per_knowledge_school_place : '', ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place3')?$errors->first('per_knowledge_school_place3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate3', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate3', $tbl_person_knowledgedatas->count() >=3 ? $tbl_person_knowledgedatas[2]->per_knowledge_certificate : '', ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate3')?$errors->first('per_knowledge_certificate3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start3', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start3', $tbl_person_knowledgedatas->count() >=3 ? $tbl_person_knowledgedatas[2]->per_knowledge_date_start3 : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start3')?$errors->first('per_knowledge_date_start3'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish3', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish3', $tbl_person_knowledgedatas->count() >=3 ? $tbl_person_knowledgedatas[2]->per_knowledge_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish3')?$errors->first('per_knowledge_date_finish3'):'' !!}
            </div>
          </div>
          <div class="form-group col-ms-12 col-md-12 col-xs-12 box box-warning">
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_level4', 'កម្រិតសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_level4', $tbl_person_knowledgedatas->count() >=4 ? $tbl_person_knowledgedatas[3]->per_knowledge_level : '', ['class'=>'form-control', 'placeholder'=>'កម្រិតសិក្សា']); !!}
              {!! $errors->has('per_knowledge_level4')?$errors->first('per_knowledge_level4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_name4', 'គ្រឹះស្ថានសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_name4', $tbl_person_knowledgedatas->count() >=4 ? $tbl_person_knowledgedatas[3]->per_knowledge_school_name : '', ['class'=>'form-control', 'placeholder'=>'គ្រឹះស្ថានសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_name4')?$errors->first('per_knowledge_school_name4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_school_place4', 'ទីកន្លែងសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_school_place4', $tbl_person_knowledgedatas->count() >=4 ? $tbl_person_knowledgedatas[3]->per_knowledge_school_place : '', ['class'=>'form-control', 'placeholder'=>'ទីកន្លែងសិក្សា']); !!}
              {!! $errors->has('per_knowledge_school_place4')?$errors->first('per_knowledge_school_place4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_certificate4', 'សញ្ញាប័ត្រ', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_certificate4', $tbl_person_knowledgedatas->count() >=4 ? $tbl_person_knowledgedatas[3]->per_knowledge_certificate : '', ['class'=>'form-control', 'placeholder'=>'សញ្ញាប័ត្រ']); !!}
              {!! $errors->has('per_knowledge_certificate4')?$errors->first('per_knowledge_certificate4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_start4', 'កាលបរិច្ឆេទចូលសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_start4', $tbl_person_knowledgedatas->count() >=4 ? $tbl_person_knowledgedatas[3]->per_knowledge_date_start : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទចូលសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_start4')?$errors->first('per_knowledge_date_start4'):'' !!}
            </div>
            <div class="col-md-4 col-ms-4">
              {!! Form::label('per_knowledge_date_finish4', 'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា', ['class'=>'control-label']); !!}
              {!! Form::text('per_knowledge_date_finish4', $tbl_person_knowledgedatas->count() >=4 ? $tbl_person_knowledgedatas[3]->per_knowledge_date_finish : '', ['class'=>'form-control', 'placeholder'=>'កាលបរិច្ឆេទបញ្ចប់ការសិក្សា']); !!}
              {!! $errors->has('per_knowledge_date_finish4')?$errors->first('per_knowledge_date_finish4'):'' !!}
            </div>
          </div>
        </div>
      </div>
      <!-- End_Knowlege -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {!! Form::submit('រក្សាទុក', ['class'=>'btn btn-info pull-right']); !!}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}