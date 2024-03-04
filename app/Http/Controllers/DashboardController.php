<?php

namespace App\Http\Controllers;

use App\Models\genre;

class DashboardController extends AdminController
{
    public function home()
    {

        genre::find(1);

        View()->share( 'headTitle', $this->headTitle = 'Dashboard');
        return view('templates.dashboard.default');
    }
}
