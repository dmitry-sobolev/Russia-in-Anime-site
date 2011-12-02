<?php
$this->breadcrumbs = array(
    'Главная' => array('default/index'),
    'Студии' => array('index'),
    'Поиск',
);

$this->menu = array(
    array('label' => 'Добавить студию', 'url' => array('create')),
);
?>

<h1>Студии</h1>

<p>
    Вы можете ввести операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) перед каждым запросом для того, чтобы уточнить как должен проводиться поиск.
</p>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'studio-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'enablePagination' => false,
    'enableSorting' => false,
    'columns' => array(
        'title',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
