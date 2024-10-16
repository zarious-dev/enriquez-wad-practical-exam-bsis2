<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE TRANSACTION</title>
</head>
<body>
    <h1>CREATE TRANSACTIONS</h1>
    <form action="{{ route('storeTransaction') }}" method="POST">
        @method('POST')
        @csrf
        <label for="transaction_title">Transaction Title:</label>
        <input type="text" name="transaction_title" id="transaction_title" required><br>
        
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required><br>
       
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Successful">Successful</option>
            <option value="Declined">Declined</option>
        </select><br>
        
        <label for="total_amount">Total Amount:</label>
        <input type="number" name="total_amount" id="total_amount" required><br>
        
        <label for="transaction_number">Transaction Number:</label>
        <input type="number" name="transaction_number" id="transaction_number" required><br>

        <button type="submit">Create Transaction</button>
        
    <form action="{{ route('showAllTransactions') }}" method="GET">       
        <button type="submit">Back to Transactions</button>    
    </form>
    

</body>
</html>