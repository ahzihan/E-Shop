<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuerybuilderController extends Controller
{
    function RetrievingAllRows(Request $request){
        $products=DB::table('products')->get();
        $single = DB::table('products')->first();

        return view('home', compact('products','single'));
    }

    function RetrievingSingleRowById(Request $request){
        $findById = DB::table('products')->find($request->id);
        return view('single', compact('findById'));
    }

    function RetrievingColumnValues(Request $request){
        $ColumnValue = DB::table('products')->pluck('title','id');
        return $ColumnValue;
    }

    function Aggregates(Request $request){
        $count = DB::table('products')->count();
        $max = DB::table('products')->max('price');
        $min = DB::table('products')->min('price');
        $avg = DB::table('products')->avg('price');
        $sum = DB::table('products')->sum('price');
        return ['count'=>$count,'max'=>$max,'min'=>$min,'avg'=>$avg,'sum'=>$sum];
    }

    function SelectClause(Request $request){
        $selectedValue = DB::table('products')->select('title','stock','price')->get();
        return $selectedValue;
    }

    function SelectDistinct(Request $request){
        $selectedDistinct = DB::table('products')->select('title')->distinct()->get();
        return $selectedDistinct;
    }

    function InnerJoin(Request $request){
        $products = DB::table('products')
        ->join('categories','products.categoryId', '=', 'categories.id')
        ->join('brands','products.brandId', '=', 'brands.id')
        ->get();
        return $products;
    }

    function LeftJoin(Request $request){
        $products = DB::table('products')
        ->leftJoin('categories','products.categoryId', '=', 'categories.id')
        ->leftJoin('brands','products.brandId', '=', 'brands.id')
        ->get();
        return $products;
    }

    function RightJoin(Request $request){
        $products = DB::table('products')
        ->rightJoin('categories','products.categoryId', '=', 'categories.id')
        ->rightJoin('brands','products.brandId', '=', 'brands.id')
        ->get();
        return $products;
    }

    function CrossJoin(Request $request){
        $products = DB::table('products')
        ->crossJoin('categories','products.categoryId', '=', 'categories.id')
        ->get();
        return $products;
    }

    function AdvancedJoin(Request $request){
        $products = DB::table('products')
        ->join('categories',function(JoinClause $join){
            $join->on('products.categoryId', '=', 'categories.id')
            ->where('products.price', '>', 2000);
        })
        ->join('brands',function(JoinClause $join){
            $join->on('products.brandId', '=', 'brands.id')
            ->where('brands.brandName', '=', 'Easy');
        })
        ->get();
        return $products;
    }

    function Union(Request $request){
        $query = DB::table('products')->where('products.price', '>', 1000);
        $unionQuery = DB::table('products')->where('categoryId', '=', '2')->union($query)
        ->get();
        return $unionQuery;
    }
}
