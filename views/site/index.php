<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */

/** @var array $projectsWithProgress */


use yii\bootstrap5\Progress;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (!empty($projects)): ?>
        <h4><?php echo Yii::t('app', 'Project progress') ?></h4>
        <div class="flex p-2 border border-1 border-dark rounded bg-light">
            <div class="row">
                <div class="col-3"><?= Yii::t('app', 'Project id') ?></div>
                <div class="col-9 my-1"><?= Yii::t('app', 'Project completion') ?></div>
            </div>
            <hr class="my-1">
            <?php foreach ($projectsWithProgress as $project): ?>
                <?= $this->render('/project/project', ['project' => $project['project'], 'progress' => $project['progress']]) ?>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No projects found.</p>
    <?php endif; ?>
</div>
