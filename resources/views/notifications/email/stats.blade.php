@extends("notifications.email.layouts.app")

@section("content")
  <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
      <tr>
        <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
          <div style="font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:25px;text-align:left;color:#000000;">
            <p>Berikut update terbaru jumlah kasus COVID-19 di Indonesia.</p>
            <ul>
            @foreach($data as $diff)
                <li>{{ $diff }}</li>
            @endforeach
            </ul>
            <p>Selalu jaga kebersihan, jaga jarak dan jangan lupa cuci tangan ya</p>
            <p>Baca juga berita dan informasi lain terkait kasus Covid-19 (Corona) dari berbagai daerah di Indonesia pada <a href="https://covid.fullstack.id?source=email">website Waspada Covid-19</a></p> 
          </div>
        </td>
      </tr>
      <tr>
        <td align="left" vertical-align="middle" style="font-size:0px;padding:10px 25px;word-break:break-word;">
          <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
            <tr>
              <td align="center" bgcolor="#38ada9" role="presentation" style="border:none;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px;background:#38ada9;" valign="middle">
                <a href="https://covid.fullstack.id?source=email" style="display:inline-block;background:#38ada9;color:#ffffff;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;mso-padding-alt:0px;border-radius:3px;" target="_blank"> Website Waspada Covid-19 &raquo; </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
@endsection