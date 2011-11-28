<?
$clientScript = Yii::app()->clientScript;
$clientScript->registerCssFile(Yii::app()->baseUrl . '/css/screen.css', 'screen');
$clientScript->registerCssFile(Yii::app()->baseUrl . '/css/print.css', 'print');
$clientScript->registerCssFile(Yii::app()->baseUrl . '/css/style.css');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div class="wrapper container">
            <div class="header">
                <?php
                $headerImages = CHtml::image(
                                Yii::app()->baseUrl . '/images/site/header.png', 'Russia in Anime - главная') .
                        CHtml::image(
                                Yii::app()->baseUrl . '/images/site/medal.png', '', array('class' => 'medal'));
                echo CHtml::link(
                        $headerImages, array(''));
                ?>
            </div>
            <div class="content-holder">
                <div class="content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <div class="footer container">
            <div class="footer-content">
                123
            </div>
        </div>
    </body>
</html>
