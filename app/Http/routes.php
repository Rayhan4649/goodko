<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','FontendController@index');
Route::post('/indexInfo','FontendController@indexInfo');
Route::get('/web_client','FontendController@web_client');
Route::get('/web_message','FontendController@web_message');
Route::get('/deleteInfo/{id}', 'FontendController@deleteInfo');
Route::get('/aboutGoodko','FontendController@aboutGoodko');
Route::get('/contactPage','FontendController@contactPage');
Route::post('/webContactInfo','FontendController@webContactInfo');
Route::get('/addHeaderMenu','FontendController@addHeaderMenu');
Route::post('/addHeaderInfo','FontendController@addHeaderInfo');
Route::get('/manageHeaderMenu','FontendController@manageHeaderMenu');
Route::get('/addMainMenu','FontendController@addMainMenu');
Route::post('/addMainMenuInfo','FontendController@addMainMenuInfo');
Route::get('/manageMainMenu','FontendController@manageMainMenu');
Route::get('/addSubMenu','FontendController@addSubMenu');
Route::post('/getMainMenu','FontendController@getMainMenu');
Route::post('/addSubMenuInfo','FontendController@addSubMenuInfo');
Route::get('/manageSubMenu','FontendController@manageSubMenu');
Route::get('/addChildMenu','FontendController@addChildMenu');
Route::post('/getSubMenu','FontendController@getSubMenu');
Route::post('/addChildMenuInfo','FontendController@addChildMenuInfo');
Route::get('/manageChildMenu','FontendController@manageChildMenu');
Route::get('/pageSetup','FontendController@pageSetup');
Route::get('/headerMenuPageSetup/{id}','FontendController@headerMenuPageSetup');
Route::post('/addHeaderMenuPageSetup','FontendController@addHeaderMenuPageSetup');
Route::post('/editHeaderMenuPageSetup','FontendController@editHeaderMenuPageSetup');
Route::get('/mainMenuPageSetup/{id}','FontendController@mainMenuPageSetup');
Route::post('/addMainMenuPageSetup','FontendController@addMainMenuPageSetup');
Route::post('/editMainMenuPageSetup','FontendController@editMainMenuPageSetup');
Route::get('/subMenuPageSetup/{id}','FontendController@subMenuPageSetup');
Route::post('/addSubMenuPageSetup','FontendController@addSubMenuPageSetup');
Route::post('/editSubMenuPageSetup','FontendController@editSubMenuPageSetup');
Route::get('/childMenuPageSetup/{id}','FontendController@childMenuPageSetup');
Route::post('/addChildMenuPageSetup','FontendController@addChildMenuPageSetup');
Route::post('/editChildMenuPageSetup','FontendController@editChildMenuPageSetup');
Route::get('/headerMenuContent/{id}','FontendController@headerMenuContent');
Route::get('/mainMenuContent/{id}','FontendController@mainMenuContent');
Route::get('/subMenuContent/{id}','FontendController@subMenuContent');
Route::get('/childMenuContent/{id}','FontendController@childMenuContent');
Route::get('/headerMenuContentDetailsImage/{id}/{header_menu_id}','FontendController@headerMenuContentDetailsImage');
Route::get('/mainMenuContentDetailsImage/{id}/{main_menu_id}','FontendController@mainMenuContentDetailsImage');
Route::get('/subMenuContentDetailsImage/{id}/{sub_menu_id}','FontendController@subMenuContentDetailsImage');
Route::get('/childMenuContentDetailsImage/{id}/{child_menu_id}','FontendController@childMenuContentDetailsImage');
Route::get('/editheaderMenuPageSetupUpdateInfo/{id}/{header_menu_id}','FontendController@editheaderMenuPageSetupUpdateInfo');
Route::post('/editheaderMenuPageSetupUpdateInfoo','FontendController@editheaderMenuPageSetupUpdateInfoo');
Route::get('/editmainMenuPageSetupUpdateInfo/{id}/{main_menu_id}','FontendController@editmainMenuPageSetupUpdateInfo');
Route::post('/editmainMenuPageSetupUpdateInfoo','FontendController@editmainMenuPageSetupUpdateInfoo');
Route::get('/editsubMenuPageSetupUpdateInfo/{id}/{sub_menu_id}','FontendController@editsubMenuPageSetupUpdateInfo');
Route::post('/editsubMenuPageSetupUpdateInfoo','FontendController@editsubMenuPageSetupUpdateInfoo');
Route::get('/editchildMenuPageSetupUpdateInfo/{id}/{child_menu_id}','FontendController@editchildMenuPageSetupUpdateInfo');
Route::post('/editchildMenuPageSetupUpdateInfoo','FontendController@editchildMenuPageSetupUpdateInfoo');

