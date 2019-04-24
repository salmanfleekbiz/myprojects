<?php

namespace App\Http\Controllers;

use Mail;

use Input;

use DB;

use Auth;

use App\Posts;

use App\User;

use Redirect;

use App\Http\Controllers\Controller;

use App\Http\Controllers\SendEmailsController as SendEmails;

use App\Http\Controllers\NavigationController as Nav;

use Illuminate\Http\Request;

class PagesController extends Controller

{

    //Homepage of the website.

    public function home(SendEmails $sendemails, Nav $nav)

    {

        $sliders           = \App\Sliders::where('is_active', 1)->get();

        $page_home         = \App\Pages::where('is_active', 1)->where('is_home', 1)->orderBy(\DB::raw('RAND()'))->first();

        $pages_featured    = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy(\DB::raw('RAND()'))->take(3)->get();

        $properties        = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy(\DB::raw('RAND()'))->take(6)->get();

         //$homeproperties  = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy(\DB::raw('RAND()'))->take(6)->get();

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();



        return view('pages.home-one')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('sliders', $sliders)->with('page_home', $page_home)

        ->with('properties', $properties)->with('pages_featured', $pages_featured)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

    public function homeVersion(SendEmails $sendemails, Nav $nav)

    {

        $home = 'home-three';

        $sliders           = \App\Sliders::where('is_active', 1)->get();

        $page_home         = \App\Pages::where('is_active', 1)->where('is_home', 1)->orderBy(\DB::raw('RAND()'))->first();

        $pages_featured    = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy(\DB::raw('RAND()'))->take(3)->get();

        //$properties        = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy(\DB::raw('RAND()'))->take(6)->get();

        $properties        = \App\Properties::where('is_active', 1)->orderBy('id', 'desc')->take(6)->get();

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();



        //custom filter options

        $cities = DB::select("select DISTINCT(city) from emt_properties");

        $property_types = DB::table('emt_property_types')->where('is_active','1')->get();

        $lifestyles = DB::table('emt_lifestyle_category')->where('is_active','1')->get();

        $features = DB::table('emt_features')->where('is_active','1')->get();

        

        // $home = $version?'home-'.$version:'home-one';



        return view('pages.'.$home)->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('sliders', $sliders)->with('page_home', $page_home)

        ->with('properties', $properties)->with('pages_featured', $pages_featured)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties)->with('cities', $cities)->with('property_types', $property_types)->with('lifestyles', $lifestyles)->with('features', $features);

    }

    //Shows list of contents pages under a specific category.

    public function category($category, Nav $nav)

