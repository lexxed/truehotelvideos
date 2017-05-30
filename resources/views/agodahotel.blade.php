                <h1>agoda hotels</h1>

                @foreach ($agodahotel as $ahotel)

                    Agoda info<br>
                    id: {{ $ahotel->tel_id }}<br>
                    name: {{ $ahotel->hotel_name }}<br>
                    country: {{ $ahotel->country }}<br>
                    city: {{ $ahotel->city }}<br>
                    url: <a href="https://www.agoda.com{{ $ahotel->url }}">url</a>



                    <br><br>

                @endforeach