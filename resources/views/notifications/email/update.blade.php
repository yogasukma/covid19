<p>Berikut update terbaru jumlah kasus COVID-19 di Indonesia.</p>

<ul>
@foreach(json_decode($notification->data) as $diff)
    <li>{{ $diff }}</li>
@endforeach
</ul>

<p>Selalu jaga kebersihan, jaga jarak, jangan lupa cuci tangan ya</p>