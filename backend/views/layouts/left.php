<?php
use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
            ]
        ) ?>
    </section>
</aside>