<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Carbon\Carbon;
use \Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birth', 'sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * @var array
     */
    protected $dates = ['birth', 'email_verified_at', 'created_at', 'updated_at', 'deleted_at'];



    /**=======バリデーション関連=====================================================
     * バリデーションルール
     *
     * @var array
     */
    public static $rules = array(
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|confirmed|regex:/^[a-zA-Z0-9]+$/',
      'birth' => 'required',
      'sex' => 'required|boolean',
    );

    /**
     * エラー返信処理
     *
     * @var array
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

  	public function errors()
  	{
    	return $this->errors;
  	}
    /**バリデーションここまで=================================================
     */

   /**リレーション=================================================
    */
   /**
    * エントリーオブジェクト取得
    *
    * @return object(Entries)
    */
    public function entries()
    {
      return $this->hasMany('App\Entry');
    }
    /**リレーションここまで=================================================
     */


    /*=========出場レギュレーション関連====================================*/
    /**
    * 年齢に関する出場レギュレーション分類
    *
    * @param int
    * @return array(int)
    *
    */
    public function ageClassify() {
      $age = $this->age;
      if (6<=$age && $age<=12) {
        return array(1, );
      } elseif (12<$age && $age<=15) {
        return array(2, );
      } elseif (15<$age && $age<=18) {
        return array(3, );
      } elseif (18<$age && $age<30) {
        return array(4, );
      } elseif (30<=$age && $age<50) {
        return array(4, 5,);
      } elseif (50<=$age) {
        return array(4, 5, 6,);
      }
    }

    /**
    * 性別に関する出場レギュレーション分類
    *
    * @param boolean
    * @return array(int)
    */
    public function sexClassify() {
      $sex = $this->attributes['sex'] == 1;
      if ($sex) {
        return array(1, 3,);
      } else {
        return array(2, 3,);
      }
    }
    /*=========出場レギュレーション分類 ここまで==============================*/




    /**====================================================================
    *  Userモデルのアクセサ
    *
     * Get 性別
     *
     * @param
     * @return string
    **/
    public function getTextSexAttribute()
    {
      if ($this->attributes['sex']==1) $sex = '男性';
      else $sex = '女性';
      return $sex;
    }

    /**
     * Get ID
     *
     * @param
     * @return string
    **/
    public function getIdAttribute()
    {
      return $this->attributes['id'];
    }
    /**
     * Get 氏名
     *
     * @param
     * @return string
    **/
    public function getNameAttribute()
    {
      return $this->attributes['name'];
    }
    /**
     * Get Email
     *
     * @param
     * @return string
    **/
    public function getEmailAttribute()
    {
      return $this->attributes['email'];
    }
    /**
     * Get Admin
     *
     * @param
     * @return string
    **/
    public function getAdminAttribute()
    {
      return $this->attributes['admin'];
    }
    /**
     * Get 生年月日
     *
     * @param
     * @return timestamp
    **/
    public function getBirthAttribute()
    {
      return $this->attributes['birth'];

    }
    /**
     * Get 年齢
     *
     * @param
     * @return int
    **/
    public function getAgeAttribute()
    {
      $birth = new Carbon($this->attributes['birth']);
      return $birth->age;
    }
    /**
     * Get パスワード
     *
     * @param
     * @return string
    **/
    public function getPasswordAttribute()
    {
      return $this->attributes['password'];
    }

    /**
    *  Userモデルのアクセサ　ここまで
    *************************************************************************/

}
