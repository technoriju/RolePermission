<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;
class Prasenjit extends Controller
{
    public function imageAdd() {

        return view('prasenjit.imageAdd');
    }
    public function imageStore(Request $request) {

        // print_r($request->all()); die;
        $validator = Validator::make($request->all(),
        [
            'category_id' => 'required|integer',
            // 'post_id' => 'required',
            'mainpost' => 'required|integer',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if($validator->fails()):
            return redirect()->back()->withErrors($validator)->withInput();
        else:
        $category_id = $request->category_id;
        $post_ids = $request->post_id; // Get the array of selected post_ids
        $mainpost = $request->mainpost; // Get the array of selected post_ids

        $images = count($request->file('images'));
        $duplicateSlugs = [];
        $count = 0;

        foreach (collect($request->file('images')) as $image) { $count++;
            $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $slug = Str::slug($originalFileName);
            $filename = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/images'), $filename);

            $likes = mt_rand(400, 2000);
            // Check if the slug already exists in the database
            if (Image::where('slug', $slug)->exists()) {
                $duplicateSlugs[] = $slug;
            } else {
                // Save the image record to the database for each image and each selected post_id
                $imageData = new Image();
                $imageData->title = $originalFileName;
                $imageData->slug = $slug;
                $imageData->filename = $filename;
                $imageData->category_id = $category_id;
                $imageData->post_id = implode(',', $post_ids);
                $imageData->likes = $likes;
                $imageData->mainpost = $mainpost;
                $imageData->user_id = 1;
                // Add other fields as necessary
                $imageData->save();
            }
        }
        endif;

        return redirect()->back()->with('success', $count."___".$images. 'Images uploaded successfully.');
    }
}
