<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent;

/**
 * Class User
 */
class User extends Authenticatable
{
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $guarded = [];
    
    protected $hidden = [
        'password', 'remember_token', 'last_login',
    ];

    public function user_metas() {
        return $this->hasMany('App\Models\UserMeta');
    }
    
	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}
    
    /**
	 * @return mixed
	 */
	public function getRememberToken() {
		return $this->remember_token;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setName($value) {
		$this->name = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setEmail($value) {
		$this->email = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setPassword($value) {
		$this->password = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setRememberToken($value) {
		$this->remember_token = $value;
		return $this;
	}



}