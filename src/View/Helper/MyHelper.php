<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Text;

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
        'dir' => 'dir'
    ];

    /**
     * uploaderしたファイルのパスを生成
     */
    public function downloadlink($record)
    {
        $file = $this->config('field');
        $dir = $this->config('dir');
        return $this->Html->link(urldecode ($record->$file) , str_replace(
                'webroot', '',
                str_replace('\\','/',$record->$dir).urlencode($record->$file) ), ['target' => '_blank']);
    }

    /**
     * 文字列の切りつめ
     */
    public function trunc($value, $len=20)
    {
        return Text::truncate($value, $len, [
            'ellipsis' => '..',
            'extract' => false,
            // 'html' => false
        ]);
    }
}
