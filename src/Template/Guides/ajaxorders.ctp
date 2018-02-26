<?php //debug($list);?>
<?php //debug($list->toArray());?>
<div class="container-fluid">
<table class="table table-bordered table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= __('Id'); ?></th>
            <!-- <th><?= __('Company Code'); ?></th> -->
            <th><?= __('Company Name1'); ?></th>
            <th><?= __('Order No'); ?></th>
            <th><?= __('Order Date'); ?></th>
            <th><?= __('Product Name'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $order): ?>
        <tr>
            <td align="right"><?= $this->Number->format($order->id) ?></td>
            <!-- <td><?= h($order->company_code) ?></td> -->
            <td><?= h($this->my->trunc($order->company_name1)) ?></td>
            <td><?= $order->order_no .'-'.$order->order_detail_no ?></td>
            <td><?= h($order->order_date) ?></td>
            <td><?= $this->my->trunc($order->product_name) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>