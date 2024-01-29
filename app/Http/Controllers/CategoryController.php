<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class CategoryController extends Controller
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

    #---------------------- start  category -----------------------------#
    public function addCategory()
    {
        return view('category.addCategory');
    }
    public function addCategoryInfo(Request $request)
    {
         $this->validate($request, [
            'category'                  => 'required',               
        ]);

        $category = trim($request->category); 
        $data = array();
        $data['category']       = $category;  
        $data['status']         = 0;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;
        DB::table('category')->insert($data);  
        Session::put('succes', 'Thanks ,category Added Sucessfully');
        return Redirect::to('addCategory');
    }
    public function manageCategory()
    {
        $result = DB::table('category')->get();
        return view('category.manageCategory')->with('result',$result);
    }
#----------------------------------------------------------------------------#
    public function editCategoryInfo($id)
    {
        $result = DB::table('category')->where('id',$id)->first();
        return view('category.editCategoryInfo')->with('result',$result)->with('id',$id);
    }
    public function editCategoryInfoo(Request $request)
    {
        $this->validate($request, [
            'category'        => 'required',           
            'id'              => 'required'
        ]);

        $category=trim($request->category);       
        $id=trim($request->id);

        $data = array();
        $data['category']      = $category;
        $data['added_id']      = $this->loged_id ;
        $data['modified_at']   = $this->rcdate ;
      
        DB::table('category')->where('id',$id)->update($data);
    
        Session::put('succes', 'Thanks, Category Update Sucessfully');
        return Redirect::to('manageCategory');
    }
    #---------------------- start  Sub category -----------------------------#
    public function addSubCategory()
    {
        $result = DB::table('category')->get();
        return view('category.addSubCategory')->with('result',$result);
    }
    public function addSubCategoryInfo(Request $request)
    {
         $this->validate($request, [
            'sub_category'       => 'required',
            'category_id'        => 'required'              
        ]);

        $sub_category    = trim($request->sub_category);
        $category_id     = trim($request->category_id); 
        $data = array();
        $data['category_id']    = $category_id;
        $data['sub_category']   = $sub_category;  
        $data['status']         = 0;
        $data['added_id']       = $this->loged_id ;
        $data['created_time']   = $this->current_time ;
        $data['created_at']     = $this->rcdate ;
        DB::table('sub_category')->insert($data);  
        Session::put('succes', 'Thanks ,Sub Category Added Sucessfully');
        return Redirect::to('addSubCategory');
    }
    public function manageSubCategory()
    {
        $result = DB::table('sub_category')->get();
        return view('category.manageSubCategory')->with('result',$result);
    }
#----------------------------------------------------------------------------#

   
}
