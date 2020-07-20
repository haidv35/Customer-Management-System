<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Database;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ProductController extends BaseController
{
    private $db;
    private $product;

    public function __construct()
    {
        parent::__construct();
        $this->db = new Database();
        $this->product = new Product();
    }

    public function index()
    {
        $product = $this->product->get();
        return $this->view('product', ['product' => $product]);
    }

    public function create()
    {
        $compare2Array = array_diff_ukey($_POST, ['type', 'name', 'price', 'des'], function ($key1, $key2) {
            if ($key1 == $key2)
                return 0;
            else if ($key1 > $key2)
                return 1;
            else
                return -1;
        });
        if (!isset($_POST['type'], $_POST['name'], $_POST['price'])) {
            return 404;
        }
        if (isset($compare2Array) && $compare2Array != null) {
            return 404;
        }
        echo $this->product->create($_POST);
    }
    public function update()
    {
        $get_row_database = $this->product->first(['id' => $_POST['id']]);
        $compare2Array = array_diff_ukey($_POST, ['type', 'name', 'price', 'des'], function ($key1, $key2) {
            if ($key1 == $key2)
                return 0;
            else if ($key1 > $key2)
                return 1;
            else
                return -1;
        });
        if (!isset($_POST['type'], $_POST['name'], $_POST['price'])) {
            return 404;
        }
        if (isset($compare2Array) && $compare2Array != null) {
            return 404;
        }
        echo $this->product->update($_POST);
    }

    public function delete($id)
    {
        echo $this->product->delete(['id' => $id]);
    }


    public function jsonData()
    {
        $data_get = $this->product->get();
        $data = [];
        foreach ($data_get as $value) {
            array_push($data, [
                $value->id,
                $value->type,
                $value->name,
                $value->price,
                $value->des
            ]);
        }
        echo json_encode(['data' => $data]);
    }

    public function export()
    {
        $data = $this->product->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Loại');
        $sheet->setCellValue('C1', 'Tên');
        $sheet->setCellValue('D1', 'Giá');
        $sheet->setCellValue('E1', 'Mô tả');
        $numRow = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $numRow, $row->id);
            $sheet->setCellValue('B' . $numRow, $row->type);
            $sheet->setCellValue('C' . $numRow, $row->name);
            $sheet->setCellValue('D' . $numRow, $row->price);
            $sheet->setCellValue('E' . $numRow, $row->des);
            $numRow++;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
