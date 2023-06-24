<?php

use App\Models\Wishlist;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\BlogsController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommissionsController;
use App\Http\Controllers\Backend\SellerOrderController;

use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\ReturnRequestController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\SalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user-dashboard.index');
// });
Route::get('/', [IndexController::class, 'index']);

// User part route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');


    Route::get('/user/track_order', [UserController::class, 'track_order'])->name('user.track_order');
    Route::post('/user/tracking_my_order', [UserController::class, 'tracking'])->name('order.tracking');

    Route::get('/user/change_password', [UserController::class, 'change_password'])->name('user.change_password');
    Route::get('/user/my_profile', [UserController::class, 'user_profile_index'])->name('user.profile');
    Route::post('/user/profile', [UserController::class, 'user_profile'])->name('user.profile_store');
    Route::post('/user/update_password', [UserController::class, 'update_password'])->name('user.update_password');
    

    // Orders of Users route
    Route::get('/user/orders', [UserController::class, 'user_order_index'])->name('user.view_order');
    Route::get('/user/order_detail/{order_id}', [UserController::class, 'user_order_detail'])->name('user.order_details');
    Route::get('/user/invoice_download/{order_id}', [UserController::class, 'invoice_download'])->name('user.invoice_download');
    Route::post('/user/order_reason/{order_id}', [UserController::class, 'order_reason'])->name('return.order_reason');
    Route::get('/user/return_order', [UserController::class, 'return_order'])->name('user.return_order');


    
});
// Route::get('/user/login', [UserController::class, 'userLogin'])->name('user.login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin part routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/update_profile', [AdminController::class, 'update_profile'])->name('admin.update_profile');
    Route::get('/admin/change_password', [AdminController::class, 'change_password'])->name('admin.change_password');
    Route::post('/admin/update_password', [AdminController::class, 'update_password'])->name('admin.update_password');
});
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);



// Sellers part Routes
Route::middleware(['auth','role:seller'])->group(function () {

    Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');  
    Route::get('/seller/logout', [SellerController::class, 'logout'])->name('seller.logout');
    Route::get('/seller/profile', [SellerController::class, 'profile'])->name('seller.profile');
    Route::post('/seller/update_profile', [SellerController::class, 'update_profile'])->name('seller.update_profile');
    Route::get('/seller/change_password', [SellerController::class, 'change_password'])->name('seller.change_password');
    Route::post('/seller/update_password', [SellerController::class, 'update_password'])->name('seller.update_password');

    

     // All Seller Product routes
    Route::controller(SellerProductController::class)->group(function(){
        Route::get('/seller/products', 'product_index')->name('seller.product_index');
        Route::get('/seller/add_product', 'add_product')->name('seller.add_product');
        Route::post('/seller/store_product', 'store_product')->name('seller.store_product');
        Route::get('/seller/subcategory/ajax/{category_id}', 'seller_get_subcategory')->name('seller.subcategory_ajax');
        
        Route::get('/seller/edit_product/{id}', 'edit_product')->name('seller.edit_product');
        Route::post('/seller/update_product', 'update_product')->name('seller.update_product');
        Route::post('/seller/update_product_image', 'update_product_image')->name('seller.update_product_image');
        Route::post('/seller/update_multi_image', 'update_multi_image')->name('seller.update_multi_image');
        Route::get('/seller/destroy_multi_image/{id}', 'destroy_multi_image')->name('seller.destroy_multi_image');
        Route::get('/seller/inactivate_product/{id}', 'inactivate_product')->name('seller.inactivate_product');
        Route::get('/seller/activate_product/{id}', 'activate_product')->name('seller.activate_product');
        Route::get('/seller/delete_product/{id}', 'delete_product')->name('seller.destroy_product');

    });

    // All Orders routes
    Route::controller(SellerOrderController::class)->group(function(){
        
        Route::get('/seller/orders', 'sellerOrder')->name('seller.order');
        Route::get('/seller/return_order', 'return_order')->name('seller.return_order');
        Route::get('/seller/complete_order', 'complete_order')->name('seller.complete_order.request');
        Route::get('/seller/approve_request/{order_id}', 'approve_request')->name('seller.approve_request');
        Route::get('/seller/order_details/{order_id}', 'order_details')->name('seller.order_details');


                // Four action for orders
        Route::get('/seller/order_confirmed/{order_id}', 'order_confirmed')->name('seller.confirmed.order');
        Route::get('/seller/order_processed/{order_id}', 'order_processed')->name('seller.processed.order');
        Route::get('/seller/order_delivered/{order_id}', 'order_delivered')->name('seller.delivered.order');
        Route::get('/seller/download_Invoice/{order_id}', 'DownloadInvoice')->name('seller.invoice_download');

        


    });


     // All Orders routes
     Route::controller(SalesController::class)->group(function(){
        
        Route::get('/seller/sales_report', 'sales')->name('shop.sales');
        Route::get('/seller/stock', 'manage_stocks')->name('seller.stock');
        Route::post('/seller/report', 'report')->name('seller.report');

    });

});

