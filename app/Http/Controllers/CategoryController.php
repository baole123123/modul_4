<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\StoreCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $this->authorize('viewAny', Category::class);
        $keyword = $request->input('keyword');
        $categories = Category::orderBy('id', 'DESC')->paginate(4);

        if ($keyword) {
            $categories = Category::where('name', 'like', "%$keyword%")->paginate();
        }

        return view('admin.categories.index', compact('categories', 'keyword'));
    }
    public function create()
    {
        $this->authorize('create', Category::class);

        return view('admin.categories.create');
    }

    public function store(StoreCategory $request)
    {
        try {
            $item = new Category();
            $item->name = $request->name;
            $item->description = $request->description;
            $item->save();


            Log::info('Category stored successfully. ID: ' . $item->id);
            return redirect()->route('categories.index')->with('success', __('sys.store_item_success'))->with('categories');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.store_item_error'));
        }
    }
    public function edit($id)
    {
        try {
            $item = Category::findOrFail($id);
            $this->authorize('update',  $item);
            $params = [
                'item' => $item
            ];
            return view("admin.categories.edit", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.item_not_found'));
        }
    }
    public function update(UpdateCategory $request, $id)
    {
        try {
            $item = Category::findOrFail($id);
            $item->name = $request->name;
            $item->description = $request->description;
            $item->save();
            Log::info('Category updated', ['id' => $item->id]);
            return redirect()->route('categories.index')->with('success', __('sys.update_item_success'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.update_item_error'));
        }
    }
    public function destroy($id)
    {
        try {
            $item = Category::withTrashed()->findOrFail($id);
            $this->authorize('delete', $item);
            $item->forceDelete(); // Xóa vĩnh viễn mục từ thùng rác
            Log::info('Category message', ['context' => 'value']);
            return redirect()->route('categories.index')->with('success', __('sys.destroy_item_success1'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.destroy_item_error'));
        }
    }
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $this->authorize('forceDelete', $category);

        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        // $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->route('categorie.index')->with('success', __('sys.destroy_item_success'));
    }
    public  function trash()
    {
        $categories = Category::onlyTrashed()->get();
        $this->authorize('viewtrash', Category::class);

        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id)
    {
        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('categorie.trash')->with('success', __('sys.restore_item_success'));
        // return redirect()->route('category.trash');
    }


    public function show($id)
    {
        $categorie = Category::find($id);

        return view('admin.categories.show', compact('categorie'));
    }



    ///login admin
    // public function checklogin(Request $request)
    // {
    //     // dd(123);
    //     $arr = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];
    //     if (Auth::guard('users')->attempt($arr)) {
    //         return redirect()->route('categorie.index');
    //     } else {
    //         return redirect()->route('admin.login');
    //     }
    // }
    // public function login(){
    //     return view ('admin.login');
    // }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
