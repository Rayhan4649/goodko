<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class AdminController extends Controller
{
    private $rcdate ;
    private $current_time ;
    private $random_number ;
    private $loged_id ;
    private $branch_id ;
     /**
     * ADMIN CLASS costructor 
     *
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Dhaka');
        $this->rcdate        = date('Y-m-d');
        $this->current_time  = date('H:i:s');
        $this->random_number = date('dmY').rand(10000 , 99999).mt_rand(1000000000, 9999999999);
        $this->loged_id      = Session::get('admin_id');
        $this->branch_id    = Session::get('branch_id');
    }
    
    /**
     * Display admin login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Display admin login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function apps()
    {
        return view('admin.apps');
    }

    #----------------------- ADMIN LOGIN---------------------- #
    /**
     * login process for admin or seller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
     // form validation
    $this->validate($request, [
    'mobile'    => 'required',
    'password'  => 'required',
   ]);
     $mobile    = trim($request->mobile);
     $pwd       = trim($request->password);
     $salt      = 'a123A321';
     $password  = sha1($pwd.$salt);
    #--------------- super admin and manager login -----------------------#
      $count = DB::table('admin')
     ->where('mobile', $mobile)
     ->where('password', $password)
      ->where('status',1)
     ->count();
     if($count > 0){
     $admin_login = DB::table('admin')
     ->where('mobile', $mobile)
     ->where('password', $password)
     ->where('status',1)
     ->first();
         // check user type
          $type = $admin_login->type ;
          if($type == '1'){
            // admin login
          Session::put('admin_name',$admin_login->name);
          Session::put('admin_id',$admin_login->id);
          Session::put('type',$admin_login->type);
          Session::put('photo',$admin_login->image);
          return Redirect::to('/adminDashboard');
          }elseif($type == "3"){
          $auth_number_length           = 30 ;
          $auth_number                  = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),1,$auth_number_length);
          $track_no                     = date('dmY').rand(10000 , 99999) ;
          Session::put('admin_name',$admin_login->name);
          Session::put('admin_id',$admin_login->id);
          Session::put('type',$admin_login->type);
          Session::put('branch_id',$admin_login->branch_id);
          Session::put('photo',$admin_login->image);
          Session::put('auth_number',$auth_number);
          Session::put('track_no',$track_no);
          return Redirect::to('/srDashboard');
          }else{
          // manager dashboard
          // delete productom cart
        
          Session::put('admin_name',$admin_login->name);
          Session::put('admin_id',$admin_login->id);
          Session::put('type',$admin_login->type);
          Session::put('branch_id',$admin_login->branch_id);
          Session::put('photo',$admin_login->image);
          return Redirect::to('/managerDashboard');
          }

      }else{
          Session::put('login_faild','Sorry!! Your Information Did Not Match. Try Again');
          return Redirect::to('/admin');

      }
  #------------------------------ END ADMIN LOGIN -------------------------------------#

}
  
  public function otp()
  {
    return view('admin.otp') ;
  }

  public function loginUsingOtp(Request $request)
  {
        $this->validate($request, [
          'otp' => 'required',
        ]) ;

        $otp = trim($request->otp);
        # CHECK OTP MATCH OR NOT 
        $check_otp = DB::table('admin')
                  ->where('mobile', Session::get('login_mobile'))
                  ->where('login_otp', $otp)
                  ->count();
        if ($check_otp > 0) {
          $userlogin = DB::table('admin')
                  ->where('mobile', Session::get('login_mobile'))
                  ->where('login_otp', $otp)
                  ->first();

          Session::put('login_mobile',null);
          $data = array() ;
          $data['login_otp'] = "" ;
          DB::table('admin')->where('id', $userlogin->id)->update($data) ;
          // // check user type
          $type = $userlogin->type ;
          if($type == '1'){
                // admin login
              Session::put('admin_name',$userlogin->name);
              Session::put('admin_id',$userlogin->id);
              Session::put('type',$userlogin->type);
              Session::put('photo',$userlogin->image);
              return Redirect::to('/adminDashboard');
          }else{
              if ($userlogin->manager_type == '1') {
                  // manager dashboard
                  Session::put('admin_name',$userlogin->name);
                  Session::put('admin_id',$userlogin->id);
                  Session::put('type',$userlogin->type);
                  Session::put('branch_id',$userlogin->branch_id);
                  Session::put('photo',$userlogin->image);
                  return Redirect::to('/appsDashboard');
              }else{
                // manager dashboard
                Session::put('admin_name',$userlogin->name);
                Session::put('admin_id',$userlogin->id);
                Session::put('type',$userlogin->type);
                Session::put('branch_id',$userlogin->branch_id);
                Session::put('photo',$userlogin->image);
                return Redirect::to('/managerDashboard');
              }
          }
        }else{
          Session::put('login_faild','Sorry!! Your OTP Did Not Match. Try Again');
          return Redirect::to('/otp');
        }
  }

  public function resendotp()
  {
    $mobile   = Session::get('login_mobile');
    if ($mobile != null) {
      $userInfo = DB::table('admin')->where('mobile', $mobile)->first() ;
      $db_otp = $userInfo->login_otp ;

      if ($db_otp != "") {
        $sms = "Your Login OTP Is"." ".$db_otp." Thanks";

        #-------------------- Send SMS Section ----------------------------#
        $total_buye_sms          = DB::table('buy_sms')->sum('buy_sms_number');
        $total_send_sms          = DB::table('send_sms')->sum('send_sms_number');
        $total_sms_number        = 1 ;
        $remaining_sms_cradit    = $total_buye_sms - $total_send_sms;

        $messages       = urlencode($sms);

        if ($remaining_sms_cradit < $total_sms_number) {
            
        }else{
            $message = htmlentities($messages);


            $url = "http://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=abuayub16@gmail.com&password=c3e919b06ee8c9cbc2907e5eb7056233&MsgType=TEXT&receiver=$mobile&message=$message";
        
            function curl_get_contents($furl){
              $ch = curl_init();
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_URL, $furl);
              $data = curl_exec($ch);
              curl_close($ch);
              return $data;
            }        
                  
            $furl = str_replace(' ', '%20', $url);
            curl_get_contents($furl);
            #------------------- Insert History ----------------------#
            $data = array();
            $data['sms_number']         = $total_sms_number;
            $data['total_customer']     = 1;
            $data['send_sms_number']    = $total_sms_number;
            $data['sms']                = $sms;
            $data['purpose']            = "Login OTP";
            $data['created_at']         = $this->rcdate;
            DB::table('send_sms')->insert($data);
        }
        Session::put('login_success','Thanks !! OTP Re Send Sucessfully');
        return Redirect::to('/otp');
        #----------------------- End SMS Section --------------------------------#
      }else{

        $otp = rand(1000,9999);

        $sms = "Your Login OTP Is"." ".$otp." Thanks";

        #-------------------- Send SMS Section ----------------------------#
        $total_buye_sms          = DB::table('buy_sms')->sum('buy_sms_number');
        $total_send_sms          = DB::table('send_sms')->sum('send_sms_number');
        $total_sms_number        = 1 ;
        $remaining_sms_cradit    = $total_buye_sms - $total_send_sms;

        $messages       = urlencode($sms);

        if ($remaining_sms_cradit < $total_sms_number) {
            
        }else{
            $message = htmlentities($messages);


            $url = file_get_contents("http://touchsitbd.com/systemsms/api.php?username=asianitinc@gmail.com&password=121lsr21LaraSoft&recipient=$admin_login->mobile&message=$message");
            #------------------- Insert History ----------------------#
            $data = array();
            $data['sms_number']         = $total_sms_number;
            $data['total_customer']     = 1;
            $data['send_sms_number']    = $total_sms_number;
            $data['sms']                = $sms;
            $data['purpose']            = "Login OTP";
            $data['created_at']         = $this->rcdate;
            DB::table('send_sms')->insert($data);
        }
        #----------------------- End SMS Section --------------------------------#

          $data               = array() ;
          $data['login_otp']  = $otp ;
          DB::table('admin')->where('mobile', $admin_login->mobile)->update($data) ;

          Session::put('login_success','Thanks !! OTP Re Send Sucessfully');
          return Redirect::to('/otp');
      }
    }else{
      Session::put('login_faild','Sorry!! Session Not Match. Try Again');
      return Redirect::to('/otp');
    }
    
  }


    #----------------------- APPS LOGIN---------------------- #
    /**
     * login process for admin or seller.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function appsLogin(Request $request)
    {
     // form validation
    $this->validate($request, [
    'mobile'    => 'required',
    'password'  => 'required',
   ]);
     $mobile    = trim($request->mobile);
     $pwd       = trim($request->password);
     $salt      = 'a123A321';
     $password  = sha1($pwd.$salt);

        $admin_id_count  = Session::get('admin_id');
        $admin_type_is  = Session::get('type');

        if($admin_id_count != null){
        if($admin_type_is == '1'){
            $admin_type_name_is = "Admin";
        }elseif($admin_type_is == '2'){
          $admin_type_name_is = "Manager";  
        }
          Session::put('login_faild','Sorry!! Already You Have Logged In As A '.$admin_type_name_is.'. Please Logout As A '.$admin_type_name_is.' Or Use Different Browser Or Clear History Of Your Browser And Then Try To Login');
          Session::put('hyperlink','Please Session Destroy');
          return Redirect::to('/apps');
          exit();
     }
    #--------------- super admin and manager login -----------------------#
      $count = DB::table('admin')
     ->where('mobile', $mobile)
     ->where('password', $password)
      ->where('status',1)
     ->count();
     if($count > 0){
     $admin_login = DB::table('admin')
     ->where('mobile', $mobile)
     ->where('password', $password)
     ->where('status',1)
     ->first();
         // check user type
          $type = $admin_login->type ;
          if($type == '1'){
            // admin login
          Session::put('admin_name',$admin_login->name);
          Session::put('admin_id',$admin_login->id);
          Session::put('type',$admin_login->type);
          Session::put('photo',$admin_login->image);
          return Redirect::to('/appsDashboard');
          }else{
          // manager dashboard
          Session::put('admin_name',$admin_login->name);
          Session::put('admin_id',$admin_login->id);
          Session::put('type',$admin_login->type);
          Session::put('branch_id',$admin_login->branch_id);
          Session::put('photo',$admin_login->image);
          return Redirect::to('/appsDashboard');
          }

      }else{
          Session::put('login_faild','Sorry!! Your Information Did Not Match. Try Again');
          return Redirect::to('/apps');

      }
  #------------------------------ END ADMIN LOGIN -------------------------------------#

}


    /**
     * super admin logout process 
     * @return \Illuminate\Http\Response
     */
    public function adminLogout()
   {
       Session::put('admin_id',null);
       Session::put('type',null);
       Session::put('branch_id',null);
       return Redirect::to('admin');
   }
   
    /**
     * manager logout process 
     * @return \Illuminate\Http\Response
     */
   public function managerLogout()
   {
      // $admin_id  = Session::get('admin_id');
      // DB::table('tbl_stock_cart_production')->where('added_id',$admin_id)->delete();
      // DB::table('tbl_main_cart_production')->where('added_id',$admin_id)->delete();
      // DB::table('tbl_raw_material_cart_production')->where('added_id',$admin_id)->delete();
      // DB::table('tbl_cart_production')->where('added_id',$admin_id)->delete();

       Session::put('admin_id',null);
       Session::put('type',null);
       Session::put('branch_id',null);
       return Redirect::to('admin');
   }

    public function srLogout()
   {
      $admin_id  = Session::get('admin_id');
       DB::table('tbl_cart')->where('sr_id',$admin_id)->delete();
       Session::put('admin_id',null);
       Session::put('type',null);
       Session::put('branch_id',null);
       Session::put('auth_number',null);
       Session::put('track_no',null);
       return Redirect::to('admin');
   }
   /**
     * manager logout process 
     * @return \Illuminate\Http\Response
     */
   public function appsLogout()
   {
       Session::put('admin_id',null);
       Session::put('type',null);
       Session::put('branch_id',null);
       return Redirect::to('apps');
   }
   
    /**
     * admin opening balance form.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAdminOpeningBalance()
    {
      return view('admin.addAdminOpeningBalance');
    }
    /**
    * add opening balance of admin .
    * pettycash , cashbook table
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function addAdminOpeningBalanceInfo(Request $request)
    {
     $this->validate($request, [
    'amount'               => 'required',
    'confirm_amount'       => 'required',
    'tr_date'              => 'required'
    ]);

     $amount         = trim($request->amount);
     $confirm_amount = trim($request->confirm_amount);
     $tr_date        = trim($request->tr_date);
     $trDate         = date('Y-m-d',strtotime($tr_date)) ;
      if($trDate > $this->rcdate){
        Session::put('failed','Sorry ! Enter Invalid Date. Please Enter Valid Date And Try Again ');
        return Redirect::to('addAdminOpeningBalance');
        exit();
     }
     // check amount and confirm amount
     if($amount != $confirm_amount){
      Session::put('failed','Sorry ! Amount And Confirm Confirm Amount Did Not Match. Try Again');
        return Redirect::to('addAdminOpeningBalance');  
        exit();
     }
     // check duplicate entry
     $count = DB::table('pettycash')->where('branch_id',0)->count();
     if($count > 0){
         Session::put('failed','Sorry ! Admin Opening Balance Already Added.');
        return Redirect::to('addAdminOpeningBalance');  
        exit();
     }
     // insert the pettycash
     $data=array();
     $data['branch_id']          = 0 ;
     $data['pettycash_amount']             = $amount ;
     $data['created_at']          = $this->rcdate ;
     $query = DB::table('pettycash')->insert($data);
     if($query){
        // insert into cahsbook opening balance
        // status 2 = admin opening balance
        $data_cashbook                    = array();
        $data_cashbook['random_number']   = $this->random_number ;
        $data_cashbook['type']            = 10 ;
        $data_cashbook['branch_id']   = 0 ;
        $data_cashbook['earn']        = $amount ;
        $data_cashbook['status']      = 2 ;
        $data_cashbook['tr_status']   = 1 ;
        $data_cashbook['purpose']     = 'Start Accounting';
        $data_cashbook['added_id']    = $this->loged_id ;
        $data_cashbook['tr_time']     = $this->current_time  ;
        $data_cashbook['created_at']  = $trDate;
        $data_cashbook['on_created_at'] = $this->rcdate;
        $query2 = DB::table('cashbook')->insert($data_cashbook);
        if($query2){
        Session::put('succes','Thanks , Opening Balance Added Sucessfully');
        return Redirect::to('addAdminOpeningBalance');
        }else{
        Session::put('failed','Sorry ! Error Occued. Try Again');
        return Redirect::to('addAdminOpeningBalance');
        }
       }else{
        Session::put('failed','Sorry ! Error Occued. Try Again');
        return Redirect::to('addAdminOpeningBalance');
    }
}

   #--------------------------------- STAFF ---------------------------------#
    /**
     * add manager form.
     * with branch id
     * @return \Illuminate\Http\Response
     */
    public function addBranchManager()
    {
        $result = DB::table('branch')->get();
        return view('admin.addBranchManager')->with('result',$result);
    }
    /**
    * new manager information added .
    * with current due
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function addManagerInfo(Request $request)
    {
    $this->validate($request, [
    'branch'            => 'required',
    'name'              => 'required',
    'mobile'            => 'required',
    'address'           => 'required',
    'image'             => 'mimes:jpeg,jpg,png|max:100'
    ]);
     $branch                = trim($request->branch);
     $name                  = trim($request->name);
     $father_name           = trim($request->father_name);
     $mobile                = trim($request->mobile);
     $email                 = trim($request->email);
     $nid                   = trim($request->nid);
     $address               = trim($request->address);
     $salt      = 'a123A321';
     $password  = trim(sha1($mobile.$salt));
     //check duplicate supplier name
     $count = DB::table('admin')
     ->where('mobile',$mobile)
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! Manager Already Exits. Try Again To Add New Manager');
        return Redirect::to('addBranchManager');
        exit();
     }
     $data=array();
     $data['branch_id']       = $branch ;
     $data['name']            = $name ;
     $data['nid']             = $nid ;
     $data['father_name']     = $father_name ;
     $data['email']           = $email ;
     $data['mobile']          = $mobile ;
     $data['type']            = 2 ;
     $data['password']        =  $password;
     $data['address']         = $address;
     $data['status']          = 1;
     $data['creatd_at']      = $this->rcdate ;
     $image                   = $request->file('image');
     
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='manager-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('admin')->insert($data);
             Session::put('succes','New Manager Added Sucessfully');
            return Redirect::to('addBranchManager');
        }
        
     }else{
             // without image
             DB::table('admin')->insert($data);
             Session::put('succes','New Manager Added Sucessfully');
            return Redirect::to('addBranchManager');
    }

    }
    /**
     * Display the all manger.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageBranchManager()
    {
    $result = DB::table('admin')
    ->join('branch', 'admin.branch_id', '=', 'branch.id')
    ->select('admin.*','branch.name','admin.name as manager_name')
    ->where('admin.type', 2)
    ->get();
    return view('admin.manageBranchManager')->with('result',$result);
    }
   #-------------------------------- END -------------------------------------#
   #------------------------------ MANAGER PASSWORD CHANGE----------------------#
    // manager password change
    public function managerChangePassword()
    {
        return view('admin.managerChangePassword');
    }
    // manager change password
    public function managerChangePasswordInfo(Request $request)
    {
     $this->validate($request, [
    'old_password'              => 'required',
    'new_password'              => 'required',
    'confirm_new_password'      => 'required'
    ]);
     $salt                 = 'a123A321';
     $old_password         = trim($request->old_password);
     $new_password         = trim($request->new_password);
     $confirm_new_password = trim($request->confirm_new_password);
     $id                   = trim($request->id);
     $salt_old_password    = sha1($old_password.$salt);
     $change_password      = sha1($new_password.$salt);
     // check old password
     $check_old_password_query = DB::table('admin')->where('id',$id)->where('password',$salt_old_password)->count();
     if($check_old_password_query == '0'){
        // Old password does not match
        Session::put('failed','Sorry ! Your old Password Did Not Match. Try Again');
        return Redirect::to('managerChangePassword');  
        exit();
     } 
     // new password and confirm new password matcho
     if($new_password != $confirm_new_password){
        Session::put('failed','Sorry !New password And Confirm New Password Did Not Match. Try Again');
        return Redirect::to('managerChangePassword');  
        exit();
     }
     // insert password change history
    $data = array();
    $data['admin_id']       = $id ;
    $data['password']       = $change_password ;
    $data['reconver_code']  = '' ;
    $data['type']           = 2 ;
    $data['status']         = 1 ;
    $data['created_time']   = $this->current_time ;
    $data['created_at']     = $this->rcdate ;
    DB::table('password_change_history')->insert($data);
    // change the password
    $data1 = array();
    $data1['password'] = $change_password ;
    $query = DB::table('admin')->where('id',$id)->update($data1);
    if($query){
    Session::put('admin_id',null);
    Session::put('type',null);
    Session::put('password_change','Password Change Sucessfully'); 
    return Redirect::to('admin');
    }else{
        Session::put('failed','Sorry !Error Occured. Try Again');
        return Redirect::to('managerChangePassword');
    }
    }
   #------------------------------- END MANAGER PASSWORD CHANGE------------------#  
   #------------------------------- ADMIN PASSWORD CHANGE------------------------#
    // admin password change
    public function adminChangePassword()
    {
        return view('admin.adminChangePassword');
    }
    // admin password change 
    public function adminChangePasswordInfo(Request $request)
    {
     $this->validate($request, [
    'old_password'              => 'required',
    'new_password'              => 'required',
    'confirm_new_password'      => 'required'
    ]);
     $salt                 = 'a123A321';
     $old_password         = trim($request->old_password);
     $new_password         = trim($request->new_password);
     $confirm_new_password = trim($request->confirm_new_password);
     $id                   = trim($request->id);
     $salt_old_password    = sha1($old_password.$salt);
     $change_password      = sha1($new_password.$salt);
     // check old password
     $check_old_password_query = DB::table('admin')->where('id',$id)->where('password',$salt_old_password)->count();
     if($check_old_password_query == '0'){
        // Old password does not match
        Session::put('failed','Sorry ! Your old Password Did Not Match. Try Again');
        return Redirect::to('adminChangePassword');  
        exit();
     } 
     // new password and confirm new password matcho
     if($new_password != $confirm_new_password){
        Session::put('failed','Sorry !New password And Confirm New Password Did Not Match. Try Again');
        return Redirect::to('adminChangePassword');  
        exit();
     }
     // insert password change history
    $data = array();
    $data['admin_id']       = $id ;
    $data['password']       = $change_password ;
    $data['reconver_code']  = '' ;
    $data['type']           = 1 ;
    $data['status']         = 1 ;
    $data['created_time']   = $this->current_time ;
    $data['created_at']     = $this->rcdate ;
    DB::table('password_change_history')->insert($data);
    // change the password
    $data1 = array();
    $data1['password'] = $change_password ;
    $query = DB::table('admin')->where('id',$id)->update($data1);
    if($query){
    Session::put('admin_id',null);
    Session::put('type',null);
    Session::put('password_change','Password Change Sucessfully'); 
    return Redirect::to('admin');
    }else{
        Session::put('failed','Sorry !Error Occured. Try Again');
        return Redirect::to('adminChangePassword');
    }
    }
  #----------------------------- END ADMIN PASSWORD CHANGE-----------------------#
  #--------------------------- FORGOTTEN PASSWORD--------------------------------#
  // mobile number verify
    public function mobileNumberVerify()
    {
        return view('admin.mobileNumberVerify');
    }
    // send verification code in mobile
    public function sendMobileVerificationCode(Request $request)
    {
    $this->validate($request, [
    'mobile'              => 'required|size:11'
    ]);
     $mobile         = trim($request->mobile);
     // verification the mobile number
     $count = DB::table('admin')->where('mobile',$mobile)->count();
     if($count == '0'){
        // mobile number not match
        Session::put('failed','Sorry ! Your Mobile Number Not Match. Try Again');
        return Redirect::to('mobileNumberVerify');
        exit();
     }else{
        // get this id
        $query = DB::table('admin')->where('mobile',$mobile)->first();
        $id     = $query->id ;
        $log_mobile = $query->mobile ;
        // verification code sent on mobile
        // update recovery code
        $code = rand(999999,10000);
         $data                 = array();
         $data['recover_code'] = $code ;
         $update = DB::table('admin')->where('id',$id)->update($data);
         if($update){
            $last_digit_mobile = substr($log_mobile, 8);
            Session::put('succes','Thanks , Recovery Code Sent To Your Mobile Number Which Last 3 Digits is xxxxxxxx'.$last_digit_mobile.' Verify Code Enter Into Below Input Box');
           return Redirect::to('recoverPassword/'.$id);

         }else{
        Session::put('failed','Sorry ! Error Occured. Try Again');
        return Redirect::to('mobileNumberVerify');
         }
     } 
    }
    // verify recover code
    public function recoverPassword($id)
    {
     return view('admin.recoverPassword')->with('id',$id);
    }
    // recover account
    public function recoverAccount(Request $request)
    {
    $this->validate($request, [
    'code'                      => 'required',
    'password'              => 'required',
    'confirm_password'      => 'required'
    ]);
     $salt                 = 'a123A321';
     $code         = trim($request->code);
     $new_password         = trim($request->password);
     $confirm_new_password = trim($request->confirm_password);
     $id                   = trim($request->id);
     $change_password      = sha1($new_password.$salt);
     // check old password
     $check_code_query = DB::table('admin')->where('id',$id)->where('recover_code',$code)->count();
     if($check_code_query == '0'){
        // Old password does not match
        Session::put('failed','Sorry ! Your Recovery Code Did Not Match. Try Again');
        return Redirect::to('recoverPassword/'.$id);  
        exit();
     } 
     // new password and confirm new password matcho
     if($new_password != $confirm_new_password){
        Session::put('failed','Sorry !New password And Confirm New Password Did Not Match. Try Again');
        return Redirect::to('recoverPassword/'.$id);  
        exit();
     }
     // insert password change history
    $data = array();
    $data['admin_id']       = $id ;
    $data['password']       = $change_password ;
    $data['reconver_code']  = '' ;
    $data['type']           = '' ;
    $data['status']         = 2 ;
    $data['created_time']   = $this->current_time ;
    $data['created_at']     = $this->rcdate ;
    DB::table('password_change_history')->insert($data);
    // change the password
    $data1 = array();
    $data1['password'] = $change_password ;
    $query = DB::table('admin')->where('id',$id)->update($data1);
    if($query){
    Session::put('password_change','Your Account Recovery Sucessfully'); 
    return Redirect::to('admin');
    }else{
        Session::put('failed','Sorry !Error Occured. Try Again');
        return Redirect::to('adminChangePassword');
    }
    }

  #--------------------------- END FORGOTTEN PASSWORD-----------------------------#

    #------------------- Get Single Branch Manger info ------------#
    public function singleBranchManagerInfo($id)
    {
        $value = DB::table('admin')
        ->join('branch','admin.branch_id','=','branch.id')
        ->select('admin.*','branch.name AS manager_name')
        ->where('admin.id',$id)
        ->first();

        return view('admin.singleBranchManagerInfo')->with('value',$value);
    }

    #------------------------ UPDATE BRANCH MANAGER ---------------------#
    public function updateManagerInfo(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'mobile'            => 'required',
            'address'           => 'required',
            'image'             => 'mimes:jpeg,jpg,png|max:100'
        ]);
     $name                  = trim($request->name);
     $father_name           = trim($request->father_name);
     $mobile                = trim($request->mobile);
     $email                 = trim($request->email);
     $nid                   = trim($request->nid);
     $address               = trim($request->address);
     $primary_id            = trim($request->primary_id);

     //check duplicate supplier name
     $count = DB::table('admin')
     ->where('mobile',$mobile)
     ->whereNotIn('id',[$primary_id])
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! Manager Already Exits. Try Again To Edit Manager');
        return Redirect::to('singleBranchManagerInfo/'.$primary_id);
        exit();
     }
     $data=array();
     $data['name']            = $name ;
     $data['nid']             = $nid ;
     $data['father_name']     = $father_name ;
     $data['email']           = $email ;
     $data['mobile']          = $mobile ;
     $data['type']            = 2 ;
     $data['address']         = $address;
     $data['status']          = 1;
     $data['creatd_at']      = $this->rcdate ;
     $image                   = $request->file('image');
    if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='manager-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('admin')->where('id',$primary_id)->update($data);
             Session::put('succes','Manager Info Updated Sucessfully');
            return Redirect::to('singleBranchManagerInfo/'.$primary_id);
        }
     }else{
             // without image
             DB::table('admin')->where('id',$primary_id)->update($data);
             Session::put('succes','Manager Info Updated Sucessfully');
            return Redirect::to('singleBranchManagerInfo/'.$primary_id);
        }
    }


    # COLLECTION MAN PASSWORD CHANGE 
    public function collectionManChangePassword()
    {
      return view('admin.collectionManChangePassword') ;
    }

    public function collectionManChangePasswordInfo(Request $request)
    {
      $this->validate($request, [
        'old_password'              => 'required',
        'new_password'              => 'required',
        'confirm_new_password'      => 'required'
      ]);

      $salt                 = 'a123A321';
      $old_password         = trim($request->old_password);
      $new_password         = trim($request->new_password);
      $confirm_new_password = trim($request->confirm_new_password);
      $id                   = trim($request->id);
      $salt_old_password    = sha1($old_password.$salt);
      $change_password      = sha1($new_password.$salt);
      
      // check old password
      $check_old_password_query = DB::table('admin')->where('id',$id)->where('password',$salt_old_password)->count();
      if($check_old_password_query == '0'){
        // Old password does not match
        Session::put('failed','Sorry ! Your old Password Did Not Match. Try Again');
        return Redirect::to('collectionManChangePassword');  
        exit();
      } 
       // new password and confirm new password matcho
       if($new_password != $confirm_new_password){
          Session::put('failed','Sorry !New password And Confirm New Password Did Not Match. Try Again');
          return Redirect::to('collectionManChangePassword');  
          exit();
       }
       // insert password change history
      $data = array();
      $data['admin_id']       = $id ;
      $data['password']       = $change_password ;
      $data['reconver_code']  = '' ;
      $data['type']           = 2 ;
      $data['status']         = 1 ;
      $data['created_time']   = $this->current_time ;
      $data['created_at']     = $this->rcdate ;
      DB::table('password_change_history')->insert($data);
      // change the password
      $data1 = array();
      $data1['password'] = $change_password ;
      $query = DB::table('admin')->where('id',$id)->update($data1);
      if($query){
        Session::put('admin_id',null);
        Session::put('type',null);
        Session::put('password_change','Password Change Sucessfully'); 
        return Redirect::to('admin');
      }else{
          Session::put('failed','Sorry !Error Occured. Try Again');
          return Redirect::to('managerChangePassword');
      }
    }
    // add sr
    public function addSr()
    {
      $result = DB::table('branch')->where('id',$this->branch_id)->get();
      return view('admin.addSr')->with('result',$result);
    }
    // add sr info
    public function addSrInfo(Request $request)
    {
     $this->validate($request, [
    'branch'            => 'required',
    'name'              => 'required',
    'mobile'            => 'required',
    'address'           => 'required',
    'pettycash'         => 'required',
    'pettycash'         => 'required',
    'confirm_pettycash' => 'required',
    'tr_date'           => 'required',
    'due'               => 'required',
    'confirm_due'       => 'required',
    'image'             => 'mimes:jpeg,jpg,png|max:100'
    ]);
     $branch                = trim($request->branch);
     $name                  = trim($request->name);
     $father_name           = trim($request->father_name);
     $mobile                = trim($request->mobile);
     $email                 = trim($request->email);
     $nid                   = trim($request->nid);
     $address               = trim($request->address);
      $pettycash            = trim($request->pettycash);
      $confirm_pettycash    = trim($request->confirm_pettycash);
      $tr_date              = trim($request->tr_date);
      $trDate               = date('Y-m-d',strtotime($tr_date)) ;
      $due                  = trim($request->due);
      $confirm_due          = trim($request->confirm_due);

      if($pettycash != $confirm_pettycash){
        Session::put('failed','Sorry !Opening Balance And Confirm Opening Balance Did Not Match');
        return Redirect::to('addSr');
        exit();
      }
      if($trDate > $this->rcdate){
        Session::put('failed','Sorry ! Enter Invalid Date. Please Enter Valid Date And Try Again ');
        return Redirect::to('addSr');
        exit();
     }
    if($due != $confirm_due){
        Session::put('failed','Sorry ! Previous Due Balance And Confirm Previous Due Balance Did Not Match.');
        return Redirect::to('addSr');
        exit();
     }
     $salt      = 'a123A321';
     $password  = trim(sha1($mobile.$salt));
     //check duplicate supplier name
     $count = DB::table('admin')
     ->where('mobile',$mobile)
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! SR Already Exits. Try Again To Add New SR');
        return Redirect::to('addSr');
        exit();
     }
     $data = array();
     $data['branch_id']       = $branch ;
     $data['random_number']   = $this->random_number ;
     $data['name']            = $name ;
     $data['nid']             = $nid ;
     $data['father_name']     = $father_name ;
     $data['email']           = $email ;
     $data['mobile']          = $mobile ;
     $data['type']            = 3 ;
     $data['password']        = $password;
     $data['address']         = $address;
     $data['status']          = 1;
     $data['creatd_at']      = $this->rcdate ;
     $image                   = $request->file('image');
     
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='sr-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('admin')->insert($data);
        }
        
     }else{
             // without image
             DB::table('admin')->insert($data);       
    }

  $last_admin_id_query = DB::table('admin')->orderBy('id','desc')->first();
  $data_insert_cashbook                     = array();
  $data_insert_cashbook['random_number']    = $this->random_number;
  $data_insert_cashbook['type']             = 56 ;
  $data_insert_cashbook['branch_id']        = $branch ;
  $data_insert_cashbook['invoice_prefix']   = "SR-OPENING"  ;
  $data_insert_cashbook['earn']             = $pettycash ;
  $data_insert_cashbook['status']           = 130 ;
  $data_insert_cashbook['tr_status']        = 1 ;
  $data_insert_cashbook['purpose']          = "SR OPENING";
  $data_insert_cashbook['user_type']        = 3;
  $data_insert_cashbook['sr_id']            = $last_admin_id_query->id;
  $data_insert_cashbook['added_id']         = $this->loged_id;
  $data_insert_cashbook['tr_time']          = $this->current_time ;
  $data_insert_cashbook['created_at']       = $trDate ;
  $data_insert_cashbook['on_created_at']    = $this->rcdate ;
  DB::table('cashbook')->insert($data_insert_cashbook);

        $data_sr_petycash_insert                      = array();
        $data_sr_petycash_insert['sr_id']             = $last_admin_id_query->id ;
        $data_sr_petycash_insert['pettycash_amount']  = $pettycash  ;
        DB::table('sr_pettycash')->insert($data_sr_petycash_insert);

         $data1['sr_id']               = $last_admin_id_query->id ;
         $data1['total_due_amount']    = $due;
         $data1['created_at']          = $this->rcdate;
         DB::table('sr_due')->insert($data1);
         
        $dataledger = array(); 
        $dataledger['random_number']    = $this->random_number ;    
        $dataledger['sr_id']            = $last_admin_id_query->id ;
        $dataledger['branch_id']        = $this->branch_id  ;
        $dataledger['payable_amount']   = $due  ;
        $dataledger['status']           = 0 ;
        $dataledger['purpose']          = 'Previous Due' ;
        $dataledger['added_id']         = $this->loged_id ;
        $dataledger['created_at']       = $trDate;
        $dataledger['on_created_at']    = $this->rcdate;
        DB::table('sr_ledger')->insert($dataledger);

         Session::put('succes','New SR Added Sucessfully');
         return Redirect::to('addSr');
    }
  // manage sr
  public function manageSr()
  {
    $result = DB::table('admin')
    ->join('branch', 'admin.branch_id', '=', 'branch.id')
    ->select('admin.*','branch.name','admin.name as manager_name')
    ->where('admin.type', 3)
    ->get();
    return view('admin.manageSr')->with('result',$result);
  }
  // edit sr
  public function editSr($id)
  {
    $result = DB::table('admin')->where('id',$id)->first();
    return view('admin.editSr')->with('result',$result)->with('id',$id);
  }
  // software start by branch manager
  public function softwareStartByBranch()
  {
    $branc_info_query = DB::table('branch')->where('id',$this->branch_id)->first();
    return view('admin.softwareStartByBranch')->with('branc_info_query',$branc_info_query)->with('branch_id',$this->branch_id);

  }
  // edit sr info
  public function edtiSrInfo(Request $request)
  {
    $this->validate($request, [
    'name'              => 'required',
    'mobile'            => 'required',
    'address'           => 'required',
    'id'                => 'required',
    'image'             => 'mimes:jpeg,jpg,png|max:100'
    ]);
     $name                  = trim($request->name);
     $father_name           = trim($request->father_name);
     $mobile                = trim($request->mobile);
     $email                 = trim($request->email);
     $nid                   = trim($request->nid);
     $address               = trim($request->address);
     $id                    = trim($request->id);

     //check duplicate supplier name
     $count = DB::table('admin')
     ->where('mobile',$mobile)
     ->whereNotIn('id',[$id])
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! SR Already Exits. Try Again To Add New SR');
        return Redirect::to('editSr/'.$id);
        exit();
     }
     $data = array();
     $data['name']            = $name ;
     $data['nid']             = $nid ;
     $data['father_name']     = $father_name ;
     $data['email']           = $email ;
     $data['mobile']          = $mobile ;
     $data['address']         = $address;
     $image                   = $request->file('image');

         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='sr-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('admin')->where('id',$id)->update($data);
        }  
     }else{

         // get image url of thissr
       $__sr_image_url_info_query = DB::table('admin')->where('id',$id)->first();
             // without image
             $data['image'] =$__sr_image_url_info_query->image ;
              DB::table('admin')->where('id',$id)->update($data);      
    }
   Session::put('succes','SR Info Updated Sucessfully');
   return Redirect::to('manageSr');
  }
#---------------------------------------------------------------#

#-------------------------------------------Start Footer--------------------------------------#
/**
     * Company Info Setting
     *
     * @return \Illuminate\Http\Response
     */
     public function footer()
     {
        // get setting info
        $result = DB::table('footer')->where('branch_id',0)->first();
        return view('admin.footer')->with('result',$result);
     }
/**
    * update setting info .
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function footerInfo(Request $request)
    {
    $this->validate($request, [
    'company_email'          => 'required',
    'company_web'            => 'required',
    'company_whatsup'        => 'required',    
    'company_number'         => 'required',
    'company_address'        => 'required',
    'company_address_reg'    => 'required'
    ]);
     $company_email           = trim($request->company_email);
     $company_web             = trim($request->company_web);
     $company_whatsup         = trim($request->company_whatsup);
     $company_number          = trim($request->company_number);
     $company_number_two      = trim($request->company_number_two);
     $company_address         = trim($request->company_address);
     $company_address_reg     = trim($request->company_address_reg);
     $id                      =  trim($request->id); 

     $data=array();
     $data['company_email']        = $company_email;
     $data['company_web']          = $company_web;
     $data['company_whatsup']      = $company_whatsup;
     $data['company_number_one']   = $company_number;
     $data['company_number_two']   = $company_number_two;
     $data['company_address']      = $company_address;
     $data['company_address_reg']  = $company_address_reg;
     $data['status']               = 0;
     $data['added_id']             = $this->loged_id ;
     $data['created_time']         = $this->current_time ;
     $data['created_at']           = $this->rcdate ;
     // DB::table('footer')->insert($data);
     DB::table('footer')->where('id',$id)->update($data);
    // get image url from setting
    $____setting_image_url_query = DB::table('footer')->where('id',$id)->first();
     // update branch info
     $data_branch_info_update             = array();
     $data_branch_info_update['company_email']        = $company_email;
     $data_branch_info_update['company_web']          = $company_web;
     $data_branch_info_update['company_whatsup']      = $company_whatsup;
     $data_branch_info_update['company_number_one']   = $company_number;
     $data_branch_info_update['company_number_two']   = $company_number_two;
     $data_branch_info_update['company_address']      = $company_address;
     $data_branch_info_update['company_address_reg']  = $company_address_reg;
     $data_branch_info_update['modified_at']          = $this->rcdate;
     DB::table('footer')->update($data_branch_info_update);
     Session::put('succes','Footer Updated Sucessfully');
     return Redirect::to('footer');
    }
#-------------------------------------------End Footer----------------------------------------#    
  public function addService()
    {
        return view('service.addService');
    }
    public function addServiceInfo(Request $request)
    {
         $this->validate($request, [
            'service'                  => 'required',               
        ]);

        $service = trim($request->service); 
        $data = array();
        $data['service'] = $service;  
        DB::table('service')->insert($data);  
        Session::put('succes', 'Thanks ,Service Added Sucessfully');
        return Redirect::to('addService');
    }
    public function manageService()
    {
        $result = DB::table('service')->get();
        return view('service.manageService')->with('result',$result);
    }
#----------------------------------------------------------------------------#
    public function editServiceInfo($id)
    {
        $result = DB::table('tbl_header_menu')->where('id',$id)->first();
        return view('service.editServiceInfo')->with('result',$result)->with('id',$id);
    }
    public function editServiceInfoo(Request $request)
    {
        $this->validate($request, [
            'service'        => 'required',           
            'id'              => 'required'
        ]);
        $service=trim($request->service);       
        $id=trim($request->id);
        $data = array();
        $data['h_menu_name']     = $service;      
        DB::table('tbl_header_menu')->where('id',$id)->update($data);
        Session::put('succes', 'Thanks, Header Menu Update Sucessfully');
        return Redirect::to('manageHeaderMenu');
    }

  // add product
    public function addProduct()
    {
      return view('admin.addProduct');
    }
    // add product info
    public function addProductInfo(Request $request)
    {
            $this->validate($request, [
            'name'         => 'required', 
            'image'        => 'mimes:jpeg,jpg,png|max:200'
          ]);
        $name             = trim($request->name);
        $des              = trim($request->des);
        $count = DB::table('product')->where('name',$name)->count();
        if ($count > 0) {
        Session::put('failed', 'Thanks, Product Name Already Exits');
         return Redirect::to('addProduct');
        }  
        $data = array();
        $data['name']           = $name;
        $data['des']            = $des;
        $data['status']         = 0;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;
        $image                  = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='product'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             //DB::table('client')->insert($data);
        }
     }
        DB::table('product')->insert($data);  
        Session::put('succes', 'Thanks ,Produt Added Sucessfully');
        return Redirect::to('addProduct');
}
    public function manageProduct()
    {
        $result = DB::table('product')->get();
        return view('admin.manageProduct')->with('result',$result);
    }
#--------------------------------------------------------------------#  
    public function productActionChange($id,$status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('product')->where('id',$id)->update($data);
      Session::put('succes', 'Thanks ,Produt Action Change Sucessfully');
      return Redirect::to('manageProduct');  
    }
#--------------------------------------------------------------------#    
  public function editProductInfo($id)
    {
        $result = DB::table('product')->where('id',$id)->first();
        return view('admin.editProductInfo')->with('result',$result)->with('id',$id);
    }
    public function editProductInfoo(Request $request)
    {
         $this->validate($request, [
            'name'                 => 'required'           
          ]);
        $name            = trim($request->name);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $data = array();
        $data['name']          = $name;
        $data['des']           = $des;
        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='product'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('product')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__sr_image_url_info_query = DB::table('product')->where('id',$id)->first();
             // without image
             $data['image'] =$__sr_image_url_info_query->image ;
              DB::table('product')->where('id',$id)->update($data);      
    }
     Session::put('succes','Product Updated Sucessfully');
   return Redirect::to('manageProduct');
  }
      public function deleteProductInfo($id)
    {
        DB::table('product')->where('id',$id)->delete();
        Session::put('succes', 'Thanks, Product Deleted Sucessfully');
        return Redirect::to('manageProduct');
    }
#------------------------------------------------------# 
#-------------------Start Bannar-----------------------------------#    
    public function addbannar(){
    return view('bannar.addbannar');
    }
    public function addBannarInfo(Request $request)
    {
            $this->validate($request, [
            'name'         => 'required', 
            'image'        => 'mimes:jpeg,jpg,png|max:5000'
          ]);
        $name           = trim($request->name);
        $des            = trim($request->des);
        $count = DB::table('bannar')->where('name',$name)->count();
        if ($count > 0) {
        Session::put('failed', 'Thanks, Bannar Name Already Exits');
         return Redirect::to('addbannar');
        }  
        $data = array();
        $data['name']           = $name;
        $data['des']            = $des;
        $data['status']         = 0;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;
        $image                  = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='bannar'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             //DB::table('client')->insert($data);
        }
     }
        DB::table('bannar')->insert($data);  
        Session::put('succes', 'Thanks ,Bannar Added Sucessfully');
        return Redirect::to('addbannar');
}
 public function manageBannar()
    {
        $result = DB::table('bannar')->get();
        return view('bannar.manageBannar')->with('result',$result);
    }
    public function bannerActionChange($id,$status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('bannar')->where('id',$id)->update($data);
      Session::put('succes', 'Thanks ,Bannar Action Change Sucessfully');
      return Redirect::to('manageBannar');  
    }
    public function editBannerInfo($id)
    {
        $result = DB::table('bannar')->where('id',$id)->first();
        return view('bannar.editBannerInfo')->with('result',$result)->with('id',$id);
    }
    public function editBannerInfoo(Request $request)
    {
         $this->validate($request, [
            'name'                 => 'required'           
          ]);
        $name            = trim($request->name);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $data = array();
        $data['name']          = $name;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;
        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='bannar'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('bannar')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__sr_image_url_info_query = DB::table('bannar')->where('id',$id)->first();
             // without image
             $data['image'] =$__sr_image_url_info_query->image ;
              DB::table('bannar')->where('id',$id)->update($data);      
    }
     Session::put('succes','Banner Updated Sucessfully');
   return Redirect::to('manageBannar');
  }
    public function deleteBannerInfo($id)
    {
        DB::table('bannar')->where('id',$id)->delete();
        Session::put('succes', 'Thanks, Banner Deleted Sucessfully');
        return Redirect::to('manageBannar');
    }
#-------------------End  Bannar-----------------------------------#  

  //  editMain
        public function editMain($id)
    {
        $header = DB::table('tbl_header_menu')->where('status',0)->get();
        $result = DB::table('tbl_main_menu')->where('id',$id)->first();                
        return view('service.editMain')->with('result',$result)->with('header',$header)->with('id',$id);
    }
    public function editMainInfo(Request $request)
    {
        $this->validate($request, [
            'service'        => 'required', 
            'header_id'      => 'required',          
            'id'             => 'required'
        ]);
        $service    = trim($request->service); 
        $header_id  = trim($request->header_id);      
        $id         = trim($request->id);
        $data = array();
        $data['h_menu_id']          = $header_id;   
        $data['main_menu_name']     = $service;   
        $data['added_id']           = $this->loged_id ;
        $data['modified_at']        = $this->rcdate ;   
        DB::table('tbl_main_menu')->where('id',$id)->update($data);
        Session::put('succes', 'Thanks, Main Menu Update Sucessfully');
        return Redirect::to('manageMainMenu');
    }
    

}
