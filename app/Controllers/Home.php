<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('Home');
        echo View('AdminFooter');
    }



}