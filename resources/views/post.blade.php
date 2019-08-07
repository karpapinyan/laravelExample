@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Post</div>

                <div class="card-body">
                    <form action="{{url('viewPost')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="require">*</span></label>
                            <input type="text" class="form-control" name="title"  />
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="5" class="form-control" name="description" ></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Create
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
