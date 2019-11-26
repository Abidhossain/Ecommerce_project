<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WebsiteConfig;
use Session;
class WebConfiguration extends Controller
{

    public function web_site_configuration()
    {
      $web_infos = WebsiteConfig::first();
      return view('admin.webConfiguration.webConfiguration',compact('web_infos'));
    }

    public function web_site_update(Request $request)
    { 
      // dd($request->all());
        $this->validate($request,[
        'company_name' => 'required',
        // 'company_logo' => 'image|required',
        'company_email' => 'required', 
    ]);

      $count_row = WebsiteConfig::get()->count();
      if($count_row < 1){
          if ($request->company_logo !='') {
          $files = $request->file('company_logo');
          $extension = $files->getClientOriginalExtension();
          $fileName = $request->company_name.".".$extension;
          $folderpath = 'Pharmacy/WebConfig/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

          // update infos with logo//

        $update_infos =  WebsiteConfig::insert([
            'company_logo'      => $image_url,
            'company_name'      => $request->company_name,
            'company_email'     => $request->company_email,
            'phone_1'           => $request->phone_1,
            'phone_2'           => $request->phone_2,
            'company_address'   => $request->company_address,  
            'google_map_code'   => $request->google_map_code,
            'social_link'       => $request->social_link
          ]);
      if ($update_infos){
        Session::flash('success',"Basic Infrmation Updated !!!");
      return redirect()->back();
      }else{
        Session::flash('error','Opps Something Wrong !!!');
      return redirect()->back();
      }
      }
      }else{
        if ($request->company_logo !='') {
              $img_url = WebsiteConfig::where('id', $request->id)->first();
             $image_path = $img_url->company_logo;
             $fav_image_path = $img_url->fav_icon;
             if($img_url !='' ) {
                 if (file_exists($img_url->company_logo))
                       @unlink($image_path);
            }
          $files = $request->file('company_logo');
          $extension = $files->getClientOriginalExtension();
          $fileName = $request->company_name.".".$extension;
          $folderpath = 'Pharmacy/WebConfig/';
          $image_url = $folderpath.$fileName;
          $files->move($folderpath , $fileName);

          // update infos with logo//

        $update_infos =  WebsiteConfig::where('id', $request->id)
          ->update([
            'company_logo'      => $image_url,
            'company_name'      => $request->company_name,
            'company_email'     => $request->company_email,
            'phone_1'           => $request->phone_1,
            'phone_2'           => $request->phone_2,
            'company_address'   => $request->company_address, 
            'google_map_code'   => $request->google_map_code,
            'social_link'       => $request->social_link
          ]);
      if ($update_infos){
        Session::flash('success',"Basic Infrmation Updated !!!");
      return redirect()->back();
      }else{
        Session::flash('error','Opps Something Wrong !!!');
      return redirect()->back();
      }
      }else{
          // update infos with logo//

          $update_infos =  WebsiteConfig::where('id', $request->id)
            ->update([
              'company_name'     => $request->company_name,
              'company_email'    => $request->company_email,
              'phone_1'          => $request->phone_1,
              'phone_2'          => $request->phone_2,
              'company_address'  => $request->company_address, 
              'google_map_code'  => $request->google_map_code,
              'social_link'      => $request->social_link
            ]);
        if ($update_infos){
          Session::flash('success',"Basic Infrmation Updated !!!");
        return redirect()->back();
        }else{
          Session::flash('error','Opps Something Wrong !!!');
        return redirect()->back();
        }
      }
      }
  }
}
