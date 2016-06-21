<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserMeta
 */
class UserMeta extends Model
{
//    protected $table = 'user_metas';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'key',
        'value'
    ];

    protected $guarded = [];
    
    protected $touches = ['user'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
	/**
	 * @return mixed
	 */
	public function getUserId() {
		return $this->user_id;
	}

	/**
	 * @return mixed
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserId($value) {
		$this->user_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setKey($value) {
		$this->key = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setValue($value) {
		$this->value = $value;
		return $this;
	}



}