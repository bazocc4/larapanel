<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent;
use Validator;
use Hash;

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
        'password_confirmation',
        'role',
        'status',
    ];

    protected $guarded = [];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function boot()
    {
        parent::boot();
        
        static::saving(function($users){
            
            if($users->__isset('password'))
            {
                $pass = $users->getAttribute('password');
                
                if( Hash::needsRehash($pass) )
                {
                    $users->setAttribute('password', bcrypt($pass) );
                }
            }
            
            if($users->__isset('password_confirmation'))
            {
                $users->__unset('password_confirmation');
            }
            
        });
        
        static::deleting(function($users){
            $users->user_metas()->delete();
        });
    }
    
    public static function rules($id)
    {
        return [
            'name'  => 'required',
            
            // unique validation format => unique:table,column,except,idColumn
            'email' => 'required|email|unique:users,email'.( $id ? ','.$id : '' ),
            
            'password' => ( $id ? '' : 'required|' ).'min:5|confirmed',
        ];
    }
    
    public function isValid()
    {
        $validation = Validator::make( $this->attributes , self::rules($this->id) );

        if($validation->passes())
        {
            if(empty($this->password)) // user don't plan to change password !!
            {
                unset($this->password);
            }
            
            return true;
        }
        else
        {
            $this->errors = $validation->messages();
            return false;
        }
    }

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