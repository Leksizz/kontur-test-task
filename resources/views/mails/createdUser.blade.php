<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 text-center">
            <strong>Имя:</strong>
            <p class=" mt-4 mb-4" id="name">{{ $user->name }}</p>
        </div>
        <div class="col-sm-12 text-center">
            <strong>Телефон:</strong>
            <p class=" mt-4 mb-4" id="phone">{{ $user->phone->phone }}</p>
        </div>
        <div class="col-sm-12 text-center">
            <strong>"Электронная почта:</strong>
            <p class=" mt-4 mb-4" id="email">{{ $user->email }}</p>
        </div>
    </div>
</div>
</body>
</html>
