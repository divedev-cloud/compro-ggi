<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('status', 'published')
            ->latest('published_at')
            ->paginate(9);

        return view('artikel.index', compact('articles'));
    }

    public function show(string $slug)
    {
        $article = Article::where('status', 'published')
            ->where('slug', $slug)
            ->with('author')
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
