<?php
namespace App\Http\Controllers\Admin\Sliders;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersFormRequest;
use App\Http\Controllers\Admin\AdminController as Panel;
use Illuminate\Http\Request;
class SlidersController extends Controller
{
    // List of sliders
    public function index(Panel $panel)
    {
        $settings      = \App\Settings::find(1);
        $user          = \Auth::user();
        $notifications = $panel->notifications();
        $sliders       = \App\Sliders::orderBy('display_order', 'asc')->get();
        $js            = "$('#treeview-website').addClass('active');\n";
        return view('admin.sliders.index')->with('settings', $settings)->with('user', $user)->with('notifications', $notifications)->with('sliders', $sliders)->with('js', $js);
    }
    //Add form
    public function create()
    {
        return view('admin.sliders.create');
    }
    //Inserts
    public function store(SlidersFormRequest $request)
    {
        $slider            = new \App\Sliders();
        $slider->title     = $request->get('title');
        $slider->slidelink     = $request->input('slidelink');
        $slider->is_active = $request->has('is_active') ? 1 : 0;
        $slider->save();
        @$message .= 'Slider added.<br/>';
        $fileprefix = 'slider-';
        $filepath   = 'pictures/';
        $filename   = str_replace('tmp/', '', $request->input('tmp_img_path_main'));
        if (is_file('tmp/' . $filename)) {
            \File::move('tmp/' . $filename, $filepath . $fileprefix . $filename);
            $slider->image = $filepath . $fileprefix . $filename;
            $slider->save();
            @$message .= 'Picture saved.<br/>';
        } //is_file('tmp/' . $filename)
        return redirect('admin/sliders/edit/' . $slider->id)->withMessage($message);
    }
    //Edit form
    public function edit($id)
    {
        $slider = \App\Sliders::where('id', $id)->first();
        return view('admin.sliders.edit')->with('slider', $slider);
    }
    //Update the database
    public function update(SlidersFormRequest $request)
    {
        //
        $id            = $request->input('id');
        $slider        = \App\Sliders::find($id);
        $slider->title = $request->input('title');
        $slider->slidelink     = $request->input('slidelink');
        @$message .= 'Slider updated.<br/>';
        $slider->is_active = $request->has('is_active') ? 1 : 0;
        $slider->save();
        $fileprefix = 'slider-';
        $filepath   = 'pictures/';
        $filename   = str_replace('tmp/', '', $request->input('tmp_img_path_main'));
        if (is_file('tmp/' . $filename)) {
            \File::move('tmp/' . $filename, $filepath . $fileprefix . $filename);
            $slider->image = $filepath . $fileprefix . $filename;
            $slider->save();
            @$message .= 'Picture saved.<br/>';
        } //is_file('tmp/' . $filename)
        return redirect('/admin/sliders/edit/' . $id)->withMessage($message);
    }
    //Deletes a slider
    public function destroy(Request $request, $id)
    {
        $slider = \App\Sliders::find($id);
        $slider->delete();
        $data['message'] = 'Successfully deleted';
        return redirect('/admin/sliders')->with($data);
    }
}
