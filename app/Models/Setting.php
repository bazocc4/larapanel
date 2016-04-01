<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 */
class Setting extends Model
{
    protected $table = 'settings';

    public $timestamps = true;

    protected $fillable = [
        'key',
        'value'
    ];

    protected $guarded = [];

    
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