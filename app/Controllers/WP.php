<?php

namespace App\Controllers;
use App\Models\WPModel;

class WP extends BaseController
{

    public function viewHasil()
    {
        $WP = new WPModel();
        $dataWP = $WP->viewHasil();
        $data = array("dataWP" => $dataWP);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('WP/ViewHasil',$data);
        echo View('AdminFooter');
    }
    
}