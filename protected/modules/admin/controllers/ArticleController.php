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

            if ($model->save()){
                $this->fieldsModel($model, $_POST);

                $this->saveArticle($model, isset($_POST['addField']));
            }
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
            
            if ($model->save()){
                $this->fieldsModel($model, $_POST);

                $this->saveArticle($model, isset($_POST['addField']));
            }
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

    private function fieldsModel(&$model, &$post) {
        $fields = array();
        
        if (isset($post['Field'])) 
            $fields = $this->getFieldsArray($post, $model->fields);

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

    //TODO: Таки, почему она не сохраняет?!
    private function getFieldsArray(&$post, $fields = array()) {
        foreach ($post['Field'] as $fid => $fieldAttributes) {
            if (isset($fieldAttributes['FID']) && $fieldAttributes['FID'] == $fid) {
                $i = $this->searchObjectByField($fields, 'FID', $fid);
                
                if (isset($post['delete'][$fid])) {
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

}