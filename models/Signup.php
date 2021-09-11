<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model 
{

    public $login;
    public $fio;
    public $pass;
    public $role;

    public function rules(){
        
        return [
            [['login','pass'], 'required', 'message' => 'Поле не заполнено'],
            ['login', 'unique', 'targetClass'=>'app\models\Users', 'message' => 'Такой логин уже используется']
        ];
    }

    public function signup() {
        $user = new Users();
        $user->login = $this->login;
        $user->pass = sha1($this->pass);
        return $user->save();
    }

}