<?php
/**
 * @link http://www.yii-china.com/
 * @copyright Copyright (c) 2015 Yii中文网
 */

namespace common\widgets\ueditor\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Xianan Huang <xianan_huang@163.com>
 */
class UeditorAsset extends AssetBundle
{
    public $css = [

    ];
    
    public $js = [
        'ueditor.config.js',
        'ueditor.all.min.js',
    ];
    
    public $depends = [

    ];
    
    /**
     * 初始化：sourcePath赋值
     * @see \yii\web\AssetBundle::init()
     */
    public function init()
    {
        $this->sourcePath = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR . 'vendor';
    }
}
