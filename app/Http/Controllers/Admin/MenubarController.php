<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\Menu;
class MenubarController extends Controller
{
      // ----------------------Manu Index Method----------------------//
    public function menubar_index()
    {
      $menu_infos = Menu::get();
      return view('admin.menubar.menubar_list',compact('menu_infos'));
    }

    // ----------------------Manu Index Method----------------------//
    public function menu_add_process(Request $request)
    {
      // dd($request->all());
      $menu_add = new Menu;
      $menu_add->menu_name = $request->menu_name;
      $menu_add->menu_type = $request->menu_type;
      if(!empty($request->slug)){
        $menu_add->menu_link = str_slug($request->slug);
      }else{
        $menu_add->menu_link = $request->menu_link;
      }
      $menu_add->position = $request->position;
      $menu_add->publication_status = $request->publication_status;
      $menu_add->save();
      if ($menu_add) {
         Session::flash('success',"Menu Added Successfully!!!");
              return redirect()->back();
          }else{
              Session::flash('error','Opps Failed !!!');
              return redirect()->back();
          }
    }
    //------------------------ Size Edit Method -----------------------//
    public function menu_edit($menu_id)
    {
         $get_by_id = Menu::where('id',$menu_id)->first();
         return view('admin.menubar.menu_edit',compact('get_by_id'));
    }
    //------------------------ Size Update Method -----------------------//
    public function menu_update(Request $request)
    {
     $menu_update = Menu::where('id',$request->menu_id)
                    ->update([
                      'menu_name' => $request->menu_name,
                      'menu_type' => $request->menu_type,
                      'menu_link' => str_slug($request->menu_link),
                      'position' => $request->position,
                      'publication_status' => $request->publication_status
                    ]);
        if ($menu_update) {
           Session::flash('success',"Menu Updaetd !!!");
                return redirect('menu-list');
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect('menu-list');
            }
    }
    //------------------------ Faq Delete Method -----------------------//
    public function menu_delete($menu_id)
    {
        $menu_delete = Menu::where('id',$menu_id)->delete();
         if ($menu_delete) {
           Session::flash('success',"Menu Deleted");
                return redirect()->back();
            }else{
                Session::flash('error','Opps Failed !!!');
                return redirect()->back();
            }
    }
}