//Delete
Route::get('/deleteMainMenuPageSetupUpdateInfo/{id}/{main_menu_id}', 'FontendController@deleteMainMenuPageSetupUpdateInfo');
Route::get('/deleteHeaderMenuPageSetupUpdateInfo/{id}/{header_menu_id}', 'FontendController@deleteHeaderMenuPageSetupUpdateInfo');
Route::get('/deleteSubMenuPageSetupUpdateInfo/{id}/{sub_menu_id}', 'FontendController@deleteSubMenuPageSetupUpdateInfo');
Route::get('/deleteChildMenuPageSetupUpdateInfo/{id}/{child_menu_id}', 'FontendController@deleteChildMenuPageSetupUpdateInfo');
// Action Change
Route::get('/headerActionChange/{id}/{header_menu_id}/{status}','FontendController@headerActionChange');
Route::get('/mainActionChange/{id}/{main_menu_id}/{status}','FontendController@mainActionChange');
Route::get('/subActionChange/{id}/{sub_menu_id}/{status}','FontendController@subActionChange');
Route::get('/childActionChange/{id}/{child_menu_id}/{status}','FontendController@childActionChange');
Route::get('/headerStatusChange/{id}/{action}','FontendController@headerStatusChange');
Route::get('/mainStatusChange/{id}/{action}','FontendController@mainStatusChange');
//Star Link
//sub Menu Page Link
Route::get('/subMenuPageLink/{id}/{main_menu_id}','FontendController@subMenuPageLink');
Route::post('/editSubMenuPageLink','FontendController@editSubMenuPageLink');

//child Menu Page Link
Route::get('/childMenuPageLink/{id}/{main_menu_id}/{main_title_id}','FontendController@childMenuPageLink');
Route::post('/editChildMenuPageLink','FontendController@editChildMenuPageLink');

//sub Menu link Details Image
Route::get('/subMenuLinkDetailsImage/{id}/{main_menu_id}/{main_title_id}','FontendController@subMenuLinkDetailsImage');
Route::get('/childMenulinkDetailsImage/{id}/{main_menu_id}/{main_title_id}/{sub_link_id}','FontendController@childMenulinkDetailsImage');

