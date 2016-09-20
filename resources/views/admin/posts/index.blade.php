@extends('app')
@section('title')
	Blog
@endsection
@section('content')

	<h1>BLOG DO ADMINISTRADOR</h1>

	<a href="{{route('admin.posts.create')}}" class="btn btn-success">Create</a><br><br>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Action</th>
		</tr>
		@foreach($posts as $post)
			<tr>
				<th>{{$post->id}}</th>
				<th>{{$post->title}}</th>
				<th>
					<a href="{{route('admin.posts.edit', ['id' => $post->id])}}" class="btn btn-default">Edit</a>
					<a href="{{route('admin.posts.destroy', ['id' => $post->id])}}" class="btn btn-danger">Destroy</a>
				</th>
			</tr>
		@endforeach
	</table>

	{!! $posts->render() !!}

@endsection
