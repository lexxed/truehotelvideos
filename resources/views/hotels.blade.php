@extends('master')

@section('title', 'True videos of ' . $city . ' Hotels by real people that stayed there.')
@section('description', 'Compare ' .  $city . ' hotels by True Videos of real people that was there. See what it\'s like to stay there yourself.')

@section('content')

  <div class="breadcrumb-header">
    <div class="container">
      <div class="columns">
        <div class="column">
          <a href="{{ url('/') }}">Home</a> > 
          <a href="{{ url('/hotels/thailand') }}">Thailand</a> >
          <a href="{{ url('/hotels/thailand/' . $cityslug) }}">{{ ucfirst($city) }}</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="columns">
      <div class="column is-8">

        <div class="box">
          <div class="content">    

            @foreach($hotels as $hotel)
              <div class="columns custom-columns">
                <div class="column">

                  @php
                      $video = App\Video::where('hotel_id', $hotel->id)->first();
                  @endphp 

                  @if (!empty($video->tag))
                    <div class="video-responsive">  
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->tag }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                  @else                
                    <a class="block-link" href="{{ url('/' . $cityslug . '/' . $hotel->slug) }}">
                      <img class="image is-180x180" src="http://res.cloudinary.com/{{ env('CLOUDINARY_CLOUD_NAME') }}/image/fetch/{{ $hotel->photo1 }}">
                    </a>
                  @endif
                </div>
                <div class="column block-link">
                  <a class="block-link" href="{{ url('/' . $cityslug . '/' . $hotel->slug) }}">
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
                    <a href="{{ url('/' . $cityslug . '/' . $hotel->slug) }}">
                    {{ $hotel->vidcount }} videos by real people
                    </a>
                  @endif
                     
                  <div class="is-hidden-mobile">
                    @if(config('constants.displayAgoda')=="ON")
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
                    @endif
                    @if ((!empty($hotel->bookingcom_rate)) && (config('constants.displayBooking')=="ON"))
                      <br>
                      <a rel="nofollow" target="_blank" class="button is-light" href="{{ url('/bk/' . $hotel->slug) }}">
                        Booking.com &nbsp;&nbsp;<b>${!! number_format($hotel->bookingcom_rate/34,0) !!}</b>
                      </a>
                    @endif
                  </div>

                </div>          
              </div>
              
            @endforeach

            <br>
            {{ $hotels->links() }}

	        </div>  
        </div>      
  
        <?php /*
        <div class="box">
            ...
        </div> 
        */ ?>

      </div>

      <div class="column is-4">
        <div class="box related-list">
          <p class="autoplay">
            <span class="autoplay-title">Highly Rated Hotels</span>
          </p>

          @foreach ($similar as $similarhotel)

            @php
                //$shotel = App\Hotel::where('agodaid', $similarhotel->tel_id)->firstOrFail();
            @endphp            
            <article class="media related-card">
              <div class="media-left">
                  <a href="{{ url('/' . $cityslug . '/' .  $similarhotel->slug) }}">
                    <img class="image is-90x90" width="90" src="{{ $similarhotel->photo1 }}">
                  </a>  
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <span class="video-title">
                      <a href="{{ url('/' . $cityslug . '/' . $similarhotel->slug) }}">
                        <b>{{ $similarhotel->hotelname }}</b>
                      </a>
                    </span>
                    <span class="video-title">Rates from ${{ $similarhotel->agoda_rate }}</span>
                    
                    <span class="stars stars-details">
                      @for ($i = 1; $i <= $similarhotel->star_rating; $i++)
                        <i class="fa fa-star"></i>
                      @endfor

                      <?php
                      $starsLeft = 5 - $similarhotel->star_rating;

                      if (is_float($starsLeft)) {
                        echo '<i class="fa fa-star-half-o"></i>
                        ';
                      }

                      if ($starsLeft > 0) {                       // if there are any more stars left
                          for ($i = 1; $i <= $starsLeft; $i++) {  // go through each remaining star
                              echo '<i class="fa fa-star-o"></i>
                              ';     // show it empty
                          }
                      }            
                      ?>
                    </span>


                  </p>
                </div>
              </div>
            </article>
          @endforeach    

        </div>
      </div>      



    </div>
  </div>	

  <div class="spacer"></div>

@endsection	