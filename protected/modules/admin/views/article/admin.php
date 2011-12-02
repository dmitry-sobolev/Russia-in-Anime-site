<?php
$this->breadcrumbs = array(
    'Главная' => array('default/index'),
    'Статьи' => array('index'),
    'Поиск',
);

$this->menu = array(
//	array('label'=>'Список студий', 'url'=>array('index')),
    array('label' => 'Добавить статью', 'url' => array('create')),
);

?>

<h1>Поиск статьи</h1>

<p>
    Вы можете ввести операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) перед каждым запросом для того, чтобы уточнить как должен проводиться поиск.
</p>

<?php
$formats = Formats::model()->findAll();
$formatFilter = array();

foreach ($formats as $format) 
    $formatFilter[$format->FtID] = $format->title;

unset($formats);

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'studio-grid',
    'dataProvider' => $model->search(),
    'enablePagination' => false,
    'enableSorting' => false,
    'filter' => $model,
    'columns' => array(
        'titleMain',
        'titleAdd',
        'titleRus',
        array(
            'name' => 'format',
            'value' => '$data->format0->title',
            'filter' => $formatFilter,
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
