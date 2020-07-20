<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\LogoutController;
use App\Controllers\CustomerController;
use App\Controllers\DashboardController;
use App\Controllers\ErrorController;
use App\Controllers\LoginController;
use App\Controllers\ProductController;
use App\Controllers\StatController;
use App\Controllers\TransactionController;
use App\Seeds\CustomerSeeder;
use App\Seeds\ProductSeeder;
use App\Seeds\TransactionSeeder;

class Route
{
    private $login_controller;
    private $logout_controller;
    private $dashboard_controller;
    private $customer_controller;
    private $product_controller;
    private $stat_controller;
    private $error_controller;
    private $transaction_controller;
    private $customer_seeder;
    private $product_seeder;
    private $transaction_seeder;

    public function __construct()
    {
        $this->login_controller = new LoginController();
        $this->logout_controller = new LogoutController();
        $this->dashboard_controller = new DashboardController();
        $this->customer_controller = new CustomerController();
        $this->product_manager = new ProductController();
        $this->stat_controller = new StatController();
        $this->error_controller = new ErrorController();
        $this->transaction_controller = new TransactionController();
        $this->customer_seeder = new CustomerSeeder();
        $this->product_seeder = new ProductSeeder();
        $this->transaction_seeder = new TransactionSeeder();
    }


    public function index()
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        $path = isset($uri['path']) ? $uri['path'] : '';
        $query = isset($uri['query']) ? $uri['query'] : '';

        if ($path === '/login') {
            $this->login_controller->checkLogin();
        }
        if ($this->login_controller->loggedIn() == false) {
            $this->dashboard_controller->index();
        }

        $paths = explode("/", $path);
        $first =
            isset($paths[1]) ? $paths[1] : "";
        $second =
            isset($paths[2]) ? $paths[2] : "";
        $third = isset($paths[3]) ? $paths[3] : "";

        if ($path === '/') {
            if ($second === '') {
                return
                    $this->dashboard_controller->index();
            }
        }

        if ($first == "dashboard") {
            switch ($second) {
                case 'get_week_stats':
                    return $this->dashboard_controller->getWeekStat();
                case 'theme':
                    return $this->dashboard_controller->setTheme($third);
            }
        }

        if ($first == "logout") {
            switch ($second) {
                case '':
                    return $this->logout_controller->logout();
            }
        }

        if ($first == "product_manager") {
            switch ($second) {
                case '':
                    return $this->product_manager->index();
                case 'create':
                    return $this->product_manager->create();
                case 'update':
                    return $this->product_manager->update();
                case 'delete':
                    $id = $third;
                    return $this->product_manager->delete($id);
                case 'json_data':
                    return $this->product_manager->jsonData();
                case 'export':
                    return $this->product_manager->export();
            }
        }


        if ($first == "customer_manager") {
            switch ($second) {
                case '':
                    return $this->customer_controller->index();
                case 'create':
                    return $this->customer_controller->create();
                case 'update':
                    return $this->customer_controller->update();
                case 'delete':
                    $id = $third;
                    return $this->customer_controller->delete($id);
                case 'json_data':
                    return $this->customer_controller->jsonData();
                case 'export':
                    return $this->customer_controller->export();
            }
        }

        if ($first == "transaction") {
            switch ($second) {
                case '':
                    return $this->transaction_controller->index();
                case 'json_data':
                    return
                        $this->transaction_controller->jsonData();
            }
        }


        if ($first == "stats") {
            switch ($second) {
                case '':
                    return $this->stat_controller->index();
                case 'percent_chart':
                    return
                        $this->stat_controller->percentChart();
                case 'profit_chart':
                    return $this->stat_controller->profitChart();
            }
        }

        if ($first == "seed") {
            switch ($second) {
                case 'customer':
                    return $this->customer_seeder->index();
                case 'product':
                    return $this->product_seeder->index();
                case 'transaction':
                    return $this->transaction_seeder->index();
            }
        }
        return
            $this->error_controller->index();
    }
}
