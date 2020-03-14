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

    <div class="subscribe">
        <p>Dapatkan pembaharuan setiap ada perubahan data / jumlah pasien di inbox email anda</p>
        <input type="email" name="contact" required placeholder="Ketik email anda disini">
        <input type="submit" value="subscribe">
    </div>

    <div class="disclaimer">
        <strong>Catatan</strong>
        <ul>
            <li>Terakhir diperbarui <strong>{{ $patient->last_updated }}</strong></li>
            <li>Data diambil dari kawalcovid19.id</li>
            <li>kawalcovid19.id menggunakan data dari penginputan kontributor yang bisa jadi tidak menggambarkan kejadian real time sebenarnya</li>
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
</script>
@endsection