<?php

class ArticleController extends AdminController {

    /*
      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */

    public function actionCreate() {
        $model = new Article();

        if (isset($_POST['Article'])) {
            
            $model->attributes = $_POST['Article'];

            $this->fieldsModel($model);

            $this->saveArticle($model, isset($_POST['addField']));
        }

        $model->fields = array(new Field());

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id, $isAddField = false) {
        $model = $this->loadModel($id);
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Article'])) {
            $model->attributes = $_POST['Article'];
            
            $this->fieldsModel($model);

            $this->saveArticle($model, isset($_POST['addField']));
        }
        
        if ($isAddField){
            $fields = $model->fields;
            $fields[] = new Field();
            $model->fields = $fields;
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    public function loadModel($id) {
        $model = Article::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запрошенной страницы не существует');
        return $model;
    }

    private function fieldsModel(&$model) {
        $fields = array();
        
        if (isset($_POST['Field'])) 
            $fields = $this->getFieldsArray($model->AID, $model->fields);

        $this->saveFieldsArray($fields);

        $model->fields = $fields;
    }

    private function saveArticle(&$model, $isAddField = false) {
        if ($model->save()) {
            if ($isAddField)
                $this->redirect(array('update', 'id' => $model->AID, 'isAddField' => true,));
            else
                $this->redirect(array('view', 'id' => $model->AID));
        } else
            throw new CHttpException(500, 'Не удалось сохранить статью');
    }

    private function getFieldsArray($articleId, $fields = array()) {
        foreach ($_POST['Field'] as $fid => $fieldAttributes) {
            if (isset($fieldAttributes['FID']) && $fieldAttributes['FID'] == $fid) {
                $i = $this->searchObjectByField($fields, 'FID', $fid);
                
                if (isset($_POST['delete'][$fid])) {
                    Field::model()->deleteByPk($fid);
                    unset ($fields[$i]);
                    $i = false;
                }
                
                if ($i !== false){
                    $fields[$i]->attributes = $fieldAttributes;
                }
            } else {
                $field = new Field();
                $field->attributes = $fieldAttributes;
                $field->article = $articleId;
               
                $fields[] = $field;
            }
        }

        return $fields;
    }
    
    private function searchObjectByField($array, $fieldName, $fieldValue) {
        foreach ($array as $key => $field) {
            $tmp = $field->$fieldName;
            if ($field->$fieldName == strval($fieldValue))
                return $key;
        }
        return false;
    }

    private function saveFieldsArray(&$fields) {
        foreach ($fields as $field) {

            if (!$field->save())
                throw new CHttpException(500, $field->isNewRecord ?
                                'Не могу создать поле' :
                                'Не могу обновить поле');
        }
    }

}