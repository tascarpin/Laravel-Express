@extends('app')
@section('title')
	Blog
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Blog</div>

				<div class="panel-body">
					@foreach($posts as $post)
						<h1>{{$post->title}}<small><i> ({{$post->created_at}})</i></small></h1>
						<p>{{$post->content}}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
