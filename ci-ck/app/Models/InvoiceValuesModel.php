<?php namespace App\Models;

use CodeIgniter\Model;

class InvoiceValuesModel extends Model
{
    
    public function getInvoiceValues()
    {

        $location_id = 1;
                                                                                                                                                                                                        
        $sp = "CALL GetInvoiceValues($location_id)";       
        
        $result = $this->db->query($sp); 
        
        return $result->getResult();

    }
    
}