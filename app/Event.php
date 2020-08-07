<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
  use SoftDeletes;

  protected $guarded = ['id',];

  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

  /**
   * 状態定義==========================================================
   * [
   * 泳法,
   * 距離,
   * 対象性別,
   * 対象年齢区分,
   * ]
  **/
   const STYLE = [
       1 => '自由形',
       2 => '平泳ぎ',
       3 => '背泳ぎ',
       4 => 'バタフライ',
       5 => 'メドレー',
   ];

   const DISTANCE = [
       1 => '50m',
       2 => '100m',
       3 => '200m',
   ];

   const SEX = [
       1 => '男子',
       2 => '女子',
       3 => '男女混合',
   ];

   const AGE = [
       1 => ['label' => '小学生', 'division' => '6~12才',],
       2 => ['label' => '中学生', 'division' => '13~15才',],
       3 => ['label' => '高校生', 'division' => '16~18才',],
       4 => ['label' => '成人', 'division' => '19~才',],
       5 => ['label' => 'ミドル', 'division' => '30~才',],
       6 => ['label' => 'マスター', 'division' => '50~才',],
   ];
   /**
    * 状態定義 ここまで==================================================
    **/


   /**
    * リレーション処理=============================================================
   **/
   public function races()
   {
       return $this->hasMany('App\Race');
   }


   /**
    * Get 参加人数
    *
    * @param
    * @return int
   **/
   public function getEntryCountAttribute()
   {
     $eCounts = 0;
     foreach ($this->races as $race) {
       $eCounts += $race->entries->count();
     }
     return $eCounts;
   }
   /**
    * Get 参加枠
    *
    * @param
    * @return int
   **/
   public function getPersonsAttribute()
   {
     $lCounts = 0;
     foreach ($this->races as $race) {
       $lCounts += $race->lanes;
     }
     return $lCounts;
   }
   /**
    * Get 参加するレースID
    *
    * @param
    * @return int
   **/
   public function getEntryRaceIdAttribute()
   {
     foreach ($this->races as $race) {
       if ($race->lanes > $race->entries->count()) {
         return $race->id;
       }
     }
     return '--';
   }
   /**
    * リレーション処理　ここまで=============================================================
   **/


   /**
    * アクセサ=============================================================
    *
   **/
   /**
    * Get ID
    *
    * @param
    * @return int
   **/
   public function getIdAttribute()
   {
     return $this->attributes['id'];
   }


   /**
    * Get 泳法 文字列
    *
    * @return string
   **/
   public function getStyleAttribute()
   {
     // 状態値
     $i = $this->attributes['style'];

     // 定義されていなければ空文字を返す
     if (!isset(self::STYLE[$i])) {
         return '';
     }

     return self::STYLE[$i];
   }
   /**
    * Get 泳法　整数
    *
    * @return int
   **/
   public function getIntStyleAttribute()
   {
     // 状態値
     return $this->attributes['style'];
   }


   /**
    * Get 距離　文字列
    *
    * @return string
   **/
   public function getDistanceAttribute()
   {
     // 状態値
     $i = $this->attributes['distance'];

     // 定義されていなければ空文字を返す
     if (!isset(self::DISTANCE[$i])) {
         return '';
     }

     return self::DISTANCE[$i];
   }
   /**
    * Get 距離　整数
    *
    * @return int
   **/
   public function getIntDistAttribute()
   {
     // 状態値
     return $this->attributes['distance'];
   }


   /**
    * Get 対象性別　ラベル
    *
    * @param
    * @return string
   **/
   public function getSexAttribute()
   {
     // 状態値
     $i = $this->attributes['sex'];

     // 定義されていなければ空文字を返す
     if (!isset(self::SEX[$i])) {
         return '';
     }

     return self::SEX[$i];
   }
   /**
    * Get 対象性別　整数
    *
    * @param
    * @return int
   **/
   public function getIntSexAttribute()
   {
     return $this->attributes['sex'];
   }


   /**
    * Get 対象年齢区分　ラベル
    *
    * @param
    * @return string
   **/
   public function getAgeLabelAttribute()
   {
     // 状態値
     $i = $this->attributes['age'];

     // 定義されていなければ空文字を返す
     if (!isset(self::AGE[$i])) {
         return '';
     }

     return self::AGE[$i]['label'];
   }
   /**
    * Get 対象年齢区分 整数値
    *
    * @param
    * @return int
   **/
   public function getIntAgeAttribute()
   {
     return $this->attributes['age'];
   }
   /**
    * Get 対象年齢区分　年齢の範囲
    *
    * @param
    * @return string
   **/
   public function getAgeDivisionAttribute()
   {
     // 状態値
     $i = $this->attributes['age'];

     // 定義されていなければ空文字を返す
     if (!isset(self::AGE[$i])) {
         return '';
     }

     return self::AGE[$i]['division'];
   }


   /**
    * Get '個人' or '団体'
    *
    * @param
    * @return string
   **/
   public function getPlayerTypeAttribute()
   {
     return ($this->attributes['playerType']) ? '個人' : '団体';
   }
   /**
    * Get '個人' or '団体'　整数
    *
    * @param
    * @return bool
   **/
   public function getBoolPlayerTypeAttribute()
   {
     return $this->attributes['playerType'];
   }


   /**
    * Get 種目名
    *
    * @param
    * @return string
   **/
   public function getEventNameAttribute()
   {
     //
     return $this->getSexAttribute().' '
            .$this->getAgeLabelAttribute().' '
            .$this->getDistanceAttribute().' '
            .$this->getStyleAttribute();
   }
   /**
    * アクセサ　ここまで=============================================================
    *
   **/

}
