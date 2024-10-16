<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function showAllTransactions()
    {
        $transactions = Transaction::orderBy('updated_at', 'desc')->get();
        return view('transactions', ['transactions' => $transactions]);
    }

    public function createTransaction()
    {
        return view('create-transaction');
    }

    public function storeTransaction(Request $request){
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|string|max:50',
            'transaction_number' => 'required|string|max:50'
        ]);

        $transaction = new Transaction();
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();

        return redirect()->route('showAllTransactions');
    }

    public function viewTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('transaction', ['transaction' => $transaction]);
    }

    public function editTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        return view('edit-transaction', ['transaction' => $transaction]);
    }

    public function updateTransaction(Request $request){
        $validated = $request->validate([
            'transaction_title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:10',
            'total_amount' => 'required|string|max:50',
            'transaction_number' => 'required|string|max:50'
        ]);

        $transaction = Transaction::find($request->id);
        $transaction->transaction_title = $validated['transaction_title'];
        $transaction->description = $validated['description'];
        $transaction->status = $validated['status'];
        $transaction->total_amount = $validated['total_amount'];
        $transaction->transaction_number = $validated['transaction_number'];
        $transaction->save();

        return redirect()->route('viewTransaction', ['id' => $transaction->id])->with('success', 'transaction updated successfully');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        if ($transaction)
        {
            $transaction->delete();
        }

        return redirect()->route('showAllTransactions')->with('success', 'transaction deleted successfully');

    }
}