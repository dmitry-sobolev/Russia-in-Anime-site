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

        $this->processingForm($model);

        $model->fields = array(new Field());

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id, $isAddField = false) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $this->processingForm($model);

        if ($isAddField) {
            $fields = $model->fields;
            $fields[] = new Field();
            $model->fields = $fields;
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionAdmin() {
        $model = new Article('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Article']))
            $model->attributes = $_GET['Article'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Article::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Запрошенной страницы не существует');
        return $model;
    }

    private function processingForm(&$model) {
        if (isset($_POST['Article'])) {
            $model->attributes = $_POST['Article'];

            $this->processingArticle($model, isset($_POST['addField']));
        }
    }

    private function processingArticle(&$model, $isAddField = false) {
        if ($model->save()) {

            $this->fieldsModel($model);

            if ($isAddField)
                $this->redirect(array('update', 'id' => $model->AID, 'isAddField' => true,));
            else
                $this->redirect(array('view', 'id' => $model->AID));
        } else
            throw new CHttpException(500, 'Не удалось сохранить статью');
    }

    private function fieldsModel(&$model) {
        $fields = array();

        if (isset($_POST['Field']))
            $fields = $this->getFieldsArray($model->AID, $model->fields);

        $this->saveFieldsArray($fields);

        $model->fields = $fields;
    }

    private function getFieldsArray($articleId, $fieldsOld = array()) {
        $fields = array();
        foreach ($_POST['Field'] as $fid => $fieldAttributes) {
            $i = false;
            
            if (isset($fieldAttributes['FID']) && $fieldAttributes['FID'] == $fid) {
                $i = $this->searchObjectByField($fieldsOld, 'FID', $fid);

                if (isset($_POST['delete'][$fid])) {
                    Field::model()->deleteByPk($fid);
                    unset($fieldsOld[$i]);
                    
                    continue;
                }
                
                $fields[$fid] = $fieldsOld[$i];
            } else {
                $fields[$fid] = new Field ();
                $fields[$fid]->article = $articleId;
            }
            
            $fields[$fid]->attributes = $fieldAttributes;

            if (isset($fieldAttributes['tags']))
                $fields[$fid]->tags = $fieldAttributes['tags'];
        }

        return $fields;
    }

    private function saveFieldsArray(&$fields) {
        foreach ($fields as $fid => $field) {

            if (!$field->save()) {
                throw new CHttpException(500, $field->isNewRecord ?
                                'Не могу создать поле' :
                                'Не могу обновить поле');
            } else {
                $this->saveImage($field, $fid);
            }
        }
    }

    private function saveImage(&$field, $key) {
        if (isset($_FILES['Pictures'])) {

            if ($_FILES['Pictures']['error'][strval($key)] === 0) {

                $fieldId = $field->FID;
                $dir = 'images/upload/fieldAttachments/';
                $path = Yii::app()->basePath . '/../' . $dir;
                $url = Yii::app()->baseUrl . '/' . $dir . $fieldId . '/';

                if (!is_dir($path))
                    throw new CHttpException(500, 'Нет директории для загрузки картинок');

                $path .= $fieldId;

                $this->saveImagesOnServer($key, $path);
                $this->saveImageInDb($key, $fieldId, $url);
            }
        }
    }

    private function saveImagesOnServer($key, $path = '') {
        $image = EUploadedImage::getInstance(Pictures::model(), strval($key));

        $image->thumb = array(
            'maxWidth' => 200,
            'maxHeight' => 200,
            'dir' => '/thumbs',
            'prefix' => 'thumb200_',
        );

        if (!is_dir($path)) {
            mkdir($path);
            mkdir($path . $image->thumb['dir']);
        }

        $image->saveAs($path . '/' . $image->name);
    }

    private function saveImageInDb($key, $fieldId, $url = '') {
        $imageAttributes = array(
            'path' => $url,
            'title' => $_FILES['Pictures']['name'][$key],
        );

        $picture = new Pictures();
        $picture->attributes = $imageAttributes;
        $picture->fields = array($fieldId);

        if (!$picture->save())
            throw new CHttpException(500, 'Не могу добавить картинку');
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