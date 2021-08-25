<form action="{{ route('photos.store') }}" method="POST">
	@csrf

	<br>
	<input type="text" name="user_name">

	<br>
	<input type="submit" name="Submit">
</form>