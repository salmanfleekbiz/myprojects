<?php

namespace App\Http\Controllers\Admin\Variation;
use Auth;
use DB;
use App\User;
use App\Variations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        if($user = Auth::user())
        {
			
            $user_role = Auth::user()->user_role;
            if($user_role == 1){
            $user = Auth::user();
	
			$variations = \App\Variations::latest('id','asc')->get();
            $page = 'variation';
            return view('admin.variation.'.$page)->with('user', $user)->with('variations',$variations);
            }else{
                return redirect('/');
            }
        }else{
            $login = 'login';
            return redirect('admin/login');
            //return view('admin.login.'.$login);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($user = Auth::user())
        {
            $user_role = Auth::user()->user_role;
            if($user_role == 1){
			
            $user = Auth::user();
			$variation = \App\Variations::latest('id','asc')->get();
            $create_variation = 'create_variation';
            return view('admin.variation.'.$create_variation)->with('user', $user)->with('variation',$variation);
            }else{
                return redirect('/');
            }
        }else{
            $login = 'login';
            return redirect('admin/login');
            //return view('admin.login.'.$login);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        $variations = new Variations();
        $variations->title=$request->input("variationtitle");
		 $variations->created_at=date("Y-m-d H:i:s");
        $variations->updated_at=date("Y-m-d H:i:s");
        $variations->save();
        $variationsId = $variations->id;
        return redirect()->back()->with('message', 'Variation Title Successfully Added');
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
        if($user = Auth::user())
        {
            $user_role = Auth::user()->user_role;
            if($user_role == 1){
            $user = Auth::user();
            $variations = \App\Variations::where('id',$id)->first();
            $edit_variation = 'edit_variation';
            return view('admin.variation.'.$edit_variation)->with('user', $user)->with('variations',$variations);
            }else{
                return redirect('/');
            }
        }else{
            $login = 'login';
            return redirect('admin/login');
            //return view('admin.login.'.$login);
        }
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
          $variation = \App\Variations::where('id',$id)->first();
          $variation->title=$request->input("variationtitle");
		  $variation->updated_at=date("Y-m-d H:i:s");
          $variation->save();
	
          $variationId = $variation->id;
          return redirect()->back()->with('message', 'Variation Title Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$product_variation = \App\Productvariation::latest('id','desc')->where('variation_title',$id)->get();
		
		if(!$product_variation->isEmpty()){
              return Redirect::back()->withErrors("Please Delete the Product Variation of this Title");
        }
		else {
        $variation = \App\Variations::find($id);   
        $variation->delete();     
        return Redirect::back()->withMessage('Variation Title Successfully Deleted.');
		}		
    }
}
