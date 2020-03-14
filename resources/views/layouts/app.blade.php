<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        (<a href="https://gitlab.com/yogasukma/covid19" target="_blank">source code</a>)
    </footer>

    <script src="jquery.js"></script>
    @yield("js")
</body>
</html>