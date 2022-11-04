<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paypal payment and manage transactions</title>

    <!-- Include the dataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>

    <center>
        <div class="transactionsTableDev">
        <table id="transactionsTable" class="display" style="text-align:center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Word</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($words as $word)
                    <tr>
                        <td>{{ $word->id }}</td>
                        <td>{{ $word->word }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Word</th>
                </tr>
            </tfoot>
        </table>
    </div>

    </center>


    <!-- Include the JQuery liberary -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

    <!-- Include the dataTables -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#transactionsTable').DataTable();
        });
    </script>
</body>

</html>
