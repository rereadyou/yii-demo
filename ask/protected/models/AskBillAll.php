<?php
/**
 * This is the model class for table "9ask_Bill_all".
 *
 * The followings are the available columns in table '9ask_Bill_all':
 * @property integer $bid
 * @property string $btitle
 * @property string $prov
 * @property string $city
 * @property string $baddress
 * @property string $blink
 * @property string $btime
 * @property integer $zcid
 * @property integer $bigclass
 * @property integer $flag
 * @property string $mobile
 * @property string $askme
 * @property string $otehr
 * @property string $lvsuo
 * @property string $zcname
 * @property string $jianjie
 * @property string $flal
 * @property string $phone
 */
class AskBillAll extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AskBillAll the static model class
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
		return '9ask_Bill_all';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bid', 'required'),
			array('bid, zcid, bigclass, flag', 'numerical', 'integerOnly'=>true),
			array('btitle, prov, city, mobile, lvsuo', 'length', 'max'=>50),
			array('baddress, blink', 'length', 'max'=>200),
			array('askme, zcname', 'length', 'max'=>150),
			array('otehr', 'length', 'max'=>80),
			array('jianjie, flal', 'length', 'max'=>2000),
			array('phone', 'length', 'max'=>24),
			array('btime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bid, btitle, prov, city, baddress, blink, btime, zcid, bigclass, flag, mobile, askme, otehr, lvsuo, zcname, jianjie, flal, phone', 'safe', 'on'=>'search'),
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
			'bid' => 'Bid',
			'btitle' => 'Btitle',
			'prov' => 'Prov',
			'city' => 'City',
			'baddress' => 'Baddress',
			'blink' => 'Blink',
			'btime' => 'Btime',
			'zcid' => 'Zcid',
			'bigclass' => 'Bigclass',
			'flag' => 'Flag',
			'mobile' => 'Mobile',
			'askme' => 'Askme',
			'otehr' => 'Otehr',
			'lvsuo' => 'Lvsuo',
			'zcname' => 'Zcname',
			'jianjie' => 'Jianjie',
			'flal' => 'Flal',
			'phone' => 'Phone',
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

		$criteria->compare('bid',$this->bid);
		$criteria->compare('btitle',$this->btitle,true);
		$criteria->compare('prov',$this->prov,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('baddress',$this->baddress,true);
		$criteria->compare('blink',$this->blink,true);
		$criteria->compare('btime',$this->btime,true);
		$criteria->compare('zcid',$this->zcid);
		$criteria->compare('bigclass',$this->bigclass);
		$criteria->compare('flag',$this->flag);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('askme',$this->askme,true);
		$criteria->compare('otehr',$this->otehr,true);
		$criteria->compare('lvsuo',$this->lvsuo,true);
		$criteria->compare('zcname',$this->zcname,true);
		$criteria->compare('jianjie',$this->jianjie,true);
		$criteria->compare('flal',$this->flal,true);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}