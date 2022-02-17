<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubscriperController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\AdvertController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




  //Product 
  Route::prefix('product')->group(function (){ 
        
    //Show 
    Route::get('show/{lang}', [ProductController::class, 'index']);

    //Details 
    Route::get('details/{id}/{lang}', [ProductController::class, 'show']);

    //Filter 
    Route::post('filter/{lang}', [ProductController::class, 'filter']);
    
  });


   //FAQ 
   Route::prefix('faq')->group(function (){ 

        //Show 
        Route::get('show/{lang}', [FaqController::class, 'index']);

    });

    
   //Message 
   Route::prefix('message')->group(function (){ 

    //Send Message To Admin 
    Route::post('send/{lang}', [MessageController::class, 'store']);

  });

  //Cart 
  Route::prefix('cart')->group(function (){ 

    //Show All Products In Cart 
    Route::get('show/{lang}', [CartController::class, 'index']);

    //Add Product To Cart 
    Route::post('add/{lang}', [CartController::class, 'store']);

    //Remove Product From Cart 
    Route::post('remove/{id}/{lang}', [CartController::class, 'remove']);

    //Destroy Cart 
    Route::delete('destroy/{lang}', [CartController::class, 'destroy']);

    //Down Count Product In Cart
    Route::post('down/{lang}', [CartController::class, 'downQtyProductInTheCart']);

    //Up Count Product In Cart
    Route::post('up/{lang}', [CartController::class, 'upQtyProductInTheCart']);


  });

   //Order 
   Route::prefix('order')->group(function (){

    //Confirm The Order
    Route::post('confirm/{lang}', [CartController::class, 'confirmOrder']);

   });

   //Info 
   Route::prefix('info')->group(function (){

    //Confirm The Order
    Route::get('show/{lang}', [AboutController::class, 'index']);

   });

  //Category 
  Route::prefix('category')->group(function (){

    //Show All Category
    Route::get('show/{lang}', [CategoryController::class, 'index']);

  });

  //Subscripe 
  Route::post('subscripe/{lang}', [SubscriperController::class, 'subscripe']);

  //Get All Item 
  Route::get('items/{lang}', [ItemController::class, 'index']);

  //Get All Adverts 
  Route::get('adverts/{lang}', [AdvertController::class, 'index']);



  

  









