<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($vw_license->license_name) ?></h3>
    </div>
    <!-- <table class="table table-striped table-responsive text-nowrap"> -->
    <table class="table table-striped table-responsive">
        <tr>
            <td style="width:30%"><?= __('Id') ?></td>
            <td><?= $this->Number->format($vw_license->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $vw_license->has('client') ? $this->Html->link($vw_license->client->client_name, ['controller' => 'Clients', 'action' => 'view', $vw_license->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Customer') ?></td>
            <td><?= $vw_license->has('customer') ? $this->Html->link($vw_license->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $vw_license->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Order') ?></td>
            <td><?= $vw_license->has('order') ? $this->Html->link($vw_license->order->product_name, ['controller' => 'Orders', 'action' => 'view', $vw_license->order->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Condition') ?></td>
            <td><?= $vw_license->has('condition') ? $this->Html->link($vw_license->condition->name, ['controller' => 'Conditions', 'action' => 'view', $vw_license->condition->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $vw_license->has('status') ? $this->Html->link($vw_license->status->name, ['controller' => 'Statuses', 'action' => 'view', $vw_license->status->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('License No') ?></td>
            <td><?= h($vw_license->license_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Relate No') ?></td>
            <td><?= h($vw_license->relate_no) ?></td>
        </tr>
        <tr>
            <td><?= __('Product Name') ?></td>
            <td><?= h($vw_license->product_name) ?></td>
        </tr>
        <tr>
            <td><?= __('License Name') ?></td>
            <td><?= h($vw_license->license_name) ?></td>
        </tr>
        <tr>
            <td><?= __('License Qty') ?></td>
            <td><?= $this->Number->format($vw_license->license_qty) ?></td>
        </tr>
        <tr>
            <td><?= __('Language') ?></td>
            <td><?= $vw_license->has('language') ? $this->Html->link($vw_license->language->language_name, ['controller' => 'Languages', 'action' => 'view', $vw_license->language->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Issued') ?></td>
            <td><?= h($vw_license->issued) ?></td>
        </tr>
        <tr>
            <td><?= __('Startdate') ?></td>
            <td><?= h($vw_license->startdate) ?></td>
        </tr>
        <tr>
            <td><?= __('Enddate') ?></td>
            <td><?= h($vw_license->enddate) ?></td>
        </tr>
        <tr>
            <td><?= __('License Key') ?></td>
            <td><?= h($vw_license->license_key) ?></td>
        </tr>
        <tr>
            <td><?= __('Notice') ?></td>
            <td><?= $this->Text->autoParagraph(h($vw_license->notice)); ?></td>
        </tr>
        <tr>
            <td><?= __('File') ?></td>
            <td><?= $this->Html->link($vw_license->file, ['controller' => 'Licenses', 'action' => 'download', $vw_license->id]) ?></td>
        </tr>
        <tr>
            <td><?= __('Dir') ?></td>
            <td><?= h($vw_license->dir) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($vw_license->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($vw_license->size) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $vw_license->has('user') ? $this->Html->link($vw_license->user->name, ['controller' => 'Users', 'action' => 'view', $vw_license->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($vw_license->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($vw_license->modified) ?></td>
        </tr>
    </table>
</div>