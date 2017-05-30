                @foreach ($hotels as $hotel)

                    
                    agodaid: {{ $hotel->agodaid }}<br>
                    
                    <p><a href="{{ url('/' . $hotel->slug) }}">{{ $hotel->hotelname }}</a></p>


                @endforeach