    {

        

        $category          = \App\PageTypes::where('slug', $category)->first();

        $pages             = \App\Pages::where('category_id', $category->id)->where('is_active', 1)->orderBy('display_order', 'asc')->get();

        

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();



        return view('pages.category')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('category', $category)->with('pages', $pages)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

    //Shows a specific contents page.

    public function show($category, $slug, Nav $nav)

    {

        $category          = \App\PageTypes::where('slug', $category)->first();

        $page              = \App\Pages::where('category_id', $category->id)->where('slug', $slug)->where('is_active', 1)->first();

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.page')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('category', $category)->with('page', $page)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

    //The contact page of the website.

    public function contact(Nav $nav)

    {

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.contact')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

	//login page

    public function login(Nav $nav)

    {

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.login')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

    public function sendlogin(Request $request)

    {

        $credentials = array('email' => $request->Input('email'), 'password' => $request->Input('password'));

        if(Auth::attempt($credentials, true)){

            $verify = Auth::user()->verify;

            if($verify=='1')

            {

                return redirect('admin/');

            }

            else

            {

                Auth::logout();

                return Redirect::back()->withMessage('Your account is not verified yet. please check your email address and verify it.');

            }



        } else {

            return Redirect::back()->withMessage('Invalid Username/Password..');

        }

    }

	//register page

    public function register(Nav $nav)

    {

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.register')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

    public function sendregister(Request $request)

    {

        $first_name = $request->input('first_name');

        $last_name = $request->input('last_name');

        $email = $request->input('email');

        $password = $request->input('password');

        $role = $request->input('role');

        $is_active = '1';

        $verify = '0';

        $created_at = date("Y-m-d H:i:s");

        $verify_token = md5(rand());



        $check = DB::select("select * from users where email='".$email."'");

        if(count($check)>0)

        {

            // return Redirect::back()->withMessage('Email address already exists.');

            return 2;

        }

        else

        {

            $last_id = DB::table('users')->insertGetId(

                ['firstname' => $first_name, 'lastname' => $last_name, 'email' => $email, 'password' => bcrypt($password), 'is_active' => $is_active, 'role' => $role, 'verify' => $verify, 'created_at' => $created_at, 'verify_token' => $verify_token]

            );

            // insert into chat userdata

            DB::insert("insert into chat_userdata (username,email,password,name,joined,picname,session_id) values ('".$first_name."','".$email."','".bcrypt($password)."','".$first_name."','".$created_at."','avatar_default.png','".$last_id."')");

            // Send verification email

            $message =  "Hello ".$first_name.",<br><br>You have successfully registered with PropertiMatch.<br><br>Please click <a href='".url("/verifyEmail")."/".$verify_token."'>here</a> to verify your account.<br><br>Thanks & Regards<br><br>PropertiMatch Team";

            $headers = "MIME-Version: 1.0" . "\r\n";

            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: PropertiMatch<info@propertimatch.com>' . "\r\n";

            $to = $email;

            $subject = "PropertiMatch Registration";

            $mail = mail($to,$subject,$message,$headers);

            // return Redirect::back()->withMessage('Your account is created successfully.Please check your email address and verify your account.');

            return 1;

        }



    }

     public function verifyEmail($token)

    {

        $result = DB::table('users')

            ->where('verify_token', $token)

            ->update(['verify' => 1,'verify_token' => '']);

        if($result)

        {

            return redirect('/')->withMessage('Congratulations! Your account is verified.');

        }

        else

        {

            return redirect('/')->withMessage('Your verification token was invalid or expired.');

        }

    }

	public function forgot(Nav $nav)

    {

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.forgot')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

	public function terms (Nav $nav)

    {

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.terms')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }

	

	public function privacy (Nav $nav)

    {

        $settings          = \App\Settings::find(1);

        $menu_top          = $nav->getHTMLNavigation();

        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();

        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();

        return view('pages.privacy')->with('settings', $settings)->with('menu_top', $menu_top)

        ->with('categories', $categories)->with('locations', $locations)

        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);

    }
    
    public function pmcontent (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.pmcontent')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function contentguidelines (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.contentguidelines')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function pricing (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.pricing')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
	public function howitworks (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $page              = \App\Pages::where('id', 39)->where('is_active', 1)->first();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.howitworks')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function showproperties (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $properties        = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->orderBy('id', 'desc')->get();
        return view('pages.showproperties')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function thanks (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $page              = \App\Pages::where('id', 39)->where('is_active', 1)->first();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.thanks')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function faq (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $page              = \App\Pages::where('id', 39)->where('is_active', 1)->first();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.faq')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function searchnotification (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $page              = \App\Pages::where('id', 39)->where('is_active', 1)->first();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.searchnotification')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function disclaimer (Nav $nav)
    {
        $settings          = \App\Settings::find(1);
        $menu_top          = $nav->getHTMLNavigation();
        $page              = \App\Pages::where('id', 39)->where('is_active', 1)->first();
        $categories        = \App\Categories::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $locations         = \App\Locations::where('is_active', 1)->orderBy('display_order', 'asc')->get();
        $footer_pages      = \App\Pages::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        $footer_properties = \App\Properties::where('is_active', 1)->where('is_featured', 1)->orderBy('display_order', 'asc')->get();
        return view('pages.disclaimer')->with('settings', $settings)->with('menu_top', $menu_top)
        ->with('categories', $categories)->with('locations', $locations)
        ->with('footer_pages', $footer_pages)->with('footer_properties', $footer_properties);
    }
    public function sendforgotpass(Request $request)
    {
        $email = $request->input('email');
        $check = DB::select("select * from users where email='".$email."'");
        if(count($check)>0)
        {
            
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $password = substr( str_shuffle( $chars ), 0, 8 );
            DB::table('users')->where('email', $email)->update(['password' => bcrypt($password)]);
            // Send verification email

            $message =  "You have new login credentials below please login to PropertiMatch.<br><br> User: ".$email." <br><br> Pass: ".$password."<br><br>Thanks & Regards<br><br>PropertiMatch Team";

            $headers = "MIME-Version: 1.0" . "\r\n";

            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: PropertiMatch<info@propertimatch.com>' . "\r\n";

            $to = $email;

            $subject = "PropertiMatch Registration";

            $mail = mail($to,$subject,$message,$headers);

            return redirect('forgot?send=sucess');

        }
        else
        {
            return Redirect::back()->withMessage('Email address does not match.');
        }
    }
    public function sendcontactemail(Request $request)
    {
        $data = array('name'=>"Sam Jose", "body" => "Test mail");
   
Mail::send('emails.mail', $data, function($message) {
    $message->to('bcdeveloper3@gmail.com', 'Artisans Web')
            ->subject('Artisans Web Testing Mail');
    $message->from('qirat.94@gmail.com','Sajid Sayyad');
});
        //  return redirect('contact');
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $messagessss = $request->input('message');

        // $message =  "Name: ".$name." <br><br> Email: ".$email." <br><br> Message: ".$messagessss."<br><br>Thanks & Regards<br><br>PropertiMatch Team";

        // $headers = "MIME-Version: 1.0" . "\r\n";

        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // $headers .= 'From: PropertiMatch<info@propertimatch.com>' . "\r\n";

        // $to = 'info@propertimatch.com';

        // $subject = "PropertiMatch Contact Us";

        // $mail = mail($to,$subject,$message,$headers);

       // return view('pages.contact')->with('settings', $settings);
    }
}