<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Models\Database;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class CustomerController extends BaseController
{
    private $db;
    private $customer;

    public function __construct()
    {
        parent::__construct();
        $this->db = new Database();
        $this->customer = new Customer();
    }

    public function index()
    {
        $customer = $this->customer->get();
        return $this->view('customer', ['users' => $customer]);
    }

    public function create()
    {
        $compare2Array = array_diff_ukey($_POST, ['firstname', 'lastname', 'username', 'password', 'email', 'phone', 'address', 'dob'], function ($key1, $key2) {
            if ($key1 == $key2)
                return 0;
            else if ($key1 > $key2)
                return 1;
            else
                return -1;
        });
        if (!isset($_POST['email'], $_POST['username'], $_POST['password'])) {
            return 404;
        }
        if (isset($compare2Array) && $compare2Array != null) {
            return 404;
        }
        if ($_POST['password'] != $_POST['password_confirm']) {
            return 404;
        }

        $_POST['password'] = hash('sha256', $_POST['password']);
        $_POST['created_at'] = date("Y-m-d H:i:s");
        $_POST['role_id'] = 2;
        unset($_POST['password_confirm']);
        echo $this->customer->create($_POST);
    }
    public function update()
    {
        $get_row_database = $this->customer->first(['id' => $_POST['id']]);
        $compare2Array = array_diff_ukey($_POST, ['firstname', 'lastname', 'username', 'password', 'email', 'phone', 'address', 'dob'], function ($key1, $key2) {
            if ($key1 == $key2)
                return 0;
            else if ($key1 > $key2)
                return 1;
            else
                return -1;
        });
        if (!isset($_POST['email'], $_POST['username'], $_POST['password'])) {
            return 404;
        }
        if (isset($compare2Array) && $compare2Array != null) {
            return 404;
        }
        if (isset($_POST['password'], $_POST['password_confirm'])) {
            $_POST['password'] = hash('sha256', $_POST['password']);
            unset($_POST['password_confirm']);
        } else {
            $_POST['password'] = $get_row_database->password;
        }

        $_POST['updated_at'] = date("Y-m-d H:i:s");
        $_POST['role_id'] = 2;
        // var_dump($_POST);
        echo $this->customer->update($_POST);
    }

    public function delete($id)
    {
        echo $this->customer->delete(['id' => $id]);
    }


    public function jsonData()
    {
        $data_get = $this->customer->parseJsonData();
        $data = [];
        foreach ($data_get as $value) {
            array_push($data, [
                $value->id,
                $value->username,
                $value->firstname,
                $value->lastname,
                $value->dob,
                $value->email,
                $value->phone,
                $value->address,
                $value->created_at,
                $value->updated_at,
                $value->order_count,
                $value->total_spend
            ]);
        }
        echo json_encode(['data' => $data]);
    }

    public function export()
    {
        $data = $this->customer->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Tài khoản');
        $sheet->setCellValue('C1', 'Họ');
        $sheet->setCellValue('D1', 'Tên');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Ngày sinh');
        $sheet->setCellValue('G1', 'Số điện thoại');
        $sheet->setCellValue('H1', 'Địa chỉ');
        $sheet->setCellValue('I1', 'Ngày tạo');
        $sheet->setCellValue('J1', 'Ngày cập nhật');
        $numRow = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $numRow, $row->id);
            $sheet->setCellValue('B' . $numRow, $row->username);
            $sheet->setCellValue('C' . $numRow, $row->firstname);
            $sheet->setCellValue('D' . $numRow, $row->lastname);
            $sheet->setCellValue('E' . $numRow, $row->email);
            $sheet->setCellValue('F' . $numRow, date('d-m-Y', strtotime($row->dob)));
            $sheet->setCellValue('G' . $numRow, $row->phone);
            $sheet->setCellValue('H' . $numRow, $row->address);
            $sheet->setCellValue('I' . $numRow, date('d-m-Y h:i:s', strtotime($row->created_at)));
            $sheet->setCellValue('J' . $numRow, date('d-m-Y h:i:s', strtotime($row->updated_at)));
            $numRow++;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
