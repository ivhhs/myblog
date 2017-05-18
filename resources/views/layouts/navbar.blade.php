		<nav class="navbar navbar-white" role="navigation">
			<div class = "header-container">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		            <span class="nav-menu-name">{{ __('Menu') }}</span>
		        <!--
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        -->
		          </button>
		          <a class="navbar-brand" href="{{ route('home') }}">myblog</a>
		        </div>
		      
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse navbar-ex1-collapse">
		          <ul class="nav navbar-nav">
		            <li @if(Route::is('home')) class="active" @endif ><a href="{{ route('home') }}">所有文章</a></li>
		            <li @if(Route::is('category')) class="active" @endif ><a href="{{ route('category') }}">分类</a></li>
		           
		          </ul>
		          <ul class="nav navbar-nav navbar-right">

		            @if (Auth::guest())
						<li @if(Route::is('login')) class="active" @endif ><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
						<li @if(Route::is('register')) class="active" @endif ><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
										
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span class="caret pull-right nav-dropdown-icon"></span>
								<span class="nav-user-name">{{ Auth::user()->name }}</span> 
								
							</a>
							<ul class="dropdown-menu nav-dropdown-list" role="menu">
								
								<li><a href="{{ route('getPostMine') }}">我的文章</a></li>
								<li><a href="{{ route('getPostCreate') }}" class="reload-button">添加文章</a></li>
								<li><a href="{{ route('getCategoryCreate') }}">添加分类</a></li>
								<li><a href="{{ route('logout') }}">退出</a></li>
							</ul>
						</li>
					@endif
		          </ul>
		        </div><!-- /.navbar-collapse -->
		    </div>
		</nav>
