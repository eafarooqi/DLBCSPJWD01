<?php

namespace App\Http\Controllers;

class MasterController extends Controller
{
    protected string $pageTitle = '';
    protected string $headTitle = '';
    protected string $activeApp = '';

    public function __construct() {}

    /**
     * Function to load common data which will be available
     * to all views.
    */
    protected function loadDefaultData(array $params=[])
    {
        // setting predefined global variables
        View()->share( 'pageTitle', $this->pageTitle );
        View()->share( 'headTitle', $this->headTitle );
        View()->share( 'activeApp', $this->activeApp );

        // setting global variables requested from child controllers
        if($params) {
            foreach ($params as $key => $param){
                View()->share( $key, $param);
            }
        }
    }
}
