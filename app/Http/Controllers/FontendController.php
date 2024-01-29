<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class FontendController extends Controller
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
    public function index()
    {
        $service = DB::table('service')->where('status',0)->get();
        $footer = DB::table('footer')->where('status',0)->get();
        $client=DB::table('client')->get();
        $officer = DB::table('officer')->get();
        $product = DB::table('product')->get();
        $bannar  = DB::table('bannar')->where('status',0)->get();
        $bannar_count = DB::table('bannar')->where('status',0)->count();
       return view('web_view.index')->with('service',$service)->with('footer',$footer)->with('client',$client)->with('officer',$officer)->with('product',$product)->with('bannar_count',$bannar_count)->with('bannar',$bannar);
    }

    public function indexInfo(Request $request)
    {
         $this->validate($request, [
            'name'         => 'required',  
            'number'       => 'required'           
          ]);
        $name           = trim($request->name);
        $email          = trim($request->email);
        $number         = trim($request->number);
        $subject        = trim($request->subject);
        $message        = trim($request->message); 
      
        // $check=DB::table('web_client')->where([
        //     ['number','=',$number],])->first();
        // if ($check) {
        //     Session::put('failed', 'Thanks, Dublicate Phone number Do not exist');
        //  return Redirect::to('/');
        // }  
        // else{     
        $data = array();
        $data['name']           = $name;
        $data['email']          = $email; 
        $data['number']         = $number;  
        $data['subject']        = $subject;
        $data['message']        = $message;
              
        DB::table('web_client')->insert($data);  
        // Session::put('succes', 'Thanks ,Message send Sucessfully');
        return Redirect::to('/');  
    // }
  }
  // Managa Web Client
   public function web_client()
  {
    $result = DB::table('web_client_info')->orderBy('created_at','dese')->orderBy('created_time','dese')->get();
    return view('admin.web_client')->with('result',$result);
  }
      // Managa Web 
   public function web_message()
  {
    $result = DB::table('message')->orderBy('created_at','dese')->orderBy('created_time','dese')->get();
    return view('admin.web_message')->with('result',$result);
  }
  //delete Web client
  public function deleteInfo($id)
    {
        DB::table('web_client')->where('id',$id)->delete();
        Session::put('succes', 'Thanks, Web client Deleted Sucessfully');
        return Redirect::to('web_client');
    }
  // Details
    public function details($id){

        $result  = DB::table('product')->where('id',$id)->first();
        $service = DB::table('service')->where('status',0)->get();
        $footer  = DB::table('footer')->where('status',0)->get();
        $client  = DB::table('client')->get();
        $officer = DB::table('officer')->get();
        $product = DB::table('product')->get();
        return view('web_view.details')->with('result',$result)->with('service',$service)->with('footer',$footer)->with('client',$client)->with('officer',$officer)->with('product',$product);
    }
    public function aboutGoodko()
    {
        $service = DB::table('service')->where('status',0)->get();
        $footer  = DB::table('footer')->where('status',0)->get();
        $client  = DB::table('client')->get();
        $officer = DB::table('officer')->get();
        $product = DB::table('product')->get();
        $bannar  = DB::table('bannar')->where('status',0)->get();
        $bannar_count = DB::table('bannar')->where('status',0)->count();

        return view('web_view.aboutGoodko')->with('service',$service)->with('footer',$footer)->with('client',$client)->with('officer',$officer)->with('product',$product)->with('bannar_count',$bannar_count)->with('bannar',$bannar);
    }
    public function contactPage()
    {
        $service = DB::table('service')->where('status',0)->get();
        $footer  = DB::table('footer')->where('status',0)->get();
        $client  = DB::table('client')->get();
        $officer = DB::table('officer')->get();
        $product = DB::table('product')->get();
        $bannar  = DB::table('bannar')->where('status',0)->get();
        $bannar_count = DB::table('bannar')->where('status',0)->count();

        return view('web_view.contactPage')->with('service',$service)->with('footer',$footer)->with('client',$client)->with('officer',$officer)->with('product',$product)->with('bannar_count',$bannar_count)->with('bannar',$bannar);
    }
    public function webContactInfo(Request $request)
    {

         $this->validate($request, [
            'name'              => 'required',  
            'email'             => 'required',
            'mobile'            => 'required',
            'sex'               => 'required',
            'your_company'      => 'required'
                       
          ]);
        $name              = trim($request->name);
        $email             = trim($request->email);
        $mobile            = trim($request->mobile);
        $sex               = trim($request->sex);
        $your_company      = trim($request->your_company);
        $permanent_address = trim($request->permanent_address);
        $remarks           = trim($request->remarks); 

        $data = array();
        $data['name']           = $name;
        $data['email']          = $email; 
        $data['number']         = $mobile;  
        $data['sex']            = $sex;
        $data['your_company']      = $your_company;
        $data['permanent_address'] = $permanent_address;
        $data['remarks']           = $remarks;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;   
        DB::table('web_client_info')->insert($data);  

        // Session::put('succes', 'Thanks ,Message send Sucessfully');
        return Redirect::to('/contactPage');
    }
#------------------------- START MENU --------------------------------#
    public function addHeaderMenu()
    {
     return view('menu.addHeaderMenu');
    }
    public function addHeaderInfo(Request $request)
       {
            $this->validate($request, [
            'name'           => 'required', 
                       
          ]);

        $name           = trim($request->name);
        $status         = trim($request->status);
       
        $count = DB::table('tbl_header_menu')->where('h_menu_name',$name)->count();
        if ($count > 0) {
        Session::put('failed', 'Thanks, Header Menu Name Already Exits');
         return Redirect::to('addHeaderMenu');
        }  

        $data = array();
        $data['h_menu_name']    = $name;
        $data['status']         = $status;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_date']   = $this->rcdate ;
        DB::table('tbl_header_menu')->insert($data);  
        Session::put('succes', 'Thanks ,Header Menu Added Sucessfully');
        return Redirect::to('addHeaderMenu');
}

 public function manageHeaderMenu()
    {
     $result = DB::table('tbl_header_menu')->get();
     return view('menu.manageHeaderMenu')->with('result',$result);
    }

