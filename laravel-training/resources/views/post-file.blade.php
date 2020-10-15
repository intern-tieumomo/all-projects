<form action="{{ route('post-file') }}" method="post" enctype="multipart/form-data">
	<input type="file" name="fileName">
	{{ csrf_field() }}
	<input type="submit" name="submit">
</form>