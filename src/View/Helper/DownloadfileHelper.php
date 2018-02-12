<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Downloadfile helper
 */
class DownloadfileHelper extends Helper
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

    public function downloadlink($record)
    {
        $file = $this->config('field');
        $dir = $this->config('dir');
        return $this->Html->link(urldecode ($record->$file) , str_replace(
                'webroot', '',
                str_replace('\\','/',$record->$dir).urlencode($record->$file) ), ['target' => '_blank']);
    }
}
