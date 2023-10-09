<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'like', "%$query%")->get();

        return view('search.results')->with(['results' => $results]);
    }
}
