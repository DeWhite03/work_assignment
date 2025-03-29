<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use rmrevin\yii\fontawesome\FA;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<main id="main" class="flex-grow-1" role="main">
    <div class="body-container d-flex flex-row h-100">
        <div class="sidebar h-100 ps-2 pt-2">
            <div class="d-flex flex-column flex-shrink-0 p-0 mt-0">
                <a href="/" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <span class="fs-4">My company</span>
                </a>
                <hr class="my-1">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link" aria-current="page">
                            <?= FA::icon('home') ?>
                            <?= Yii::t('app', 'Home') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <?= FA::icon('tachometer') ?>
                            <?= Yii::t('app', 'Dashboard') ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <?= FA::icon('shopping-cart') ?>
                            <?= Yii::t('app', 'Orders') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content mt-2 w-100 px-3 pt-2">
            <?= $content ?>
        </div>
        <div class="right-sidebar rounded m-2 p-2">
            <h4 class=""><?= Yii::t('app', 'Right sidebar') ?></h4>
            <hr class="my-1">
            <div class="ps-1 "><?=Yii::t('app', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.') ?></div>
        </div>
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-secondary">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; App <?= date('Y') ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
