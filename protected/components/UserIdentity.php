<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	private $_id;

	public function getId()
	{
	    return $this->_id;
	}

	public function authenticate()
	{
		// $users=array(
		// 	// username => password
		// 	'demo'=>'demo',
		// 	'admin'=>'admin',
		// );
		$user = User::model()->findByAttributes(array('EMAIL'=>$this->username));

		// if(!isset($users[$this->username]))
		// 	$this->errorCode=self::ERROR_USERNAME_INVALID;
		// elseif($users[$this->username]!==$this->password)
		// 	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else
		// 	$this->errorCode=self::ERROR_NONE;
		if ($user===null) { // No user found!
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if ($user->PASSWORD !== crypt($this->password, $user->PASSWORD)) { // Invalid password!$this->password) { //
		    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else { // Okay!
		    $this->errorCode=self::ERROR_NONE;
		    // Store the role in a session:
		    $this->setState('role', $user->ROLE);
		    $this->_id = $user->ID;
		}

		return !$this->errorCode;
	}
}