// add main menu
public function addMainMenu()
{
    $result = DB::table('tbl_header_menu')->where('status',0)->get();
    return view('menu.addMainMenu')->with('result',$result);
}
 public function addMainMenuInfo(Request $request)
       {
            $this->validate($request, [
            'name'           => 'required',
            'h_menu_id'      => 'required', 
                       
          ]);

        $name           = trim($request->name);
        $h_menu_id      = trim($request->h_menu_id);
        $status         = trim($request->status);
       
        $count = DB::table('tbl_main_menu')->where('main_menu_name',$name)->count();
        if ($count > 0) {
        Session::put('failed', 'Thanks, Main Menu Name Already Exits');
         return Redirect::to('addMainMenu');
        }  
        $data = array();
        $data['h_menu_id']      = $h_menu_id;
        $data['main_menu_name'] = $name;
        $data['status']         = $status;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_date']   = $this->rcdate ;
        DB::table('tbl_main_menu')->insert($data);  
        Session::put('succes', 'Thanks ,Main Menu Added Sucessfully');
        return Redirect::to('addMainMenu');
    }
    public function manageMainMenu()
    {     
     $result = DB::table('tbl_main_menu')->get();
     return view('menu.manageMainMenu')->with('result',$result);
    }
    // add Sub menu
public function addSubMenu()
{   
    $header = DB::table('tbl_header_menu')->where('status',0)->get();
    $result = DB::table('tbl_main_menu')->where('status',0)->get();
    return view('menu.addSubMenu')->with('header',$header)->with('result',$result);
}
public function addSubMenuInfo(Request $request)
       {
            $this->validate($request, [
            'name'           => 'required',
            'h_menu_id'      => 'required',
            'main_menu_id'   => 'required',             
          ]);
        $name           = trim($request->name);
        $h_menu_id      = trim($request->h_menu_id);
        $main_menu_id   = trim($request->main_menu_id);
        $status         = trim($request->status);

        // check header menu with main menu
        $count_check___ = DB::table('tbl_main_menu')->where('id',$main_menu_id)->where('h_menu_id',$h_menu_id)->count();
        if($count_check___ == "0"){
        Session::put('failed', 'Sorry, Main Menu Not Match With Header Menu');
         return Redirect::to('addSubMenu');
         exit();
        }
        $count = DB::table('tbl_sub_menu')->where('sub_menu_name',$name)->count();
        if ($count > 0) {
        Session::put('failed', 'Sorry, Sub Menu Name Already Exits');
        return Redirect::to('addSubMenu');
        exit();
        }  
        $data = array();
        $data['h_menu_id']      = $h_menu_id;
        $data['main_menu_id']   = $main_menu_id;
        $data['sub_menu_name']  = $name;
        $data['status']         = $status;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_date']   = $this->rcdate ;
        DB::table('tbl_sub_menu')->insert($data);  
        Session::put('succes', 'Thanks , Sub Menu Added Sucessfully');
        return Redirect::to('addSubMenu');
    }
 //  get Main Menu 
       public function getMainMenu(Request $request)
    {
      $h_menu_id = trim($request->h_menu_id);
      $query = DB::table('tbl_main_menu')->where('h_menu_id',$h_menu_id)->where('status',0)->get();
      echo "<option value=''>Select Main Menu </option>";
      foreach ($query as $value) {
          echo "<option value=".$value->id.">".$value->main_menu_name."</option>";
      }
    }
    public function manageSubMenu()
    {     
     $result = DB::table('tbl_sub_menu')->get();
     return view('menu.manageSubMenu')->with('result',$result);
    }

 //  get Sub Menu 
       public function getSubMenu(Request $request)
    {
      $main_menu_id = trim($request->main_menu_id);
      $query = DB::table('tbl_sub_menu')->where('main_menu_id',$main_menu_id)->where('status',0)->get();
      echo "<option value=''>Select Sub Menu </option>";
      foreach ($query as $value) {
          echo "<option value=".$value->id.">".$value->sub_menu_name."</option>";
      }
    }

