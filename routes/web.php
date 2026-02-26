<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/',  FrontController::class)->name('front.index');

// SEO
Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');
Route::get('/blog/feed', RssFeedController::class)->name('blog.feed');
Route::get('/robots.txt', fn () => response(
    "User-agent: *\nAllow: /\n\nSitemap: " . url('/sitemap.xml'),
    200,
    ['Content-Type' => 'text/plain']
))->name('robots');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/tag/{tag:slug}', [BlogController::class, 'tag'])->name('blog.tag');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Portfolio
Route::get('/portfolio', PortfolioController::class)->name('portfolio.index');

// Contact
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dynamic pages (catch-all, MUST be last)
Route::get('/{page:slug}', [PageController::class, 'show'])->name('page.show');
