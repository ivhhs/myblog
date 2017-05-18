						<div class="list-group-item post-list-item" >
					        @if (!$post->active)
					        	<a class="btn btn-primary pull-right reload-button" href="{{ route('getPostUpdate',$post->id)}}">发布</a>
					        @endif
					       
					        <a href="{{ route('getPostShow', $post->id) }}" >
					            <h4 class="list-group-item-heading">{{ $post->title }}</h4>
					        </a>
							<p>{{$post->markdown_content}}</p>
					       	<div class="meta">
					                <i class="glyphicon glyphicon-time"></i> 
					                	<span>{{ $post->created_at }}</span>
					                <i class="glyphicon glyphicon-comment"></i>
					                	<span >{{ $post->comments->count() }} </span>
					                <i class="glyphicon glyphicon-user"></i> 
					                	<a href="{{ route('getUserPost',$post->user->id) }}"> {{ $post->user->name }} </a>
					                <i class="glyphicon glyphicon-book"></i> 
					                	<a href="{{ route('getCategoryPost',$post->category->id) }}"> {{ $post->category->name}} </a>
					                
					              
					        </div>
				        </div>