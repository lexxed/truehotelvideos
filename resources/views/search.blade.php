@extends('master')

@section('title', 'Search for ' . $q)
@section('description', 'Hotels in ')

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
      <div class="column is-12">

        <div class="box">
          <div class="content">    
           
            @if($message)
                <h1>{{ $message }} '{{ $q }}'</h1>
                <p>Here are some recommended hotels.</p>
            @else
                <h1>Search results for '{{ $q }}'.</h1>
            @endif

            @foreach($hotels as $hotel)
              <div class="columns  is-mobile">
                <div class="column">

                  @php
                      $video = App\Video::where('hotel_id', $hotel->id)->first();
                      $city = App\Cities::where('city', $hotel->city)->first();
                  @endphp 

                  @if (!empty($video->tag))
                    <div class="video-responsive">  
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->tag }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                  @else                
                    <a class="block-link" href="{{ url('/' . $city->slug . '/' . $hotel->slug) }}">
                      <img class="image is-180x180" src="http://res.cloudinary.com/{{ env('CLOUDINARY_CLOUD_NAME') }}/image/fetch/{{ $hotel->photo1 }}">
                    </a>
                  @endif
                </div>
                <div class="column block-link">
                  <a class="block-link" href="{{ url('/' . $city->slug . '/' . $hotel->slug) }}">
                    {{ $hotel->hotelname }}<br>

                    
                    <span class="stars stars-details">
                      @for ($i = 1; $i <= $hotel->star_rating; $i++)
                        <i class="fa fa-star"></i>
                      @endfor

                      <?php
                      $starsLeft = 5 - $hotel->star_rating;

                      if (is_float($starsLeft)) {
                        echo '<i class="fa fa-star-half-o"></i>
                        '; // new line else will bunch together
                      }

                      if ($starsLeft > 0) {
                          for ($i = 1; $i <= $starsLeft; $i++) {  // go through each remaining star
                              echo '<i class="fa fa-star-o"></i>
                              ';     
                          }
                      }            
                      ?>
                    </span>                    
                  </a>

                  @if ($hotel->vidcount != 0)
                    <a href="{{ url('/'  . $city->slug . '/' . $hotel->slug) }}">
                    {{ $hotel->vidcount }} videos by real people
                    </a><br>
                  @endif
                     
                  
                  <a rel="nofollow" target="_blank" class="button is-light" href="{{ url('/ag/' . $hotel->slug) }}">
                  Agoda.com &nbsp;&nbsp;&nbsp;&nbsp;
                  <b>
                    @if ($hotel->agoda_rate==0)
                      $42
                    @else
                      ${{ $hotel->agoda_rate }}
                    @endif  
                  </b>
                  </a>
                  @if (!empty($hotel->bookingcom_rate))
                    <br>
                    <a rel="nofollow" target="_blank" class="button is-light" href="{{ url('/bk/' . $hotel->slug) }}">
                      Booking.com &nbsp;&nbsp;<b>${!! number_format($hotel->bookingcom_rate/34,0) !!}</b>
                    </a>
                  @endif
                  
                </div>          
              </div>
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