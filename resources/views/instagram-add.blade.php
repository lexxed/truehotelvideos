@extends('master')

@section('title', 'Submit Instagram Post for ' . $hotel->hotelname)
@section('description', 'Submit your Instagram Post for ' . $hotel->hotelname . '. More followers for your Instagram Account.')

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

			<h3>Submit your Instagram Post for {{ $hotel->hotelname }}</h3>
			<p class="help">* Instagram post submitted will be shown after approval.</p>			        

			<form method="POST" action="/instagram-add/{{ $hotel->id }}">
				{{ csrf_field() }}

			    <div class="field">
			        <label class="label">Email</label>
				    <input name="submitby" size="25" type="submitby" class="input @if ($errors->has('submitby')) is-danger @endif" id="inputSubmitby" placeholder="Email input" value="{{ old('submitby') }}">
				    <p class="help is-danger">{{ $errors->first('submitby') }}</p>			        
			    </div>	
				<br>
				<div class="field">
					<label class="label">Instagram Post Url</label>
					<input name="instagramurl" size="35" type="instagramurl" class="input @if ($errors->has('instagramurl')) is-danger @endif" id="inputInstagramurl" placeholder="https://www.instagram.com/p/BbQ8NgJHybA/" value="{{ old('instagramurl') }}">
					<p class="help is-danger">{{ $errors->first('instagramurl') }}</p>
				</div>	
				 <p class="control">
				<div class="form-group">
					<button type="submit" class="button is-primary">Submit Instagram Post URL</button>
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