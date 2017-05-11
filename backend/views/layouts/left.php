<aside class="main-sidebar">

    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->

        <?php

        $menu = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id,null,function ($data){
            $menu['label'] = $data['name'];
            $menu['url'] = $data['route'] ?: '#';
            isset($data['children']) && !empty($data['children']) && $menu['items'] = $data['children'];
            if(isset($data['data']) && !empty($data['data'])){
                foreach (json_decode($data['data'],true) as $k => $v){
                    $k=='icon' && $menu['icon']=$v;
                    $k=='visible' && $v;
                    $menu['options'][$k] = $v;
                }
            }
            return $menu;
        });

        $toolMenu = [];
        if (YII_DEBUG) {
            $toolMenu = [
                ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']]
            ];
            $menu = array_merge($menu, $toolMenu);
        }

        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menu,
            ]
        );

        ?>


    </section>

</aside>
