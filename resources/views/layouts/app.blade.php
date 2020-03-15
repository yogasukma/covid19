<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:url" content="https://covid.fullstack.id" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Waspada Covid-19!" />
    <meta property="og:description" content="Monitoring jumlah kasus Covid-19 terbaru" />
    <meta property="og:image" content="preview.png" />
    <meta name="twitter:title" content="Waspada Covid-19!">
    <meta name="twitter:description" content="Monitoring jumlah kasus Covid-19 terbaru">
    <meta name="twitter:image" content="preview.png">
    <meta name="twitter:card" content="summary_large_image">

    <title>Waspada Covid-19</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Waspada Covid-19</h1>
        <p>Monitoring jumlah korban Covid-19 di Indonesia</p>
        <p>Sumber data: <a href="https://kawalcovid19.id" target="_blank">kawalcovid19.id</a></p>
    </header>

    <section id="content">
        @yield("content")
    </section>

    <footer>
        Just another project by <a href="http://yogasukma.web.id" target="_blank">Yoga Sukma</a> - 
        (<a href="https://github.com/yogasukma/covid19" target="_blank">source code</a>)
    </footer>

    <script src="jquery.js"></script>
    @yield("js")
</body>
</html>
