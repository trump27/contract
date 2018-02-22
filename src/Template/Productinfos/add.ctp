<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productinfo $productinfo
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Productinfos'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Productinfos'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Productinfo') ?></h1>
<?= $this->Form->create($productinfo, ['align' => [
    'sm' => [
        'left' => 3,
        'middle' => 8,
        'right' => 1
    ],
    'md' => [
        'left' => 3,
        'middle' => 6,
        'right' => 2
    ]
]]); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Productinfo']) ?></legend>
    <?php
    echo $this->Form->control('category');
    echo $this->Form->control('use_support');
    echo $this->Form->control('product_code');
    echo $this->Form->control('product_name');
    echo $this->Form->control('segment');
    echo $this->Form->control('price');
    echo $this->Form->control('remarks');
    ?>
</fieldset>
<?= $this->Form->button(__("Add"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
