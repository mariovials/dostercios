<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
  public $usuario;
  public $password;
  public $recordarme;

  private $_identity;

  /**
   * Declares the validation rules.
   * The rules state that username and password are required,
   * and password needs to be authenticated.
   */
  public function rules()
  {
   return array(
    // username and password are required
    array('usuario, password', 'required'),
    // recordarme needs to be a boolean
    array('recordarme', 'boolean'),
    // password needs to be authenticated
    array('password', 'authenticate'),
   );
  }

  /**
   * Declares attribute labels.
   */
  public function attributeLabels()
  {
   return array(
    'usuario'=>'Usuario',
    'password'=>'Contraseña',
    'recordarme'=>'Recordar la próxima vez',
   );
  }

  /**
   * Authenticates the password.
   * This is the 'authenticate' validator as declared in rules().
   */
  public function authenticate($attribute,$params)
  {
   if(!$this->hasErrors())
   {
    $this->_identity=new UserIdentity($this->usuario,$this->password);
    if(!$this->_identity->authenticate())
     $this->addError('password','Nombre de usuario o contraseña inválidas.');
   }
  }

  /**
  * Logs in the user using the given username and password in the model.
  * @return boolean whether login is successful
  */
  public function login()
  {
    if($this->_identity===null) {
      $this->_identity=new UserIdentity($this->usuario,$this->password);
      $this->_identity->authenticate();
    }
    if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
      $duration=$this->recordarme ? 3600*24*30 : 0; // 30 days
      Yii::app()->user->login($this->_identity, $duration);
      return true;
    }
    else
      return false;
  }

}
