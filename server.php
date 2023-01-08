<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';


// @if($pengaduan->status == '0')
// <span class="px-3 bg-gradient-danger text-white">
// {{ $pengaduan->status }}
// </span>
// @elseif ($pengaduan->status == 'Proses')
// <span class= "px-3 bg-gradient-warning text-white">{{ $pengaduan->status }}
// </span>
// @else
// <span class= "px-3 bg-gradient-success text-white">{{ $pengaduan->status }}
// </span>
// @endif

// <td>{{ Str::limit($pengaduan->isi_laporan,50) }}</td>
