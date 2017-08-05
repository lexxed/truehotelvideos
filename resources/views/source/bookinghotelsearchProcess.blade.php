                <form method="POST" action="/bookinghotelsearch">
                    {{ csrf_field() }} 
                    <div class="form-group">
                        
                        <input name="q" type="q" class="form-control" id="q" placeholder="Search" value="">
                        
                    </div>
                </form>    

                

				<h1>{{ $q }}</h1>



				Main hotel DB
				@foreach ($hotels as $hotel)
                    <p>
                    	id: {{ $hotel->id }}<br>
                    	name: {{ $hotel->hotelname }}<br>
                    	agodaid: {{ $hotel->agodaid }}<br>
                    	bookingid: {{ $hotel->bookingid }}<br>                   	
                    </p>                   
                @endforeach
                <hr>

                Booking.com
                @if ($bookinghotels->isEmpty()) 
                    <h2>EMPTY</h2>
                @endif 

                @foreach ($bookinghotels as $bookinghotel)
                    <p>
                        id: {{ $bookinghotel->id }}<br>
                        name: {{ $bookinghotel->name }}<br>
                        address: {{ $bookinghotel->address }}<br>
                        @foreach ($hotels as $hotel)
                            <a href="{{ url('/bookinghotelsearchCopy/' . $hotel->id . '/' . $bookinghotel->id) }}" target="_blank">Bookingid id: {{ $bookinghotel->id }} to 
                            Hotel id: {{ $hotel->id }}</a>
                        @endforeach                        
                    </p>
                @endforeach                
                <hr>

				Agoda.com
                @if ($agodahotels->isEmpty()) 
                    <h2>EMPTY</h2>
                @endif                 
				@foreach ($agodahotels as $agodahotel)
                    <p>
                    	
                    	id: {{ $agodahotel->tel_id }}<br>
                    	name: {{ $agodahotel->hotel_name }}<br>
                    	address: {{ $agodahotel->addressline1 }}<br>
                    	
                    </p>                   
                @endforeach  
                <hr>  

                          