<?php namespace App\Models;

use CodeIgniter\Model;

class InvoicesModel extends Model
{
    
    public function GetInvoiceValues()
    {  
        $location_id = 1;
        $start_date = '1970-01-01';
        $end_date = '2020-01-01';
        $status = 'draft';
                                                                                                                                                                                                        
        $sp = "CALL GetInvoices($location_id, '$start_date', '$end_date', '$status')";       
        
        $result = $this->db->query($sp); 
        
        return $result->getResult();
    }
    
}