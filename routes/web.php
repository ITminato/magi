<?php
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdvancedsearchController;
use App\Http\Controllers\CategorytitleController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserreviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\Updatepasswordcontroller;
use App\Http\Controllers\ItemDraft;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\Contactcontroller;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('advanced_search', [AdvancedsearchController::class, 'index'])->name('advanced_search');
    Route::post('get_brand', [AdvancedsearchController::class, 'get_brand'])->name('get_brand');
    Route::get('search', [AdvancedsearchController::class, 'search'])->name('search');
    Route::post('order', [AdvancedsearchController::class, 'order'])->name('order');

Route::get('category_title/{id}', [CategorytitleController::class, 'category'])->name('category_title');

Route::get('brand/{id}', [CategorytitleController::class, 'brand'])->name('brand');

Route::get('series/{id}', [CategorytitleController::class, 'series'])->name('series');

Route::get('item/{id}', [ItemController::class, 'index'])->name('item');

Route::get('see_more/{id}', [AdvancedsearchController::class, 'see_more'])->name('see_more');

Route::get('user_review', [UserreviewController::class, 'index'])->name('user_review');

Route::get('product/{id}', [ProductController::class, 'index'])->name('product');

Route::get('product_buy_old/{id}', [AdvancedsearchController::class, 'product_buy_old'])->name('product_buy_old');

Route::get('product_buy_new/{id}', [AdvancedsearchController::class, 'product_buy_new'])->name('product_buy_new');

Route::get('sell_product/{id}', [ProductController::class, 'sell_product'])->name('sell_product');

// footer
Route::get('Privacy', function(){
    return view('policy.privacy');
})->name('Privacy');

Route::get('Terms_of_use', function(){
    return view('policy.Terms_of_use');
})->name('Terms_of_use');

Route::get('tokusho', function(){
    return view('policy.tokusho');
})->name('tokusho');

Route::get('guidelist', function(){ return view('policy.guidelist'); })->name('guidelist');
    Route::get('magi_guide', function(){
        return view('policy.guide.magi_guide');
    })->name('magi_guide');

Route::get('contact', [Contactcontroller::class, 'index'])->name('contact');
    Route::post('contact_save', [Contactcontroller::class, 'data_save'])->name('contact_save');

Route::get('consultation', function (){ return view('policy.consultation'); })->name('consultation');
    Route::post('consultation_save', [ConsultationController::class, 'index'])->name('consultation_save');

Route::get('purchase', function (){ return view('policy.purchase'); })->name('purchase');
    Route::post('purchase_save', [PurchaseController::class, 'purchase_save'])->name('purchase_save');


    Route::prefix('mypage')->group(function () {
        Route::get('/index', [MypageController::class,'index'])->name('mypage_index');

        Route::get('/items/new', [MypageController::class,'item_new']);
        Route::post('/item/getBrand', [MypageController::class,'getBrand']);
        Route::post('/item/newProduct', [MypageController::class,'create_item']);

        Route::get('/news', [MypageController::class,'news']);
        Route::get('/notices', [MypageController::class,'notices']);
        Route::get('/check_items', [MypageController::class,'check_items']);
        Route::get('/todos', [MypageController::class,'todos']);
        Route::get('/presenteds', [MypageController::class,'presenteds']);

        Route::resource('/item_drafts', ItemDraft::class);
        Route::post('/item/draft', [MypageController::class,'product_draft']);
        Route::post('/item/draft/update',[ItemDraft::class,'product_update']);
        Route::post('/product/delete',[MypageController::class,'product_delete']);

        Route::get('/product/transaction/{product_id}',[MypageController::class, 'transaction']);
        Route::post('/product/completeAction',[MypageController::class, 'completeAction']);

        Route::get('/user_keepings', [MypageController::class,'user_keepings']);
        Route::get('/trades', [MypageController::class,'trades']);
        Route::get('/tradings', [MypageController::class,'tradings']);
        Route::get('/sales', [MypageController::class,'sales']);
        Route::get('/points', [MypageController::class,'points']);
        Route::get('/applied_points', [MypageController::class,'applied_points']);
        //setting
        Route::get('/address/edit/', [MypageController::class,'address']);
        Route::post('/address/save', [MypageController::class,'save']);
        Route::get('/profile/edit', [MypageController::class,'profile']);
        Route::post('/profile/update', [MypageController::class,'profile_update']);
        Route::get('/credit_card/edit', [MypageController::class,'credit_card']);

        Route::get('/authentication/edit', [MypageController::class,'authenticationEdit']);
        Route::get('/telephone', [MypageController::class,'telephone']);
        Route::get('/product/stop/{id}',[MypageController::class, 'product_stop']);
        Route::post('/product/copy',[MypageController::class,'product_copy']);
    });
    Route::prefix('admin')->group(function () {
        Route::get('/category',[AdminController::class, 'category'])->name('admin_category');
        Route::post('/category/update',[AdminController::class, 'category_update']);
        Route::post('/category',[AdminController::class, 'category_create']);
        Route::post('/category/del',[AdminController::class, 'category_del']);

        Route::get('/brand',[AdminController::class, 'brand'])->name('admin_brand');
        Route::post('/brand/update',[AdminController::class, 'brand_update']);
        Route::post('/brand',[AdminController::class, 'brand_create']);
        Route::post('/brand/del',[AdminController::class, 'brand_del']);

        Route::get('/serie',[AdminController::class, 'serie'])->name('admin_serie');
        Route::post('/serie/update',[AdminController::class, 'serie_update']);
        Route::post('/serie',[AdminController::class, 'serie_create']);
        Route::post('/serie/del',[AdminController::class, 'serie_del']);

        Route::get('/acount',[AdminController::class,'acount']);
        Route::get('/acount/delete',[AdminController::class, 'acount_del']);
        Route::get('/acount/permit',[AdminController::class, 'acount_permit']);

        Route::resource('/news',NewsController::class);
    });

Route::post('password_update', [Updatepasswordcontroller::class, 'index'])->name('password_update');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
