<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')
            ->with(['author', 'category'])
            ->latest('published_at')
            ->paginate(9);

        $categories = ArticleCategory::whereHas('articles', function ($query) {
            $query->where('status', 'published');
        })->orderBy('name')->get();

        return view('artikel.index', compact('articles', 'categories'));
    }

    public function category(string $slug)
    {
        $category = ArticleCategory::where('slug', $slug)->firstOrFail();

        $articles = Article::where('status', 'published')
            ->where('article_category_id', $category->id)
            ->with(['author', 'category'])
            ->latest('published_at')
            ->paginate(9);

        $categories = ArticleCategory::whereHas('articles', function ($query) {
            $query->where('status', 'published');
        })->orderBy('name')->get();

        return view('artikel.index', compact('articles', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $article = Article::where('status', 'published')
            ->where('slug', $slug)
            ->with(['author', 'category'])
            ->firstOrFail();

        $wordCount   = str_word_count(strip_tags($article->content));
        $readingTime = max(1, ceil($wordCount / 200));

        $otherArticles = Article::where('status', 'published')
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('artikel.show', compact('article', 'readingTime', 'otherArticles'));
    }
}
