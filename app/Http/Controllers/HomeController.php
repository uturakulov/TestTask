<?php

namespace App\Http\Controllers;

use App\Http\Services\HomeService;
use App\Models\User;
use HomeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function callAndShow()
    {
        $service = new HomeService();

        $employees = $service->getEmployees();

        $portfolios = $service->getPortfolios();

        $pricing = $service->getPricing();

        return view('front.index', compact('employees', 'portfolios', 'pricing'));
    }

    public function contactUs(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->message = $request->message;
        $user->save();

        return redirect()->back()->with('message', 'Successfully sent');
    }
}
