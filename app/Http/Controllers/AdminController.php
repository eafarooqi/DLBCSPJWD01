<?php

namespace App\Http\Controllers;

class AdminController extends MasterController
{
    protected string $pageTitle = '';
    protected string $headTitle = '';
    protected string $activeApp = 'default';

    public function __construct()
    {
        parent::__construct();

        // if user must verify his email before login
        if(config('auth.user_must_verify_email')) {
            $this->middleware(['verified']);
        }

        // loading default values
        $this->loadDefaultData();
    }
}
