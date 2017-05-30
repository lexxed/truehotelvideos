<h3>Submit a video for {{ $hotel->hotelname }}</h3>

<form method="POST" action="/video-add/{{ $hotel->id }}">
	{{ csrf_field() }}

    <div class="form-group">
        <label class="control-label" for="inputError1">Email</label>
        <input name="submitby" size="35" type="submitby" class="form-control" id="inputSubmitby" placeholder="Email" value="{{ old('submitby')}}">
        <small class="text-danger"></small>
    </div>	
	
	<div class="form-group">
		<label class="control-label" for="inputError1">Video Url</label>
		<input name="videourl" size="35" type="videourl" class="form-control" id="inputVideourl" placeholder="https://www.youtube.com/watch?v=4Z3z7DvoA-M" value="{{ old('videourl') }}">
	</div>	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Submit video</button>
	</div>	
</form>