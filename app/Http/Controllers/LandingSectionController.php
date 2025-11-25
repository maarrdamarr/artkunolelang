<?php

namespace App\Http\Controllers;

use App\Models\LandingSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LandingSectionController extends Controller
{
    public function index()
    {
        $sections = LandingSection::orderBy('order')->paginate(15);
        return view('roles.admin.landing_sections.index', compact('sections'));
    }

    public function create()
    {
        return view('roles.admin.landing_sections.form', ['section' => new LandingSection()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'published' => 'nullable|boolean',
        ]);

        // handle uploaded image (store on public disk) or keep existing URL/path
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('landing', 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = $request->input('existing_image') ?? null;
        }

        $data['published'] = $request->boolean('published');
        LandingSection::create($data);

        return redirect()->route('admin.landing_sections.index')->with('success', 'Section dibuat.');
    }

    public function edit($id)
    {
        $section = LandingSection::findOrFail($id);
        return view('roles.admin.landing_sections.form', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = LandingSection::findOrFail($id);

        $data = $request->validate([
            'key' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
            'published' => 'nullable|boolean',
        ]);

        // If an image file is uploaded, store and remove old stored image if necessary
        if ($request->hasFile('image')) {
            // delete old stored file if it exists and is not an external URL
            if ($section->image && !Str::startsWith($section->image, ['http://', 'https://'])) {
                if (Storage::disk('public')->exists($section->image)) {
                    Storage::disk('public')->delete($section->image);
                }
            }
            $path = $request->file('image')->store('landing', 'public');
            $data['image'] = $path;
        } else {
            // preserve existing image (could be URL or stored path)
            $data['image'] = $request->input('existing_image') ?? $section->image;
        }

        $data['published'] = $request->boolean('published');
        $section->update($data);

        return redirect()->route('admin.landing_sections.index')->with('success', 'Section diperbarui.');
    }

    public function destroy($id)
    {
        $section = LandingSection::findOrFail($id);
        // delete stored image if it's a stored path (not external URL)
        if ($section->image && !Str::startsWith($section->image, ['http://', 'https://'])) {
            if (Storage::disk('public')->exists($section->image)) {
                Storage::disk('public')->delete($section->image);
            }
        }
        $section->delete();
        return redirect()->route('admin.landing_sections.index')->with('success', 'Section dihapus.');
    }
}
