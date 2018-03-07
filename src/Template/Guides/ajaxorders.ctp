<div class="container-fluidxx">
<table class="table table-bordered table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= __('Id'); ?></th>
            <th><?= __('Order Date'); ?></th>
            <th><?= __('Company Name1'); ?>
                <br/><?= __('Product Detail'); ?></th>
            <th><?= __('Product Category'); ?>
                <br/><?= __('Product Name'); ?></th>
            <th><?= __('Order No'); ?>
                <br/><?= __('Sales Staff'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $order): ?>
        <tr>
            <td align="right"><?= $this->Number->format($order->id) ?></td>
            <td><?= h($order->order_date) ?></td>
            <td><?= h($this->my->trunc($order->company_name1)) ?>
                <br/><?= $this->my->trunc($order->product_detail,25) ?></td>
            <td><?= $this->my->trunc($order->product_category,25) ?>
                <br/><?= $this->my->trunc($order->product_name,25) ?></td>
            <td><?= $order->order_no .'-'.$order->order_detail_no ?>
                <br/><?= $this->my->trunc($order->sales_staff) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>