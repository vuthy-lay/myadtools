@extends('layouts.app')

@section('content')
<div class="row col-md-2 pull-right">
    <a type="button" class="btn btn-block btn-primary btn-flat" href='/staffcreate'>ការបង្កើតថ្មី</a>
</div>
<?php
    $RecordStat = (new \App\Helpers\helpers)->RecordStat();
    $Gender = (new \App\Helpers\helpers)->Gender();
  ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">ព័ត៌មានបុគ្គលិក</h3>

        <div class="box-tools">
          {!! Form::open(['url'=>'staffinfo', 'method'=>'get', 'class'=>'form-horizontal']) !!}
          <div class="input-group input-group-sm" style="width: 250px;">            
                <input type="text" name="table_search" class="form-control pull-right" placeholder="ស្វែងរកតាមឈ្មោះជាភាសាខ្មែរ">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>លេខអត្តសញ្ញាណប័ណ្ណ</th>
            <th>លេខកូតបុគ្គលិក</th>
            <th>គោត្តនាម</th>
            <th>នាម</th>
            <th>ភេទ</th>
            <th>ថ្ងៃខែឆ្នាំកំណើត</th>
            <th>ស្ថានភាព</th>
            <th>សកម្មភាព</th>
          </tr>
          @foreach($displaydatas as $item)
          <tr>
            <td>{{ $item->per_code }}</td>
            <td>{{ $item->staff_code }}</td>
            <td>{{ $item->per_surname_kh }}</td>
            <td>{{ $item->per_name_kh }}</td>
            <td>{{ $Gender[$item->per_sex] }}</td>
            <td>{{ $item->per_dob }}</td>
            <td><span class="label label-success">{{ $RecordStat[$item->record_stat] }}</td>
            <td>
              <div class="pull-left">
                <a type="button" class="btn btn-info" href="/staffshow/{{ $item->per_code }}"><i class="fa fa-newspaper-o"></i> ព័ត៌មានលំអិត</a>
                <a type="button" class="btn btn-default" href="/staffedit/{{ $item->per_code }}"><i class="fa fa-edit"></i> កែប្រែ</a>
                <a remove-code="{{ $item->per_code }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash-o"></i> លុប</a>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
        {!! $displaydatas->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- modal-dialog -->
  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ការបញ្ជាក់</h4>
        </div>
        <form method="post" action="{{config('app.url_ip')}}/staffremove">
          <div class="modal-body">
            <p id="txtconfirm_text" class="uk-modal-title">តើអ្នកនឹងធ្វើការលុបទិន្នន័យមួយនេះឬ?</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="md-input" id="txtitem_code_remove_hidden" name="txtitem_code_remove_hidden"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">បិទ</button>
            <button type="submit" class="btn btn-outline">បាទ/ចាស</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script src="{{ URL::asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script>
    $(document).ready(function() {
        $("a[remove-code]").click(function() {
            var tmp_item_code = $(this).attr("remove-code");
            $("#txtconfirm_text").text('តើអ្នកនឹងធ្វើការលុបទិន្នន័យដែលមានលេខកូត '+tmp_item_code+' នេះឬ?');
            $('#txtitem_code_remove_hidden').val(tmp_item_code);
        });
    });
  </script>
</div>
@endsection