//su bLink Action Change
Route::get('/subLinkActionChange/{id}/{main_menu_id}/{main_title_id}/{status}','FontendController@subLinkActionChange');
Route::get('/childLinkActionChange/{id}/{main_menu_id}/{main_title_id}/{sub_link_id}/{status}','FontendController@childLinkActionChange');
//edit Link Page Update Info
Route::get('/editChildLinkPageUpdateInfo/{id}/{main_menu_id}/{main_title_id}/{sub_link_id}','FontendController@editChildLinkPageUpdateInfo');
Route::post('/editChildLinkPageUpdateInfoo','FontendController@editChildLinkPageUpdateInfoo');
Route::get('/deleteChildLinkPageUpdateInfo/{id}/{main_menu_id}/{main_title_id}/{sub_link_id}', 'FontendController@deleteChildLinkPageUpdateInfo');
Route::get('/editSubLinkPageUpdateInfo/{id}/{main_menu_id}/{main_title_id}','FontendController@editSubLinkPageUpdateInfo');
Route::post('/editSubLinkPageUpdateInfoo','FontendController@editSubLinkPageUpdateInfoo');
Route::get('/deleteSubLinkPageUpdateInfo/{id}/{main_menu_id}/{main_title_id}', 'FontendController@deleteSubLinkPageUpdateInfo');
//End Link
#----------------------- ADMIN ---------------------------#
Route::get('/admin','AdminController@index');
Route::post('/login','AdminController@login');
Route::get('/otp','AdminController@otp');
Route::post('/loginUsingOtp','AdminController@loginUsingOtp');
Route::get('/resendotp','AdminController@resendotp');
Route::get('/adminLogout','AdminController@adminLogout');
Route::get('/managerLogout','AdminController@managerLogout');
Route::get('/srLogout','AdminController@srLogout');
Route::get('/managerChangePassword','AdminController@managerChangePassword');
Route::post('/managerChangePasswordInfo','AdminController@managerChangePasswordInfo');
Route::get('/adminChangePassword','AdminController@adminChangePassword');
Route::post('/adminChangePasswordInfo','AdminController@adminChangePasswordInfo');
// opening balance
Route::get('/addAdminOpeningBalance','AdminController@addAdminOpeningBalance');
Route::post('/addAdminOpeningBalanceInfo','AdminController@addAdminOpeningBalanceInfo');
// forgotten password
Route::get('/mobileNumberVerify','AdminController@mobileNumberVerify');
Route::post('/sendMobileVerificationCode','AdminController@sendMobileVerificationCode');
Route::get('/recoverPassword/{id}','AdminController@recoverPassword');
Route::post('/recoverAccount','AdminController@recoverAccount');
Route::get('/singleBranchManagerInfo/{id}','AdminController@singleBranchManagerInfo');
Route::post('updateManagerInfo','AdminController@updateManagerInfo'); 
Route::get('/addSr','AdminController@addSr');
Route::post('/addSrInfo','AdminController@addSrInfo');
Route::get('/manageSr','AdminController@manageSr');
Route::get('/editSr/{id}','AdminController@editSr');
Route::post('/edtiSrInfo','AdminController@edtiSrInfo');
// softwarer start by branch manager
Route::get('/softwareStartByBranch','AdminController@softwareStartByBranch');
#----------------------- END ADMIN ------------------------#
# ------------------ COLLECTION MANAGER -------------------#
Route::get('addCollectionMan', 'CollectionManController@addCollectionMan') ;
Route::post('addCollectionManInfo', 'CollectionManController@addCollectionManInfo') ;
Route::get('managerCollectionMan', 'CollectionManController@managerCollectionMan') ;
Route::get('singleCollectionManInfo/{id}', 'CollectionManController@singleCollectionManInfo') ;
Route::post('updateCollectionManInfo', 'CollectionManController@updateCollectionManInfo') ;
#----------------------- DASHBOARD ---------------------------#
Route::get('/managerDashboard','DashboardController@managerDashboard');
Route::get('/adminDashboard','DashboardController@adminDashboard');
Route::get('/srDashboard','DashboardController@srDashboard');
#----------------------- END DASHBOARD ---------------------------#
#----------------------Start Category Controller ---------------------------#
Route::get('/addCategory','CategoryController@addCategory');
Route::post('/addCategoryInfo','CategoryController@addCategoryInfo');
Route::get('/manageCategory','CategoryController@manageCategory');
Route::get('/editCategoryInfo/{id}', 'CategoryController@editCategoryInfo');
Route::post('/editCategoryInfoo', 'CategoryController@editCategoryInfoo');
Route::get('/addSubCategory','CategoryController@addSubCategory');
Route::post('/addSubCategoryInfo','CategoryController@addSubCategoryInfo');
Route::get('/manageSubCategory','CategoryController@manageSubCategory');
#-----------------------End  Category Controller ---------------------------#
#----------------------Start Client Controller  ----------------------------#
Route::get('/addClient','ClientController@addClient');
Route::post('/addClientInfo','ClientController@addClientInfo');
Route::get('/manageClient','ClientController@manageClient');
Route::get('/editClientInfo/{id}', 'ClientController@editClientInfo');
Route::post('/editClientInfoo', 'ClientController@editClientInfoo');
Route::get('/deleteClientInfo/{id}', 'ClientController@deleteClientInfo');
Route::post('/messageInfo','ClientController@messageInfo');
#----------------------End Client Controller  ------------------------------#
#----------------------------- Navbar---------------------------------------#
Route::get('/addNavbar','AdminController@addNavbar');
Route::post('/addNavbarInfo', 'AdminController@addNavbarInfo');
#------------------------Footer---------------------------------------------#
Route::get('/footer','AdminController@footer');
Route::post('/footerInfo', 'AdminController@footerInfo');
#----------------------Start Client Controller  ----------------------------#
Route::get('/addOfficer','OfficerController@addOfficer');
Route::post('/addOfficerInfo','OfficerController@addOfficerInfo');
Route::get('/manageOfficer','OfficerController@manageOfficer');
Route::get('/editOfficerInfo/{id}', 'OfficerController@editOfficerInfo');
Route::post('/editOfficerInfoo', 'OfficerController@editOfficerInfoo');
Route::get('/deleteOfficerInfo/{id}', 'OfficerController@deleteOfficerInfo');
#----------------------End Client Controller  ------------------------------#
#----------------------Start Category Controller ---------------------------#
Route::get('/addService','AdminController@addService');
Route::post('/addServiceInfo','AdminController@addServiceInfo');
Route::get('/manageService','AdminController@manageService');
Route::get('/editServiceInfo/{id}', 'AdminController@editServiceInfo');
Route::post('/editServiceInfoo', 'AdminController@editServiceInfoo');
Route::get('/addProduct','AdminController@addProduct');
Route::post('/addProductInfo','AdminController@addProductInfo');
Route::get('/addProduct','AdminController@addProduct');
Route::get('/details/{id}','FontendController@details');
Route::get('/manageProduct','AdminController@manageProduct');
Route::get('/editProductInfo/{id}', 'AdminController@editProductInfo');
Route::post('/editProductInfoo', 'AdminController@editProductInfoo');
Route::get('/deleteProductInfo/{id}', 'AdminController@deleteProductInfo');
Route::get('/productActionChange/{id}/{status}','AdminController@productActionChange');
Route::get('/editMain/{id}', 'AdminController@editMain');
Route::post('/editMainInfo', 'AdminController@editMainInfo');


#-----------------------End  Category Controller ---------------------------#
#-----------------------Start  Bannar  ---------------------------#
Route::get('/addbannar','AdminController@addbannar');
Route::post('/addBannarInfo','AdminController@addBannarInfo');
Route::get('/manageBannar','AdminController@manageBannar');
Route::get('/bannerActionChange/{id}/{status}','AdminController@bannerActionChange');
Route::get('/editBannerInfo/{id}', 'AdminController@editBannerInfo');
Route::post('/editBannerInfoo', 'AdminController@editBannerInfoo');
Route::get('/deleteBannerInfo/{id}', 'AdminController@deleteBannerInfo');
#-----------------------End  Bannar  ---------------------------#
Route::get('/databaseBackup','FontendController@databaseBackup');