// Seller End middleware

Route::get('/seller/login', [SellerController::class, 'sellerLogin'])->name('seller.login')->middleware(RedirectIfAuthenticated::class);;
Route::get('/seller/become_seller', [SellerController::class, 'become_seller'])->name('seller.become_seller');
Route::post('/seller/register', [SellerController::class, 'Registerseller'])->name('seller.register');



// Admin Brands 
Route::middleware(['auth','role:admin'])->group(function () {

    // All Brand routes
    Route::controller(BrandController::class)->group(function(){
        
        Route::get('/admin/brands', 'brands')->name('all.brand');
        Route::get('/admin/add_brand', 'add_brand')->name('add.brand');
        Route::post('/admin/store_brand', 'store_brand')->name('store.brand');
        Route::get('/admin/edit_brand/{id}', 'edit_brand')->name('edit.brand');
        Route::post('/admin/update_brand', 'update_brand')->name('update.brand');
        Route::get('/admin/destroy_brand/{id}', 'destroy_brand')->name('destroy.brand');
    });

    // All Category routes
    Route::controller(CategoryController::class)->group(function(){
        
        Route::get('/admin/categories', 'categories')->name('category.index');
        Route::get('/admin/add_category', 'add_category')->name('add.category');
        Route::post('/admin/store_category', 'store_category')->name('store.category');
        Route::get('/admin/edit_category/{id}', 'edit_category')->name('edit.category');
        Route::post('/admin/update_category', 'update_category')->name('update.category');
        Route::get('/admin/destroy_category/{id}', 'destroy_category')->name('destroy.category');
    });

    // All Sub Category routes
    Route::controller(SubCategoryController::class)->group(function(){
        
        Route::get('/admin/sub_categories', 'sub_categories')->name('sub_category.index');
        Route::get('/admin/add_subcategory', 'add_subcategory')->name('add.subcategory');
        Route::post('/admin/store_subcategory', 'store_subcategory')->name('store.subcategory');
        Route::get('/admin/edit_subcategory/{id}', 'edit_subcategory')->name('edit.subcategory');
        Route::post('/admin/update_subcategory', 'update_subcategory')->name('update.subcategory');
        Route::get('/admin/destroy_subcategory/{id}', 'destroy_subcategory')->name('destroy.subcategory');
        Route::get('/subcategory/ajax/{category_id}', 'get_subcategory')->name('subcategory.ajax');
    });

    // All Managing Sellers routes
    Route::controller(AdminController::class)->group(function(){
        
        Route::get('/admin/manage_seller', 'manage_seller')->name('seller.manage');
        Route::get('/admin/active_sellers', 'active_seller')->name('active.sellers');
        Route::get('/admin/inactive_sellers', 'inactive_seller')->name('inactive.sellers');
        Route::get('/admin/inactive_seller_details/{id}', 'inactive_seller_details')->name('inactive.seller_details');
        Route::post('/admin/approved_sellers', 'approved_sellers')->name('activate.seller');
        Route::get('/admin/active_seller_details/{id}', 'active_seller_details')->name('active.seller_details');
        Route::post('/admin/dis_approved_sellers', 'dis_approved_sellers')->name('inactivate.seller');
        
        Route::get('/admin/manage_customer', 'manage_customer')->name('customer.manage');
        Route::get('/admin/active_customers', 'active_customer')->name('active.customers');
        Route::get('/admin/inactive_customers', 'inactive_customer')->name('inactive.customers');
        Route::get('/admin/inactive_customer_details/{id}', 'inactive_customer_details')->name('inactive.customer_details');
        Route::post('/admin/approved_customers', 'approved_customers')->name('activate.customer');
        Route::get('/admin/active_customer_details/{id}', 'active_customer_details')->name('active.customers_details');
        Route::post('/admin/dis_approved_customers', 'dis_approved_customers')->name('inactivate.customer');

        Route::get('/deduct-orders', 'deductPercentageFromOrders')->name('deduct.orders');
        Route::get('/admin/order_amount', 'shops_money')->name('shop.orders');
        Route::post('/admin/search_by_shop', 'search_by_shop')->name('admin.search_by_shop');
    });

    // All Product routes
    Route::controller(ProductController::class)->group(function(){
        
        Route::get('/admin/products', 'products')->name('product.index');
        Route::get('/admin/add_product', 'add_product')->name('add.product');
        Route::post('/admin/store_product', 'store_product')->name('store.product');
        Route::get('/admin/edit_product/{id}', 'edit_product')->name('edit.product');
        Route::post('/admin/update_product', 'update_product')->name('update.product');
        Route::post('/admin/update_product_image', 'update_product_image')->name('update.product_image');
        Route::post('/admin/update_multi_image', 'update_multi_image')->name('update.multi_image');
        Route::get('/admin/destroy_multi_image/{id}', 'destroy_multi_image')->name('destroy.multi_image');
        Route::get('/admin/inactivate_product/{id}', 'inactivate_product')->name('inactivate.product');
        Route::get('/admin/activate_product/{id}', 'activate_product')->name('activate.product');
        Route::get('/admin/delete_product/{id}', 'delete_product')->name('destroy.product');
    });

    // All Sliders routes
    Route::post('/admin/calculate-commission', [CommissionsController::class, 'calculateCommission'])->name('calculateCommission');


    // All Sliders routes
    Route::controller(SliderController::class)->group(function(){
        
        Route::get('/admin/sliders', 'sliders')->name('all.slider');
        Route::get('/admin/add_slider', 'add_slider')->name('add.slider');
        Route::post('/admin/store_slider', 'store_slider')->name('store.slider');
        Route::get('/admin/edit_slider/{id}', 'edit_slider')->name('edit.slider');
        Route::post('/admin/update_slider', 'update_slider')->name('update.slider');
        Route::get('/admin/destroy_slider/{id}', 'destroy_slider')->name('destroy.slider');
    });

     // All Banners routes
     Route::controller(BannerController::class)->group(function(){
        
        Route::get('/admin/banners', 'banners')->name('all.banner');
        Route::get('/admin/add_banner', 'add_banner')->name('add.banner');
        Route::post('/admin/store_banner', 'store_banner')->name('store.banner');
        Route::get('/admin/edit_banner/{id}', 'edit_banner')->name('edit.banner');
        Route::post('/admin/update_banner', 'update_banner')->name('update.banner');
        Route::get('/admin/destroy_banner/{id}', 'destroy_banner')->name('destroy.banner');
    });


      // All Coupons routes
      Route::controller(CouponController::class)->group(function(){
        
        Route::get('/admin/coupons', 'coupons')->name('coupon.index');
        Route::get('/admin/add_coupon', 'add_coupon')->name('add.coupon');
        Route::post('/admin/store_coupon', 'store_coupon')->name('store.coupon');
        Route::get('/admin/edit_coupon/{id}', 'edit_coupons')->name('edit.coupon');
        Route::post('/admin/update_coupon', 'update_coupons')->name('update.coupon');
        Route::get('/admin/destroy_coupon/{id}', 'destroy_coupons')->name('destroy.coupon');
    });


    // All Ship Regions routes
    Route::controller(ShippingAreaController::class)->group(function(){
        
        Route::get('/admin/regions', 'region_index')->name('ship.region');
        Route::get('/admin/add_region', 'add_region')->name('add.region');
        Route::post('/admin/store_region', 'store_region')->name('store.region');
        Route::get('/admin/edit_region/{id}', 'edit_region')->name('edit.region');
        Route::post('/admin/update_region', 'update_region')->name('update.region');
        Route::get('/admin/destroy_region/{id}', 'destroy_region')->name('destroy.region');
    });

     // All Ship Districts routes
     Route::controller(ShippingAreaController::class)->group(function(){
        
        Route::get('/admin/districts', 'district_index')->name('ship.district');
        Route::get('/admin/add_district', 'add_district')->name('add.district');
        Route::post('/admin/store_district', 'store_district')->name('store.district');
        Route::get('/admin/edit_district/{id}', 'edit_district')->name('edit.district');
        Route::post('/admin/update_district', 'update_district')->name('update.district');
        Route::get('/admin/destroy_district/{id}', 'destroy_district')->name('destroy.district');
    });


     // All Ship States routes
     Route::controller(ShippingAreaController::class)->group(function(){
        
        Route::get('/admin/states', 'state_index')->name('ship.state');
        Route::get('/admin/add_state', 'add_state')->name('add.state');
        Route::post('/admin/store_state', 'store_state')->name('store.state');
        Route::get('/admin/edit_state/{id}', 'edit_state')->name('edit.state');
        Route::post('/admin/update_state', 'update_state')->name('update.state');
        Route::get('/admin/destroy_state/{id}', 'destroy_state')->name('destroy.state');
        Route::get('/district/ajax/{division_id}', 'get_district');
    });

    // All Orders routes
    Route::controller(OrderController::class)->group(function(){
        
        Route::get('/admin/orders', 'order_index')->name('order.index');
        Route::get('/admin/order_detail/{order_id}', 'order_detail')->name('edit.order_detail');

        // Four action for orders
        Route::get('/admin/order_confirmed/{order_id}', 'order_confirmed')->name('confirmed.order');
        Route::get('/admin/order_processed/{order_id}', 'order_processed')->name('processed.order');
        Route::get('/admin/order_delivered/{order_id}', 'order_delivered')->name('delivered.order');
        Route::get('/admin/download_Invoice/{order_id}', 'DownloadInvoice')->name('admin.invoice_download');


    });

     // All Return Request Order routes
     Route::controller(ReturnRequestController::class)->group(function(){
        
        Route::get('/admin/order_request', 'order_request')->name('return.order.request');
        Route::get('/admin/approve_request/{order_id}', 'approve_request')->name('admin.approve_request');
        Route::get('/admin/completed_request', 'completed_request')->name('complete.request');
       

    });

    // All Reports routes
    Route::controller(ReportsController::class)->group(function(){
        
        Route::get('/admin/report_view', 'report_view')->name('admin.report_view');
        Route::post('/admin/search_by_date', 'search_by_date')->name('admin.search_by_date');
        Route::post('/admin/search_by_month', 'search_by_month')->name('admin.search_by_month');
        Route::post('/admin/search_by_year', 'search_by_year')->name('admin.search_by_year');
        Route::get('/admin/search_by_user', 'search_by_user')->name('admin.order.by_user');
        Route::post('/admin/serach_by_customer', 'search_by_customer')->name('admin.search_by_user');
    });


     // All Blogs routes
     Route::controller(BlogController::class)->group(function(){
        
        Route::get('/admin/blog_category', 'blog_category')->name('all.blog_category');
        Route::get('/admin/add_blog_category', 'add_blog_category')->name('add.blog_category');
        Route::post('/admin/store_blog_category', 'store_blog_category')->name('store.blog_category');      
        Route::get('/admin/edit_blog_category/{id}', 'edit_blog_category')->name('edit.blog_category');
        Route::post('/admin/update_blog_category', 'update_blog_category')->name('update.blog_category');
        Route::get('/admin/destroy_blog_category/{id}', 'destroy_blog_category')->name('destroy.blog_category');

       

        Route::get('/admin/blog_post', 'blog_post')->name('all.blog_post');
        Route::get('/admin/add_blog_post', 'add_blog_post')->name('add.blog_post');
        Route::post('/admin/store_blog_post', 'store_blog_post')->name('store.blog_post');
        Route::get('/admin/edit_blog_post/{id}', 'edit_blog_post')->name('edit.blog_post');
        Route::post('/admin/update_blog_post', 'update_blog_post')->name('update.blog_post');
        Route::get('/admin/destroy_blog_post/{id}', 'destroy_blog_post')->name('destroy.blog_post');


    });


       // All Site Setting routes
       Route::controller(SiteSettingController::class)->group(function(){
        
        Route::get('/admin/setting', 'setting')->name('admin.setting');
        Route::post('/admin/setting_update', 'setting_update')->name('admin.setting_update');

        // Shops Comissions
        Route::get('/admin/search_by_seller', 'search_by_seller')->name('admin.comission');
        
    });


    // All Stock product Setting routes
    Route::controller(StockController::class)->group(function(){
        Route::get('/admin/manage_stocks', 'manage_stocks')->name('product.stock');
    });

    // All Permission And Roles routes
    Route::controller(RoleController::class)->group(function(){
        // All permissions
        Route::get('/admin/users_permission', 'permission')->name('users.permission');
        Route::get('/admin/add_users_permission', 'addpermission')->name('add.permission');
        Route::post('/admin/store_users_permission', 'storepermission')->name('store.permission');
        Route::get('/admin/edit_permission/{id}', 'edit_permission')->name('edit.permission');
        Route::post('/admin/update_permission', 'update_permission')->name('update.permission');
        Route::get('/admin/destroy_permission/{id}', 'destroy_permission')->name('destroy.permission');

        // All roles
        Route::get('/admin/users_roles', 'roles')->name('users.roles');
        Route::get('/admin/add_users_role', 'addrole')->name('add.role');
        Route::post('/admin/store_users_roles', 'storeroles')->name('store.roles');
        Route::get('/admin/edit_role/{id}', 'edit_role')->name('edit.role');
        Route::post('/admin/update_role', 'update_role')->name('update.role');
        Route::get('/admin/destroy_role/{id}', 'destroy_role')->name('destroy.role');

        // Users Role in Permissions 
        Route::get('/admin/roles_in_permissions', 'roles_permissions')->name('users.roles.permissions');
        Route::post('/admin/roles_permission_store', 'roles_permission_store')->name('role.permission.store');
        Route::get('/admin/all_role_permission', 'allRolePermission')->name('all.roles.permissions');
        Route::get('/admin/edit_all_role_permission/{id}', 'edit_all_role_permission')->name('admin.edit.role');
        Route::post('/admin/update_permission/{id}', 'admin_update_role')->name('roles.permission.updates');
        Route::get('/admin/admin_destroy_role/{id}', 'delete_role_permission')->name('admin.destroy.role');
    });
    
});
// Admin End middleware


