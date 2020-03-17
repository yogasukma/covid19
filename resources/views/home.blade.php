@extends("layouts.app")

@section("content")
    <div class="stats">
        <div class="case --terkonfirmasi">
            <h2>{{ $patient->terkonfirmasi }}</h2>
            <span>Terkonfirmasi</span>
        </div>
        <div class="case --perawatan">
            <h2>{{ $patient->perawatan }}</h2>
            <span>Dalam Perawatan</span>
        </div>
        <div class="case --sembuh">
            <h2>{{ $patient->sembuh }}</h2>
            <span>Sembuh</span>
        </div>
        <div class="case --meninggal">
            <h2>{{ $patient->meninggal }}</h2>
            <span>Meninggal</span>
        </div>
    </div>


    <div class="kemkes">
        Info Kementrian Kesehatan &raquo; <a href="{{ $kemkes->link . "?src=covid.fullstac.id" }}" target="_blank">{{ $kemkes->title }}</a>
    </div>

    <div class="subscribe">
        <p>Dapatkan pembaharuan setiap ada perubahan data / jumlah pasien di inbox email anda</p>
        <input type="email" name="contact" required placeholder="Ketik email anda disini">
        <input type="submit" value="subscribe">

        <p>

            Kamu juga bisa akses update berita terbaru via RSS &raquo; <a href="/feed" style="color: yellow">Link RSS</a> 
        </p>
    </div>

    <div class="news-wrapper">
        <h3>Berita terbaru dari daerah terkait Covid-19 (corona)</h3>
        <div class="news">
            @foreach($news as $regional => $items)
                <div class="items">
                    <h4>{{ $regional }}</h4>
                    <ul>
                        {{-- @TODO: need better way to limit news --}}
                        @foreach(collect($items)->take(5) as $item)
                            <li>
                                <span>{{ $item->source }} &bull; {{ $item->date }}</span>
                                <a target="_blank" href="{{ $item->link . "?src=covid.fullstack.id" }}"> {{ $item->title }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

    <div class="disclaimer">
        <strong>Catatan</strong>
        <ul>
            <li>Terakhir diperbarui <strong>{{ $patient->last_updated }}</strong></li>
            <li>Data jumlah kasus diambil dari kawalcovid19.id</li>
            <li>Berita dan informasi diambil dari media terkait</li>
            <li>kawalcovid19.id menggunakan data dari penginputan kontributor yang bisa jadi tidak menggambarkan kejadian real time sebenarnya</li>
            <li>Data lebih lengkap bisa dilihat disini <a href="https://kcov.id/daftarpositif" target="_blank">https://kcov.id/daftarpositif</a>
        </ul>
    </div>
@endsection

@section("js")
<script>
    $("input[type='submit']").on("click", function() {
        $.post('subscribe', {"contact": $("input[type='email']").val()})
            .fail(function(response) {
                alert(response.responseJSON.contact[0]);
                $("input[type='email']").focus();
            })
            .then(function(response) {
                alert(response);
            });
    });

    if ($(window).width() > 960) {
        $('.news').masonry({
            // options
            itemSelector: '.items',
            gutter: 15
        });
    }
</script>
@endsection