                <h1>hotels</h1>

                @foreach ($hotels as $hotel)

                    Main hotel info<br>
                    id: {{ $hotel->id }}<br>
                    agodaid: {{ $hotel->agodaid }}<br>
                    bookingid: {{ $hotel->bookingid }}<br>
                    name: {{ $hotel->hotelname }}<br>
                    country: {{ $hotel->country }}<br>
                    city: {{ $hotel->city }}<br>
                    

                    <?php
                        //$term = $hotel->hotelname;
                        //$bookinghotel = bookinghotel::where('hotel_name','LIKE','%'.$term.'%')->get();

                        //foreach ($bookinghotel as $b) {

                          //  echo $bookinghotel->hotel_name;

                        //}
                    ?>

                    <br><br>

                @endforeach