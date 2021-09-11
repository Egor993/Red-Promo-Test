<?php

namespace app\models;

use yii\base\Model;

class Login extends Model 
{

    public $login;
    public $pass;

    public function rules(){
        return [
            [['login','pass'], 'required', 'message' => 'Поле не заполнено'],
            [['pass'], 'validatePass']
        ];
    }

    public function validatePass ($attribute, $params){
        $user = Users::findOne(['login'=>$this->login]);
        if(!$user or ($user->pass != sha1($this->pass))) {
            $this->addError($attribute, 'Логин или пароль введены неверно');
        }
    }

}