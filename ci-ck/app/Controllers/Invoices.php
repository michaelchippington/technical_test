<?php namespace App\Controllers;

use App\Models\InvoicesModel;
use CodeIgniter\Controller;

class Invoices extends BaseController
{
    public function index()
    {
        $model = new InvoicesModel();

        $data['invoices'] = $model->getInvoiceValues();
        
        echo view('invoices', $data);
    }


	//--------------------------------------------------------------------
                  
}
