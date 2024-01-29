<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use DB;
use Session;

class DashboardController extends Controller
{
     /**
     * Dashboardd CLASS costructor 
     *
     */
    public function __construct()
    {
    	date_default_timezone_set('Asia/Dhaka');
    	$this->rcdate       = date('Y-m-d');
    	$this->day          = date('d');
        $this->loged_id     = Session::get('admin_id');
        $this->current_time = date("H:i:s");
        $this->branch_id    = Session::get('branch_id');
    }

    public function appsPartyCustomerLedger()
    {
        $result = DB::table('customer')->where('branch_id',$this->branch_id)->where('type',3)->get();
        return view('leadger.appsPartyCustomerLedger')->with('result',$result);
    }

    public function appsPartyCollection()
    {
        $customer    = DB::table('customer')->where('branch_id',$this->branch_id)->where('type',3)->get();
        $mobile_bank = DB::table('mobile_bank_account')
        ->join('mobile_bank', 'mobile_bank_account.mobile_bank_id', '=', 'mobile_bank.id')
        ->select('mobile_bank_account.*','mobile_bank.mobile_bank_name')
        ->where('mobile_bank_account.status',1)
        ->get();
        $bank       = DB::table('bank')->where('status',1)->get();
        return view('collection.appsPartyCollection')->with('customer',$customer)->with('mobile_bank',$mobile_bank)->with('bank',$bank);
    }

    public function appsManagerCollectionReport()
    {
        $result = DB::table('customer')->where('type','!=',1)->get();
        return view('report.appsManagerCollectionReport')->with('result',$result);
    }

    public function appsPartyFullLedger($id)
    {
                // get customer info
        $customer = DB::table('customer')->where('id',$id)->first();
        // get leadger info
        $result   = DB::table('ledger')->where('customer_id',$id)->where('branch_id',$this->branch_id)->orderby('created_at','asc')->get();
        return view('leadger.appsPartyFullLedger')->with('customer',$customer)->with('result',$result);
    }

