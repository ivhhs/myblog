@extends('layouts.second')


@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">添加文章</div>
				<div class="panel-body">

					@include('form.post',array('route' => route('postPostCreate')))

          		</div>
			</div>
		</div>
	</div>
</div>
@endsection
