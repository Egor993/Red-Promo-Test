<?php

namespace app\models;

use yii\base\Model;

class Add extends Model 
{

    public $favorites;

    public function AddFavorites($user, $id) {
        
        $user = Users::findOne(['login'=>$user]);
        $user->favorites = $user->favorites.'№'.$id.',';
        return $user->save();
    }

}