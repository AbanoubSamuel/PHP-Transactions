<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = new Transaction();
        $transactions = $transactions->get();

        return view("transactions")->with('transactions', $transactions); // -> resources/views/transactions.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (count($request->all()) > 0) {
            $validatedData = $request->validate([
                'payment_id' => 'required|max:255',
                'amount' => 'required',
                'currency' => 'required',
                'status' => 'required',
            ]);

            $transaction = new Transaction();
            $transaction->payment_id = $request->payment_id;
            $transaction->amount = $request->amount;
            $transaction->currency = $request->currency;
            $transaction->status = $request->status;

            // Saving to database;
            if ($transaction->save()) {
                $data = [
                    'success' => 'Transaction saved. (تم حفظ العملية بنجاح !)',
                ];
                return $data;
            } else {
                $data = [
                    'error' => 'Transaction NOT saved! (لم يتم حفظ العملية بنجاح !)',
                    'success' => false,
                ];
                return $data;
            }
        } else {
            $data = [
                'error' => 'Transaction NOT saved! (لم يتم حفظ العملية بنجاح !)',
                'success' => false,
            ];
            return $data;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
