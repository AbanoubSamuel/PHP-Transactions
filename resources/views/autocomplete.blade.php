<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Autocomplete textbox with manager</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <center>
        <h1>
            Welcome ...
        </h1>

        <form id="saveWordForm" class="frmSearch">
            <input id="autocomplete_text" type="text" name="autocomplete_text" class="autocomplete_text"  placeholder="Enter the any text"/>
            <div id="suggesstion-box"></div>

            <br/>
            <br/>

            <input id="submit-btn" type="submit" value="Submit" />
        </form>

    </center>

    <!-- Include the JQuery liberary -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

    <script src="{{ asset('js/ac.js') }}"></script>
</body>

</html>
