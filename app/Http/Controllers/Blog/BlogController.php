<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = (object)[];
        try {
            $blogs = Blogs::query()->latest()->get();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }

        return view('blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $blog = new Blogs();
            $blog->title = $request->title;
            $blog->content = $request->blog_content;
            $blog->save();

            DB::commit();

            return redirect()->route('blog.index')->with('success','Blog created successfully!');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());

            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
