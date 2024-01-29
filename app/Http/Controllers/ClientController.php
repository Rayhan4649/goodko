<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class ClientController extends Controller
{
    private $rcdate;
    private $current_time;
    private $random_number;
    private $loged_id;
    private $branch_id;
    private $ip;
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
        $this->ip = getenv('HTTP_CLIENT_IP')?:
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?:
            getenv('HTTP_FORWARDED_FOR')?:
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');
    }
#---------------------- start Client ---------------------------#
#---------------------- Add Client -----------------------------#    
    public function addClient()
    {
        $result = DB::table('category')->get();
        return view('client.addClient')->with('result',$result);
    }
    public function addClientInfo(Request $request)
    {
         $this->validate($request, [
            'client_name'       => 'required',
            'category'          => 'required',
            'number'            => 'required',               
            'image'             => 'mimes:jpeg,jpg,png|max:100'
          ]);
        $client_name            = trim($request->client_name);
        $client_institution     = trim($request->client_institution); 
        $category               = trim($request->category);
        $number                 = trim($request->number);
        $softwar_price          = trim($request->softwar_price);
        $server_fee             = trim($request->server_fee); 
        $address                = trim($request->address);
        $check=DB::table('client')->where([
            ['number','=',$number],])->first();
        if ($check) {
            Session::put('failed', 'Thanks, Dublicate Phone number Do not exist');
         return Redirect::to('addClient');
        }  
        else{     
        $data = array();
        $data['client_name']            = $client_name;
        $data['client_institution']     = $client_institution;
        $data['category_id']            = $category; 
        $data['number']                 = $number; 
        $data['softwar_price']          = $softwar_price; 
        $data['server_fee']             = $server_fee; 
        $data['address']                = $address;
        $image                   = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='client'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
        }
     }
                  // without image       
        DB::table('client')->insert($data);  
        Session::put('succes', 'Thanks ,Client Added Sucessfully');
        return Redirect::to('addClient');  
    }
}
#-------------------------------------------------------------------------#
#--------------------------------Manage Client----------------------------#
    public function manageClient()
    {
        $result = DB::table('client')->get();
        return view('client.manageClient')->with('result',$result);
    }
#-------------------------------------------------------  -----------------#
#-----------------------------Edit Client----------------------------------#
    public function editClientInfo($id)
    {
        $result = DB::table('client')->where('id',$id)->first();
        $category = DB::table('category')->get();
        return view('client.editClientInfo')->with('result',$result)->with('id',$id)->with('category',$category);
    }
    public function editClientInfoo(Request $request)
    {
         $this->validate($request, [
            'client_name'          => 'required',
            'category'             => 'required',
            'number'               => 'required'            
          ]);
        $client_name            = trim($request->client_name);
        $client_institution     = trim($request->client_institution); 
        $category               = trim($request->category);
        $number                 = trim($request->number);
        $softwar_price          = trim($request->softwar_price);
        $server_fee             = trim($request->server_fee);
        $address                = trim($request->address);
        $id                     =trim($request->id);  
        $check=DB::table('client')
        ->where('number',$number)
        ->whereNotIn('id',[$id])
        ->count();
        if ($check>0) {
        Session::put('failed', 'Thanks, Dublicate Phone number Do not exist');
         return Redirect::to('manageClient');
        }
        else{    
        $data = array();
        $data['client_name']            = $client_name;
        $data['client_institution']     = $client_institution;
        $data['category_id']            = $category; 
        $data['number']                 = $number;   
        $data['softwar_price']          = $softwar_price; 
        $data['server_fee']             = $server_fee;
        $data['address']                = $address;  
        $image                          = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='client'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('client')->where('id',$id)->update($data);
        }  
     }else{

         // get image url of thissr
       $__sr_image_url_info_query = DB::table('client')->where('id',$id)->first();
             // without image
             $data['image'] =$__sr_image_url_info_query->image ;
              DB::table('client')->where('id',$id)->update($data);      
    }
        DB::table('client')->where('id',$id)->update($data);  
        Session::put('succes', 'Thanks, Update Sucessfully');
        return Redirect::to('manageClient');
    }
}
#------------------------------------------------------------------------------#
#-------------------------Delete Client----------------------------------------#
    public function deleteClientInfo($id)
    {
        DB::table('client')->where('id',$id)->delete();
        Session::put('succes', 'Thanks, Client Deleted Sucessfully');
        return Redirect::to('manageClient');
    }
#-------------------------------------------------------------------------------#
#--------------------------------- End Client ----------------------------------#
    public function messageInfo(Request $request){
         $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'message'       => 'required'            
          ]);
        $name            = trim($request->name);
        $email           = trim($request->email); 
        $message         = trim($request->message); 
        $data = array();
        $data['name']           = $name;
        $data['email']          = $email;
        $data['message']        = $message; 
        $data['ip']       = $this->ip ;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;       
        DB::table('message')->insert($data);  
        Session::put('succes', 'Thanks, For The Message');
        return Redirect::to('/');
    }
}
