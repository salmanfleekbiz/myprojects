<?php

namespace App\Http\Controllers\Front\Cart;
use Auth;
use Session;
use DB;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Category::latest('id','asc')->get(); 
        $carttitle = 'cart';
        return view('front.cart.'.$carttitle)->with('categories',$categories);
      

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
       $productId= $request->input('product_id'); 
       $quantity= $request->input('quantity');
       $productvariation_price= $request->input('productvariation_price');
       $graphicwidth= $request->input('graphicwidth');
       $frame= $request->input('frame');
       $accessoryid= $request->input('accessoryid');
       $graphicheight= $request->input('graphicheight');
       $proofid= $request->input('proofid');
       $warrantyid= $request->input('warrantyid');

        $productData = \App\Product::where('id',$productId)->first();   
        $get_productData = json_decode($productData);

        $productVariationId = \App\Variations::where('title',$productvariation_price)->first();
        $get_productVariationIds = json_decode($productVariationId);

        // print_r($get_productVariationIds);
        //exit;

        $productVariation = \App\Productvariation::where('product_id',$productId)->where('variation_title',$get_productVariationIds->id)->get();
        $get_productVariation = json_decode($productVariation);

        foreach ($get_productVariation as $key => $value) {
                $variation_category[] = $value->variation_id.'<br>';
        }
        
        $variation_cat = \App\Productvariationcategory::whereIn('id', $variation_category)->get();
        $get_variation_cat = json_decode($variation_cat,true);

        foreach ($get_variation_cat as $k => $val) {
            if(true === in_array($quantity, range($val['min_qty'], $val['max_qty'])))
            {
                $variationId = $val['id'];
            }
        }

        $productVariation_price = \App\Productvariation::where('product_id',$productId)->where('variation_id',$variationId)->where('variation_title',$get_productVariationIds->id)->first();
        $get_productVariation_price = json_decode($productVariation_price);
        

       $product_attributes = array('product_id'=>$productId,'quantity'=>$quantity,'product_name'=>$get_productData->product_name,'product_variation_name'=>$productvariation_price,'retail_price'=>$get_productVariation_price->variation_price,'wholesale_price'=>$get_productVariation_price->wholesale_price,'graphic_width'=>$graphicwidth,'graphic_height'=>$graphicheight,'frame_color'=>$frame,'accessories'=>$accessoryid,'proof'=>$proofid,'warranty'=>$warrantyid);
            

       $oldcart= Session::has('cartproduct') ?  Session::get('cartproduct') : null ;
       $acccart = new Cart($oldcart);
       $acccart->add($product_attributes,$productId);
       Session::put('cartproduct',$acccart);
           

        $categories = \App\Category::latest('id','asc')->get(); 
        $carttitle = 'cart';
        return view('front.cart.'.$carttitle)->with('categories',$categories);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showpricing(Request $request)
    {
        $productId= $request->input('pid');
        $productvariation_price= $request->input('pvariation');
        $quantity= $request->input('qty');

        $productVariationId = \App\Variations::where('title',$productvariation_price)->first();
        $get_productVariationIds = json_decode($productVariationId);

        $productVariation = \App\Productvariation::where('product_id',$productId)->where('variation_title',$get_productVariationIds->id)->get();
        $get_productVariation = json_decode($productVariation);

        foreach ($get_productVariation as $key => $value) {
        $variation_category[] = $value->variation_id.'<br>';
        }

        $variation_cat = \App\Productvariationcategory::whereIn('id', $variation_category)->get();
        $get_variation_cat = json_decode($variation_cat,true);

        foreach ($get_variation_cat as $k => $val) {
        if(true === in_array($quantity, range($val['min_qty'], $val['max_qty'])))
        {
            $variationId = $val['id'];
        }
        }

        $productVariation_price = \App\Productvariation::where('product_id',$productId)->where('variation_id',$variationId)->where('variation_title',$get_productVariationIds->id)->first();
        $get_productVariation_price = json_decode($productVariation_price);

        echo $get_productVariation_price->variation_price;
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
    public function update(Request $request)
    {
        $arrnum= $request->input('arrnum');
        $acccart=Session::get('cartproduct');
        $quantity=$request->input('quantity');
        $acccart->items[$arrnum]['quantity'] = $quantity;
        //print_r($acccart->items[$arrnum]);
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
           $arrnum= $request->input('arrnum');
           $pname= $request->input('pname'); 
           $pvariation= $request->input('pvariation');
           $graphicwidth= $request->input('graphicwidth'); 
           $graphicheight= $request->input('graphicheight');
           $framecolor= $request->input('framecolor'); 
           $acccart=Session::get('cartproduct');
           unset($acccart->items[$arrnum]); 
           return 'delete';
           //print_r($acccart->items[0]);
    }
}
