<?php
class Model_Report_Sales2 extends Model_Report_Base {
    
    public function __construct()
    {
        parent::__construct();
        $this->_name = 'sales2';
    }
    
    public function generate($date_from = null, $date_to = null)
    {
        // Устанавливаем даты по умолчанию
        $date_from = $date_from ?: date('Y-m-01');
        $date_to = $date_to ?: date('Y-m-d');
        $data = date('Y-m-d');
        $total_amount = 25;
        
       /*  $data = DB::select()
            ->from('sales')
            ->where('date', 'BETWEEN', array($date_from, $date_to))
            ->execute()
            ->as_array(); */
			
        
        $this->set('sales_data', $data);
        $this->set('date_from', $date_from);
        $this->set('date_to', $date_to);
      //  $this->set('total_amount', array_sum(array_column($data, 'amount')));
        $this->set('total_amount', $total_amount);
        
        return $this;
    }
}
