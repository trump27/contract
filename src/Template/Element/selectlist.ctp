<?php foreach ($list as $k => $v): ?>
  <option value="<?=h($k);?>"><?=h($v);?></option>
<?php endforeach;?>