<?php
namespace common\widgets\ueditor;

use Yii;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;

use common\widgets\ueditor\assets\UeditorAsset;


class Ueditor extends InputWidget
{
    /**
     * 编辑器传参配置(配置查看百度编辑器（ueditor）官方文档)
     */
    public $options = [];
    
    /**
     * 编辑器默认基础配置
     */
    public $_init;
    
    public function init()
    {
        $this->id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->id;
        
        $this->_init = [
            'serverUrl' => Url::to(['ueditor']),
            'lang' => (strtolower(\Yii::$app->language) == 'en-us') ? 'en' : 'zh-cn',
        ];
        $this->options = ArrayHelper::merge($this->_init, $this->options);
        //parent::init();
    }
    
    public function run()
    {
        $this->registerClientScript();
        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, ['id' => $this->id]);
        } else {
            return Html::textarea($this->id, $this->value, ['id' => $this->id]);
        }
    }
    
    /**
     * 注册Js
     */
    protected function registerClientScript()
    {
        UEditorAsset::register($this->view);
        $options = Json::encode($this->options);
        $script = "UE.getEditor('" . $this->id . "', " . $options . ")";
        $this->view->registerJs($script, View::POS_READY);
    }
}
