<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Users;
use app\models\Signup;
use app\models\Login;
use app\models\News;
use app\models\Add;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        // Получаем данные пользователя если он зарегистрирован
        $username = $_SESSION['user'];
        $user = Users::find()->where(['login' => $username])->one();

        //Получаем данные новостей
        $newsList = News::find()->all();

        // Если была нажата кнопка поиска, то ищем подходящие новости
        if (Yii::$app->request->get('search') !== null){
            $newsList = News::find()->where(['like', 'name', Yii::$app->request->get('search')])->all();
        }

        // Если был выбран город, то ищем общие новости и новости с нужным городом
        if (Yii::$app->request->get('City') !== null){
            $newsList = News::find()->where(['City' => Yii::$app->request->get('City')])->orwhere(['City' => NULL])->all();
        }

        // Добавляем нужную новость в избранное
        if (Yii::$app->request->post('favorite') !== null){
            $vac_model = new Add();
            $vac_model->AddFavorites($username, Yii::$app->request->post('favorite'));
            $this->goHome();
        }

        // Если длина описания больше 150 символов, то обрезаем строку и добавляем ...
        foreach ($newsList as &$news) {
            if(strlen($news['description']) > 150) {
                $news['description'] = mb_substr($news['description'], 0, 150).'...';
            }
        }

        return $this->render('index', compact('newsList','user'));
    }

    public function actionNews()
    {
        $newsId = Yii::$app->request->get('id');
        $similarNews = News::find()->limit(3)->all();

        // Если длина описания больше 150 символов, то обрезаем строку и добавляем "..."
        foreach ($similarNews as &$news) {
            if(strlen($news['description']) > 150) {
                $news['description'] = mb_substr($news['description'], 0, 150).'...';
            }
        }
        
        $model = News::find()->where(['id' => $newsId])->one();
        return $this->render('news', compact('model', 'similarNews'));
    }

    public function actionSignup()
    {
        $model = new Signup();
        if(Yii::$app->request->post('Signup')){
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() and $model->signup()) {
                $_SESSION['user'] = $model->login;
                $this->goHome();
            }
        }
        return $this->render('singup', compact('model'));
    }

    public function actionLogin() {

        $login_model = new Login();
        if(Yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');
            if ($login_model->validate()) {
                $_SESSION['user'] = $login_model->login;
                $this->goHome();
            }
        }

        return $this->render('login', compact('login_model'));

    }

    public function actionLogout()
    {
        unset($_SESSION['user']);

        return $this->goHome();
    }

}
