<?php

namespace App\Http\Controllers;

class DashboardController extends AdminController
{
    public function home()
    {
        View()->share( 'headTitle', $this->headTitle = 'Dashboard');
        return view('templates.dashboard.default');
    }
}
