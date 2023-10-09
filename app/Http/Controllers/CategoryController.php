<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::paginate(4);
        if(isset($request->keyword)){
            $keyword = $request->keyword;
            $categories = Category::where('name', 'like', "%$keyword%")
                ->paginate();
        }

        return view('admin.categories.index', compact('categories'));
    }
    public function create(){
        return view ('admin.categories.create');
    }
    public function store(CategoryRequest $request){
        // $validated = $request->validate(
        //     [
        //         'name' => 'required', 'unique'
        //     ],
        //     [
        //         'name.required' => 'Không được để trống',
        //         'name.unique' => 'Trùng sản phẩm',


        //     ]
        // );
        $categorie = new Category();
        $categorie->name=$request->name;
        $categorie->description=$request->description;

        // xử lý ảnh

        $categorie->save();
        return redirect()->route('categorie.index')->with('status', 'Thêm danh mục thành công');
    }
    public function edit($id){
        $categorie = Category::find($id);

        return view('admin.categories.edit' , compact(['categorie']));
    }
    public function update(Request $request,$id){
        $categorie = Category::find($id);
        $categorie->name=$request->name;
        $categorie->description=$request->description;


        $categorie->save();
            return redirect()->route('categorie.index');
    }


   public function destroy($id)
    {
        $categorie = Category::onlyTrashed()->findOrFail($id);
        $categorie->forceDelete();
        return redirect()->back()->with('successMessage2', 'Deleted successfully');
    }
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        // $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->route('categorie.index')->with('successMessage2', 'Deleted successfully');
    }
    public  function trash()
    {
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id)
    {
        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('categorie.trash')->with('successMessage3', 'Restore successfully');
        // return redirect()->route('category.trash');
    }


    public function show($id)
    {
        $categorie = Category::find($id);

        return view('admin.categories.show', compact('categorie'));
    }

///login admin
    public function checklogin(Request $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('users')->attempt($arr)) {
            return redirect()->route('categorie.index');
        } else {
            return redirect()->route('admin.login1');
        }
    }
    public function login(){
        return view ('admin.login1');
    }

}
