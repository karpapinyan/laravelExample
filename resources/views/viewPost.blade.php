@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	<h3>Posts</h3>
                	<form method="get" action="{{url('search')}}" class="searchbar">
				          <input class="search_input" type="text" name="search" placeholder="Search...">
				          <button  class="search_icon"><i class="fas fa-search"></i></button>
        			</form>
                </div>

                @if($message = Session::get('session'))
                	<div class="alert alert-danger">
                		{{$message}}
                	</div>
                @endif

                @if($message = Session::get('sessia'))
                	<div class="alert alert-success">
                		{{$message}}
                	</div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-dark">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Title</th>
						      <th scope="col">Description</th>
						      <th scope="col">User Id</th>
						      <th scope='col'>Edit</th>
						      <th scope='col'>Delete</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($result as $res)
						    <tr>
						      <th scope="row">{{$res->id}}</th>
						      <td>{{$res->title}}</td>
						      <td>{{$res->description}}</td>
						      <td>{{$res->user_id}}</td>
						      <td>
						      		<a href="{{route('edit', ['id'=> $res->id])}}" class="btn btn-primary a-btn-slide-text">
								        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
								        <span><strong>Edit</strong></span>            
								    </a>
							   </td>
							   <td>
							   		<a href="{{route('delete', ['id' =>$res->id])}}" class="btn btn-danger a-btn-slide-text">
								       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								       <span><strong>Delete</strong></span>            
								    </a>
							   </td>
						    </tr>
						    @endforeach
						  </tbody>
					</table>
					<div class="text-center">
						{!! $result->links() !!}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
