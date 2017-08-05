@extends('master')

@section('title', 'Hotels in ' . $country)
@section('description', 'Hotels in ' . $country)

@section('content')

  <div class="breadcrumb-header">
    <div class="container">
      <div class="columns">
        <div class="column">
          <a href="{{ url('/') }}">Home</a> > 
          <a href="{{ url('/hotels/thailand') }}">Thailand</a> >
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="columns">
      <div class="column is-8">

        <div class="box">
          <div class="content">    

          <h1>Browse Hotels by City</h1>

          @foreach($cities as $city)             
            <a href="{{ url('/hotels/thailand/' . strtolower($city->slug)) }}">
              {{ $city->city }}
            </a>
            <br><br>              
          @endforeach

	        </div>  
        </div>                
      </div>

      <?php
      /*
      <div class="column is-4">
        <div class="box related-list">
          <p class="autoplay">
            <span class="autoplay-title">Side bar</span>
          </p>

        </div>
      </div>
      */
      ?>
      
    </div>
  </div>	

  <div class="spacer"></div>

@endsection	