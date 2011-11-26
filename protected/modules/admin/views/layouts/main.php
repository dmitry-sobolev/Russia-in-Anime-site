<?php
    $cs = Yii::app()->clientScript;
    $baseUrl = $this->module->assetsUrl;
    $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/screen.css', 'screen');
    $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/print.css', 'print');
    $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/form.css');
    $cs->registerCssFile($baseUrl.'/css/style.css');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
   </head>
    <body>
        <div class="container">
            <div id="header">
                <!--img src="" alt="" id="logo" /-->
                <h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
                <div class="menu span-24">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'items' => array(
                            array('label' => 'Главная', 'url'=>array('default/index')),
                            array('label' => 'Добавить статью', 'url'=>array('article/create')),
                            array('label' => 'Найти сатью', 'url' => array('article/admin')),
                            array('label' => 'Добавить тег', 'url' => array('tags/create')),
                            array('label' => 'Операции с тегами', 'url' => array('tags/admin')),
                            array('label' => 'Добавить студию', 'url' => array('studio/create')),
                            array('label' => 'Найти студию', 'url' => array('studio/admin')),
                        ),
                    ));
                    ?>
                </div>
            </div>
            <div id="span-24 last">
                <?php echo $content; ?>
            </div>
            <div id="footer">
                <hr />
                <div>
                    <?php echo Yii::powered(); ?>
                </div>
            </div>
        </div>
    </body>
</html>
