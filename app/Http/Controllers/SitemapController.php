<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Generate sitemap.xml dynamically.
     */
    public function index()
    {
        $articles = Article::where('status', 'published')
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->view('sitemap', [
            'articles' => $articles
        ])->header('Content-Type', 'text/xml');
    }
}
