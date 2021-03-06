<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property string $title_ru
 * @property string $title_uk
 * @property string $video
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_ru, title_uk, video', 'required'),
			array('title_ru, title_uk, video, meta_title_ru, meta_title_uk, meta_description_ru, meta_description_uk', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_ru, title_uk, video', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main','ID'),
			'title_ru' => Yii::t('main','Title Ru'),
			'title_uk' => Yii::t('main','Title Uk'),
			'video' => Yii::t('main','Video'),
			'meta_title_ru' => Yii::t('main','meta title ru'),
			'meta_title_uk' => Yii::t('main','meta title uk'),
			'meta_description_ru' => Yii::t('main','meta description ru'),
			'meta_description_uk' => Yii::t('main','meta description uk'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->order = 'id DESC';
		$criteria->compare('id',$this->id);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_uk',$this->title_uk,true);
		$criteria->compare('video',$this->video,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
}
