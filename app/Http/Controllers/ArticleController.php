<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\LandingSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Public landing: show published articles
    public function publicIndex()
    {
        $articles = Article::where('published', true)->orderBy('published_at', 'desc')->paginate(6);
        $sections = LandingSection::where('published', true)->orderBy('order')->get();
        return view('public.landing', compact('articles', 'sections'));
    }

    public function show($id)
    {
        $article = Article::where('id', $id)->where('published', true)->firstOrFail();
        return view('public.article-show', compact('article'));
    }

    // Admin: list all articles (including unpublished)
    public function adminIndex()
    {
        $articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('roles.admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('roles.admin.articles.form', ['article' => new Article()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = $path;
        }

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        $data['user_id'] = Auth::id() ?? null;
        $data['published'] = $request->boolean('published');
        if ($data['published']) {
            $data['published_at'] = now();
        }

        $article = Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('roles.admin.articles.form', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = $path;
        }

        $data['published'] = $request->boolean('published');
        if ($data['published'] && !$article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel diperbarui.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel dihapus.');
    }
}
