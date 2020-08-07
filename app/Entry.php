<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are gurded.
   *
   * @var array
   */
  protected $guarded = ['id',];

  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

  /**=======リレーション処理===================================
   *
   * エントリーするRaceを取得
   */
  public function race()
  {
      return $this->belongsTo('App\Race');
  }

  /*
  * エントリーする選手を取得
  */
   public function player()
   {
      return User::find($this->user_id);
   }

  /**
   * エントリーするEventを取得
   */
  public function getEventAttribute()
  {
      return $this->race->event;
  }
  /*
  *=========リレーション処理ここまで==========================
   */


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
    * Get User_ID
    *
    * @param
    * @return int
   **/
   public function getUserIdAttribute()
   {
     return $this->attributes['user_id'];
   }
   /**
    * Get Race_ID
    *
    * @param
    * @return int
   **/
   public function getRaceIdAttribute()
   {
     return $this->attributes['race_id'];
   }
   /**
    * Get result time タイムスタンプ
    *
    * @param
    * @return int
   **/
   public function getResultAttribute()
   {
     if (is_null($this->attributes['result'])) {
       return '--';
     }
     return $this->attributes['result'];
   }
   /**
    * Get result time 文字列
    *
    * @param
    * @return string
   **/
   public function getResultTextedAttribute()
   {
     if (is_null($this->attributes['result'])) {
       return '--';
     }
     $result = $this->attributes['result'];

     $min = floor($result /60);
     $sec = $result - $min*60;

     if ($min == 0) return $sec . '秒';
     else return $min . '分' . $sec . '秒';
   }
   /**
    * Get lane
    *
    * @param
    * @return int
   **/
   public function getLaneNoAttribute()
   {
     if (is_null($this->attributes['laneNo'])) {
       return '--';
     }
     return $this->attributes['laneNo'];
   }
   /**
    * Get rank
    *
    * @param
    * @return int
   **/
   public function getRankAttribute()
   {
     if ( is_null($this->attributes['result']) ) {
       return '--';
     }

     $results = [];
     foreach ($this->event->races as $race) {
       foreach ($race->entries as $entry) {
         $result = $entry->result;

         if ($result != '--') {
           \array_push($results, $result);
         }
       }
     }

     \sort($results);
     $rank = \array_search( $this->result, $results );

     return $rank + 1;
   }
   /**
    * アクセサ　ここまで=============================================================
    *
   **/




   /**=======バリデーション関連=====================================================**/
    /** バリデーションルール
    *
    * @var array
    *
    */
   public static $rules = array(
     'user_id' => 'required|int',
     'race_id' => 'required|int',
     'laneNo' => 'required|int',
   );

   /**
    * エラー返信処理
    *
    * @return boolean
    */
   private $errors;

   public function validate($data)
   {
     $v = Validator::make($data, $this->rules);
     if ($v->fails())
     {
         $this->errors = $v->errors();
         return false;
     }
     return true;
   }

   /**エラーリスト取得
    */
   public function errors()
   {
     return $this->errors;
   }
   /**バリデーションここまで=================================================
    */

}
