<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site']],

                    //ARTIKEL
                    // ['label' => 'Artikel', 'icon' => 'circle-o', 'url' => ['/artikel']],

                    //EVENT
                    ['label' => 'Event', 'icon' => 'circle-o', 'url' => ['/event'], 'visible' => Yii::$app->user->identity->id == 1],

                    //PRODUK KELEMBAGAAN
                    // ['label' => 'Produk Kelembagaan', 'icon' => 'circle-o', 'url' => ['/produkkelembagaan'],],

                    //JADWAL IBADAH
                    ['label' => 'Jadwal Ibadah', 'icon' => 'circle-o', 'url' => ['/ibadah'], 'visible' => Yii::$app->user->identity->id == 1],

                    //RENUNGAN HARIAN
                    ['label' => 'Renungan Harian', 'icon' => 'circle-o', 'url' => ['/renungan'], 'visible' => Yii::$app->user->identity->id == 1],

                    //MUTIARA PAGI
                    ['label' => 'Mutiara Pagi', 'icon' => 'circle-o', 'url' => ['/mutiarapagi'], 'visible' => Yii::$app->user->identity->id == 1],

                    //Wirausaha
                    ['label' => 'Kewirausahaan', 'icon' => 'circle-o', 'url' => ['/wirausaha'], 'visible' => Yii::$app->user->identity->id == 1],

                    //SLIDESHOW
                    ['label' => 'Slideshow', 'icon' => 'circle-o', 'url' => ['/slide'], 'visible' => Yii::$app->user->identity->id == 1],

                    //BIODATA
                    [
                        'label' => 'Biodata', 
                        'icon' => 'users', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Biodata Jemaat', 'icon' => 'circle-o', 'url' => ['/biodata'],],
                            ['label' => 'Biodata Majelis', 'icon' => 'circle-o', 'url' => ['/biodatamajelis'], 'visible' => Yii::$app->user->identity->id == 1],
                            ['label' => 'Biodata Pendeta', 'icon' => 'circle-o', 'url' => ['/biodatapendeta'], 'visible' => Yii::$app->user->identity->id == 1],
                            ['label' => 'Import Biodata', 'icon' => 'circle-o', 'url' => ['/batch'],],
                        ]
                    ],

                    //MASTER DATA
                    [
                        'label' => 'Master Data', 
                        'icon' => 'cogs', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gereja', 'icon' => 'circle-o', 'url' => ['/gereja']],
                            ['label' => 'Jemaat', 'icon' => 'circle-o', 'url' => ['/jemaat']],
                            ['label' => 'Sektor', 'icon' => 'circle-o', 'url' => ['/sektor']],
                            ['label' => 'Unit', 'icon' => 'circle-o', 'url' => ['/unit']],
                            ['label' => 'Kategori Usaha', 'icon' => 'circle-o', 'url' => ['/kategoriusaha']],
                            ['label' => 'Usaha', 'icon' => 'circle-o', 'url' => ['/usaha']],
                        ], 
                        'visible' => Yii::$app->user->identity->id == 1
                    ],

                ],
            ]
        ) ?>

    </section>

</aside>