public function addChildMenu()
{   
    $header = DB::table('tbl_header_menu')->where('status',0)->get();
    $main   = DB::table('tbl_main_menu')->where('status',0)->get();
    $result = DB::table('tbl_sub_menu')->where('status',0)->get();
    return view('menu.addChildMenu')->with('header',$header)->with('main',$main)->with('result',$result);
}
public function addChildMenuInfo(Request $request)
       {
            $this->validate($request, [
            'name'           => 'required',
            'h_menu_id'      => 'required',
            'main_menu_id'   => 'required',
            'sub_menu_id'    => 'required',             
          ]);
        $name           = trim($request->name);
        $h_menu_id      = trim($request->h_menu_id);
        $main_menu_id   = trim($request->main_menu_id);
        $sub_menu_id    = trim($request->sub_menu_id);
        $status         = trim($request->status);
        $count_check__ = DB::table('tbl_sub_menu')->where('h_menu_id',$h_menu_id)->where('main_menu_id',$main_menu_id)->where('id',$sub_menu_id)->count();
        if($count_check__ == "0"){
         Session::put('failed', 'Sorry, Menu Combintion Not Match');
         return Redirect::to('addChildMenu');
         exit();
        }
        $count = DB::table('tbl_chaild_menu')->where('chaild_menu_name',$name)->count();
        if ($count > 0) {
        Session::put('failed', 'Sorry, Child Menu  Already Exits');
         return Redirect::to('addChildMenu');
           exit();
        }  
        $data = array();
        $data['h_menu_id']      = $h_menu_id;
        $data['main_menu_id']   = $main_menu_id;
        $data['sub_menu_id']    = $sub_menu_id;
        $data['chaild_menu_name']  = $name;
        $data['status']         = $status;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_date']   = $this->rcdate ;
        DB::table('tbl_chaild_menu')->insert($data);  
        Session::put('succes', 'Thanks , Child Menu Added Sucessfully');
        return Redirect::to('addChildMenu');
    }
     public function manageChildMenu()
    {     
     $result = DB::table('tbl_chaild_menu')->get();
     return view('menu.manageChildMenu')->with('result',$result);
    }
    #------------------------- END MENU ----------------------------------#
    #------------------------- START PAGE SETUP --------------------------#
    public function pageSetup()
    {
        $result = DB::table('tbl_header_menu')->get();
        return view('setting.pageSetup')->with('result',$result);
    }
    // heder menu page setup
    public function headerMenuPageSetup($id)
    {
        $count__ = DB::table('header_menu_content')->where('heder_menu_id',$id)->count();
         $header_menu_info = DB::table('tbl_header_menu')->where('id',$id)->first();
        if($count__ == "0"){
        return view('setting.headerMenuPageSetup')->with('id',$id)->with('header_menu_info',$header_menu_info);
       }else{
        $row = DB::table('header_menu_content')->where('heder_menu_id',$id)->first();
        $result = DB::table('header_menu_content_image')->where('heder_menu_id',$id)->get();
        return view('setting.headerMenuPageSetupUpdate')->with('id',$id)->with('row',$row)->with('result',$result)->with('header_menu_info',$header_menu_info);
       }
    }
    // add header menu page setup
    public function addHeaderMenuPageSetup(Request $request)
    {  
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
     //check duplicate investor
     $count = DB::table('header_menu_content')
           ->where('heder_menu_id',$id)
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! Page Already Setup Completed');
        return Redirect::to('headerMenuPageSetup/'.$id);
        exit();
     }
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('headerMenuPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $last_insert_id = DB::table('header_menu_content')->insertGetId(
    [
    'heder_menu_id'        => $id ,
    'name'                 => $title ,
    'des'                  => $des ,
    'added_id'             => $this->loged_id,
    'created_time'         => $this->current_time ,
    'created_at'           => $this->rcdate ,
   ]
   );
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='header_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['heder_menu_id']   = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('header_menu_content_image')->insert($data_document_insert);
     }
    }
 }
  Session::put('succes','Header Menu Page Setup Successfully');
  return Redirect::to('manageHeaderMenu');
}
public function editHeaderMenuPageSetup(Request $request)
{
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
  
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('headerMenuPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $data_update = array();
    $data_update['name'] = $title ;
    $data_update['des'] = $des;
    $data_update['modifed_at'] = $this->rcdate;
    DB::table('header_menu_content')->where('heder_menu_id',$id)->update($data_update);

    // get last insert id of th
    $_________last_insert_id_____query = DB::table('header_menu_content')->where('heder_menu_id',$id)->first();
    $last_insert_id = $_________last_insert_id_____query->id ;
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='header_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['heder_menu_id']   = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('header_menu_content_image')->insert($data_document_insert);
     }
    } 
}
Session::put('succes','Header Menu Page Setup Updated Successfully');
  return Redirect::to('manageHeaderMenu');
}
#------------------------- END PAGE SETUP -----------------------------#
#------------------------- Start Main menu PAGE SETUP ---------------------------#
 public function mainMenuPageSetup($id)
    {
        $count__ = DB::table('main_menu_content')->where('main_menu_id',$id)->count();
        $main_menu_info = DB::table('tbl_main_menu')->where('id',$id)->first();
        if($count__ == "0"){
        return view('setting.mainMenuPageSetup')->with('id',$id)->with('main_menu_info',$main_menu_info);
       }else{
        $row = DB::table('main_menu_content')->where('main_menu_id',$id)->first();
        $result = DB::table('main_menu_content_image')->where('main_menu_id',$id)->get();
        return view('setting.mainMenuPageSetupUpdate')->with('id',$id)->with('row',$row)->with('result',$result)->with('main_menu_info',$main_menu_info);
       }
    }
   public function addMainMenuPageSetup(Request $request)
    {  
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
     //check duplicate investor
     $count = DB::table('main_menu_content')
           ->where('main_menu_id',$id)
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! Page Already Setup Completed');
        return Redirect::to('mainMenuPageSetup/'.$id);
        exit();
     }
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('mainMenuPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $last_insert_id = DB::table('main_menu_content')->insertGetId(
    [
    'main_menu_id'        => $id ,
    'name'                 => $title ,
    'des'                  => $des ,
    'added_id'             => $this->loged_id,
    'created_time'         => $this->current_time ,
    'created_at'           => $this->rcdate ,
   ]
   );
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='main_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['main_menu_id']    = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('main_menu_content_image')->insert($data_document_insert);
     }
    }
 }
  Session::put('succes','Main Menu Page Setup Successfully');
  return Redirect::to('manageMainMenu');
}
//
public function editMainMenuPageSetup(Request $request)
{
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
  
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('mainMenuPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $data_update = array();
    $data_update['name'] = $title ;
    $data_update['des'] = $des;
    $data_update['modifed_at'] = $this->rcdate;
    DB::table('main_menu_content')->where('main_menu_id',$id)->update($data_update);

    // get last insert id of th
    $_________last_insert_id_____query = DB::table('main_menu_content')->where('main_menu_id',$id)->first();
    $last_insert_id = $_________last_insert_id_____query->id ;
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='main_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['main_menu_id']    = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('main_menu_content_image')->insert($data_document_insert);
     }
    } 
}
Session::put('succes','Main Menu Page Setup Updated Successfully');
  return Redirect::to('mainMenuPageSetup/'.$id);
}
//
#------------------------- Start Sub menu PAGE SETUP ---------------------------#
 public function subMenuPageSetup($id)
    {
        $count__ = DB::table('sub_menu_content')->where('sub_menu_id',$id)->count();
        $sub_menu_info = DB::table('tbl_sub_menu')->where('id',$id)->first();
        if($count__ == "0"){
        return view('setting.subMenuPageSetup')->with('id',$id)->with('sub_menu_info',$sub_menu_info);
       }else{
        $row = DB::table('sub_menu_content')->where('sub_menu_id',$id)->first();
        $result = DB::table('sub_menu_content_image')->where('sub_menu_id',$id)->get();
        return view('setting.subMenuPageSetupUpdate')->with('id',$id)->with('row',$row)->with('result',$result)->with('sub_menu_info',$sub_menu_info);
       }
    }
  public function addSubMenuPageSetup(Request $request)
    {  
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
     //check duplicate investor
     $count = DB::table('sub_menu_content')
           ->where('sub_menu_id',$id)
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! Page Already Setup Completed');
        return Redirect::to('subMenuPageSetup/'.$id);
        exit();
     }
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('subMenuPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $last_insert_id = DB::table('sub_menu_content')->insertGetId(
    [
    'sub_menu_id'          => $id ,
    'name'                 => $title ,
    'des'                  => $des ,
    'added_id'             => $this->loged_id,
    'created_time'         => $this->current_time ,
    'created_at'           => $this->rcdate ,
   ]
   );
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='sub_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['sub_menu_id']     = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('sub_menu_content_image')->insert($data_document_insert);
     }
    }
 }
  Session::put('succes','Sub Menu Page Setup Successfully');
  return Redirect::to('manageSubMenu');
}
public function editSubMenuPageSetup(Request $request)
{
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
  
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('mainSubPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $data_update = array();
    $data_update['name'] = $title ;
    $data_update['des'] = $des;
    $data_update['modifed_at'] = $this->rcdate;
    DB::table('sub_menu_content')->where('sub_menu_id',$id)->update($data_update);

    // get last insert id of th
    $_________last_insert_id_____query = DB::table('sub_menu_content')->where('sub_menu_id',$id)->first();
    $last_insert_id = $_________last_insert_id_____query->id ;
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='sub_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['sub_menu_id']     = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('sub_menu_content_image')->insert($data_document_insert);
     }
    } 
}
Session::put('succes','Sub Menu Page Setup Updated Successfully');
  return Redirect::to('manageSubMenu');
}
#------------------------- End Sub menu PAGE SETUP -----------------------------#
#------------------------- START CHILD menu PAGE SETUP -------------------------#
 public function childMenuPageSetup($id)
    {
        $count__ = DB::table('child_menu_content')->where('child_menu_id',$id)->count();
        $child_menu_info = DB::table('tbl_chaild_menu')->where('id',$id)->first();
        if($count__ == "0"){
        return view('setting.childMenuPageSetup')->with('id',$id)->with('child_menu_info',$child_menu_info);
       }else{
        $row = DB::table('child_menu_content')->where('child_menu_id',$id)->first();
        $result = DB::table('child_menu_content_image')->where('child_menu_id',$id)->get();
        return view('setting.childMenuPageSetupUpdate')->with('id',$id)->with('row',$row)->with('result',$result)->with('child_menu_info',$child_menu_info);
       }
    }

  public function addChildMenuPageSetup(Request $request)
    {  
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
     //check duplicate investor
     $count = DB::table('child_menu_content')
           ->where('child_menu_id',$id)
     ->count();
     if($count > 0){
        Session::put('failed','Sorry ! Page Already Setup Completed');
        return Redirect::to('childMenuPageSetup/'.$id);
        exit();
     }
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('childMenuPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $last_insert_id = DB::table('child_menu_content')->insertGetId(
    [
    'child_menu_id'          => $id ,
    'name'                 => $title ,
    'des'                  => $des ,
    'added_id'             => $this->loged_id,
    'created_time'         => $this->current_time ,
    'created_at'           => $this->rcdate ,
   ]
   );
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='child_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['child_menu_id']     = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('child_menu_content_image')->insert($data_document_insert);
     }
    }
 }
  Session::put('succes','Child Menu Page Setup Successfully');
  return Redirect::to('manageChildMenu');
}
//
public function editChildMenuPageSetup(Request $request)
{
     $id                    = trim($request->id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
  
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('mainChildPageSetup/'.$id);
                    exit();

                     }
                }
            } 
    }
    $data_update = array();
    $data_update['name'] = $title ;
    $data_update['des'] = $des;
    $data_update['modifed_at'] = $this->rcdate;
    DB::table('child_menu_content')->where('child_menu_id',$id)->update($data_update);

    // get last insert id of th
    $_________last_insert_id_____query = DB::table('child_menu_content')->where('child_menu_id',$id)->first();
    $last_insert_id = $_________last_insert_id_____query->id ;
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='child_menu-'.date('d-m-Y').'-'.$last_insert_id.'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['child_menu_id']     = $id  ; 
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('child_menu_content_image')->insert($data_document_insert);
     }
    } 
}
Session::put('succes','Child Menu Page Setup Updated Successfully');
  return Redirect::to('manageChildMenu');
}
// head menu content
public function headerMenuContent($id)
{
    $row = DB::table('header_menu_content')->where('heder_menu_id',$id)->where('status',0)->first();
    $result = DB::table('header_menu_content_image')->where('heder_menu_id',$id)->where('status',0)->get();
    $bannar  = DB::table('bannar')->where('status',0)->get();
    $bannar_count = DB::table('bannar')->where('status',0)->count();
    return view('web_view.headerMenuContent')->with('row',$row)->with('result',$result)->with('bannar',$bannar)->with('bannar_count',$bannar_count);
}
// main menu 
public function mainMenuContent($id)
{
    $row = DB::table('main_menu_content')->where('main_menu_id',$id)->where('status',0)->first();
    $result = DB::table('main_menu_content_image')->where('main_menu_id',$id)->where('status',0)->get();
    return view('web_view.mainMenuContent')->with('row',$row)->with('result',$result);
}
// Sub Menu
public function subMenuContent($id)
{
    $row = DB::table('sub_menu_content')->where('sub_menu_id',$id)->where('status',0)->first();
    $result = DB::table('sub_menu_content_image')->where('sub_menu_id',$id)->where('status',0)->get();
    return view('web_view.subMenuContent')->with('row',$row)->with('result',$result);
}
//Child Menu
public function childMenuContent($id)
{
    $row = DB::table('child_menu_content')->where('child_menu_id',$id)->where('status',0)->first();
    $result = DB::table('child_menu_content_image')->where('child_menu_id',$id)->where('status',0)->get();
    return view('web_view.childMenuContent')->with('row',$row)->with('result',$result);
}
//header Menu Content Details Image
public function headerMenuContentDetailsImage($id , $header_menu_id)
{
    $row = DB::table('header_menu_content')->where('heder_menu_id',$id)->where('status',0)->first();
    $result = DB::table('header_menu_content_image')->where('id',$id)->where('heder_menu_id',$header_menu_id)->where('status',0)->first();
    return view('web_view.headerMenuContentDetailsImage')->with('row',$row)->with('result',$result);
}
//main Menu Content Details Image
public function mainMenuContentDetailsImage($id , $main_menu_id)
{
    $row = DB::table('main_menu_content')->where('main_menu_id',$id)->where('status',0)->first();
    $result = DB::table('main_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('status',0)->first();
    
    return view('web_view.mainMenuContentDetailsImage')->with('row',$row)->with('result',$result);
}
//sub Menu Content Details Image
public function subMenuContentDetailsImage($id , $sub_menu_id)
{
    $row = DB::table('sub_menu_content')->where('sub_menu_id',$id)->where('status',0)->first();
    $result = DB::table('sub_menu_content_image')->where('id',$id)->where('sub_menu_id',$sub_menu_id)->where('status',0)->first();
    return view('web_view.subMenuContentDetailsImage')->with('row',$row)->with('result',$result);
}
//child Menu Content Details Image
public function childMenuContentDetailsImage($id , $child_menu_id)
{
    $row = DB::table('child_menu_content')->where('child_menu_id',$id)->where('status',0)->first();
    $result = DB::table('child_menu_content_image')->where('id',$id)->where('child_menu_id',$child_menu_id)->where('status',0)->first();
    return view('web_view.childMenuContentDetailsImage')->with('row',$row)->with('result',$result);
}
#------------------------- End CHILD menu PAGE SETUP ---------------------------#
public function editheaderMenuPageSetupUpdateInfo($id,$header_menu_id)
{
   $result = DB::table('header_menu_content_image')->where('id',$id)->where('heder_menu_id',$header_menu_id)->first();
        return view('setting.editheaderMenuPageSetupUpdateInfo')->with('result',$result)->with('id',$id);  
}
 public function editheaderMenuPageSetupUpdateInfoo(Request $request)
    {

         $this->validate($request, [
            'title'             => 'required'           
          ]);
        $title           = trim($request->title);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $data = array();
        $data['title']         = $title;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;
        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='header_menu-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('header_menu_content_image')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__header_image_url_info_query = DB::table('header_menu_content_image')->where('id',$id)->first();
             // without image
             $data['image'] =$__header_image_url_info_query->image ;
              DB::table('header_menu_content_image')->where('id',$id)->update($data);      
    }
     Session::put('succes','Content Updated Sucessfully');
   return Redirect::to('manageHeaderMenu');
  }

