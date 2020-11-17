@extends('layouts.app')

@section('content')
    @if (!Auth::guest())
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">សូមស្វាគមន៍</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        លោកអ្នកចូលកម្មវិធីបានជោគជ័យ!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading">សូមអធ្រាស្រ័យ</div>

                    <div class="panel-body">
                        លោកអ្នកមិនបានចូលកម្មវិធីទេ!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
