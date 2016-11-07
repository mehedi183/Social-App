@extends('layouts.master')

@section('content')
	@include('includes.messages')
	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What's in your mind...</h3></header>
			<form action="{{ route('post.create') }}" method="post">
				<div class="form-group">
					<textarea class="form-control" name="post_body" id="post_body" placeholder="Your Post" rows="5"></textarea>
				</div>
				<button class="btn btn-primary" type="submit">Create Post</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</section>
	<section class="row posts">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What Other people say...</h3></header>
			@foreach($posts as $post)
				<article class="post" data-postid="{{ $post->id }}">
					<p>
						{{ $post->post_body }}
					</p>
					<div class="info">
					Created by <a href="#">{{ $post->user->name }}</a> On {{ $post->created_at }}
					</div>
					<div class="interaction">
						<a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? "Liked" : "Like" }}</a> 
						<!-- /.dislike 
						<a href="#">Dislike</a> -->
						@if(Auth::user() == $post->user)

						|
						<a href="#" class="edit">Edit</a> |
						<a href="{{route('post.delete',['post_id' => $post->id])}}">Delete</a>
						@endif
					</div>
				</article>
			@endforeach			
		</div>
	</section>
	<section>
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title">Edit Post</h4>
		      	</div>
		      	<div class="modal-body">
		      		<form>
		      			 	
		      			<div class="form-group">      
		      				<textarea class="form-control" rows="5" name="postBody" id="postBody" class="postBody"></textarea>				
		      			</div>
		      		</form>
					
		      	</div>
		     	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        	<button type="button" class="btn btn-primary" id="modal_save">Save changes</button>
		      	</div>
		      	
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</section>
	<section class="onlineUsers">
		<div class="col-md-3 col-md-offset-9">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  	<div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Online
				        </a>
				      </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				    	<div class="panel-body">
				        	@if($users)
				        		@foreach($users as $user)
				        			@if($user->isOnline())
				        				<li>{{ $user->name }}</li>
				        			@endif
				        		@endforeach
				        	@endif
				    	</div>
				    </div>
			  	</div>
			  
			  
			</div>
		</div>
	</section>
	<script>
		var token = "{{ Session::token() }}";
		var urlEdit = "{{ route('post.edit') }}";
		var urlLike = "{{ route('post.like') }}";

		//var token = $('#edittoken').attr('value').textContent;
	</script>
@endsection