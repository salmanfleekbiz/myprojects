<?php
namespace App\Http\Controllers\Owner\Users;
use Redirect,Auth,DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Http\Controllers\Admin\AdminController as Panel;
use Illuminate\Http\Request;
class UserController extends Controller
{
    //Edit form
    public function edit(Panel $panel)
    {
        //load edit form right on index.
        $settings      = \App\Settings::find(1);
        $user          = \Auth::user();
        $notifications = $panel->notifications();
        $js            = "$('#treeview-settings').addClass('active');\n";
        return view('owner.users.edit')->with('settings', $settings)->with('user', $user)->with('notifications', $notifications)->with('js', $js);
    }
    //Update the database
    public function update(UserFormRequest $request, Panel $panel)
    {
        
        $user_session  = \Auth::user();
        $id = $user_session->id;

        $notifications = $panel->notifications();
        
        $user              = \App\User::find($id);
        $user->firstname   = $request->input('firstname');
        $user->lastname    = $request->input('lastname');
        $user->designation = $request->input('designation');
        $user->username    = $request->input('username');
        $user->email    = $request->input('email');
        $user->phone    = $request->input('phone');
        $user->facebook_url    = $request->input('facebook_url');
        $user->twitter_url    = $request->input('twitter_url');
        $user->instagram_url    = $request->input('instagram_url');
        $user->google_url    = $request->input('google_url');
        $user->about    = $request->input('about');
        $user->hobbies    = $request->input('hobbies');
        $user->pets    = $request->input('pets');
        $password          = $request->input('password');
        $password_confirm  = $request->input('password_confirm');
        if (!empty($password)) {
            if ($password == $password_confirm) {
                $user->password = \Hash::make($password);
            } //$password == $password_confirm
            else {
                return redirect('/owner/users')->withErrors('The password confirmation failed!')->withInput();
            }
        } //!empty($password)
        $user->save();
        @$message .= 'User profile successfully updated.<br/>';
        $fileprefix = 'user-';
        $filepath   = 'pictures/';
        $filename   = str_replace('tmp/', '', $request->input('tmp_img_path_avatar'));
        if (is_file('tmp/' . $filename)) {
            \File::move('tmp/' . $filename, $filepath . $fileprefix . $filename);
            $user->avatar = $filepath . $fileprefix . $filename;
            $image_url = $filepath . $fileprefix . $filename;
            $user->save();
            DB::table('chat_userdata')->where('session_id',Auth::user()->id)->update(['picname'=>$image_url]);
            @$message .= 'Avatar picture saved.<br/>';
        } //is_file('tmp/' . $filename)
        return redirect('/owner/users')->withMessage($message);
    }
}
