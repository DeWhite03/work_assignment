<?php

/** @var yii\web\View $this */
/** @var app\models\Project $project */

/** @var int $progress */

use yii\bootstrap5\Progress;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <?php
        $barStyle = 'bg-success';
        if ($progress < 100) {
            $barStyle = 'progress-bar-striped progress-bar-animated bg-warning text-secondary';
        }
        ?>

        <div class="row">
            <div class="col-3"><?= $project->name ?></div>
            <div class="col-9 my-1">
                <?= Progress::widget([
                    'percent' => $progress,
                    'label' => $progress . '% ' . Yii::t('app', 'Completed'),
                    'barOptions' => ['class' => $barStyle],
                    'options' => ['class' => 'border-0 border-2 border-secondary'],
                ]) ?>
            </div>
        </div>
    </div>
</div>
