<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blog = Blogs::all();
        return view('panel.blogs.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "title" => ["required", "min:3"],
            "body"=> ["required","min:5"],
        ]);

        Blogs::create([
            "user_id" => 1,
            "title" => $request->title,
            "body" => $request->body
        ]);

        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blogs::find($id);

        return view('panel.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blogs::find($id);

        return view('panel.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => ["required", "min:3"],
            "body"=> ["required","min:5", "max:2000"],
        ]);

        $blog = Blogs::findOrFail($id);
        
        $blog->update([
            "title" => $request->title,
            "body" => $request->body
        ]);

        return redirect("blogs/" . $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blogs::findOrFail($id);

        $blog->delete();

        return redirect("/blogs");
    }
}
