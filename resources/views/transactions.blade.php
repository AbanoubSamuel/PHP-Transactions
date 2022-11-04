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
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Edited By</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->payment_id }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->currency }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Edited Date</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <br/>
    <br/>

    <div class="transactionsTableDev">
        <script src="https://m7ukpairpm.cloudtables.io/loader/031e0850-5ac9-11ed-8a0f-d73d4625c617/table/d"
                data-apiKey="JqqtKXWhchwuk0jzHk16i268"
                data-clientId="SS-TransactionsTable" >
        </script>

    </div>

    </center>


    <!-- Include the JQuery liberary -->
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>

    <!-- Include the dataTables -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#transactionsTable').DataTable();
            /*
            // var transactionData = [
            //     transaction.id,
            //     transaction.amount.value,
            //     transaction.amount.currency_code,
            //     transaction.status,
            // ];

            // var transactionData = [
            //     'id',
            //     'amount.value',
            //     'amount.currency_code',
            //     'status',
            //     'created_at'
            // ];

            var transactionData = {
                'payment_id': 'id',
                'amount': 'value',
                'currency': 'currency_code',
                'status': 'status',
                'created_at': 'created_at'
            };

            setTimeout(() => {

                var table = $('#ct-031e0850-5ac9-11ed-8a0f-d73d4625c617').DataTable();
                table.ajax.data = {includeInactive: true};
                table.row.add(transactionData).draw();
                // table.ajax.reload();

                // var table = $('#ct-031e0850-5ac9-11ed-8a0f-d73d4625c617').dataTable();
                // table.fnAddData(transactionData);

                console.log('added ...');

            }, 10000);
            */
        });
    </script>
</body>

</html>
