Yii2.0.7 扩展-百度编辑器（Ueditor）

描述：

最佳适用于yii2.0 高级版（advanced）应用框架

版本相关：

Yii：2.0.6

Ueditor：1.4.3.1 （php版本）

来源：https://github.com/org-yii-china/yii2-ueditor

安装方法：

1.下载yii2-ueditor

2.将下载的yii2-ueditor-master 修改 ueditor (注意：修改成其他文件名请修改插件内对应的命名空间)

3.将文件方在 根目录/common/widgets 下即可

调用方法：

在rootPath/backend/controllers中新建一个控制器加入以下代码

    public function actions(){
        return [
            'upload'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }

第一种调用方式：

在对应的渲染页面，即views下的页面中

<?=common\widgets\ueditor\Ueditor::widget(['options'=>['initialFrameWidth' => 850,]])?>

options 填写配置编辑器的参数（参考ueditor官网）

第二种调用方式：

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
            'initialFrameWidth' => 850,
        ]
    ]) ?>
    
      ...
      
    <?php ActiveForm::end(); ?>
