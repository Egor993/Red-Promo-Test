<?php

use \yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>
<div class="content clearfix">
		<h3 class="line">Похожие новости</h3>
        <?php foreach ($similarNews as $val): ?>
			<div class="news">
				<img src="web/img/<?php echo $val['img']; ?>" class="img" alt="">
				<a href="/news?id=<?php echo $val['id'] ?>"><h4><?php echo $val['name']; ?></h4></a>
				<p><?php echo $val['description']; ?></p>
			</div>
        <?php endforeach; ?>

</div>

<h2><?php echo $model['name']; ?></h2>

<div class="image">
    <img src="web/img/<?php echo $model['img']; ?>" />
</div>
<hr>
<p class="description"><?php echo $model['description']; ?></p>
