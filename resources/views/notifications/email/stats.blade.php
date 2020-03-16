<p>Berikut update terbaru jumlah kasus COVID-19 di Indonesia.</p>

<ul>
@foreach(json_decode($notification->data) as $diff)
    <li>{{ $diff }}</li>
@endforeach
</ul>

<p>Selalu jaga kebersihan, jaga jarak, jangan lupa cuci tangan ya</p>

<p>ps: kamu dapat email ini karena sudah subscribe di <a href="https://covid.fullstack.id">covid.fullstack.id</a>. informasi lebih lanjut terkait subscription ini mention ke Twitter @yogasukma</p>