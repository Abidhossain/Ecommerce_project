<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
use App\Model\Page;

class PageController extends Controller
{

    //------------------------ Page List Method -----------------------//
    public function page_list()
    {
        $page_infos = Page::get();
        return view('admin.pages.page_list', compact('page_infos'));
    }

    //------------------------ Page List Method -----------------------//
    public function page_create()
    {
        return view('admin.pages.page_add');
    }

    public function page_store(Request $request)
    {
        // dd($request->all());
        $check_validation = $request->validate([
            'page_name' => 'required|unique:pages,page_name',
            'page_title' => 'required|unique:pages,page_title'
        ]);
        $add_page = $request->all();
        $add_page['page_slug'] = str_slug($request->page_name);
        $store_page = Page::create($add_page);
        if ($store_page) {
            Session::flash('success', "Page Added Successfully !!!");
            return redirect()->back();
        } else {
            Session::flash('error', 'Oppd Something Wrong!!!');
            return redirect()->back();
        }
    }

    // --------------------Page Edit Method-----------------//

    public function page_edit($page_id)
    {
        $edit_by_id = Page::where('id', $page_id)->first();
        return view('admin.pages.page_edit', compact('edit_by_id'));
    }

    // --------------------Page Update Method-----------------//

    public function page_update(Request $request)
    {
        
        $update_infos = Page::where('id', $request->page_id)
            ->update([
                'page_name' => $request->page_name,
                'page_title' => $request->page_title,
                'page_description' => $request->page_description,
                'page_position' => $request->page_position,
                'publication_status' => $request->publication_status,
                'page_slug' => str_slug($request->page_name)
            ]);
        if ($update_infos) {
            Session::flash('success', "Page Updated Successfully!!!");
            return redirect()->back();
        } else {
            Session::flash('error', 'Opps Something Wrong !!!');
            return redirect()->back();
        }
    }

    // ----------------Pages Delete Method---------------------//

    public function page_delete($page_id)
    {
        $page_delete = Page::where('id', $page_id)->delete();
        if ($page_delete) {
            Session::flash('success', "Page Deleted Successfully !!!");
            return redirect()->back();
        } else {
            Session::flash('error', "Opps Something Wrong !!!");
            return redirect()->back();
        }
    }


}
