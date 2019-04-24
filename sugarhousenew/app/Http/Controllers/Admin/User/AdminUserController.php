<?php

namespace App\Http\Controllers\Admin\User;
use Auth;
use DB;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminUserController extends Controller
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
            // $allusers = \App\User::latest('id','desc')->where('user_role','!=',1)->get();
			
			$allusers = DB::table('users')
            ->join('user_role', 'users.user_role', '=', 'user_role.id')
            ->join('user_info', 'user_info.user_id', '=', 'users.id')
			->where('user_role','!=',1)
            ->get();
			
            $usertitle = 'user';
            return view('admin.users.'.$usertitle)->with('user',$user)->with('allusers',$allusers);
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
            $categories = \App\Category::latest('id','desc')->get();
            $create_category = 'create_category';
            return view('admin.subcategory.'.$create_category)->with('user', $user)->with('categories',$categories);
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
		
		
        if($user = Auth::user())
        {
            $user_role = Auth::user()->user_role;
            if($user_role == 1){
            $user = Auth::user();
			$userdata = DB::table('users')
            ->join('user_role', 'users.user_role', '=', 'user_role.id')
            ->join('user_info', 'user_info.user_id', '=', 'users.id')
			->where('users.user_role','!=',1)
			->where('user_info.user_id',$id)
            ->first();
			
            $view_user = 'view_user';
            return view('admin.users.'.$view_user)->with('user', $user)->with('userdata',$userdata);
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
        $category = \App\Subcategory::where('id',$id)->first();

        if ( Input::hasFile('categoryimage') ):
          $target_path = "public/uploads/categoryimages/";
          $validextensions = array("jpeg", "jpg", "png");
          $ext = explode('.', basename($_FILES['categoryimage']['name']));
          $target_path = $target_path . $_FILES['categoryimage']['name'];
          move_uploaded_file($_FILES['categoryimage']['tmp_name'], $target_path);
          $category->category_name=$request->input("categoryname");
          $category->category_image= (Input::hasFile('categoryimage')) ? $_FILES['categoryimage']['name'] : NULL ;
          $category->category_description=$request->input("categorydescription");
          $category->updated_at=date("Y-m-d H:i:s");
          $category->save();
          return redirect()->back()->with('message', 'Category Update Sucessfully !!!.');
        else:
          $category->cat_id=$request->input("categoryid");  
          $category->category_name=$request->input("categoryname");
          $category->category_description=$request->input("categorydescription");
          $category->updated_at=date("Y-m-d H:i:s");
          $category->save();  
          return redirect()->back()->with('message', 'Category Update Sucessfully !!!.');
        endif;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Product::first();
        if(!empty($product)){
        $exists = $product->where('cat_id', $id)->exists();
        if($exists){
            return Redirect::back()->withErrors("Before Category Delete you must be delete releavnt product of this category");
        }else{
            $category = \App\Subcategory::find($id);   
            $category->delete();     
            return Redirect::back()->withMessage('Category Successfuly deleted.');
        }
        }else{
            $category = \App\Subcategory::find($id);   
            $category->delete();     
            return Redirect::back()->withMessage('Category Successfuly deleted.');
        }
    }
}
