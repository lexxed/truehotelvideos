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
			<p class="help">* Videos submitted will be shown after approval.</p>			        

			<form method="POST" action="/video-add/{{ $hotel->id }}">
				{{ csrf_field() }}

			    <div class="field">
			        <label class="label">Email</label>
				    <input name="submitby" size="25" type="submitby" class="input @if ($errors->has('submitby')) is-danger @endif" id="inputSubmitby" placeholder="Email input" value="{{ old('submitby') }}">
				    <p class="help is-danger">{{ $errors->first('submitby') }}</p>			        
			    </div>	
				<br>
				<div class="field">
					<label class="label">Video Url</label>
					<input name="videourl" size="35" type="videourl" class="input @if ($errors->has('videourl')) is-danger @endif" id="inputVideourl" placeholder="https://www.youtube.com/watch?v=4Z3z7DvoA-M" value="{{ old('videourl') }}">
					<p class="help is-danger">{{ $errors->first('videourl') }}</p>
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