<?php

namespace App\Http\Controllers\Backoffice\Mimimi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return view('backoffice.mimimi.category.index', compact('category'));
    } // End Method

    public function create()
    {
        return view('backoffice.mimimi.category.create');
    } // End Method

    public function store(Request $request)
    {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // read image from file system
        $img = $manager->read($image);

        // resize to 370 x 246 pixel
        $img->resize(370, 246);

        $save_url = 'upload/mimimi/category/' . $name_gen;
        // save modified image in new format 
        $img->toPng()->save($save_url);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('mimimi.category.index')->with($notification);
    } // End Method

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backoffice.mimimi.category.update', compact('category'));
    } // End Method

    public function update(Request $request)
    {
        $cat_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('category_image')) {

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());

            // read image from file system
            $img = $manager->read($image);

            // resize to 370 x 246 pixel
            $img->resize(370, 246);

            $save_url = 'upload/mimimi/category/' . $name_gen;
            // save modified image in new format 
            $img->toPng()->save($save_url);

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Category Updated with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('mimimi.category.index')->with($notification);
        } else {

            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            ]);

            $notification = array(
                'message' => 'Category Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('mimimi.category.index')->with($notification);
        } // end else

    } // End Method

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $img = $category->category_image;
        unlink($img);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method
}
