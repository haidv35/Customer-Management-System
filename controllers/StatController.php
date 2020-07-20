<?php

namespace App\Controllers;

use App\Models\Stat;
use App\Models\Transaction;

class StatController extends BaseController
{
    private $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction();
        parent::__construct();
    }

    public function index()
    {
        return $this->view('stat');
    }
    public function percentChart()
    {
        $transaction = $this->transaction->get();
        $data = array();
        $total = 0;
        foreach ($transaction as $row) {
            $total += 1;
            if (array_key_exists($row->name, $data)) {
                $data[$row->name] += 1;
            } else {
                $data[$row->name] = 1;
            }
        }
        foreach ($data as $key => $row) {
            $data[$key] = round(($row / $total) * 100, 2);
        }
        echo json_encode(['data' => $data]);
    }

    public function profitChart()
    {
        $profit = $this->transaction->getProfit();
        $data = array(
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
            '6' => 0,
            '7' => 0,
            '8' => 0,
            '9' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0,
        );
        foreach ($profit as $row) {
            if (array_key_exists($row->MONTH, $data)) {
                $data[$row->MONTH] += $row->TOTAL;
            }
        }
        echo json_encode(['data' => $data]);
    }
}
