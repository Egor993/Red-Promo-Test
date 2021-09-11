<?php

use \yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>

<div class="search">
    <?php ActiveForm::begin([
                'method' => 'get',
                'action' => ['/'],
    ]);?>
        <input type="text" placeholder="Поиск.." name="search">
        <?= Html::submitButton('Искать') ?>
    <?php ActiveForm::end() ?>
</div>

<section class="grid">
<?php foreach ($newsList as $news): ?>
    <article class="grid-item">
        <div class="image">
            <img src="web/img/<?php echo $news['img']; ?>" />
        </div>
        <div class="info">
		<?php if (strpos((string)$user['favorites'], '№'.(string)$news['id'].',') !== false): ?>
			<p class="favorite">Избранная новость</p>
		<?php elseif(isset($user)): ?>
			<?php ActiveForm::begin(['class'=>'form-horizontal']);?>
				<?= Html::submitButton('Добавить в избранное', ['name' => 'favorite', 'value' => $news['id'], 'class'=>'btn btn-success']) ?>
			<?php ActiveForm::end();?>
		<?php endif ?>
            <h2><?php echo $news['name']; ?></h2>
            <div class="info-text">
                <p><?php echo $news['description']; ?></p>
            </div>
            <div class="button-wrap">
                <a class="atuin-btn" href="/news?id=<?php echo $news['id'] ?>">Подробнее</a>
            </div>
        </div>
    </article>    
<?php endforeach; ?>

</section>

	