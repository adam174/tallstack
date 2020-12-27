<?php

namespace App\Http\Controllers\Voyager;


use App\Models\Category;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;


class VoyagerCategoryController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
   public function show(Request $request, $id)
    {

       $category = Category::findOrFail($id);
       $parents = category::has('children')->get();

       // dd($reservation->trip);

        return Voyager::view(('admin.category.read'), compact('category','parents'));
    }

    public function index(Request $request)
    {

       $categories = Category::has('parent')->get();

       // dd($reservation->trip);

        return Voyager::view(('admin.category.browse'), compact('categories'));
    }

    public function categoryUpdatePhoto(Request $request, $id)
    {

       // dd($request->file);
            $request->validate([
                 'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
             if ($request->has('file')) {
                 $category = Category::findOrFail($id);
                 $fileName = time().'_'.$request->file->getClientOriginalName();
                 $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                 $category->image = $filePath;
                 $category->save();
             }


       // dd($path);

        return redirect()->back()->with('success','Enregistré avec succès');
    }

        public function create(Request $request)
            {

              $parents = category::has('children')->get();
            // dd($reservation->trip);

                return Voyager::view(('admin.category.add'), compact('parents'));
            }


}
