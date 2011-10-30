<?php

/**
 * This is the model class for table "field".
 *
 * The followings are the available columns in table 'field':
 * @property integer $FID
 * @property integer $picturePreview
 * @property string $textPreview
 * @property string $text
 * @property integer $isBig
 * @property integer $article
 *
 * The followings are the available model relations:
 * @property Article $article0
 * @property Pictures $picturePreview0
 * @property Fieldpics[] $fieldpics
 * @property Fieldtags[] $fieldtags
 */
class Field extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Field the static model class
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
		return 'field';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('textPreview, article', 'required'),
			array('picturePreview, isBig, article', 'numerical', 'integerOnly'=>true),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('FID, picturePreview, textPreview, text, isBig, article', 'safe', 'on'=>'search'),
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
			'article0' => array(self::BELONGS_TO, 'Article', 'article'),
			'picturePreview0' => array(self::BELONGS_TO, 'Pictures', 'picturePreview'),
			'fieldpics' => array(self::HAS_MANY, 'Fieldpics', 'FID'),
			'fieldtags' => array(self::HAS_MANY, 'Fieldtags', 'FID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'FID' => 'Fid',
			'picturePreview' => 'Picture Preview',
			'textPreview' => 'Text Preview',
			'text' => 'Text',
			'isBig' => 'Is Big',
			'article' => 'Article',
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

		$criteria->compare('FID',$this->FID);
		$criteria->compare('picturePreview',$this->picturePreview);
		$criteria->compare('textPreview',$this->textPreview,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('isBig',$this->isBig);
		$criteria->compare('article',$this->article);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}