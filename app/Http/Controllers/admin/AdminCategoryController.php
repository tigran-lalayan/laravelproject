<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the FAQs.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = FaqCategory::all();
        return view('admin_category_index', compact('categories'));
    }

    /**
     * Show the form for creating a new FAQ.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin_category_create',compact('categories'));
    }



    /**
     * Store a newly created FAQ in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new FaqCategory();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin_category_index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = FaqCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin_category_index')->with('success', 'Category updated successfully.');
    }

        /**
     * Show the form for editing the specified FAQ.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = FaqCategory::findOrFail($id);
        return view('admin_category_edit', compact('category'));
    }


    public function delete($id)
    {
        $category = FaqCategory::findOrFail($id);
        $faqs = Faq::where('faq_category_id', $id)->get();
        if(count($faqs) > 0) {
            return redirect()->route('admin_category_index')->with('error', 'Cannot delete category with linked FAQs. Please delete the related FAQs first');
        }
        $category->delete();
        return redirect()->route('admin_category_index')->with('success', 'Faq category deleted successfully.');
    }




}

