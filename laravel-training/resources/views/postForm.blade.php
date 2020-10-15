<form action="{{ route('postForm') }}" method="post">
	<input type="text" name="name">
	{{ csrf_field() }}
	<input type="submit" name="submit">
</form>