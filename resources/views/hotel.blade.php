@extends('master')

@if (strlen($hotel->hotelname) < 25)
  @section('title', $hotel->hotelname . ": Hotel Video Reviews & Travel Guides.")
@else
  @section('title', $hotel->hotelname . ": Real Hotel Video Reviews.")
@endif  

@section('description', 'See real people\'s Videos of ' . $hotel->hotelname . '. Holiday Videos by real people at the hotel.')

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

            <div class="columns">
              <div class="column is-three-quarters">
                
                <h1>{{ $agodahotel->hotel_name }}</h1>
                <span class="stars stars-details">
                  @for ($i = 1; $i <= $agodahotel->star_rating; $i++)
                    <i class="fa fa-star"></i>
                  @endfor

                  <?php
                  $starsLeft = 5 - $agodahotel->star_rating;

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
                <p>
                  {{ $agodahotel->addressline1 }}, {{ $agodahotel->city }}, {{ $agodahotel->country }}
                </p>     

              </div>
              <div class="column has-text-centered is-hidden-mobile">

                @if(config('constants.displayAgoda')=="ON")
                Per night 
                <b>
                  @if ($agodahotel->rates_from==0)
                    $42
                  @else
                    ${{ $agodahotel->rates_from }}
                  @endif  
                </b>
                <a class="button is-danger" href="{{ url('/ag/' . $hotel->slug) }}" target="_blank" rel="nofollow">View deal</a>                    
                <br>
                <div class="is-small">agoda.com</div>
                @endif

              </div>
            </div>

    				@foreach ($videos as $video)
    					<div class="video-responsive">  
    						<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->tag }}" frameborder="0" allowfullscreen></iframe>
    					</div>
    				@endforeach	

            @if($videos->isEmpty())
              <div class="is-hidden-desktop-only">
                  <img class="is-hidden-desktop-only" src="https://res.cloudinary.com/dncotieoi/image/fetch/{{ $agodahotel->photo1 }}">
              </div>
            @endif

            <div class="is-pulled-right is-hidden-mobile">
              <a href="{{ url('/video-add/' . $hotel->slug) }}">Submit video</a>
            </div>

            <div class="columns is-gapless is-hidden-mobile">
              <div class="column is-narrow" style="width: 101px;">
                <img class="image is-96x96 popover" src="https://res.cloudinary.com/dncotieoi/image/fetch/{{ $agodahotel->photo1 }}">
              </div>
              <div class="column is-narrow" style="width: 101px;">  
                <img class="image is-96x96 popover" src="https://res.cloudinary.com/dncotieoi/image/fetch/{{ $agodahotel->photo2 }}">
              </div>
              <div class="column is-narrow" style="width: 101px;">
                <img class="image is-96x96 popover" src="https://res.cloudinary.com/dncotieoi/image/fetch/{{ $agodahotel->photo3 }}">
              </div>
              @if ($agodahotel->photo4)
              <div class="column is-narrow" style="width: 101px;">
                <img class="image is-96x96 popover" src="https://res.cloudinary.com/dncotieoi/image/fetch/{{ $agodahotel->photo4 }}">
              </div>
              @endif
              @if ($agodahotel->photo5)
              <div class="column is-narrow" style="width: 101px;">
                <img class="image is-96x96 popover" src="https://res.cloudinary.com/dncotieoi/image/fetch/{{ $agodahotel->photo5 }}">
              </div>              
              @endif
            </div>  

            @if(config('constants.displayAgoda')=="ON")
            <a rel="nofollow" target="_blank" class="button is-light" href="{{ url('/ag/' . $hotel->slug) }}">
              Agoda.com &nbsp;&nbsp;&nbsp;&nbsp;
                <b>
                  @if ($agodahotel->rates_from==0)
                    $42
                  @else
                    ${{ $agodahotel->rates_from }}
                  @endif  
                </b>              
            </a>
            <a rel="nofollow" target="_blank" class="button is-danger" href="{{ url('/ag/' . $hotel->slug) }}">View deal</a>        
            @endif

            
            @if ((!empty($bookinghotel->minrate)) && (config('constants.displayBooking')=="ON"))
              <br><br>
              <a rel="nofollow" target="_blank" class="button is-light" href="{{ url('/bk/' . $hotel->slug) }}">
                Booking.com &nbsp;&nbsp;<b>${!! number_format($bookinghotel->minrate/34,0) !!}</b>
              </a>
              <a rel="nofollow" target="_blank" class="button is-danger" href="{{ url('/bk/' . $hotel->slug) }}">View deal</a>        
            @endif

	        </div>  
        </div>      



        
          <div class="box">

            @foreach ($instagrams as $instagram)
                {!! $instagram->embedcode !!}
            @endforeach 
            Share your instagram posts of this hotel!


            <div class="is-pulled-right">
              <a href="{{ url('/instagram-add/' . $hotel->slug) }}">Submit Instagram post</a>
            </div>
            <br><br>
            
          </div>  


        <div class="box">
          <div class="video-responsive">  
            <iframe
              width="600"
              height="450"
              frameborder="0" style="border:0"
              src="https://www.google.com/maps/embed/v1/place?key={{ config('constants.googlemapkey') }}&q={{ urlencode($hotel->hotelname) }}&center={{ $agodahotel->latitude }},{{ $agodahotel->longitude }}" allowfullscreen>
            </iframe>
          </div>
        </div>    

        <div class="box">
          <p><strong>{{ $hotel->hotelname }}</strong></p>
          <p>{!! str_replace('â€“', ' ', $agodahotel->overview) !!}</p>
          @if($agodahotel->checkin) <p><b>Check-in :</b> {{ $agodahotel->checkin }}</p> @endif
          @if($agodahotel->checkout) <p><b>Check-out :</b> {{ $agodahotel->checkout }}</p> @endif
        </div>            
      </div>

      <div class="column is-4">
        <div class="box related-list">
          <p class="autoplay">
            <span class="autoplay-title">Similar Hotels</span>
          </p>

          @foreach ($similar as $similarhotel)

            @php
                //$shotel = App\Hotel::where('agodaid', $similarhotel->tel_id)->firstOrFail();
            @endphp            
            <article class="media related-card">
              <div class="media-left">
                  <a href="{{ url('/' . $similarhotel->slug) }}">
                    <img class="image is-90x90" width="90" src="https://res.cloudinary.com/{{ env('CLOUDINARY_CLOUD_NAME') }}/image/fetch/{{ $similarhotel->photo1 }}">                    
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
                    <span class="video-title">Rates from ${{ $similarhotel->agoda_rate }}</span>                    
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