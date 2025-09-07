<h2>Sales Report: <?php echo $date_from; ?> - <?php echo $date_to; ?></h2>
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
        <?php foreach ($sales_data as $sale): ?>
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