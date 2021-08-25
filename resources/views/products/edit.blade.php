<form action="{{ route('photos.update',$id ) }}" method="POST">
	@csrf
	@method('PUT')
	<br>
	<input type="text" name="user_name">

	<br>
	<input type="submit" name="Submit">
</form>