<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $client->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $client->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
</ul>
<?php
$this->end();
?>
<h1 class="page-header"><?= __('Clients') ?></h1>
<?= $this->Form->create($client, ['align' => [
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
    <legend><?= __('Edit {0}', ['Client']) ?></legend>
    <?php
    echo $this->Form->control('client_name');
    echo $this->Form->control('company_code');
    echo $this->Form->control('identity1');
    echo $this->Form->control('partner_flag', ['type' => 'radio', 'options' => [
        0 => 'No', 1 => 'Yes',
        ]]);
    echo $this->Form->control('partner_id', ['empty'=>'---']);
    echo $this->Form->control('remarks');
    ?>
</fieldset>
<?= $this->Form->button(__("Save"), ['class'=>'btn-primary']); ?>
<?= $this->Form->end() ?>
