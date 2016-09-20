@extends('app')
@section('title')
	Blog
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Blog do administrador</div>

				<div class="panel-body">
					@foreach($posts as $post)
						<hr>
						<h1>{{$post->title}}<small><i> ({{$post->created_at}})</i></small></h1>
						<p>{{$post->content}}</p>
						<b>Tags:</b>
							<ul>
								@foreach($post->tags as $tag)
									<li>{{$tag->name}}</li>
								@endforeach
							</ul>
						@foreach($post->comments as $comment)
							<hr>
							<h4>Comment {{$comment->id}}</h4>
							<p>Name: {{$comment->name}}</p>
							<p>Comment: {{$comment->comment}}</p>
						@endforeach
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
