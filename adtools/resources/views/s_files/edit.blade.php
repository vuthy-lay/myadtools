@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">កែប្រែព័ត៌មាន ដែលមានអត្តសញ្ញាណប័ណ្ណលេខ៖ 
    <a type="button" class="btn btn-info" href="/staffshow/{{ $currenttbl_persondatas[0]->per_code }}"><i class="fa fa-newspaper-o"></i> {{ $currenttbl_persondatas[0]->per_code }}</a>
    </h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
@php
    $categories_datas = array (
      '1' => ' ក. ព័ត៌មានផ្ទាល់ខ្លួន ',
      '2'  => ' ខ. ព័ត៌មានគ្រួសារ ',
      '3' => ' គ. អាសយដ្ឋានបច្ចុប្បន្ន ',
      '4'  => ' ឃ. ភាសាបរទេស ',
      '5' => ' ង. កម្រិតវប្បធម៌ទូទៅ បណ្ដុះបណ្ដាលមុខវិជ្ជាមូលដ្ឋាន និងក្រោយមូលដ្ឋាន',
      '6' => ' ច. ប្រវត្តិការងារ ',
      '7'  => ' ឆ. ការលើសរសើរ ជូនវង្វាន់ និងផ្ដល់គ្រឿងឥស្សរិយយស ',
      '8'  => ' ជ. ការទទួលពិន័យ ឬព្រមាន ',
    )
  @endphp

    <div class="box-body">
    {!! Form::label('edit_cate',  'ជ្រើសរើសចំណុចដែលកែប្រែ៖', ['class'=>'col-sm-2 control-label']); !!}
    
      <div class="form-group">
        <div class="col-sm-10 text-center">
          {!! Form::select('edit_cate', $categories_datas, '1', ['name' => 'edit_cate'] ) !!}
          {!! Form::submit('យល់ព្រម', ['class'=>'btn btn-success pull-right', 'name' => 'submit_edit_cate', 'id' => 'submit_edit_cate' ]); !!}
        </div>
      </div>
    </div>
    <div class="box-body" id="rendercurrentview">
    </div>

    <!-- /.box-body -->
    <div class="box-footer">
      <a type="button" class="btn btn-default" href='/staffinfo'>ថយក្រោយ</a>
    </div>
    <!-- /.box-footer -->

  <script src="{{ URL::asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
  
  <script>
         jQuery(document).ready(function(){
            jQuery('#submit_edit_cate').click(function(e){
               e.preventDefault();
               tet = $('#edit_cate option:selected').val();
               console.log(tet);

               $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               $.ajax({
                  //url: '{{config("app.url_ip")}}/selected_option/{{$currenttbl_persondatas[0]->per_code}}',
                  url: '{{config("app.url_ip")}}/selectedoption',
                  type:'get',                  
                  data:{
                    selected_val: $('#edit_cate option:selected').val(),
                    pcode: '{{ $currenttbl_persondatas[0]->per_code }}'
                  },
                  success:function(myresult) {
                    //console.log(myresult.currentview);
                    $('#rendercurrentview').empty();
                    console.log("asdasd");
                    $('#rendercurrentview').html(myresult.currentview);
                  },
                  error: function (jqXHR, textStatus, errorThrown) { 
                    console.log(jqXHR);
                   }
                });
               
               });
            });
</script>
    
</div>
@endsection
