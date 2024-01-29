<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class OfficerController extends Controller
{
    private $rcdate;
    private $current_time;
    private $random_number;
    private $loged_id;
    private $branch_id;
    /**
     * ADMIN CLASS costructor 
     *
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate        = date('Y-m-d');
        $this->current_time  = date('H:i:s');
        $this->random_number = date('dmY') . rand(10000, 99999) . mt_rand(1000000000, 9999999999);
        $this->loged_id      = Session::get('admin_id');
        $this->branch_id    = Session::get('branch_id');
    }



    #---------------------- start Client -----------------------------#

  #---------------------- Add Client -----------------------------#    
    public function addOfficer()
    {
        return view('officer.addOfficer');
    }
    public function addOfficerInfo(Request $request)
    {
         $this->validate($request, [
            'officer_name'         => 'required',  
            'number'               => 'required',               
            'image'                => 'mimes:jpeg,jpg,png|max:100'
          ]);
        $officer_name           = trim($request->officer_name);
        $education              = trim($request->education);
        $officer_designation    = trim($request->officer_designation); 
        $email                  = trim($request->email);
        $number                 = trim($request->number);
        $description            = trim($request->description);
        $check=DB::table('officer')->where([
            ['number','=',$number],])->first();
        if ($check) {
            Session::put('failed', 'Thanks, Dublicate Phone number Do not exist');
         return Redirect::to('addOfficer');
        }  
        else{     
        $data = array();
        $data['officer_name']           = $officer_name;
        $data['education']              = $education;
        $data['officer_designation']    = $officer_designation;
        $data['email']                  = $email; 
        $data['number']                 = $number;  
        $data['description']            = $description;
        $image                          = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='officer'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             //DB::table('client')->insert($data);
        }
     }
             // without image       

        DB::table('officer')->insert($data);  
        Session::put('succes', 'Thanks ,Officer Added Sucessfully');
        return Redirect::to('addOfficer');  
    }

}
#-------------------------------------------------------------------------------#
#--------------------------------Manage Client----------------------------#
    public function manageOfficer()
    {
        $result = DB::table('officer')->get();
        return view('officer.manageOfficer')->with('result',$result);
    }
#-------------------------------------------------------------------------------#

#-----------------------------Edit Client-------------------------------------------#

    public function editOfficerInfo($id)
    {
        $result = DB::table('officer')->where('id',$id)->first();
        return view('officer.editOfficerInfo')->with('result',$result)->with('id',$id);
    }
    public function editOfficerInfoo(Request $request)
    {
         $this->validate($request, [
            'officer_name'          => 'required',
            'number'                => 'required'          
          ]);
        $officer_name            = trim($request->officer_name);
        $education               = trim($request->education);
        $officer_designation     = trim($request->officer_designation); 
        $email                   = trim($request->email);
        $number                  = trim($request->number);
        $description             = trim($request->description);
        $id                      =trim($request->id);  
        $check=DB::table('officer')
        ->where('number',$number)
        ->whereNotIn('id',[$id])
        ->count();
        if ($check>0) {
        Session::put('failed', 'Thanks, Dublicate Phone number Do not exist');
         return Redirect::to('manageOfficer');
        }
        else{    
        $data = array();
        $data['officer_name']            = $officer_name;
        $data['education']               = $education;
        $data['officer_designation']     = $officer_designation;
        $data['email']                   = $email; 
        $data['number']                  = $number;   
        $data['description']             = $description;  
        $image                   = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='officer'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('officer')->where('id',$id)->update($data);
        }  
     }else{

         // get image url of thissr
       $__sr_image_url_info_query = DB::table('officer')->where('id',$id)->first();
             // without image
             $data['image'] =$__sr_image_url_info_query->image ;
              DB::table('officer')->where('id',$id)->update($data);      
    }
        

        DB::table('officer')->where('id',$id)->update($data);  
        Session::put('succes', 'Thanks, Update Sucessfully');
        return Redirect::to('manageOfficer');
    }

}
#---------------------------------------------------------------------------------#

#-------------------------Delete Client----------------------------------------------------#
    public function deleteOfficerInfo($id)
    {
        DB::table('officer')->where('id',$id)->delete();
        Session::put('succes', 'Thanks, Officer Deleted Sucessfully');
        return Redirect::to('manageOfficer');

    }
#-------------------------------------------------------------------------------#

#--------------------------------- End Client -------------------------------------#
}
