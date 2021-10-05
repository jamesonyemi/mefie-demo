<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ProjectCounterTrait;
use App\Traits\SubscriptionTrait;
use App\Http\Controllers\ReportController;

class HomeController extends Controller
{
    use ProjectCounterTrait, SubscriptionTrait;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        static::setSubscriptionPackageToBasicIfEmpty();
        return static::projectCounter('home');

    }

    

}
