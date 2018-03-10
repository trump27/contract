<h2 class="page-header vspace">未処理件数</h2>
<table class="table table-bordered table-responsive text-nowrap" cellpadding="0" cellspacing="0" style="width:auto">
    <thead>
        <tr>
            <th></th>
            <th class="text-center"><h4><?= $this->My->todo(1) ?></h4></th>
            <th class="text-center"><h4><?= $this->My->todo(10) ?></h4></th>
            <th class="text-center"><h4><?= $this->My->todo(20) ?></h4></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($counts as $title => $cnts): ?>
        <tr>
            <td style="width:200px"><?php
                echo "<a href='#$title'>".__($title)."</a>";
            ?></td>
            <td align="right" style="width:120px"><?php
                if ($title=='Requests') { echo '-'; }
                else
                    echo empty($cnts[1]) ? 0 :$cnts[1]
            ?></td>
            <td align="right" style="width:120px"><?php
                if ($title=='Orders') { echo '-'; }
                else
                    echo empty($cnts[10]) ? 0 :$cnts[10];
            ?></td>
            <td align="right" style="width:120px"><?php
                if ($title=='Orders' || $title=='Requests') { echo '-'; }
                else
                    echo empty($cnts[20]) ? 0 :$cnts[20]
            ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>