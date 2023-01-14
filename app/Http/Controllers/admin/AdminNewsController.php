<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = News::orderBy('publishing_date', 'desc')->get();
        return view('admin_news_index', compact('news'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin_news_create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'cover_image' => 'required|image',
            'content' => 'required',
        ]);
        $path = $request->file('cover_image')->store('public/news');
        $validatedData['cover_image'] = $path;
        $validatedData['publishing_date'] = now();  // set the publishing date to the current date and time
        News::create($validatedData);
        return redirect()->route('admin_news_index')->with('success', 'News created successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin_news_edit', compact('news'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $news = News::findOrFail($id);
        $news->update($validatedData);
        $news->publishing_date = now();  // set the publishing date to the current date and time

        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $fileName = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $fileName);
            $news->cover_image = $fileName;
        }

        $news->save();
        return redirect()->route('admin_news_index')->with('success', 'News item updated successfully.');
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        Storage::delete($news->cover_image);
        $news->delete();

        return redirect()->route('admin_news_index')->with('success', 'News item deleted successfully.');
    }

}
