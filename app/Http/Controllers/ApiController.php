<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Все публичные методы
 * Class SiteController
 *
 * @package App\Http\Controllers
 */
class ApiController
{

    private function tmpData()
    {
        return [
            'items' => [
                1 => [
                    'title'              => 'Настройка nginx на CentOS7',
                    'lead_text'          => 'Возможность логирования реквеста и респонса. Возникла задача логировать всё, что приходит на сервак и ответ. Для этого необходимо воспользоваться настройкой nginx и nginx_lua ',
                    'lead_img_url'       => 'http://kxxb.ru/img/post-bg.jpg',
                    'created_at'         => '16.10.2020 13:13:13',
                    'author'             => 'kxxb',
                    'author_profile_url' => 'about-kxxb.html',
                    'rating_count'       => 10,
                    'view_count'         => 20,
                    'slug'               => '/post/1-nginx-centos7-log-request-response-post.html'
                ],
                2 => [
                    'title'              => 'Как я блог делал',
                    'lead_text'          => 'Зачесалось у меня в одном месте, и решил попробовать силы в SPA, используя вдохновляющий фреймворк Vue.js',
                    'lead_img_url'       => 'http://kxxb.ru/img/home-bg.jpg',
                    'created_at'         => '16.10.2020 13:13:13',
                    'author'             => 'kxxb',
                    'author_profile_url' => 'about-kxxb.html',
                    'rating_count'       => 20,
                    'view_count'         => 200,
                    'slug'               => '/post/2-nginx-centos7-log-request-response-post.html'
                ]
            ],
            'total' => 10
        ];
    }

    public function swagger(Request $request)
    {
        return [
            'result'  => 'success',
            'message' => 'swagger',
            'data'    => []
        ];
    }

    public function getAll(Request $request)
    {
        return [
            'result'  => 'success',
            'message' => 'posts',
            'data'    => $this->tmpData()
        ];
    }

    public function getPost(Request $request, $id)
    {

        $data = $this->tmpData();

        if (isset($data['items'][$id])) {
            return [
                'result'  => 'success',
                'message' => 'post',
                'data'    => $data['items'][$id]
            ];
        }
        return ['result' => 'error', 'message' => 'not found', 'data' => []];
    }

    public function getPostComments(Request $request, $id)
    {
        return [
            'result'  => 'success',
            'message' => 'post',
            'data'    => [
                'comments' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?',
                'post'     => $id
            ]
        ];
    }

    public function getSettings(Request $request)
    {
        return [
            'result'  => 'success',
            'message' => 'settings',
            'data'    => [
                'site' => [
                    'brand'        => 'kxxb blog api',
                    'blog_entries' => [
                        'big'   => 'Полезные штуки',
                        'small' => 'экономят время'
                    ],
                    'menu' => [
                        'config' => ['placed'=>'top'],
                        'items'  => [
                            1 => ['title' => 'Home', 'url' => 'index.html'],
                            2 => ['title' => 'About', 'url' => 'about.html'],
                            3 => ['title' => 'Contact', 'url' => 'contact.html'],
                            4 => ['title' => 'Login', 'url' => 'login.html'],
                        ]

                    ],
                    'copyright'   => 'kxxb 2020',
                    'widgets'     => [
                        1 => [
                            'name'   => 'search',
                            'title'  => 'Поиск',
                            'available' => 'false',
                            'config' => ['placeholder_text'=> 'Найти в блоге', 'search_button_text'=>'Go!']
                        ],
                        2 => [
                            'name'   => 'sections',
                            'title'  => 'Секции',
                            'available' => 'true',
                            'config' => [
                                'items'=> [1=>'PHP', 2=>'DevOps', 3=>'Tutorial']
                            ]
                        ],
                        3 => [
                            'name'   => 'search',
                            'title'  => 'Информер',
                            'available' => 'true',
                            'config' => [
                                'content' => 'You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!'
                            ]
                        ],
                    ]
                ]
            ]
        ];
    }
}
