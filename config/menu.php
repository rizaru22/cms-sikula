<?php
    return [
        [
            'label' => 'Dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'route' => 'admin.dashboard',
            'permission' => null
        ],
        [
            'label'=>'Konten',
            'icon'=>'fas fa-newspaper',
            'children'=>[
                [
                    'label'=>'Berita',
                    'icon'=>'fas fa-file',
                    'route'=>'admin.news.index',
                    'permission'=>null
                ],
                [
                    'label'=>'Prestasi',
                    'icon'=>'fas fa-award',
                    'route'=>'admin.achievement.index',
                    'permission'=>null
                ],
                [
                    'label'=>'Pengumuman',
                    'icon'=>'fas fa-bullhorn',
                    'route'=>'admin.announcement.index',
                    'permission'=>null
                ],
                [
                    'label'=>'Agenda',
                    'icon'=>'fas fa-calendar-day',
                    'route'=>'admin.agenda.index',
                    'permission'=>null
                ],
                [
                    'label'=>'Produk',
                    'icon'=>'fas fa-cart-plus',
                    'route'=>'admin.product.index',
                    'permission'=>null
                ],
            ]

        ],
        [
            'label'=>'Pengaturan',
            'icon'=>'fas fa-cogs',
            'children'=>[
                [
                    'label'=>'Profil Sekolah',
                    'icon'=>'fas fa-address-card',
                    'route'=>'admin.profile.index',
                    'permission'=>null
                ],
                [
                    'label'=>'Carousel',
                    'icon'=>'fas fa-images',
                    'route'=>'admin.carousel.index',
                    'permission'=>null
                ],
                [
                    'label'=>'Pengguna',
                    'icon'=>'fas fa-users',
                    'route'=>'admin.users.index',
                    'permission'=>null
                ],
            ]
        ],

    ];