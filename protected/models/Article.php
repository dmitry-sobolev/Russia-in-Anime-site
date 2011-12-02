<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $AID
 * @property string $titleMain
 * @property string $titleAdd
 * @property string $titleRus
 * @property string $timeTag
 * @property integer $format
 * @property integer $episodeNum
 * @property integer $studio
 * @property string $director
 * @property string $original
 * @property integer $pictureMain
 * @property string $scriptWriter
 * @property integer $originalRole
 *
 * The followings are the available model relations:
 * @property TblOriginalRoles $originalRole0
 * @property TblFormats $format0
 * @property Pictures $pictureMain0
 * @property Studio $studio0
 * @property Field[] $fields
 */
class Article extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Article the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'article';
    }

    public function behaviors() {
        return array('CAdvancedArBehavior' => array(
                'class' => 'application.extensions.CAdvancedArBehavior'));
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titleMain, titleAdd, timeTag', 'required'),
            array('format, episodeNum, year, studio, pictureMain, originalRole', 'numerical', 'integerOnly' => true),
            array('titleMain, titleAdd, titleRus, scriptWriter', 'length', 'max' => 100),
//            array('timeTag', 'date', 'format' => 'yyyy-MMddHH'),
            array('director', 'length', 'max' => 45),
            array('original', 'length', 'max' => 200),
            array('year', 'length', 'max' => 4),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('AID, titleMain, titleAdd, titleRus, year, timeTag, format, episodeNum, studio, director, original, pictureMain, scriptWriter, originalRole', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'originalRole0' => array(self::BELONGS_TO, 'OriginalRoles', 'originalRole'),
            'format0' => array(self::BELONGS_TO, 'Formats', 'format'),
            'pictureMain0' => array(self::BELONGS_TO, 'Pictures', 'pictureMain'),
            'studio0' => array(self::BELONGS_TO, 'Studio', 'studio'),
            'fields' => array(self::HAS_MANY, 'Field', 'article'),
            'members' => array(self::MANY_MANY, 'Members', 'tbl_article_members(AID, MID)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'AID' => 'Номер в БД',
            'titleMain' => 'Название',
            'titleAdd' => 'Альтернативное название',
            'titleRus' => 'Русское название',
            'year' => 'Год выпуска',
            'timeTag' => 'Time Tag',
            'format' => 'Формат',
            'episodeNum' => 'Серий',
            'studio' => 'Студия',
            'director' => 'Режиссер',
            'original' => 'Автор оригинала',
            'pictureMain' => 'Картинка',
            'scriptWriter' => 'Сценарист',
            'originalRole' => 'Снято по',
            'members' => 'Участники',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('AID', $this->AID);
        $criteria->compare('titleMain', $this->titleMain, true);
        $criteria->compare('titleAdd', $this->titleAdd, true);
        $criteria->compare('titleRus', $this->titleRus, true);
        $criteria->compare('year', $this->year, true);
        $criteria->compare('timeTag', $this->timeTag, true);
        $criteria->compare('format', $this->format);
        $criteria->compare('episodeNum', $this->episodeNum);
        $criteria->compare('studio', $this->studio);
        $criteria->compare('director', $this->director, true);
        $criteria->compare('original', $this->original, true);
        $criteria->compare('pictureMain', $this->pictureMain);
        $criteria->compare('scriptWriter', $this->scriptWriter, true);
        $criteria->compare('originalRole', $this->originalRole);

        $criteria->order = 'titleMain';
        
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}