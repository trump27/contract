<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Productinfo'), ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<h1 class="page-header"><?= __('Productinfo') ?></h1>

<?php
echo $this->Form->create(null, ['valueSources' => 'query', 'class' => 'form-inline']);
echo $this->Form->input('category', ['label' => __('Category').'　']);
echo $this->Form->input('product_name', ['label' => '　'.__('Product Name').'　']);
echo $this->Form->button(__('Search'), ['type' => 'submit', 'class' => 'btn-primary']);
// if (!empty($_isSearch)) {
echo $this->Html->link('Reset', ['action' => 'index'], ['class' => 'btn btn-success', 'role' => 'button']);
// }
echo $this->Form->end();
?>
<div>&nbsp;</div>

<table class="table table-striped table-condensed table-responsive text-nowrap" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="actions"><?= __('Actions'); ?></th>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('category'); ?></th>
            <th><?= $this->Paginator->sort('use_support'); ?></th>
            <th><?= $this->Paginator->sort('product_code'); ?></th>
            <th><?= $this->Paginator->sort('product_name'); ?></th>
            <th><?= $this->Paginator->sort('segment'); ?></th>
            <th><?= $this->Paginator->sort('price'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productinfos as $productinfo): ?>
        <tr>
            
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $productinfo->id], ['title' => __('View'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-eye-open alert-info']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $productinfo->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-pencil alert-info']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $productinfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productinfo->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-xs glyphicon glyphicon-trash alert-danger']) ?>
            </td>
            <td><?= $this->Number->format($productinfo->id) ?></td>
            <td><?= h($productinfo->category) ?></td>
            <td><?= $this->Number->format($productinfo->use_support) ?></td>
            <td><?= h($productinfo->product_code) ?></td>
            <td><?= h($productinfo->product_name) ?></td>
            <td><?= h($productinfo->segment) ?></td>
            <td><?= $this->Number->format($productinfo->price) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
