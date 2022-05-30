<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        Villa Oemah Biru Bali
    </title>
    <link rel="icon" href="/image/logo.svg" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-background">

    <x-navigation />

    <div class="ml-64 p-5">
        {{ $slot }}
    </div>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>
