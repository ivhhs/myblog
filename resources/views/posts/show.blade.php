@extends('layouts.second')


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="list-group post-list-group">
						@if(auth::user()->id == $post->user_id)
							<a class="btn btn-primary pull-right reload-button" href="{{ route('getPostUpdate',$post->id) }}">编辑文章</a>
						@endif
						@include('posts.list')


				        <div class = "post-body">
				        	{!! $post->content !!}
				        </div>
				        <hr>

				        <div class="comment-body">
				        	<div class="comment-header">
				        		<label class="control-label" for="comment">评论</label>
				        	</div>
				        	<div class="comment-list-container">
				        		@if($post->has('comments'))
				        			@foreach($post->comments as $comment)
				        			<div class="comment-list">
				        				<div>
				        					<a href="{{ route('getUserPost',$comment->user->id) }}"> {{ $comment->user->name }} </a>
				        				</div>
				        				<div>
				        					{!! $comment->comment !!}
				        				</div>
				        			</div>
				        			@endforeach
				        		@endif

				        	</div>

				        	
				        
				          	<form method="post" action="{{route('addComment')}}" accept-charset="UTF-8" role="form" class="form-horizontal" id="form">
								{{csrf_field()}}
								<input name="id" type="hidden" value="{{$post->id}}">
								<div class="control-group">
				            	
					            	<div class="controls">
					            		<textarea placeholder="Say Something ?" id="comment" class="form-control input-xlarge" rows="3" name="comment" cols="50"></textarea>
									</div>
									 @if ($errors->has('comment'))
										@foreach ($errors->get('comment') as $error_content)
											<p class="help-block alert-required">{{ $error_content }}</p>
										@endforeach
				                   	@endif
								    <div class="comment-button">
					            		<button type="submit" class="btn btn-primary">提交</button>
					            	</div>
				          		</div>
				          	</form>

				        </div>


				    </div>
          		</div>
			</div>
		</div>
	</div>
</div>
@endsection