// Frontend Product All routes
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'Product_details']);
Route::get('/seller/details/{id}', [IndexController::class, 'Seller_details'])->name('seller.details');
Route::get('/seller/all_shop_lists', [IndexController::class, 'all_shop_lists'])->name('seller.all_shop_lists');
Route::get('/product/category/{id}/{slug}', [IndexController::class, 'category']);
Route::get('/product/subcategory/{id}/{slug}', [IndexController::class, 'subcategory']);

// Route::get('/product/category/{id}', [IndexController::class, 'category_product'])->name('category.product');

// Route::post('',[WishlistController::class, 'Add_to_Wishlist']);
// All User Routes
Route::middleware(['auth','role:customer'])->group(function () {

    // All Wishlist routes
    Route::controller(WishlistController::class)->group(function(){
        
        Route::get('/user/wishlist', 'my_list')->name('user.wishlist');
        Route::get('/add-to-wishlist/{product_id}', 'Add_to_Wishlist')->name('user.add_product_wishlist');
        Route::get('/user/wishlist/get_all_list', 'get_wishlist_product');
        Route::get('/remove_product_wishlist/{id}','remove_product_wishlist')->name('user.remove_wishlist_product');

    });

     // All Add To Cart routes
    Route::controller(CartController::class)->group(function(){
        
        Route::get('cart','cartList')->name('cart.list');
        Route::post('cart','addToCart')->name('cart.store');
        Route::post('update-cart','updateCart')->name('cart.update');
        Route::post('remove','removeCart')->name('cart.remove');
        Route::post('clear','clearAllCart')->name('cart.clear');
        
        Route::get('/user/checkout', 'checkout')->name('user.checkout');
    });


    // All Checkout routes
    Route::controller(CheckoutController::class)->group(function(){
        Route::get('/shipping/district/ajax/{division_id}', 'show_district');
        Route::get('/shipping/state/ajax/{district_id}', 'show_state');
        Route::get('/user/checkout_store', 'checkout_store')->name('checkout.store');

        
    });
    // web.php
    // Route::post('/generate-control-number', 'PaymentController@generateControlNumber')->name('generateControlNumber');
    // Route::get('/control-number', [PaymentController::class, 'showControlNumberForm'])->name('controlNumberForm');
    Route::post('/generate-control-number', [PaymentController::class, 'generateControlNumber'])->name('generateControlNumber');


     // All Cash on delivery routes
     Route::controller(CashController::class)->group(function(){
        Route::post('/user/make_payment', 'cash_on_delivery')->name('cash.order'); 
    });

    

});
// User End middleware

// Frontend Coupons Apply
// Route::post('/coupon_apply', [CartController::class, 'applyCoupon']);
Route::post('/user/coupon_applied', [CouponController::class, 'coupon_apply'])->name('apply.coupon');
Route::controller(BlogsController::class)->group(function(){
    Route::get('/user/blogs', 'blogs')->name('user.blogs');
    Route::get('user/blog_details/{id}', 'details');  
});

Route::get('/contact_admin', [SiteSettingController::class, 'contactForm']);

// All Search  routes
Route::controller(SearchController::class)->group(function(){
    Route::post('/user/search', 'search_product')->name('product.search'); 
});
