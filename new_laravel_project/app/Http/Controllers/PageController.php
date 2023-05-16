<?php

namespace App\Http\Controllers;

use App\Events\PageCreated;
use App\Models\Page;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $pages = Page::all();
        return view('pages.index')->with([
            'pages' => $pages,
        ]);
    }


    public function create()
    {
        return view('pages.create');
    }


    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $name = $request->File('photo')->getClientOriginalName();
            $path = $request->File('photo')->storeAs('pages-photo', $name);
        }


        $request->validate([
            'name' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image',
        ]);
        
        $page = Page::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? null,

        ]);

        PageCreated::dispatch($page);

        return redirect()->route('pages.index');
    }


    public function show(Page $page)
    {
        return view('pages.show')->with([
            'page' => $page,
        ]);
    }

    public function edit(Page $page)
    {
        $this->authorize('update', $page);
        // Gate::authorize('update-page', $page);

        return view('pages.edit')->with([
            'page' => $page,
        ]);
    }


    public function update(Request $request, Page $page)
    {

        $this->authorize('update', $page);
        // Gate::authorize('update-page', $page);

        if ($request->hasFile('photo')) {

            if (isset($page->photo)) {
                Storage::delete($page->photo);
            }
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('page-photos', $name);
        }


        $page->update([
            'name' => $request->name,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $page->photo,
        ]);

        return redirect()->route('pages.show', [$page->id]);
    }


    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);
        // Gate::authorize('delete-post', $page);


        if (isset($page->photo)) {
            Storage::delete($page->photo);
        }

        $page->delete();

        return redirect()->route('pages.index');
    }
}
