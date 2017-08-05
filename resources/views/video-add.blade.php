@extends('master')

@section('title', 'Submit Video')
@section('description', 'Submit Video')

@section('content')

  <div class="breadcrumb-header">
    <div class="container">
      <div class="columns">
        <div class="column">
          <a href="{{ url('/') }}">Home</a> > 
          <a href="{{ url('/hotels/thailand') }}">Thailand</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="columns">
      <div class="column is-8">

        <div class="box">
          <div class="content">    

			<h3>Submit a video for {{ $hotel->hotelname }}</h3>

			<form method="POST" action="/video-add/{{ $hotel->id }}">
				{{ csrf_field() }}

			    <div class="form-group">
			        <label class="label" for="inputError1">Email</label>
			        <p class="control">
			        <input name="submitby" size="35" type="submitby" class="form-control" id="inputSubmitby" placeholder="Email" value="mm">
			        </p>
			        <small class="text-danger"></small>
			    </div>	
				
				<div class="form-group">
					<label class="label" for="inputError1">Video Url</label>
					<p class="control">
					<input name="videourl" size="35" type="videourl" class="form-control" id="inputVideourl" placeholder="https://www.youtube.com/watch?v=4Z3z7DvoA-M" value="{{ old('videourl') }}"  autofocus>
					</p>
				</div>	
				 <p class="control">
				<div class="form-group">
					<button type="submit" class="button is-primary">Submit video</button>
				</div>	
				</p>
			</form>
		


	      </div>
        </div>                
      </div>



    </div>
  </div>	

  <div class="spacer"></div>

@endsection	