<?php

/**
 * This is the model class for table "pictures".
 *
 * The followings are the available columns in table 'pictures':
 * @property integer $PID
 * @property string $title
 * @property string $path
 *
 * The followings are the available model relations:
 * @property Article[] $articles
 * @property Field[] $fields
 * @property Fieldpics[] $fieldpics
 */
class Pictures extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pictures the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pictures';
	}

        public function behaviors() {
            return array(
                'CAdvancedArBehavior' => array(
                    'class' => 'application.extentions.CAdvancedArBehavior',
                ),
            );
        }

        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, path', 'required'),
			array('title', 'length', 'max'=>255),
			array('path', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PID, title, path', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'articleMain' => array(self::HAS_ONE, 'Article', 'pictureMain'),
			'fieldMain' => array(self::HAS_ONE, 'Field', 'picturePreview'),
			'fields' => array(self::MANY_MANY, 'Fields', 'fieldpics(PID, FID)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PID' => 'Номер',
			'title' => 'Имя файла',
			'path' => 'Файл',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('PID',$this->PID);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}