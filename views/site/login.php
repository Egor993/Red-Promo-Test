<?php

use \yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>

<div class="container">
    <h2>Авторизация</h2>
	<?php
		$form = ActiveForm::begin(['class'=>'form-horizontal']);
	?>

	<?= $form->field($login_model,'login')->textInput(['autofocus'=>true])->label('Логин')?>
    <?= $form->field($login_model,'pass')->passwordInput()->label('Пароль')?>

	<div>
		<button type="submit" class="btn btn-primary">Отправить</button>
	</div>

	<?php ActiveForm::end();?>

</div>

</body>
</html>

