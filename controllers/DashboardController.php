<?php

namespace App\Controllers;

use App\Models\Dashboard;
use App\Models\Login;

class DashboardController extends BaseController
{
    private $dashboard;
    private $login_controller;

    public function __construct()
    {
        parent::__construct();
        $this->dashboard = new Dashboard();
        $this->login_controller = new LoginController();
    }

    public function getGeneralStat()
    {
        $data = array();
        $total_product_sold = ($this->dashboard->getTotalProductSold() != null) ? $this->dashboard->getTotalProductSold()->total : 0;
        $total_revenue = ($this->dashboard->getTotalRevenue() != null) ? $this->dashboard->getTotalRevenue()->total : 0;
        $total_customer = ($this->dashboard->getTotalCustomer() != null) ? $this->dashboard->getTotalCustomer()->total : 0;

        $data = array(
            'total_product_sold' => $total_product_sold,
            'total_revenue' => $total_revenue,
            'total_customer' => $total_customer,
        );
        return $data;
    }

    public function convert($data, &$new_data_day_of_week)
    {
        $first_day_of_week = date('Y-m-d', strtotime("this week"));
        $last_day_of_week = date('Y-m-d', strtotime("this week +6 days"));
        foreach ($data as $key => $value) {
            $convert_date = date('w', strtotime($value->created_at)) + 1;
            if (!array_key_exists($convert_date, $new_data_day_of_week)) {
                continue;
            }
            if (date('Y-m-d', strtotime($value->created_at)) < $first_day_of_week) {
                continue;
            }
            if (date('Y-m-d', strtotime($value->created_at)) > $last_day_of_week) {
                continue;
            }
            $new_data_day_of_week[$convert_date]++;
        }
    }

    public function getWeekStat()
    {
        $data = array();

        $data_day_of_week = [
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0,
            "6" => 0,
            "7" => 0,
            "1" => 0,
        ];
        $get_product_sold = $this->dashboard->getProductSold();
        $get_customer = $this->dashboard->getCustomer();

        $new_data_day_of_week = $data_day_of_week;
        $this->convert($get_product_sold, $new_data_day_of_week);
        array_push($data, array_values($new_data_day_of_week));

        $new_data_day_of_week = $data_day_of_week;
        $this->convert($get_customer, $new_data_day_of_week);
        array_push($data, array_values($new_data_day_of_week));
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        echo json_encode($data);
    }

    public function setTheme($theme = null)
    {
        if (isset($theme) && ($theme == 'black' || $theme == 'white')) {
            $_SESSION['theme'] = $theme;
            setcookie('THEME', $theme, 0, '/');
        }
    }

    public function index()
    {
        if ($this->login_controller->loggedIn()) {
            $data = $this->getGeneralStat();
            return $this->view('dashboard', $data);
        }
        return $this->view('login');
    }
}
