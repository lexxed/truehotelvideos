                <h1>booking com hotels</h1>

                <?php
                    $count = 0;
                ?>

                @foreach ($hotels as $hotel)

                    <?php
                        $count++;
                    ?>

                    #{{ $count }}<br>
                    Main hotel info<br>
                    name: {{ $hotel->hotelname }}<br>
                    id: {{ $hotel->id }}<br>
                    agodaid: {{ $hotel->agodaid }}<br>
                    bookingid: {{ $hotel->bookingid }}<br>
                    country: {{ $hotel->country }}<br>
                    city: {{ $hotel->city }}<br>
                    <br>
                    Bookingcom hotels<br>
                    name: {{ $hotel->name }}<br>
                    address: {{ $hotel->address }}<br>
                    id: {{ $hotel->id }}<br>
                    hotel_url: {{ $hotel->hotel_url }}<br>
                    **************************************

                    <?php
                        //$term = $hotel->hotelname;
                        //$bookinghotel = bookinghotel::where('hotel_name','LIKE','%'.$term.'%')->get();

                        //foreach ($bookinghotel as $b) {

                          //  echo $bookinghotel->hotel_name;

                        //}
                    ?>

                    <br><br>

                @endforeach