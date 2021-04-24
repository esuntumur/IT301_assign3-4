<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name',"it301-lab5-laravel")}}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container mx-0">
        <div class="row">
            <div class="col-3 mt-3 ps-4">
                <!-- lab5 -->
                <br><br><br><br>
                <h3>Лаб-5</h3>
                <a class="navbar-brand" href="student">STUDENTS</a>
                <br>
                <a class="navbar-brand" href="search">SEARCH</a>
                <!-- lab6 -->
                <br><br><br><br>
                <h3>Лаб-6</h3>
                <a class="navbar-brand" href="account">ACCOUNT</a>
                <br>
                <a class="navbar-brand" href="transaction">TRANSACTION</a>
            </div><br>
            <div class="col-9">@yield('content')</div>
        </div>
    </div>
</body>

</html>