//edit main Menu Page Setup Update Info  
public function editmainMenuPageSetupUpdateInfo($id,$main_menu_id)
{
   $result = DB::table('main_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->first();
        return view('setting.editmainMenuPageSetupUpdateInfo')->with('result',$result)->with('id',$id);  
}
//edit main Menu Page Setup Update Infoo

public function editmainMenuPageSetupUpdateInfoo(Request $request)
    {

         $this->validate($request, [
            'title'             => 'required',
            'document'          => 'mimes:pdf,doc,docx|max:5000'            
          ]);
        $title           = trim($request->title);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $document        = $request->file('document');

        $data = array();
        $data['title']         = $title;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;

        if($document){
            $image_name        = str_random(30);
            $ext               = strtolower($document->getClientOriginalExtension());
            $image_full_name   = 'document-'.'-'.$this->rcdate.'-'.$image_name.'.'.$ext;
            $upload_path       = "document/";
            $image_url         = $upload_path.$image_full_name;
            $success           = $document->move($upload_path,$image_full_name);
            $data['document']  = $image_url;
         }else{
            // no image
            $data['document'] = '';
         }

        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='main_menu-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('main_menu_content_image')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__header_image_url_info_query = DB::table('main_menu_content_image')->where('id',$id)->first();
             // without image
             $data['image'] =$__header_image_url_info_query->image ;
              DB::table('main_menu_content_image')->where('id',$id)->update($data);      
    }
     Session::put('succes','Content Updated Sucessfully');
   return Redirect::to('manageMainMenu');
  }
  //edit sub Menu Page Setup Update Info
  
  public function editsubMenuPageSetupUpdateInfo($id,$sub_menu_id)
{
   $result = DB::table('sub_menu_content_image')->where('id',$id)->where('sub_menu_id',$sub_menu_id)->first();
        return view('setting.editsubMenuPageSetupUpdateInfo')->with('result',$result)->with('id',$id);  
}
//edit sub Menu Page Setup Update Infoo

