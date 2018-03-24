<h1 class="page-header"><?= __('Orders') ?></h1>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($vw_order->product_name) ?></h3>
    </div>
    <table class="table table-striped table-responsive text-nowrap">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($vw_order->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $vw_order->has('client') ? $this->Html->link($vw_order->client->client_name, ['controller' => 'Clients', 'action' => 'view', $vw_order->client->id]) : $vw_order->company_code ?></td>
        </tr>
        <tr>
            <td><?= __('Status Msg') ?></td>
            <td><?= h($vw_order->status_msg) ?></td>
        </tr>
        <tr>
            <td><?= __('Company Name1') ?></td>
            <td><?= h($vw_order->company_name1) ?></td>
        </tr>
        <tr>
            <td><?= __('Company Name2') ?></td>
            <td><?= h($vw_order->company_name2) ?></td>
        </tr>
        <tr>
        <tr>
            <td><?= __('Order Date') ?></td>
            <td><?= h($vw_order->order_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Orderym') ?></td>
            <td><?= h($vw_order->orderym) ?></td>
        </tr>
        <tr>
            <td><?= __('Delivery Date') ?></td>
            <td><?= h($vw_order->delivery_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Date') ?></td>
            <td><?= h($vw_order->sales_date) ?></td>
        </tr>
            <td><?= __('Order No') ?></td>
            <td><?= h($vw_order->order_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Order Detail No') ?></td>
            <td><?= h($vw_order->order_detail_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Purchase No') ?></td>
            <td><?= h($vw_order->purchase_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Category') ?></td>
            <td><?= h($vw_order->product_category) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Code') ?></td>
            <td><?= h($vw_order->product_code) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($vw_order->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($vw_order->quantity) ?></td>
        </tr>
        <tr>
            <td><?= __('Price') ?></td>
            <td><?= $this->Number->format($vw_order->price) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $vw_order->has('status') ? $this->Html->link($vw_order->status->name, ['controller' => 'Statuses', 'action' => 'view', $vw_order->status->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Dept') ?></td>
            <td><?= h($vw_order->sales_dept) ?></td>
        </tr>
        <tr>
            <td><?= __('Sales Staff') ?></td>
            <td><?= h($vw_order->sales_staff) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Detail') ?></td>
            <td><?= $this->Text->autoParagraph(h($vw_order->product_detail)); ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= h(urldecode($vw_order->file)) ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($vw_order->dir) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($vw_order->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($vw_order->size) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $vw_order->has('user') ? $this->Html->link($vw_order->user->name, ['controller' => 'Users', 'action' => 'view', $vw_order->user->id]) : $vw_order->user_id ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($vw_order->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($vw_order->modified) ?></td>
        </tr>
    </table>
</div>