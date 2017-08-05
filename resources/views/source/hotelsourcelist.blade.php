                @foreach ($hotels as $hotel)

                    <p>
                    	<a href="{{ url('/' . $hotel->slug) }}">{{ $hotel->hotelname }}</a>&nbsp;{{ $hotel->rating_average }}<br>
						videos: {{ $hotel->vidcount }}<br>
						<a href="{{ url('/video-add/' . $hotel->slug) }}" target="_blank" >Add Video</a><br>
                    	agodaid: {{ $hotel->agodaid }}<br>
                    	bookingid: {{ $hotel->bookingid }}<br>
                    	<a href="https://www.youtube.com/results?search_query={{$hotel->hotelname}}" target="_blank" >youtube</a><br>
                    	<a href="{{ url('/bookinghotelsearchByUrl/' . $hotel->hotelname) }}" target="_blank" >Search name</a><br>
                    	
                    	
                    </p>


                @endforeach