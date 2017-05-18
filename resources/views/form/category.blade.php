				

				 <form class="form-horizontal" id="form" role="form" method="POST" action="{{ route('postCategoryCreate') }}">
                        {{ csrf_field() }}
					<div class="control-group">
			            <div class="controls">
			             
			               <input id="" type="text" class="form-control input-xlarge" name="name" value="{{ old('name') }}" required autofocus>
			            </div>
			        </div>

			        @if ($errors->has('name'))
						@foreach ($errors->get('name') as $error_content)
							<p class="help-block alert-required">{{ $error_content }}</p>
						@endforeach
                   	@endif	
			   
			        <hr>
					<div class="form-actions">
			            <button type="submit" class="btn btn-primary">保存</button>
			        </div>
			   