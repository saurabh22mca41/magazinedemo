@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Scenarios</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => url('magazines'), 'method' => 'post', 'id' => 'updateForm', 'enctype'=>'multipart/form-data')) !!}
                    {{-- */$categories = array('' => 'Select Category') + \App\Models\Category::where('is_active', '=', 1)->lists('name', 'id');/* --}}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-2">
                                <a href="{{ url('magazine/add') }}">Add New</a>
                            </div>
                            <div class="col-sm-2">&nbsp;</div>
                            <div class="col-sm-3">
                                <input name="searchval" id="searchval" value="{{ $searchval }}">
                            </div>
                            <div class="col-sm-3">
                                {!! Form::select('category_id', $categories, $category_id, array("class"=>"form-control","id"=> "category_id")) !!}
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-success" onclick="javascript:searchList();">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-3">Name</div>
                            <div class="col-sm-4">Description</div>
                            <div class="col-sm-3">Category</div>
                            <div class="col-sm-2">Action</div>
                        </div>
                        @if(count($magazines) > 0)
                        @foreach($magazines as $magazine)
                        <div class="col-sm-12">
                            <div class="col-sm-3">{{ $magazine->name }}</div>
                            <div class="col-sm-4">{{ $magazine->description }}</div>
                            <div class="col-sm-3">{{ $magazine->category->name }}</div>
                            <div class="col-sm-2">
                                <a href="{{ url('magazine/'.$magazine->id.'/edit') }}">Edit</a>
                                <a href="javascript:Confirm('{{ url('magazine/'. $magazine->id .'/delete') }}', 'Are you sure?')">Delete</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-sm-12 text-center">
                            <nav>
                                <?php echo $magazines->appends(array())->render(); ?>                    
                            </nav>
                        </div>
                        @else 
                        <div class="col-md-12 col-sm-12 text-center">
                            No record found.
                        </div>
                        @endif
                    </div>
                    {!! Form::close() !!}
                </div>                
            </div>

        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function searchList() {
        location.href = "{{ url('magazines') }}?searchval="+$('#searchval').val()+"&cid="+$('#category_id').val();
    }
</script>
