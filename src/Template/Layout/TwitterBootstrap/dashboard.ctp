<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->controller, $this->request->action]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <!-- <div class="navbar navbar-inverse navbar-fixed-top" role="navigation"> -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="/">Contract</a> -->
                <?= $this->Html->link('Contracts', ['controller' => 'Clients', 'action' => 'recent'], ['class'=>'navbar-brand']); ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right visible-xs">
                    <?= $this->fetch('tb_actions') ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-divider"></li>
                    <li><?= $this->Html->link('Guide', ['controller' => 'Guides', 'action' => 'index']); ?></li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                        role="button" aria-haspopup="true" aria-expanded="false">Operations <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Supportcontracts'), ['controller' => 'Supportcontracts', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Productinfos'), ['controller' => 'Productinfos', 'action' => 'index']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Licenses'), ['controller' => 'Licenses', 'action' => 'index']); ?></li>
                        </ul>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                        role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><?= $this->Html->link(__('Contractnames'), ['controller' => 'Contractnames', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('Languages'), ['controller' => 'Languages', 'action' => 'index']); ?></li>
                            <li role="separator" class="divider"></li>
                            <li><?= $this->Html->link(__('Statuses'), ['controller' => 'Statuses', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                        </ul>
                    <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']); ?></li>
                </ul>
                <!-- <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form> -->
                <form class="navbar-form navbar-right" action="/clients">
                    <input type="text" name="client_name" class="form-control" placeholder="クライアント...">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 col-md-2 sidebar">
                <?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 main">
                <!-- <h1 class="page-header"><?=  $this->request->controller; ?></h1> -->
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash))
        echo $this->Flash->render();
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');
