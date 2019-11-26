<?php

namespace App\Http\Controllers\Admin;

use App\Model\FooterTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FooterController extends Controller
{
    public function title_add()
    {
        return view('admin.footer.title_add');
    }

    public function title_store(Request $request)
    {
        $request->validate([
            'footer_title' => 'required'
        ]);
        $store_title = FooterTitle::create($request->all());
        if ($store_title) {
            Session::flash('success', "Footer Title Added Successfully !!!");
            return redirect()->back();
        } else {
            Session::flash('error', 'Opps Something Wrong!!!');
            return redirect()->back();
        }
    }

    public function title_list()
    {
        $footer_titles = FooterTitle::get();
        return view('admin.footer.title_list', compact('footer_titles'));
    }

    public function title_edit($id)
    {
        $footer_title = FooterTitle::find($id);
        return view('admin.footer.title_edit', compact('footer_title'));
    }

    public function title_update(Request $request, $id)
    {
        $update_footer_title = FooterTitle::find($id)->update($request->all());
        if ($update_footer_title) {
            Session::flash('success', "Footer Title Updated Successfully !!!");
            return redirect()->back();
        } else {
            Session::flash('error', 'Opps Something Wrong!!!');
            return redirect()->back();
        }
    }

    public function title_delete(Request $request)
    {
        $delete_title = FooterTitle::find($request->id)->delete();
        if ($delete_title) {
            Session::flash('success', "Footer Title Deleted Successfully !!!");
            return redirect()->back();
        } else {
            Session::flash('error', 'Opps Something Wrong!!!');
            return redirect()->back();
        }
    }
}
