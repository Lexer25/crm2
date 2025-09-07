<?php 
/*  "sales_data" => string(10) "2025-09-07"
    "date_from" => array(5) (
        "report" => string(5) "sales"
        "date_from" => string(10) "2025-09-01"
        "date_to" => string(10) "2025-09-07"
        "department" => string(5) "sales"
        "action" => string(7) "prepare"
    )
    "date_to" => string(10) "2025-09-07"
    "total_amount" => integer 25 */
	
	

// echo Debug::vars('1', $sales_data);//exit; 
// echo Debug::vars('2', $date_from);//exit; 
 // extract($date_from, EXTR_SKIP);
// echo Debug::vars('3', $date_to);//exit; 
// echo Debug::vars('4', $total_amount);//exit; 

// echo Debug::vars('21', $report);//exit;
// echo Debug::vars('22', $date_from);//exit;

?>
<h2>Sales Report: <?php echo Arr::get($date_from, 'date_from'); ?> - <?php echo $date_to; ?></h2>

<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		//echo Debug::vars('13', $sales_data);exit;
		foreach ($sales_data as $sale): ?>
        <tr>
            <td><?php echo $sale['date']; ?></td>
            <td><?php echo $sale['product']; ?></td>
            <td><?php echo $sale['amount']; ?></td>
            <td><?php echo $sale['price']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><strong>Total:</strong></td>
            <td><strong><?php echo $total_amount; ?></strong></td>
        </tr>
    </tfoot>
</table>