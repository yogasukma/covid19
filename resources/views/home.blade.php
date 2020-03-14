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

    <div class="subscribe" style="display: none">
        <p>Dapatkan pembaharuan setiap ada perubahan data / jumlah pasien di inbox email anda</p>
        <form method="post">
            <input type="email" name="contact" required placeholder="Ketik email anda disini">
            <input type="submit" value="subscribe">
        </form>
    </div>

    <div class="disclaimer">
        <strong>Catatan</strong>
        <ul>
            <li>Terakhir diperbarui <strong>{{ $patient->last_updated }}</strong></li>
            <li>Data diambil dari kawalcovid19.id</li>
            <li>Sebagian besar pasien tidak diketahui berada di provinsi ataupun cluster apa</li>
        </ul>
    </div>
@endsection