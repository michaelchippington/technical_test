<?php namespace App\Controllers;

use App\Models\InvoiceValuesModel;
use CodeIgniter\Controller;

class InvoiceValues extends BaseController
{
    public function index()
    {
        $model = new InvoiceValuesModel();

        $data['invoices'] = $model->getInvoiceValues();
        
        echo view('invoicevalues', $data);
    }


	//--------------------------------------------------------------------
                  
}
