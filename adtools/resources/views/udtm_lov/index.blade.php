@extends('layouts.app')

@section('content')
<div class="row col-md-2 pull-right">
    <a type="button" class="btn btn-block btn-primary btn-flat" href='/udtm_create'>ការបង្កើតថ្មី</a>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">ការកំណត់លិខិត</h3>

        <div class="box-tools">
          {!! Form::open(['url'=>'udtm', 'method'=>'get', 'class'=>'form-horizontal']) !!}
          <div class="input-group input-group-sm" style="width: 150px;">            
                <input type="text" name="table_search" class="form-control pull-right" placeholder="ស្វែងរក">
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
            <th>seq</th>
            <th>Lov_Type</th>
            <th>Lov_Code</th>
            <th>Lov_Decs</th>
            <th>Lov_Desc_Kh</th>
            <th>Lov_Text</th>
            <th>Record_Stat</th>
            <th>Action</th>
          </tr>
          @foreach($udtms as $item)
          <tr>
            <td>{{ $item->seq }}</td>
            <td>{{ $item->lov_type }}</td>
            <td>{{ $item->lov_code }}</td>
            <td>{{ $item->lov_desc }}</td>
            <td>{{ $item->lov_desc_kh }}</td>
            <td>{{ $item->lov_text }}</td>
            <td><span class="label label-success">{{ $item->record_stat }}</td>
            <td>
              <div class="pull-left">
                <a type="button" class="btn btn-default" href="/udtm_edit/{{ $item->seq }}"><i class="fa fa-edit"></i> កែប្រែ</a>
                <a remove-code="{{ $item->seq }}" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash-o"></i> លុប</a>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
        {!! $udtms->render() !!}
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
        <form method="post" action="{{config('app.url_ip')}}/udtm_remove">
          <div class="modal-body">
            <p id="txtconfirm_text" class="uk-modal-title">តើអ្នកនឹងធ្វើការលុបទិន្នន័យមួយនេះឬ?</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="md-input" id="txtitem_code_remove_hidden" name="txtitem_code_remove_hidden"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">បិទ</button>
            <button type="submit" class="btn btn-outline">រក្សាទុក</button>
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
