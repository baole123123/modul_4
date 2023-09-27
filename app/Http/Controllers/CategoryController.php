<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::paginate(4);
        if(isset($request->keyword)){
            $keyword = $request->keyword;
            $categories = Category::where('name', 'like', "%$keyword%")
                ->paginate();
        }

        return view('categories.index', compact('categories'));
    }
    public function create(){
        return view ('categories.create');
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

        return view('categories.edit' , compact(['categorie']));
    }
    public function update(Request $request,$id){
        $categorie = Category::find($id);
        $categorie->name=$request->name;
        $categorie->description=$request->description;


        $categorie->save();
            return redirect()->route('categorie.index');
    }
    public function destroy($id){
        $categorie = Category::find($id);
        $categorie->delete();
        return redirect()->route('categorie.index');

    }
    public function show(Category $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

}
