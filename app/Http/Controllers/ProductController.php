<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);
        $products = Product::orderBy('id', 'DESC')->paginate(4);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $products = Product::where('name', 'like', "%$keyword%")
                ->paginate(4);
        }

        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        $this->authorize('create', Product::class);

        return view('admin.products.create', compact('categories'));
    }
    public function store(StoreProduct $request)
    {
        try {
            // dd($request->all());
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
                $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
                $extenshion = $request->file($fieldName)->getClientOriginalExtension();
                $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
                $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
                $path = str_replace('public/', '', $path);
                $product->image = $path;
            }
            $product->save();
            Log::info('Product store successfully. ID: ' . $product->id);
            return redirect()->route('products.index')->with('success', __('sys.store_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', __('sys.store_item_error'));
        }
    }

    public function edit($id)
    {
        try {
            $item = Product::findOrFail($id);
        $this->authorize('update', Product::class);

            $categories = Category::all();

            $params = [
                'item' => $item ,
                'categories' => $categories
            ];
            return view("admin.products.edit", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', __('sys.item_not_found'));
        }
    }

    public function update(UpdateProduct $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = $request->status;
            $product->category_id = $request->category_id;


            // xử lý ảnh
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
                $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
                $extenshion = $request->file($fieldName)->getClientOriginalExtension();
                $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extenshion;
                $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
                $path = str_replace('public/', '', $path);
                $product->image = $path;
            }
            $product->save();
            Log::info('Product updated', ['id' => $product->id]);
            return redirect()->route('products.index')->with('success', __('sys.update_item_success'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', __('sys.update_item_error'));
        }
    }
    public function destroy($id)
    {
        try {
            $item = Product::withTrashed()->findOrFail($id);
        $this->authorize('delete', Product::class);

            $item->forceDelete(); // Xóa vĩnh viễn mục từ thùng rác
            Log::info('Product message', ['context' => 'value']);
            return redirect()->route('products.index')->with('success', __('sys.destroy_item_success1'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', __('sys.destroy_item_error'));
        }
    }
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $product = Product::findOrFail($id);
        $this->authorize('forceDelete', Product::class);

        $product->deleted_at = date("Y-m-d h:i:s");
        $product->save();
        // $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->route('products.index')->with('success', __('sys.destroy_item_success'));
    }
    public  function trash()
    {
        $products = Product::onlyTrashed()->get();
        $this->authorize('viewtrash', Product::class);

        $param = ['products'    => $products];
        return view('admin.products.trash', $param);
    }
    public function restoredelete($id)
    {
        $product = Product::withTrashed()->where('id', $id);
        $product->restore();
        return redirect()->route('product.trash')->with('success', __('sys.restore_item_success'));
        // return redirect()->route('category.trash');
    }



    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
}
