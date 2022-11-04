<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Paypal payment and manage transactions</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <center>
        <h1>
            Welcome ...
        </h1>

        <form action="{{ route('payment.make') }}" method="get">
            {{-- 
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sb-xv2tk20575729_api1.business.example.com">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="amount" value="50">
            <input type="hidden" name="first_name" id="first_name" value="Peter">
            <input type="hidden" name="last_name" id="last_name" value="Kostandy">
            <input type="hidden" name="address1" value="Assuit">
            <input type="hidden" name="address2" value="Assuit">
            <input type="hidden" name="email" value="peto.barkar@hotmail.com">
            <input type="hidden" name="country" value="Egypt">

            <input type="hidden" name="return" value="{{ route('payment.success') }}">
            <input type="hidden" name="cancel_return" value="{{ route('payment.cancel') }}"> --}}

            <input id="credit_number" type="text" name="credit_number" class="credit_number"
                placeholder="Enter the credit number" />

            <input id="submit-btn" type="submit" value="Submit" />
        </form>


        <a href="{{ route('payment.make') }}" class="btn btn-primary mt-3">Pay $50 via Paypal</a>


        <br />
        <br />

        <input id="credit_num" type="text" name="credit_num" class="credit_number"
            placeholder="Enter the credit number" />

        <br /><br />

        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>

    </center>

    <!-- Include the JQuery liberary -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
