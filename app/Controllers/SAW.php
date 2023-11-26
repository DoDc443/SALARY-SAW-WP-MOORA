<?php

namespace App\Controllers;
use App\Models\SAWModel;

class SAW extends BaseController
{
    public function viewMatriksTernormalisasi()
    {
        $SAW = new SAWModel();
        $dataSAW = $SAW->viewMatriksTernormalisasi();
        $data = array("dataSAW" => $dataSAW);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('SAW/ViewMatriksTernormalisasi',$data);
        echo View('AdminFooter');
    }

    public function viewHasil()
    {
        $SAW = new SAWModel();
        $dataSAW = $SAW->viewHasil();
        $data = array("dataSAW" => $dataSAW);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('SAW/ViewHasil',$data);
        echo View('AdminFooter');
    }
    public function viewRanking()
    {
        $SAW = new SAWModel();
        $dataSAW = $SAW->viewHasil();
        $data = array("dataSAW" => $dataSAW);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('SAW/ViewRanking',$data);
        echo View('AdminFooter');
    }



}