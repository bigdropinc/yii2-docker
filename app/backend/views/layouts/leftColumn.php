<?php
echo \yiister\gentelella\widgets\Menu::widget(
    [
        'items' => [
            ['label' => 'Home', 'url' => ['site/index'], 'icon' => 'home'],
        ],
    ]
);
