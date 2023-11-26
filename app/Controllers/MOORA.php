<?php

namespace App\Controllers;
use App\Models\MOORAModel;

class MOORA extends BaseController
{

    public function viewNormalisasi()
    {
        $MOORA = new MOORAModel();
        $dataMOORA = $MOORA->viewMatriksTernormalisasi();
        $data = array("dataMOORA" => $dataMOORA);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('MOORA/ViewNormalisasi',$data);
        echo View('AdminFooter');
    }
    public function viewNilaiOptimasi()
    {
        $MOORA = new MOORAModel();
        $dataMOORA = $MOORA->viewNilaiOptimasi();
        $data = array("dataMOORA" => $dataMOORA);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('MOORA/ViewNilaiOptimasi',$data);
        echo View('AdminFooter');
    }
    public function viewHasil()
    {
        $MOORA = new MOORAModel();
        $dataMOORA = $MOORA->viewHasil();
        $data = array("dataMOORA" => $dataMOORA);
        echo View('AdminHeader');
        echo View('AdminNav');
        echo View('MOORA/ViewHasil',$data);
        echo View('AdminFooter');
    }
    
}