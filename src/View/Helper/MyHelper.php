<?php
namespace App\View\Helper;

use Cake\Utility\Text;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Downloadfile helper
 */
class MyHelper extends Helper
{

    public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'field' => 'file',
        'dir' => 'dir',
    ];

    /**
     * uploaderしたファイルのパスを生成
     */
    public function downloadlink($record)
    {
        $file = $this->config('field');
        $dir = $this->config('dir');
        return $this->Html->link(urldecode($record->$file), str_replace(
            'webroot', '',
            str_replace('\\', '/', $record->$dir) . urlencode($record->$file)), ['target' => '_blank']);
    }

    /**
     * 文字列の切りつめ
     */
    public function trunc($value, $len = 15)
    {
        return Text::truncate($value, $len, [
            'ellipsis' => '..',
            'extract' => false,
            // 'html' => false
        ]);
    }

    public function partner($value)
    {
        return $value === 1 ? 'パートナー' : '';
    }

    // 数量
    public function qty()
    {
        return [
            3=>'3ライセンスパック',
            5=>'5ライセンスパック',
            10=>'10ライセンスパック',
            20=>'20ライセンスパック',
            30=>'30ライセンスパック',
            40=>'40ライセンスパック',
            50=>'50ライセンスパック',
        ];
    }
}
