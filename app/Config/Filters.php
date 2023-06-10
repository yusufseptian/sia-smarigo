<?php

namespace Config;

use App\Filters\FilterAdmin;
use App\Filters\FilterGuru;
use App\Filters\FilterLogin;
use App\Filters\FilterOrtu;
use App\Filters\FilterSiswa;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'login'         => FilterLogin::class,
        'admin'         => FilterAdmin::class,
        'ortu'          => FilterOrtu::class,
        'siswa'         => FilterSiswa::class,
        'guru'          => FilterGuru::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            'login' => ['except' => ['auth/', 'auth/*']]
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
        'admin' => [
            'before' => ['guru', 'guru/*', 'siswa', 'siswa/*', 'ortu*', 'kelas*', 'mapel*', 'jadwal*', 'tahunajaran*', 'pengumuman*', 'admin_profil*'],
        ],
        'ortu' => [
            'before' => ['ortu_profil*']
        ],
        'guru' => [
            'before' => ['penilaianakademik*', 'deskripsinilaiakhir*', 'guru_profil*', 'penilaiannonakademik*', 'eraport', 'eraport/', 'eraport/index']
        ],
        'siswa' => [
            'before' => ['siswa_profil*']
        ]
    ];
}
