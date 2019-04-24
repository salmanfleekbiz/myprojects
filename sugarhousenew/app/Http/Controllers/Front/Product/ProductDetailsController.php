<?php

namespace App\Http\Controllers\Front\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

		$user=Auth::user();
		$categories = \App\Category::latest('id','asc')->get();	
				
		
		/* $product = \App\Product::where('cat_id',$id)->first();	 */
		
		$products = DB::table('products')
            ->join('products_variation_price', 'products_variation_price.product_id', '=', 'products.id')->where('products.id','=',$id)
            ->first();
            $subcategory = \App\Subcategory::where('id',$products->cat_id)->first();  

			$proofs = \App\Productproofs::where('product_id',$products->product_id)->get();
			$warranties = \App\Productwarranty::where('product_id',$products->product_id)->get();
			$accessories = \App\Productaccessories::where('product_id',$products->product_id)->get();
			$productvariation = \App\Productvariation::latest('id','asc')->get();
			$variationcategory = \App\Productvariationcategory::latest('id','desc')->get();
			$allvariations = \App\Variations::latest('id','desc')->get();
			$variations = DB::table('products_variation_price')
            ->leftJoin('variations', 'products_variation_price.variation_title', '=', 'variations.id')
			->leftJoin('products_variation', 'products_variation.id', '=', 'products_variation_price.variation_id')->where('products_variation_price.product_id','=',$products->product_id)->orderBy('products_variation.min_qty', 'asc')
            ->get();

			
			foreach($variations as $varc){
				
				$title=$varc->title;
				$minqty=$varc->min_qty;
                $vid=$varc->id;
				$maxqty=$varc->max_qty;
				$qty=$minqty.'-'.$maxqty;
				if($user=Auth::user()):
                    if($user->user_role == 2):
                    $arr[$qty][$title]=$varc->wholesale_price;
                    $arr1[$title][$qty]=$varc->wholesale_price;
                    else:
    				$arr[$qty][$title]=$varc->variation_price;
    				$arr1[$title][$qty]=$varc->variation_price;
    				endif;
                else:
                    $arr[$qty][$title]=$varc->variation_price;
                    $arr1[$title][$qty]=$varc->variation_price;
                endif;
				

			}
		
        $page = 'product_details';
        return view('front.product.'.$page)->with('categories',$categories)->with('products',$products)->with('subcategory',$subcategory)->with('proofs',$proofs)->with('warranties',$warranties)->with('accessories',$accessories)->with('productvariation',$productvariation)->with('variationcategory',$variationcategory)->with('arr',$arr)->with('arr1',$arr1)->with('allvariations',$allvariations)->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
