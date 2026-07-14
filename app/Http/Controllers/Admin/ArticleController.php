<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author')->latest()->paginate(15);

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $users = User::where('is_active', true)->orderBy('full_name')->orderBy('name')->get();
        $categories = ArticleCategory::orderBy('name')->get();

        return view('admin.articles.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string|max:500',
            'content'      => 'required|string',
            'thumbnail'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'       => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'author_id'    => 'nullable|exists:users,id',
            'category_name'=> 'nullable|string|max:255',
        ]);

        $data['slug']      = $this->uniqueSlug($request->title);
        $data['author_id'] = $data['author_id'] ?? Auth::id();

        if (!empty($data['category_name'])) {
            $category = ArticleCategory::firstOrCreate(
                ['name' => $data['category_name']],
                ['slug' => Str::slug($data['category_name']) ?: 'kategori-' . time()]
            );
            $data['article_category_id'] = $category->id;
        }
        unset($data['category_name']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil disimpan.');
    }

    public function edit(Article $article)
    {
        $users = User::where('is_active', true)->orderBy('full_name')->orderBy('name')->get();
        $categories = ArticleCategory::orderBy('name')->get();

        return view('admin.articles.edit', compact('article', 'users', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'excerpt'          => 'nullable|string|max:500',
            'content'          => 'required|string',
            'thumbnail'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'remove_thumbnail' => 'nullable|boolean',
            'status'           => 'required|in:draft,published',
            'published_at'     => 'nullable|date',
            'author_id'        => 'nullable|exists:users,id',
            'category_name'    => 'nullable|string|max:255',
        ]);

        if ($request->boolean('remove_thumbnail') && $article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
            $data['thumbnail'] = null;
        } elseif ($request->hasFile('thumbnail')) {
            if ($article->thumbnail) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            unset($data['thumbnail']);
        }

        if (!empty($data['category_name'])) {
            $category = ArticleCategory::firstOrCreate(
                ['name' => $data['category_name']],
                ['slug' => Str::slug($data['category_name']) ?: 'kategori-' . time()]
            );
            $data['article_category_id'] = $category->id;
        } else {
            $data['article_category_id'] = null;
        }
        unset($data['category_name']);

        if (empty($data['author_id'])) {
            $data['author_id'] = $article->author_id ?? Auth::id();
        }

        if ($data['title'] !== $article->title) {
            $data['slug'] = $this->uniqueSlug($data['title'], $article->id);
        }

        if ($data['status'] === 'published' && empty($data['published_at']) && ! $article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096']);

        $path = $request->file('image')->store('content-images', 'public');

        return response()->json(['url' => Storage::url($path)]);
    }

    private function uniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug     = Str::slug($title) ?: 'artikel-' . time();
        $original = $slug;
        $count    = 1;

        while (
            Article::where('slug', $slug)
                ->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }
}
