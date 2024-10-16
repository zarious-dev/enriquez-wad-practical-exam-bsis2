<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION PAGE</title>
</head>

<body>
    <h1>TRANSACTION PAGE</h1>
    <div>ID: {{ $transaction->id }}</div>
    <div>Transaction Title: {{ $transaction->transaction_title }}</div>
    <div>Description: {{ $transaction->description }}</div>
    <div>Status: {{ $transaction->status }}</div>
    <div>Total Amount: {{ $transaction->total_amount }}</div>
    <div>Transaction Number: {{ $transaction->transaction_number }}</div>
    <div>Timestamp: {{ $transaction->timestamp }}</div>

    <form action="{{ route('editTransaction', ['id' => $transaction->id]) }}" method="GET">
        @method('GET')
        <button type="submit">Edit Transaction</button>
    </form>

    <form action="{{ route('deleteTransaction', ['id' => $transaction->id]) }}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete Transaction</button>
    </form>

    <form action="{{ route('showAllTransactions') }}" method="GET">
        @method('GET')
        <button type="submit">Back to Transactions</button>
    </form>  
</body>

</html>