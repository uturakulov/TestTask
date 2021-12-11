<?php

namespace App\Http\Services;

interface HomeInterface
{
  public function getEmployees();
  public function getPortfolios();
  public function getPricing();
}
