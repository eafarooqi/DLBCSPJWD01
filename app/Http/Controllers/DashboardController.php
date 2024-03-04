<?php

namespace App\Http\Controllers;

use App\Models\genre;

class DashboardController extends AdminController
{
    public function home()
    {
        View()->share( 'headTitle', $this->headTitle = 'Dashboard');
        return view('templates.dashboard.default');
    }
}
