@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => url('categories'), 'method' => 'post', 'id' => 'updateForm', 'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ url('category/add') }}">Add New</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-5">Name</div> 
                            <div class="col-sm-4">Name</div> 
                            <div class="col-sm-3">Action</div>
                        </div>
                        @if(count($categories) > 0)
                        @foreach($categories as $category)
                        <div class="col-sm-12">
                            <div class="col-sm-5">
                                {{ $category->name }}
                            </div>                   
                            <div class="col-sm-4">{{ $category->is_active == 1 ? 'Yes' : 'No' }}</div> 
                            <div class="col-sm-3">
                                <a href="{{ url('category/'.$category->id.'/edit') }}">Edit</a>
                                <a href="javascript:Confirm('{{ url('category/'. $category->id .'/delete') }}', 'Are you sure?')">Delete</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-sm-12 text-center">
                            <nav>
                                <?php echo $categories->appends(array())->render(); ?>                    
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
