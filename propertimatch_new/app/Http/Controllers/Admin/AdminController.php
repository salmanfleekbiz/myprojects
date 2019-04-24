<?php
namespace App\Http\Controllers\Admin;
use DB,Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    //Admin panel dashboard
    public function dashboard()
    {
        session_start();
        unset($_SESSION['chat_ses_id']);
        $settings              = \App\Settings::find(1);
        $user                  = \Auth::user();
        $notifications         = AdminController::notifications();
        $bookings              = count(\App\Reservations::where('is_seen', '0')->where('date_start', '>=', date('Y-m-d'))->get());
        $arrivals              = count(\App\Reservations::where('status', 'booked')->where('date_start', '>=', date('Y-m-d'))->get());
        $departures            = count(\App\Reservations::where('status', 'booked')->where('date_end', '<=', date('Y-m-d'))->get());
        $transactions          = count(\App\Transactions::where('status', 'paid')->get());
        $dashboard             = (object) array(
            'bookings' => $bookings,
            'transactions' => $transactions,
            'arrivals' => $arrivals,
            'departures' => $departures
        );
        $reservations_new      = \App\Reservations::where('is_seen', '0')->where('date_start', '>=', date('Y-m-d'))->orderBy('created_at', 'desc')->take(5)->get();
        $arrivals              = \App\Reservations::where('date_start', '>=', date('Y-m-d'))->orderBy('date_start', 'asc')->take(5)->get();
        $departures            = \App\Reservations::where('date_end', '<=', date('Y-m-d'))->orderBy('date_end', 'desc')->take(5)->get();
        $transactions_received = \App\Transactions::where('status', 'paid')->orderBy('date_paid', 'desc')->take(5)->get();
        $transactions_coming   = \App\Transactions::where('status', 'pending')->orderBy('date_due', 'asc')->take(5)->get();
        $js                    = "$('#treeview-business').addClass('active');\n";
        $all_properties            = \App\Properties::orderBy('created_at', 'desc')->take(5)->get();
        $all_inquiries    = DB::select("SELECT a.*,b.title,b.address,b.city,b.zip,b.user_id,c.firstname,c.lastname,c.email FROM inquires a,emt_properties b,users c where a.property_id=b.id and a.user_id=c.id  order by a.id desc limit 0,5");
        $all_inquiries_count    = DB::select("SELECT a.*,b.title,b.address,b.city,b.zip,b.user_id,c.firstname,c.lastname,c.email FROM inquires a,emt_properties b,users c where a.property_id=b.id and a.user_id=c.id ");
         $all_properties_count            = count(\App\Properties::get());
        return view('admin.dashboard')->with('settings', $settings)->with('user', $user)->with('notifications', $notifications)->with('dashboard', $dashboard)->with('reservations_new', $reservations_new)->with('transactions_received', $transactions_received)->with('transactions_coming', $transactions_coming)->with('arrivals', $arrivals)->with('departures', $departures)->with('js', $js)->with('all_properties', $all_properties)->with('all_inquiries', $all_inquiries)->with('all_inquiries_count', $all_inquiries_count)->with('all_properties_count', $all_properties_count);
    }
    //Prepare the notifcations to show in the admin panel.
    public function notifications()
    {
        $bookings     = \App\Reservations::where('is_seen', '0')->where('date_start', '>=', date('Y-m-d'))->orderBy('created_at', 'desc')->get();
        $arrivals = \App\Reservations::whereBetween('date_start', [date('Y-m-d'),date('Y-m-d',strtotime("+1 month"))])
        ->orderBy('date_start', 'asc')
        ->get();
        $transactions = \App\Transactions::where('date_paid', '<=', date('Y-m-d H:i:s'))->orderBy('date_paid', 'desc')->orderBy('date_due', 'desc')->get();
        return $array = (object) array(
            'bookings' => $bookings,
            'arrivals' => $arrivals,
            'transactions' => $transactions
        );
    }
    
    public function edituploadimage(Request $request){
         
        $url = $request->input('imag_src');
        $name = basename($url);
        list($txt, $ext) = explode(".", $name);
        $name = $txt.time();
        $name = $name.".".$ext;
        $upload = file_put_contents("public/check/$name",file_get_contents($url));
        echo 'done';

    }
}
