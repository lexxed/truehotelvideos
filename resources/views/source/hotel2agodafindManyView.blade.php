                @foreach ($hotels as $hotel)

                    {{ $hotel->hotelname }}<br>
                    hotels.agodaid:{{ $hotel->agodaid }}<br>
                    agodahotels.tel_id:{{ $hotel->agodahotel->tel_id }}<br>
                    {{ $hotel->agodahotel->rates_from }}<br>
                    

                @endforeach