    /**
     * After login successull admin enter into stystem
     * @return \Illuminate\Http\Response
     */
    public function adminDashboard()
    {
        $pettycash_count = DB::table('pettycash')->where('branch_id',0)->count();
        if($pettycash_count > 0){
        $pettycash_query       = DB::table('pettycash')->where('branch_id',0)->first();
        $pettycash             = $pettycash_query->pettycash_amount ; 
    }else{
        $pettycash = '0.00';
    }

        $today_sale_bill_query = DB::table('sale')->where('sale_date',$this->rcdate)->get();
        $today_sale_bill_payment = 0 ;
        foreach ($today_sale_bill_query as $today_sale_bill) {
         $today_sale_bill_payment = $today_sale_bill_payment + $today_sale_bill->total_payment ; 
        }

         $sale_bill_payment = 0 ;
         $sale_bill_query = DB::table('sale')->get();
        $sale_bill_payment = 0 ;
        foreach ($sale_bill_query as $sale_bill) {
         $sale_bill_payment = $sale_bill_payment + $sale_bill->total_payment ; 
        };
        // total purchase stock value
        $stock = DB::table('stock')->get();
        $purchase_stock_value = 0 ;
        $sale_stock_value     = 0 ;
        foreach ($stock as  $stock_value) {
          $purchase_stock_value_with_quantity =  $stock_value->purchase_amount * $stock_value->available_stock ;
          $purchase_stock_value = $purchase_stock_value + $purchase_stock_value_with_quantity ;
          // sales value
           $sale_stock_value_with_quantity =  $stock_value->sales_amount * $stock_value->available_stock ;
           $sale_stock_value = $sale_stock_value + $sale_stock_value_with_quantity ;
        }

        // production completed stock
        $production_stock = DB::table('tbl_production_stock')->get();
        $productoin_purchase_stock_value = 0 ;
        foreach($production_stock as $production_stock_value){
        $production_purchase_stock_value_with_quantity =  $production_stock_value->purchase_amount * $production_stock_value->available_stock ;
        $productoin_purchase_stock_value = $productoin_purchase_stock_value + $production_purchase_stock_value_with_quantity ;
        }
        // all bank balance
        $total_bank_balance = 0 ;
        $bank_balance = DB::table('bank_balance')->get();
        foreach ($bank_balance as $bank_balance_value) {
            $total_bank_balance = $total_bank_balance + $bank_balance_value->total_balance ;
        }
        // today purchas balance
        $today_purchase_balance = DB::table('purchase')->where('purchase_date',$this->rcdate)->get();
        $total_today_purchase_amount = 0 ;
        foreach ($today_purchase_balance as $today_purchase_balance_value) {
             $total_today_purchase_amount = $total_today_purchase_amount + $today_purchase_balance_value->total_price;
         } 
         // total purchase balance
        $total_purchase_balance = DB::table('purchase')->get();
        $total_purchase_amount = 0 ;
        foreach ($total_purchase_balance as $total_purchase_balance_value) {
             $total_purchase_amount = $total_purchase_amount + $total_purchase_balance_value->total_price;
         } 
         // mobile bank balance
         $total_mobile_bank_balance = 0 ;
         $mobile_bank_balance = DB::table('mobile_bank_balance')->get();
         foreach ($mobile_bank_balance as $mobile_bank_balance_value) {
           $total_mobile_bank_balance =  $total_mobile_bank_balance + $mobile_bank_balance_value->total_balance ;
         }
         // total supplier due
         $supplier_due = DB::table('supplier_due')->get();
         $total_supplier_due = 0 ;
         foreach ($supplier_due as $supplier_due_value) {
           $total_supplier_due =  $total_supplier_due + $supplier_due_value->total_due_amount ;
         }
        // total supplier due
         $customer_due = DB::table('customer_due')->get();
         $total_customer_due = 0 ;
         foreach ($customer_due as $customer_due_value) {
           $total_customer_due =  $total_customer_due + $customer_due_value->total_due_amount ;
         }

         // max product sale
    $max_product_sale = DB::table('sale_product')
      ->join('product','sale_product.product_id','=','product.id')
      ->select('sale_product.*','product.product_name', DB::raw("SUM(sale_product.total_quantity) AS max_total_qty"))
      ->groupBy('sale_product.product_id')
      ->orderBy('max_total_qty','DESC')
      ->limit(10)
      ->get();
    $max_customer_due = DB::table('customer_due')->orderBy('total_due_amount','desc')->limit(10)->get();
        return view('admin.adminDashboard')
        ->with('pettycash',$pettycash)
        ->with('today_sale_bill_payment',$today_sale_bill_payment)
        ->with('sale_bill_payment',$sale_bill_payment)
        ->with('purchase_stock_value',$purchase_stock_value)
        ->with('sale_stock_value',$sale_stock_value)
        ->with('total_bank_balance',$total_bank_balance)
        ->with('total_today_purchase_amount',$total_today_purchase_amount)
        ->with('total_purchase_amount',$total_purchase_amount)
        ->with('total_mobile_bank_balance',$total_mobile_bank_balance)
        ->with('total_supplier_due',$total_supplier_due)
        ->with('total_customer_due',$total_customer_due)
        ->with('max_product_sale',$max_product_sale)
        ->with('max_customer_due',$max_customer_due)
        ->with('productoin_purchase_stock_value',$productoin_purchase_stock_value)
        ;
    }
     /**
     * After login successull branch manager enter into stystem
     * @return \Illuminate\Http\Response
     */
    public function managerDashboard()
    {
    //     // get pettycash of this branch
    //     $count___pettycash_amount___query = DB::table('pettycash')->where('branch_id',$this->branch_id)->count();
    //     if($count___pettycash_amount___query > 0){
    //     $pettycash_query = DB::table('pettycash')->where('branch_id',$this->branch_id)->first();
    //     $pettycash       = $pettycash_query->pettycash_amount ; 
    //     }else{
    //     $pettycash       = 0.00 ; 
    //     }
    
    //          // sale bill
    //     $today_sale_bill_query = DB::table('sale')->where('branch_id',$this->branch_id)->where('sale_date',$this->rcdate)->get();
    //     $today_sale_bill_paymentt = 0 ;
    //     $today_sale_discount = 0;
    //     foreach ($today_sale_bill_query as $today_sale_bill) {
    //      $today_sale_bill_paymentt = $today_sale_bill_paymentt + $today_sale_bill->total_price ; 
    //      $today_sale_discount     = $today_sale_discount + $today_sale_bill->total_discount ;
    //     }

    //    $today_sale_bill_payment = $today_sale_bill_paymentt - $today_sale_discount ;

    //      $sale_bill_query = DB::table('sale')->where('branch_id',$this->branch_id)->get();
    //     $sale_bill_paymentt = 0 ;
    //     $sale_bill_discount = 0 ;
    //     foreach ($sale_bill_query as $sale_bill) {
    //      $sale_bill_paymentt = $sale_bill_paymentt + $sale_bill->total_price ; 
    //      $sale_bill_discount = $sale_bill_discount + $sale_bill->total_discount;
    //     }
    //     $sale_bill_payment = $sale_bill_paymentt - $sale_bill_discount ;
    //              // total purchase stock value
    //     $stock = DB::table('stock')->where('branch_id',$this->branch_id)->get();
    //     $purchase_stock_value = 0 ;
    //     $sale_stock_value     = 0 ;
    //     foreach ($stock as  $stock_value) {
    //       $purchase_stock_value_with_quantity =  $stock_value->purchase_amount * $stock_value->available_stock ;
    //       $purchase_stock_value = $purchase_stock_value + $purchase_stock_value_with_quantity ;
    //       // sales value
    //        $sale_stock_value_with_quantity =  $stock_value->sales_amount * $stock_value->available_stock ;
    //        $sale_stock_value = $sale_stock_value + $sale_stock_value_with_quantity ;

    //     }
    //     // low stock item
  
    //         // get limit low stock
    // $low_stock_info = DB::table('stock_limit')->first();
    // $stock_limit    = $low_stock_info->limit_number ;
    //  $stock_limit_product = DB::table('product')
    // ->join('category', 'product.category_id', '=', 'category.id')
    // ->join('brand', 'product.brand_id', '=', 'brand.id')
    // ->join('unit', 'product.unit', '=', 'unit.id')
    // ->join('stock', 'stock.product_id', '=', 'product.id')
    // ->where('stock.available_stock','<',$stock_limit)
    // ->where('stock.branch_id','=', $this->branch_id)
    // ->select('product.*','category.category_name','brand.brand_name','unit.unit_name','stock.available_stock')
    // ->get();

    // // PARTY TOTAL DUE FOR THIS BRANCH
    // $party_customer_due = DB::table('customer')
    // ->join('customer_due', 'customer.id', '=', 'customer_due.customer_id')
    // ->select('customer.*','customer_due.total_due_amount')
    // ->where('customer.type',3)
    // ->where('customer.branch_id',$this->branch_id)
    // ->get();

    // $total_party_customer_due = 0 ;
    // foreach ($party_customer_due as $value_total_party_due) {
    //     $total_party_customer_due = $total_party_customer_due + $value_total_party_due->total_due_amount;
    // }

    //     // HP TOTAL DUE FOR THIS BRANCH
    //     $hp_customer_due = DB::table('customer')
    //     ->join('customer_due', 'customer.id', '=', 'customer_due.customer_id')
    //     ->select('customer.*','customer_due.total_due_amount')
    //     ->where('customer.type',2)
    //     ->where('customer.branch_id',$this->branch_id)
    //     ->sum('customer_due.total_due_amount');


    //     // TODAY COLLECTION FOR A BRANCH
    //     $today_collection_for_branch = DB::table('collection')->where('branch_id',$this->branch_id)->where('created_at',$this->rcdate)->sum('collection_amount');

    //     // TOTAL COLLECTION FOR A BRANCH
    //     $total_collection_for_branch = DB::table('collection')->where('branch_id',$this->branch_id)->sum('collection_amount');

        return view('admin.managerDashboard');
        // ->with('pettycash',$pettycash)
        // ->with('today_sale_bill_payment',$today_sale_bill_payment)
        // ->with('sale_bill_payment',$sale_bill_payment)
        // ->with('stock_limit_product',$stock_limit_product)
        // ->with('purchase_stock_value',$purchase_stock_value)
        // ->with('sale_stock_value',$sale_stock_value)
        // ->with('total_party_customer_due',$total_party_customer_due)
        // ->with('total_hp_customer_due',$hp_customer_due)
        // ->with('today_collection_for_branch',$today_collection_for_branch)
        // ->with('total_collection_for_branch',$total_collection_for_branch)
        // ->with('branch_id',$this->branch_id);
    }

    public function appsDashboard()
    {
        // get pettycash of this branch
        $pettycash_query = DB::table('pettycash')->where('branch_id',$this->branch_id)->first();
        $pettycash       = $pettycash_query->pettycash_amount ; 
        return view('admin.appsDashboard')->with('pettycash', $pettycash) ;
    }
    // sr dashboard
    public function srDashboard()
    {
    $all_market = DB::table('tbl_market')
      ->where('branch_id',$this->branch_id)
      ->where('status', 1)
      ->orderBy('market_name', 'asc')
      ->get() ;
    return view('admin.srDashboard')->with('all_market', $all_market) ;
    }
}
