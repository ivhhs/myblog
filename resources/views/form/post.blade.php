			
				<form class="form-horizontal" id="form" role="form" method="POST" action="{{ $route }}">
					{{csrf_field()}}
					<input type="hidden" name="id" value="{{request('id')}}">
					<div class="control-group">
			            <label class="control-label" for="title">标题</label>
			            <div class="controls">
			              
			              <input type="text" name="title" class="form-control input-xlarge" value="{{request('title')}}">
			            </div>
			        </div>

			        @if ($errors->has('title'))
						@foreach ($errors->get('title') as $error_content)
							<p class="help-block alert-required">{{ $error_content }}</p>
						@endforeach
                   	@endif	
			        <br>
					<div class="control-group">
			            <label class="control-label" for="title">描述</label>
			            <div class="controls">
			             <textarea name="descr" class="form-control"> {{request('descr')}}</textarea>
			            
			            </div>
			        </div>

			        @if ($errors->has('title'))
						@foreach ($errors->get('title') as $error_content)
							<p class="help-block alert-required">{{ $error_content }}</p>
						@endforeach
                   	@endif	
			        <br>


					<div class="control-group">
			            <label class="control-label" for="category_id">分类</label>
			            <div class="controls">
			              	
			              	<select name="category_id" class="form-control">
			              		@foreach($categories as $cate)
									<option value="{{$cate->id}}"
											@if(request('category_id')==$cate->id)
												selected
											@endif
									>{{$cate->name}}</option>
			              		@endforeach

			              	</select>
			            </div>
			        </div>

				    @if ($errors->has('category_id'))
						@foreach ($errors->get('category_id') as $error_content)
							<p class="help-block alert-required">{{ $error_content }}</p>
						@endforeach
                   	@endif	
                   	<br>

			       
					<div class="control-group">
			            <label class="control-label" for="content">内容</label>
			            <div class="controls">
			          		

							<div class="editor-wrapper">
								
								<textarea name="content" id="kindeditor" rows="12" cols="115">{{request('content')}}</textarea>

						    </div>
						    
			            </div>
			        </div>


			        @if ($errors->has('content'))
						@foreach ($errors->get('content') as $error_content)
							<p class="help-block alert-required">{{ $error_content }}</p>
						@endforeach
                   	@endif	
                   	<br>

                   	<div class="control-group">
			            <div class="controls">
			              <label class="checkbox">
			              	@if (null !== request('active') and '1' == request('active'))
			                	<input type="checkbox" name="active" value="1" checked>
			                @else
			                	<input type="checkbox" name="active" value="1">
			                @endif
			                是否发布
			              </label>
			            </div>
			         </div>
			        <hr>
					<div class="form-actions">
			            <button type="submit" class="btn btn-primary">保存</button>
			            @if (null !== request('id'))
			            	<a class="btn btn-default" href="{{ route('getPostDelete',request('id')) }}">删除</a>
			            @endif
			        </div>


				</form>



				<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet" >

				<script  src="{{ asset('/js/jquery-ui.min.js') }}" ></script>



				<script type="text/javascript" src="{{ asset('/js/marked.js')}}"></script>

				<script type="text/javascript" src="{{ asset('/js/kindeditor-4.1.7/kindeditor-all.js')}}"></script>
				<script type="text/javascript" src="{{ asset('/js/kindeditor-4.1.7/lang/zh_CN.js')}}"></script>

				<script type="text/javascript" src="{{ asset('/js/ajax-upload.js')}}"></script>

				<link href="{{ asset('/css/editor-self.css') }}" rel="stylesheet">
				<script src="{{ asset('/js/editor-self.js') }}" type="text/javascript"></script>
				<script>

//                    KindEditor.ready(function(K) {
//                        window.editor = K.create('#kindeditor',{
//                            uploadJson : '/post/upload',
//                            extraFileUploadParams : {
//                               _token:document.getElementByName('_token').val()
//                            },
//                            afterBlur : function(){this.sync();}, //
//                        });
//                    });
                    var csrfitems = document.getElementsByName("_token");
                    var csrftoken = "";
                    if(csrfitems.length > 0)
                    {
                        csrftoken = csrfitems[0].value;
                    }

                    var editor ;
                    KindEditor.ready(function(K) {
                        var options = {
                            filterMode : true,
                            uploadJson : K.undef('/post/upload'),
                            extraFileUploadParams : {
								_token:csrftoken
                            }
                        };
                        editor = K.create('textarea[name="content"]', options);
                    });
				</script>
