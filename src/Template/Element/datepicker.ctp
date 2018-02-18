<?= $this->Html->css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',['block' => true]) ?>
<?= $this->Html->script('//code.jquery.com/ui/1.12.1/jquery-ui.js',['block' => true]) ?>

<?= $this->Html->scriptStart(['block' => true]) ?>
$( function() {
    $('.datepicker').datepicker({
        dateFormat: 'yy/mm/dd'
    });
} );
<?= $this->Html->scriptEnd() ?>