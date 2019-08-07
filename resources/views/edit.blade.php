@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form action="{{url('updatePost')}}/{{ Request::segment(2) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{$edit->title}}"  />
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="5" class="form-control" name="description">{{$edit->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <button class="btn btn-default">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
