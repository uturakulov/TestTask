<?php

namespace App\Http\Services;

use App\Models\Employee;
use App\Models\Portfolio;
use App\Http\Services\HomeInterface;
use App\Models\Pricing;

class HomeService implements HomeInterface
{
    public function getEmployees()
    {
        $employees = Employee::all();

        return $employees;
    }

    public function getPortfolios()
    {
        $portfolios = Portfolio::all();

        return $portfolios;
    }

    public function getPricing()
    {
        $pricings = Pricing::all();

        return $pricings;
    }
}
