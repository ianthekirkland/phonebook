<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cstm.css') }}">
</head>
<body>
    <div id="app">
        <Myheader></Myheader>
        <div class="container container-min">
            <router-view></router-view>
        </div>
        <Myfooter></Myfooter>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>