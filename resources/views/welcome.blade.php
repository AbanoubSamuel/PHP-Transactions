<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome To Task</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <center>
        <h1>
            Welcome ...
        </h1>

        <p class="taskLink">
            <a href="{{ route('task.paypalPayment') }}" target="_blank">Paypal Payment and manage transactions</a>
        </p>

        <br />
        <br />

        <p class="taskLink">
            <a href="{{ route('task.autocomplete') }}" target="_blank">Autocomplete text box with manager</a>
        </p>

    </center>
</body>

</html>
