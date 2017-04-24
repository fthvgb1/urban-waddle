<aside class="main-sidebar">

    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id,null,function ($data){
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
                }),
            ]
        );

        ?>


    </section>

</aside>
