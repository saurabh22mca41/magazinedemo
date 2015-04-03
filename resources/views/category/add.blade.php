@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Category</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => url('category/add'), 'method' => 'post', 'id' => 'addForm', 'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="control-label">Name</label>                                    
                                </div>
                                <div class="col-sm-4">
                                    {!! Form::text("name", '', array("class"=>"form-control","placeholder"=>"Enter Name","id"=> "name")) !!}    
                                    <p class="error_lbl">{{$errors->first('name')}} </p> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="control-label">Is Active</label>
                                </div>
                                <div class="col-sm-4">                                    
                                     {!! Form::checkbox("is_active", '1', false, array("class"=>"-control", "id"=> "name")) !!}   
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-right">
                            <button type="button" class="btn btn-success" onclick="$('form#addForm').submit();">Save</button>
                            <a class="btn btn-success" href="{{ url('categories') }}">Cancel</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
