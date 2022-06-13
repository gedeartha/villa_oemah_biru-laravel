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

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-LNUBf50Yu-0srrNC"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="bg-tertiary">
    <div>
        {{ $slot }}
    </div>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.7/dist/datepicker.js"></script>
</body>

</html>