public function editsubMenuPageSetupUpdateInfoo(Request $request)
    {

         $this->validate($request, [
            'title'             => 'required'           
          ]);
        $title           = trim($request->title);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $data = array();
        $data['title']         = $title;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;
        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='sub_menu-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('sub_menu_content_image')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__header_image_url_info_query = DB::table('sub_menu_content_image')->where('id',$id)->first();
             // without image
             $data['image'] =$__header_image_url_info_query->image ;
              DB::table('sub_menu_content_image')->where('id',$id)->update($data);      
    }
     Session::put('succes','Content Updated Sucessfully');
   return Redirect::to('manageSubMenu');
  }
  //edit child Menu Page Setup Update Info
  
 public function editchildMenuPageSetupUpdateInfo($id,$child_menu_id)
  {
   $result = DB::table('child_menu_content_image')->where('id',$id)->where('child_menu_id',$child_menu_id)->first();
        return view('setting.editchildMenuPageSetupUpdateInfo')->with('result',$result)->with('id',$id);  
   }
   //edit child Menu Page Setup Update Infoo 
   
   public function editchildMenuPageSetupUpdateInfoo(Request $request)
    {

         $this->validate($request, [
            'title'             => 'required'           
          ]);
        $title           = trim($request->title);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $data = array();
        $data['title']         = $title;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;
        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='child_menu-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('child_menu_content_image')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__header_image_url_info_query = DB::table('child_menu_content_image')->where('id',$id)->first();
             // without image
             $data['image'] =$__header_image_url_info_query->image ;
              DB::table('child_menu_content_image')->where('id',$id)->update($data);      
    }
     Session::put('succes','Content Updated Sucessfully');
   return Redirect::to('manageChildMenu');
  }
