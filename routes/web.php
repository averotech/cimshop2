<?php

use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\AdvertController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\InfoController;
use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SubscriperController;
use App\Http\Controllers\Site\AboutUSController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\ContactUSController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\MailingListController;
use App\Http\Controllers\Site\ShopController;
use App\Http\Controllers\Site\SiteProductController;
use App\Http\Controllers\Site\SiteFaqController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Omnipay\Omnipay;

use Futureecom\OmnipayTranzila\TranzilaGateway;


Route::group(['namespace' => 'Site', 'as' => 'site.', 'prefix' => request()->segment(1)], function () {
    Route::post('test',function (){

        $gateway = new TranzilaGateway();
        $gateway->setSupplier('');
//        $response = $gateway->authorize([
//            'amount' => '10.00',
//            'currency' => 'ILS',
//            'myid' => '12345678',
//        ])->send();
//
//        $url = null;
//        if ($response->isRedirect()) {
//            $url = $response->getRedirectUrl(); // https://direct.tranzila.com/terminal_name/iframe.php?tranmode=V&currency=1&sum=1.00
//        }

        $response = $gateway->purchase([
            'amount' => '10.00',
            'currency' => 'USD',
            'myid' => '122121',
            'card' => [
                'ccno' => '4444333322221111',
                'expdate' => '1225',
                'mycvv' => '1234',
            ],
        ])->send();

        return dd($response->getMessage());
        return view('site.test',compact('url'));
    });

    Route::get('change-language/{locale}', [ChangeLanguageController::class, 'changeLanguages'])->name('change.language');

    Route::get('/', [HomeController::class, 'index'])->name('index');


    Route::get('/products/details/{id}', [SiteProductController::class, 'details'])->name('product.details');
    Route::get('/products/', [SiteProductController::class, 'index'])->name('product.index');


    Route::get('/about-us', [AboutUSController::class, 'index'])->name('about_us.index');
    Route::get('/faqs', [SiteFaqController::class, 'index'])->name('faq.index');


    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');

    Route::post('mailing-list/store', [MailingListController::class, 'store']);

    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/products/data', [ShopController::class, 'data'])->name('shop.data');

    Route::get('/contact-us', [ContactUSController::class, 'index'])->name('contact_us.index');
    Route::post('contact-us/store', [ContactUSController::class, 'store']);


    Route::get('/test_1234567890', [Controller::class, 'test_1234567890']);
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => request()->segment(1)], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('/do-login', [AuthController::class, 'login'])->name('auth.do_login');
    Route::any('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

////Change Language To Arabic
//Route::get('change/lang/ar', [ReportController::class, 'changeLangeAr']);
//
////Change Language To English
//Route::get('change/lang/en', [ReportController::class, 'changeLangeEn']);
//
//
////Change Language To Arabic
//Route::get('site-change/lang/ar', [ReportController::class, 'siteChangeLangeAr']);
//
////Change Language To English
//Route::get('site-change/lang/en', [ReportController::class, 'siteChangeLangeEn']);

//Route::get('/', function () {
//
//    if(auth()->user() && (auth()->user()->is_admin == 1) ){
//        return redirect('/Dashboard');
//    }else{
//      //  return view('welcome');
//        return redirect('/login');
//    }
//
//});
//
//Route::get('/home', function () {
//
//  if(auth()->user() && (auth()->user()->is_admin == 1) ){
//      return redirect('/Dashboard');
//  }else{
//      return "لا تملك صلاحية الوصول للوحة التحكم";
//  }
//
//});


// Middleware Auth
Route::group(['middleware' => 'auth', 'prefix' => request()->segment(1) . '/' . 'dashboard', 'as' => 'admin.'], function () {

    Route::get('/', [OrderController::class, 'index'])->name('dashboard.index');

    //////////////////////// Product ////////////////////////

    //Show All
    Route::get('products', [ProductController::class, 'index'])->name('product.index');
    //Delete Product
    Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    //Create Product
    Route::get('addProduct', [ProductController::class, 'create'])->name('product.create');
    //Add Product
    Route::post('addProduct', [ProductController::class, 'store'])->name('product.store');
    //Edit Product
    Route::get('editProduct/{id}', [ProductController::class, 'edit'])->name('product.edit');
    //Update Product
    Route::post('editProduct/{id}', [ProductController::class, 'update'])->name('product.update');
    //Show Details Product
    Route::get('product/details/{id}', [ProductController::class, 'show'])->name('product.show');
    //Show All Critical Products
    Route::get('critical/products', [ProductController::class, 'criticalProducts'])->name('critical.index');
    //Show Other Info Of Product
    Route::get('product/otherInfo/{id}', [ProductController::class, 'showOtherInfo'])->name('product.other_info.info');
    //Delete Other Info Product
    Route::delete('product/info/{id}', [ProductController::class, 'destroyOtherInfo'])->name('product.other_info.delete');
    //Add Other Info Product
    Route::get('product/info/add/{id}', [ProductController::class, 'addOtherInfoView'])->name('other_info.add');
    //Add Other Info Product
    Route::post('product/info/add/{id}', [ProductController::class, 'addOtherInfo']);
    //////////////////////// Category ////////////////////////



    //////////////////////// Size ////////////////////////

    //Show All
    Route::get('sizes', [SizeController::class, 'index'])->name('size.index');
    //Delete Size
    Route::delete('size/{id}', [SizeController::class, 'destroy'])->name('size.delete');
    //Create Size
    Route::get('addSize', [SizeController::class, 'create'])->name('size.create');
    //Add Size
    Route::post('addSize', [SizeController::class, 'store'])->name('size.store');
    //Edit Size
    Route::get('editSize/{id}', [SizeController::class, 'edit'])->name('size.edit');
    //Update Size
    Route::post('editSize/{id}', [SizeController::class, 'update'])->name('size.update');



    //////////////////////// Category ////////////////////////

    //Show All
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');

    //Delete Category
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    //Create Category
    Route::get('addCategory', [CategoryController::class, 'create'])->name('category.create');

    //Add Category
    Route::post('addCategory', [CategoryController::class, 'store'])->name('category.store');

    //Edit Category
    Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    //Update Category
    Route::post('editCategory/{id}', [CategoryController::class, 'update'])->name('category.update');


  //////////////////////// Coupon ////////////////////////

    //Show All
    Route::get('coupons', [CouponController::class, 'index'])->name('coupon.index');

    //Delete Category
    Route::delete('coupon/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

    //Create Category
    Route::get('addCoupon', [CouponController::class, 'create'])->name('coupon.create');

    //Add Category
    Route::post('addCoupon', [CouponController::class, 'store'])->name('coupon.store');

    //Edit Category
    Route::get('editCoupon/{id}', [CouponController::class, 'edit'])->name('coupon.edit');

    //Update Category
    Route::post('editCoupon/{id}', [CouponController::class, 'update'])->name('coupon.update');


    //////////////////////// Message ////////////////////////

    //Show All
    Route::get('incomebox', [MessageController::class, 'index'])->name('incomebox.index');

    //Delete Message
    Route::delete('message/{id}', [MessageController::class, 'destroy'])->name('message.delete');


    //////////////////////// Faq ////////////////////////

    //Show All
    Route::get('faqs', [FaqController::class, 'index'])->name('faq.index');

    //Create Faq
    Route::get('addFaq', [FaqController::class, 'create'])->name('faq.create');

    //Add Faq
    Route::post('addFaq', [FaqController::class, 'store'])->name('faq.store');

    //Edit Faq
    Route::get('editFaq/{id}', [FaqController::class, 'edit'])->name('faq.edit');

    //Update Faq
    Route::post('editFaq/{id}', [FaqController::class, 'update'])->name('faq.update');

    //Delete Faq
    Route::delete('Faq/{id}', [FaqController::class, 'destroy'])->name('faq.delete');


    //////////////////////// Orders ////////////////////////

    //Show All
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');

    //Edit Order
    Route::get('editOrder/{id}', [OrderController::class, 'edit'])->name('order.edit');

    //Update Order
    Route::post('editOrder/{id}', [OrderController::class, 'update'])->name('order.update');

    //Delete Order
    Route::delete('order/{id}', [OrderController::class, 'destroy'])->name('order.delete');

    //Search Ajax In Order
    Route::get('findOrders', function () {
        $sorders = Order::where(['status' => request()->order_type])->get();
        //  return view('orders.search',['orders'=>$sorders]);
        return response()->json($sorders);
    });

    //////////////////////// Website Info ////////////////////////

    //Show
    Route::get('website_info', [InfoController::class, 'show'])->name('website_info.index');

    //Add Info
    Route::post('addInfo', [InfoController::class, 'add'])->name('website_info.add');


    //////////////////////// Notifications ////////////////////////

    //Show
    Route::get('notifications', [ReportController::class, 'showNotifications'])->name('notification.index');


    //Delete Notification
    Route::delete('notification/{id}', [ReportController::class, 'destroy']);


    //////////////////////// subscripers ////////////////////////

    //Show
    Route::get('subscripers', [SubscriperController::class, 'showsubscripers'])->name('subscriper.index');

    //Delete subscriper
    Route::delete('subscriper/{id}', [SubscriperController::class, 'destroy']);


    //////////////////////// Item ////////////////////////

    //Show All
    Route::get('items', [ItemController::class, 'index'])->name('item.index');

    //Delete Item
    Route::delete('item/{id}', [ItemController::class, 'destroy'])->name('item.delete');

    //Create Item
    Route::get('addItem', [ItemController::class, 'create'])->name('item.create');

    //Add Item
    Route::post('addItem', [ItemController::class, 'store'])->name('item.store');

    //Edit Item
    Route::get('editItem/{id}', [ItemController::class, 'edit'])->name('item.edit');

    //Update Item
    Route::post('editItem/{id}', [ItemController::class, 'update'])->name('item.update');


    //////////////////////// Adverts ////////////////////////

    //Show All
    Route::get('adverts', [AdvertController::class, 'index'])->name('advert.index');

    Route::get('sliders', [SliderController::class, 'index'])->name('slider.index');
    Route::delete('slider/{id}', [SliderController::class, 'destroy'])->name('slider.delete');
    Route::get('addSlider', [SliderController::class, 'create'])->name('slider.create');
    Route::post('addSlider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('editSlider/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('editSlider/{id}', [SliderController::class, 'update'])->name('slider.update');

    //Delete Advert
    Route::delete('advert/{id}', [AdvertController::class, 'destroy'])->name('advert.delete');

    //Create Advert
    Route::get('addAdvert', [AdvertController::class, 'create'])->name('advert.create');

    //Add Advert
    Route::post('addAdvert', [AdvertController::class, 'store'])->name('advert.store');

    //Edit Advert
    Route::get('editAdvert/{id}', [AdvertController::class, 'edit'])->name('advert.edit');

    //Update Advert
    Route::post('editAdvert/{id}', [AdvertController::class, 'update'])->name('advert.update');

});
