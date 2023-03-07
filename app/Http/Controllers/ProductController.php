<?php

namespace App\Http\Controllers;

use App\Models\Rim;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('images', 'category')->get();

        return view('vendor.voyager.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        $rim = Rim::where('product_id', $id)->first();

        return view('vendor.voyager.products.show', [
            'rim' => $rim,
            'product' => $product
        ]);
    }


    public function create()
    {
        $categories = Category::all();
        $products = Product::with('images', 'category')->get();
        return view('vendor.voyager.products.create', [
            'categories' => $categories,
            'product' => $products
        ]);
    }

    public function store(Request $request)
    {
        //Validate the request for products
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'images' => 'required',
            'thumbnail' => 'required'
        ]);

        //Create a new product
        $product = Product::create($request->all());

        // Check if the request has images and store them
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(storage_path('/images/products/'), $filename);

                Image::create([
                    'product_id' => $product->id,
                    'path' => $filename,
                ]);
            }
        }

        // Check if the request has a thumbnail and store it
        if ($request->hasFile('thumbnail')) {
            $thumbnailFile = $request->file('thumbnail');
            $thumbnailName = uniqid() . '.' . $thumbnailFile->getClientOriginalExtension();
            $thumbnailFile->move(storage_path('/images/products/'), $thumbnailName);

            Image::create([
                'product_id' => $product->id,
                'path' => $thumbnailName,
                'thumbnail' => 1,
            ]);
        }

        // Get the category name based on the category_id
        $category = Category::find($request->input('category_id'));

        if ($category->name === 'Rims') {
            $request->validate([

                'diameter' => 'required|numeric',
                'width' => 'required|numeric',
                'bolt_pattern' => 'required|string',
                'offset' => 'required|numeric'
            ]);
            Rim::create(
                array_merge($request->all(), ['product_id' => $product->id])
            );
        }

        //Redirect to the product index page with a success message
        return redirect()->route('products.create')->with('success', 'Product created successfully');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $rim = Rim::where('product_id', $id)->first();
        $categories = Category::all();
        return view('vendor.voyager.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'rim' => $rim
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        // Validate the request for products
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        // Update the product
        $product->update($request->all());

        // Check if the request has an image
        if ($request->hasFile('image')) {
            // Store the image file
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/images/products/', $imageName);

            // Delete the old image
            if ($product->image) {
                Storage::delete('/images/products/' . $product->image->path);
            }

            // Link the new image to the product
            Image::updateOrCreate(
                ['product_id' => $product->id],
                ['path' => $imageName]
            );
        }

        // Check if the request has a thumbnail and store it
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '.' . $thumbnail->getClientOriginalExtension();

            // Delete the old thumbnail
            if ($product->thumbnail) {
                Storage::delete('/images/products/' . $product->thumbnail);
            }

            // Can be resized using for example: ->resize(300, 300)->
            Image::make($thumbnail)->save(public_path('/images/products/' . $filename));
            // Save the filename to the database
            Image::updateOrCreate(
                ['product_id' => $product->id, 'thumbnail' => 1],
                ['path' => $filename]
            );
        }

        // If the product is a Rim, validate the rim-specific fields and update the Rim
        if ($product->category->name === 'Rims') {
            $request->validate([
                'diameter' => 'required|numeric',
                'width' => 'required|numeric',
                'bolt_pattern' => 'required|string',
                'offset' => 'required|numeric'
            ]);
            Rim::where('product_id', $product->id)->update($request->only(['diameter', 'width', 'bolt_pattern', 'offset']));
        }
        return redirect()->route('products.index')->with('success', 'Product successfully updated');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if (isset($product)) {
            $images = $product->images;

            foreach ($images as $image) {
                $path = public_path('storage/' . $image->path);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product successfully deleted');
        } else {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
    }
}