//delete Start
    public function deleteHeaderMenuPageSetupUpdateInfo($id,$header_menu_id)
    {
       DB::table('header_menu_content_image')->where('id',$id)->where('heder_menu_id',$header_menu_id)->delete();
        Session::put('succes', 'Thanks, Header Menu Content Deleted Sucessfully');
        return Redirect::to('manageHeaderMenu');
    }
    public function deleteMainMenuPageSetupUpdateInfo($id,$main_menu_id)
    {
       DB::table('main_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->delete();
        Session::put('succes', 'Thanks, Main Menu Content Deleted Sucessfully');
        return Redirect::to('manageMainMenu');
    }
     public function deleteSubMenuPageSetupUpdateInfo($id,$sub_menu_id)
    {
       DB::table('sub_menu_content_image')->where('id',$id)->where('sub_menu_id',$sub_menu_id)->delete();
        Session::put('succes', 'Thanks, Sub Menu Content Deleted Sucessfully');
        return Redirect::to('manageSubMenu');
    }
      public function deleteChildMenuPageSetupUpdateInfo($id,$child_menu_id)
    {
       DB::table('child_menu_content_image')->where('id',$id)->where('child_menu_id',$child_menu_id)->delete();
        Session::put('succes', 'Thanks, Child Menu Content Deleted Sucessfully');
        return Redirect::to('manageChildMenu');
    }
//delete End 
// Action Change Start
     public function headerActionChange($id, $header_menu_id, $status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('header_menu_content_image')->where('id',$id)->where('heder_menu_id',$header_menu_id)->update($data);
      Session::put('succes', 'Thanks ,Header Menu Action Change Sucessfully');
      return Redirect::to('manageHeaderMenu');  
    }
    public function mainActionChange($id, $main_menu_id, $status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('main_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->update($data);
      Session::put('succes', 'Thanks ,Main Menu Action Change Sucessfully');
      return Redirect::to('manageMainMenu');  
    }
    public function subActionChange($id, $sub_menu_id, $status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('sub_menu_content_image')->where('id',$id)->where('sub_menu_id',$sub_menu_id)->update($data);
      Session::put('succes', 'Thanks ,Sub Menu Action Change Sucessfully');
      return Redirect::to('manageSubMenu');  
    }
    public function childActionChange($id, $child_menu_id, $status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('child_menu_content_image')->where('id',$id)->where('child_menu_id',$child_menu_id)->update($data);
      Session::put('succes', 'Thanks ,Child Menu Action Change Sucessfully');
      return Redirect::to('manageChildMenu');  
    }
    // Action Change End
#-----------------------Start Link ------------------------------------------#
    //sub Menu Page Link
    #------------------------- Start Sub menu PAGE  ---------------------------#
    public function subMenuPageLink($id, $main_menu_id)
    {   
        $result = DB::table('link_sub_menu_content_image')->where('main_title_id',$id)->where('main_menu_id',$main_menu_id)->get();
        return view('setting.subMenuPageLink')->with('id',$id)->with('main_menu_id',$main_menu_id)->with('result',$result);
    }
    public function editSubMenuPageLink(Request $request)
    {
     $id                    = trim($request->id);
     $main_menu_id          = trim($request->main_menu_id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
  
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('manageMainMenu');
                    exit();

                     }
                }
            } 
    }
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='link_sub_menu-'.date('d-m-Y').'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['main_menu_id']    = $main_menu_id  ;
        $data_document_insert['main_title_id']   = $id  ;
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('link_sub_menu_content_image')->insert($data_document_insert);
     }
    } 
}
Session::put('succes','Sub Page Link Updated Successfully');
  return Redirect::to('manageMainMenu');
}

