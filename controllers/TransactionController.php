<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Models\Transaction;


class TransactionController extends BaseController
{
    private $transaction;

    public function __construct()
    {
        parent::__construct();
        $this->transaction = new Transaction();
    }

    public function index()
    {
        $transaction = $this->transaction->get();
        return $this->view('transaction', ['transaction' => $transaction]);
    }
    public function jsonData()
    {
        $transaction = $this->transaction->get();
        $data = [];
        foreach ($transaction as $row) {
            array_push($data, [
                $row->transaction_id,
                $row->username,
                $row->firstname . " " . $row->lastname,
                $row->name,
                $row->price,
                $row->quantity,
                $row->price * $row->quantity,
                $row->transaction_created_at,
            ]);
        }
        echo json_encode(['data' => $data]);
    }
}
