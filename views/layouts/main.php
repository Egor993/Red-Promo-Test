<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php $this->registerJsFile($js); ?>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title = 'Новости IT') ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <nav id="w0" class="navbar-inverse navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                        <a class="navbar-brand" href="/">Новости IT</a>
                </div>
                <div id="w0-collapse" class="collapse navbar-collapse">
                    <ul id="w1" class="navbar-nav navbar-right nav">
                        <?php if(!isset($_SESSION['user'])): ?>
                            <li><a href="/login">Вход</a></li>
                            <li><a href="/signup">Регистрация</a></li>
                        <?php else: ?>
                            <li><a href="/logout">Выход</a></li>
                        <?php endif; ?>
                        <li><a href="" class="submenu-link">Город</a>
                        <ul class="submenu">
                            <li><a href="/?City=Moscow">Москва</a></li>
                            <li><a href="/?City=Voronezh">Воронеж</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">

    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>