//child Menu Page Link
    public function childMenuPageLink($id, $main_menu_id, $main_title_id)
    {   
        $result = DB::table('link_child_menu_content_image')->where('sub_link_id',$id)->where('main_menu_id',$main_menu_id)->where('main_menu_id',$main_menu_id)->get();
        return view('setting.childMenuPageLink')->with('id',$id)->with('main_menu_id',$main_menu_id)->with('main_title_id',$main_title_id)->with('result',$result);
    } 
    public function editChildMenuPageLink(Request $request)
    {
     $id                    = trim($request->id);
     $main_menu_id          = trim($request->main_menu_id);
     $main_title_id         = trim($request->main_title_id);
     $title                 = trim($request->title);
     $des                   = trim($request->des);
     $doc_name              = $request->doc_name;
     $doc_image             = $request->file('doc_image');
  
    if(count($doc_image) > 0){
        foreach ($doc_name as $key_check => $document_value_check) {
             $docu_image_name_check       = $doc_image[$key_check];
           if ($docu_image_name_check != "") {
                $doc_ext_chekc               = strtolower($docu_image_name_check->getClientOriginalExtension());

                 if($doc_ext_chekc == "jpg" OR $doc_ext_chekc == "jpeg" OR $doc_ext_chekc == "png" OR $doc_ext_chekc == "pdf" )
                 {
          
                 }else{
                    Session::put('failed','Sorry !Document Format Not Match');
                    return Redirect::to('manageMainMenu');
                    exit();

                     }
                }
            } 
    }
     // insert document
    if(count($doc_image) > 0){
     foreach ($doc_name as $key => $document_value) {
        $docu_image_name =  $doc_image[$key];
        if($docu_image_name != "") {
         $random_number_for_image = mt_rand(1000000000, 9999999999) ;
         $doc_image_name        = str_random(30);
         $doc_ext               = strtolower($docu_image_name->getClientOriginalExtension());
         $doc_image_full_name   ='link_child_menu-'.date('d-m-Y').'-'.$id.'-'.$doc_image_name.'-'.$random_number_for_image.'.'.$doc_ext;
         $doc_upload_path       = "images/";
         $doc_image_url         = $doc_upload_path.$doc_image_full_name;
         $doc_success           = $docu_image_name->move($doc_upload_path,$doc_image_full_name);

        $data_document_insert                    = array();
        $data_document_insert['main_menu_id']    = $main_menu_id  ;
        $data_document_insert['main_title_id']   = $main_title_id  ;
        $data_document_insert['sub_link_id']     = $id  ;
        $data_document_insert['title']           = $document_value ; 
        $data_document_insert['image']           = $doc_image_url;
        $data_document_insert['added_id']        = $this->loged_id;
        $data_document_insert['created_time']    = $this->current_time;  
        $data_document_insert['created_at']      = $this->rcdate; 
        DB::table('link_child_menu_content_image')->insert($data_document_insert);
     }
    } 
}
Session::put('succes','Child Page Link Updated Successfully');
  return Redirect::to('manageMainMenu');
}
//sub Menu link Details Image
    public function subMenuLinkDetailsImage($id , $main_menu_id, $main_title_id)
    {
    $result = DB::table('link_sub_menu_content_image')->where('id',$id)->where('main_title_id',$main_title_id)->where('main_menu_id',$main_menu_id)->where('status',0)->first();   
    return view('web_view.subMenuLinkDetailsImage')->with('result',$result)->with('main_menu_id',$main_menu_id)->with('main_title_id',$main_title_id);
    }
   public function childMenulinkDetailsImage($id , $main_menu_id, $main_title_id, $sub_link_id)
   {
    $result = DB::table('link_child_menu_content_image')->where('id',$id)->where('main_title_id',$main_title_id)->where('main_menu_id',$main_menu_id)->where('sub_link_id',$sub_link_id)->where('status',0)->first();   
    return view('web_view.childMenulinkDetailsImage')->with('result',$result);
   }
   //sub Link Action Change
    public function subLinkActionChange($id, $main_menu_id,$main_title_id, $status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('link_sub_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('main_title_id',$main_title_id)->update($data);
      Session::put('succes', 'Thanks ,Sub Link  Action Change Sucessfully');
      return Redirect::to('manageMainMenu');  
    }
    public function childLinkActionChange($id, $main_menu_id,$main_title_id,$sub_link_id, $status)
    {
      if($status == "0"){
        $change_status = 1 ;
      }else{
        $change_status = 0 ;
      }
      $data = array();
      $data['status']     =  $change_status;
      $data['modifed_at'] = $this->rcdate ;
      DB::table('link_child_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('main_title_id',$main_title_id)->where('sub_link_id',$sub_link_id)->update($data);
      Session::put('succes', 'Thanks ,ChildLink  Action Change Sucessfully');
      return Redirect::to('manageMainMenu');  
    }
    //edit main Menu Page Setup Update Info  
public function editChildLinkPageUpdateInfo($id, $main_menu_id, $main_title_id, $sub_link_id)
{
   $result = DB::table('link_child_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('main_title_id',$main_title_id)->where('sub_link_id',$sub_link_id)->first();
        return view('setting.editChildLinkPageUpdateInfo')->with('result',$result)->with('id',$id)->with('main_menu_id',$main_menu_id)->with('main_title_id',$main_title_id)->with('sub_link_id',$sub_link_id);  
}
public function editChildLinkPageUpdateInfoo(Request $request)
    {

         $this->validate($request, [
            'title'             => 'required',
            'document'          => 'mimes:pdf,doc,docx|max:5000'           
          ]);
        $title           = trim($request->title);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $document        = $request->file('document');

        $data = array();
        $data['title']         = $title;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;

        if($document){
            $image_name        = str_random(30);
            $ext               = strtolower($document->getClientOriginalExtension());
            $image_full_name   = 'document-'.'-'.$this->rcdate.'-'.$image_name.'.'.$ext;
            $upload_path       = "document/";
            $image_url         = $upload_path.$image_full_name;
            $success           = $document->move($upload_path,$image_full_name);
            $data['document']  = $image_url;
         }else{
            // no image
            $data['document'] = '';
         }

        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='child_link-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('link_child_menu_content_image')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__header_image_url_info_query = DB::table('link_child_menu_content_image')->where('id',$id)->first();
             // without image
             $data['image'] =$__header_image_url_info_query->image ;
              DB::table('link_child_menu_content_image')->where('id',$id)->update($data);      
    }
     Session::put('succes','Child Link Content Updated Sucessfully');
   return Redirect::to('manageMainMenu');
  }
    public function deleteChildLinkPageUpdateInfo($id, $main_menu_id, $main_title_id, $sub_link_id)
    {
       DB::table('link_child_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('main_title_id',$main_title_id)->where('sub_link_id',$sub_link_id)->delete();
        Session::put('succes', 'Thanks, Child Link Content Deleted Sucessfully');
        return Redirect::to('manageMainMenu');
    }

public function editSubLinkPageUpdateInfo($id, $main_menu_id, $main_title_id)
{
   $result = DB::table('link_sub_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('main_title_id',$main_title_id)->first();
        return view('setting.editSubLinkPageUpdateInfo')->with('result',$result)->with('id',$id)->with('main_menu_id',$main_menu_id)->with('main_title_id',$main_title_id);  
}
public function editSubLinkPageUpdateInfoo(Request $request)
    {

         $this->validate($request, [
            'title'             => 'required',
            'document'          => 'mimes:pdf,doc,docx|max:5000'              
          ]);
        $title           = trim($request->title);
        $des             = trim($request->des);
        $id              = trim($request->id);
        $document        = $request->file('document');

        $data = array();
        $data['title']         = $title;
        $data['des']           = $des;
        $data['added_id']      = $this->loged_id ;
        $data['modifed_at']    = $this->rcdate ;
         if($document){
            $image_name        = str_random(30);
            $ext               = strtolower($document->getClientOriginalExtension());
            $image_full_name   = 'document-'.'-'.$this->rcdate.'-'.$image_name.'.'.$ext;
            $upload_path       = "document/";
            $image_url         = $upload_path.$image_full_name;
            $success           = $document->move($upload_path,$image_full_name);
            $data['document']  = $image_url;
         }else{
            // no image
            $data['document'] = '';
         }
        $image                 = $request->file('image');
         if($image){
         $image_name        = str_random(20);
         $ext               = strtolower($image->getClientOriginalExtension());
         $image_full_name   ='sub_link-'.$image_name.'.'.$ext;
         $upload_path       = "images/";
         $image_url         = $upload_path.$image_full_name;
         $success           = $image->move($upload_path,$image_full_name);
         if($success){
            // with image
             $data['image'] = $image_url;
             DB::table('link_sub_menu_content_image')->where('id',$id)->update($data);
        }  
     }else{
         // get image url of thissr
       $__header_image_url_info_query = DB::table('link_sub_menu_content_image')->where('id',$id)->first();
             // without image
             $data['image'] =$__header_image_url_info_query->image ;
              DB::table('link_sub_menu_content_image')->where('id',$id)->update($data);      
    }
     Session::put('succes','Sub Link Content Updated Sucessfully');
   return Redirect::to('manageMainMenu');
  }
    public function deleteSubLinkPageUpdateInfo($id, $main_menu_id, $main_title_id)
    {
       DB::table('link_sub_menu_content_image')->where('id',$id)->where('main_menu_id',$main_menu_id)->where('main_title_id',$main_title_id)->delete();
        Session::put('succes', 'Thanks, Sub Link Content Deleted Sucessfully');
        return Redirect::to('manageMainMenu');
    }
#-----------------------End Link ------------------------------------------#

      // database backup
    public function databaseBackup()
    {
        $data = array();
        $data['taken_time']   = $this->current_time ;
        $data['taken_date']   = $this->rcdate ;
        $data['added_id']     = $this->loged_id ;
        $data['created_time'] = $this->current_time ;
        $data['created_at']   = $this->rcdate ;
        DB::table('tbl_database_backup_history')->insert($data);
        return view('setting.databaseBackup');
 
    }
    public function headerStatusChange($id, $action)
    {
      if($action == "0"){
        $change_action = 1 ;
      }else{
        $change_action = 0 ;
      }
      $data = array();
      $data['action']      =  $change_action;
      $data['modified_at'] = $this->rcdate ;
      DB::table('tbl_header_menu')->where('id',$id)->where('action',$action)->update($data);
      Session::put('succes', 'Thanks ,Header Menu Action Change Sucessfully');
      return Redirect::to('manageHeaderMenu');  
    }
    public function mainStatusChange($id, $action)
    {
      if($action == "0"){
        $change_action = 1 ;
      }else{
        $change_action = 0 ;
      }
      $data = array();
      $data['action']      =  $change_action;
      $data['modified_at'] = $this->rcdate ;
      DB::table('tbl_main_menu')->where('id',$id)->where('action',$action)->update($data);
      Session::put('succes', 'Thanks ,Main Menu Action Change Sucessfully');
      return Redirect::to('manageMainMenu');  
    }
}
