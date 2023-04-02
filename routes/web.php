<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalagoPremioController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DimensioneController;
use App\Http\Controllers\ShippingCostController;
use App\Http\Controllers\SalesController;


use App\Http\Controllers\SizeController;

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

// index routing via Route feature
// Route::redirect('/','/');
// Route::redirect('/','/Dashboard');

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
// Route::view('/Dashboard', 'dashboard');

// Route::view('/', [App\Http\Controllers\userController::class, 'indexView']);
Route::get('dashboard', [App\Http\Controllers\userController::class, 'indexView'])->name('inicio');

/* ==================================Rustas del Frond================================= */


Route::group([], function(){
    Route::get('/', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');
});

Route::get('/offline', function () {
    return view('vendor/laravelpwa/offline');
});

Route::get('/login', function () {
    return redirect()->route('blog');
});

Route::group([], function($id){
    Route::get('producto/{id}', [App\Http\Controllers\frontend\ProductController::class, 'index'])->name('producto.show');
});


Route::group([], function(){
    Route::get('blog', [App\Http\Controllers\frontend\BlogController::class, 'index'])->name('blog');
    Route::get('blog/show', [App\Http\Controllers\frontend\BlogController::class, 'show'])->name('blog-show');

});


Route::group([], function(){
    Route::get('tienda', [App\Http\Controllers\frontend\TiendaController::class, 'index'])->name('tienda');
    Route::get('tienda/perfil', [App\Http\Controllers\frontend\TiendaController::class, 'profile'])->name('cuenta');
});


Route::group([], function(){
    Route::get('favoritos', [App\Http\Controllers\frontend\WishListController::class, 'index'])->name('favoritos');
});


Route::group([], function(){
    Route::get('carrito', [App\Http\Controllers\frontend\CartController::class, 'index'])->name('carrito');
    Route::post('carrito-add', [App\Http\Controllers\frontend\CartDetailController::class, 'store'])->name('carrito.store');
});


Route::group([], function(){
    Route::get('checkout', [App\Http\Controllers\frontend\CheckoutController::class, 'index'])->name('checkout');
    Route::post('factura', [App\Http\Controllers\frontend\CheckoutController::class, 'factura'])->name('factura');
});


Route::group([], function(){
    Route::get('categorias', [App\Http\Controllers\frontend\CategoryController::class, 'index'])->name('categorias');
    Route::get('categoria/show/{id}', [App\Http\Controllers\frontend\CategoryController::class, 'show'])->name('categorias.show');
});


/*  */

// notificationss push
Route::group(['middleware' => 'auth'],function(){
    Route::POST('store-token', [App\Http\Controllers\NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::POST('send-web-notification', [App\Http\Controllers\NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
    Route::GET('notification/list', [App\Http\Controllers\NotificationSendController::class, 'listNotification'])->name('notification.list');
    Route::GET('notification', [App\Http\Controllers\NotificationSendController::class, 'newNotification'])->name('notification.new');
});


// Route::prefix('Customers')->group(function () {
//     Route::redirect('/', '/Customers/List');
//     Route::view('List', 'customers/list');
//     Route::view('Detail', 'customers/detail');
// });
// roles
Route::get('/roles', [App\Http\Controllers\RolesController::class, 'roles'])->name('roles.index');
Route::get('/rolesEdit/{role}', [App\Http\Controllers\RolesController::class, 'rolesEdit'])->name('roles.edit');
Route::put('/rolesUpdate/{role}', [App\Http\Controllers\RolesController::class, 'rolesUpdate'])->name('roles.update');
Route::get('/rolesDelete{id}', [App\Http\Controllers\RolesController::class, 'rolesDelete'])->name('roles.delete');



// User
Route::get('/Usuarios', [App\Http\Controllers\userController::class, 'usuarios'])->name('user.index');
Route::get('/UsuariosEdit/{id}', [App\Http\Controllers\userController::class, 'usuariosEdit'])->name('user.edit');
Route::put('/UsuariosUpdate/{user}', [App\Http\Controllers\userController::class, 'usuariosUpdate'])->name('user.update');
Route::post('/UsuarioLogin', [App\Http\Controllers\userController::class, 'usuarioLogin'])->name('user.login');
Route::get('/logout',[App\Http\Controllers\userController::class, 'destroy'])->name('login.destroy');
Route::post('/register',[App\Http\Controllers\userController::class, 'store'])->name('register.store');
Route::get('/registro',[App\Http\Controllers\userController::class, 'create'])->name('register.crate');
Route::get('/userDelete{id}', [App\Http\Controllers\userController::class, 'usersDelete'])->name('user.delete');
Route::get('/nuevoUsuario', [App\Http\Controllers\userController::class, 'newUser'])->name('new.user');
Route::post('/storeUsuario', [App\Http\Controllers\userController::class, 'storeUser'])->name('store.user');
Route::put('/AddDireccionUsuario', [App\Http\Controllers\userController::class, 'newDireccionUsuario'])->name('newDireccion');


//Product
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/newProduct', [App\Http\Controllers\ProductController::class, 'newProduct'])->name('new.product');
Route::post('/storeProducto', [App\Http\Controllers\ProductController::class, 'store'])->name('store.product');
Route::get('/productEdit{id}', [App\Http\Controllers\ProductController::class, 'productEdit'])->name('product.edit');
Route::patch('/productUpdate{id}', [App\Http\Controllers\ProductController::class, 'productUpdate'])->name('product.update');
Route::patch('/productJsonEdit{id}', [App\Http\Controllers\ProductController::class, 'productJsonImages'])->name('pjson.images');

//Plans
Route::get('plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plan.index');
Route::get('plans/add', [App\Http\Controllers\PlanController::class, 'add'])->name('plan.add');
Route::post('plans/store', [App\Http\Controllers\PlanController::class, 'store'])->name('plan.store');
Route::get('plans/edit/{id}', [App\Http\Controllers\PlanController::class, 'edit'])->name('plan.edit');
Route::get('plans/delet/{id}', [App\Http\Controllers\PlanController::class, 'destroy'])->name('plan.delet');

Route::get('details', [App\Http\Controllers\DetailController::class, 'index'])->name('detail.index');


// Payment Gateway
Route::get('/paymentGateway', [App\Http\Controllers\PaymentGatewayController::class, 'index'])->name('paymentGateway.index');
Route::get('/paymentEdit{id}', [App\Http\Controllers\PaymentGatewayController::class, 'paymentEdit'])->name('payment.edit');
Route::patch('/paymentUpdate{id}', [App\Http\Controllers\PaymentGatewayController::class, 'paymentUpdate'])->name('payment.update');

// SEO
Route::get('/seo', [App\Http\Controllers\SeoController::class, 'index'])->name('seo.index');
Route::patch('/seoUpdate{id}', [App\Http\Controllers\SeoController::class, 'seoUpdate'])->name('seo.update');

//cupon
Route::get('/Coupons', [App\Http\Controllers\CouponController::class, 'index'])->name('cupon.index');
Route::post('/RedeemCoupon', [App\Http\Controllers\CouponController::class , 'canjearCupon'])->name('canjear.cupon');
Route::get('/cupondit{id}', [App\Http\Controllers\CouponController::class, 'cuponEdit'])->name('cupon.edit');
Route::patch('/cuponUpdate{id}', [App\Http\Controllers\CouponController::class, 'cuponUpdate'])->name('cupon.update');
Route::get('/addCoupon', [App\Http\Controllers\CouponController::class, 'cuponAdd'])->name('add.cupon');
Route::post('/newCoupon', [App\Http\Controllers\CouponController::class, 'newCupon'])->name('new.cupon');
Route::get('/evaluarCupon', [App\Http\Controllers\CouponController::class, 'evaluarCupon'])->name('evaluarCupon');


//Categorias
Route::get('/Categorias', [App\Http\Controllers\CategoriasController::class, 'index'])->name('cat.index');
Route::get('/editCategorias{id}', [App\Http\Controllers\CategoriasController::class, 'edit'])->name('cat.edit');
Route::get('/createCategorias', [App\Http\Controllers\CategoriasController::class, 'create'])->name('cat.create');
Route::post('/newCategorias', [App\Http\Controllers\CategoriasController::class, 'store'])->name('cat.store');
Route::patch('/CategoriasUpdate{id}', [App\Http\Controllers\CategoriasController::class, 'update'])->name('cat.update');

//subCategorias
Route::get('/subCategorias', [App\Http\Controllers\SubCategoriasController::class, 'index'])->name('subcat.index');
Route::get('/editsubCategorias{id}', [App\Http\Controllers\SubCategoriasController::class, 'edit'])->name('subcat.edit');
Route::get('/createsubCategorias', [App\Http\Controllers\SubCategoriasController::class, 'create'])->name('subcat.create');
Route::post('/newsubCategorias', [App\Http\Controllers\SubCategoriasController::class, 'store'])->name('subcat.store');
Route::patch('/subCategoriasUpdate{id}', [App\Http\Controllers\SubCategoriasController::class, 'update'])->name('subcat.update');

// Ciudades
Route::get('/Ciudades', [App\Http\Controllers\CiudadesController::class, 'index'])->name('city.index');
Route::get('/editCiudades{id}', [App\Http\Controllers\CiudadesController::class, 'edit'])->name('city.edit');
Route::get('/createCiudades', [App\Http\Controllers\CiudadesController::class, 'create'])->name('city.create');
Route::post('/newCiudades', [App\Http\Controllers\CiudadesController::class, 'store'])->name('city.store');
Route::patch('/CiudadesUpdate{id}', [App\Http\Controllers\CiudadesController::class, 'update'])->name('city.update');

//Fidelizacion
Route::get('/Fidelizacion', [App\Http\Controllers\CustomerLoyaltiesController::class, 'index'])->name('fidel.index');
Route::get('/editFidelizacion{id}', [App\Http\Controllers\CustomerLoyaltiesController::class, 'edit'])->name('fidel.edit');
Route::get('/createFidelizacion', [App\Http\Controllers\CustomerLoyaltiesController::class, 'create'])->name('fidel.create');
Route::post('/newFidelizacion', [App\Http\Controllers\CustomerLoyaltiesController::class, 'store'])->name('fidel.store');
Route::patch('/fidelizacionUpdate{id}', [App\Http\Controllers\CustomerLoyaltiesController::class, 'update'])->name('fidel.update');

//startPOPUP
Route::get('/spop', [App\Http\Controllers\StartPOPUPController::class, 'index'])->name('spop.index');
Route::PATCH('/spop', [App\Http\Controllers\StartPOPUPController::class, 'update'])->name('spop.update');


// Enviando Pedido
Route::post('/enviandoPedido', [App\Http\Controllers\SalesController::class, 'enviandoPedido'])->name('enviando.pedido');



//  Carrito de compras
// Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
// Route::post('/add', [CartController::class, 'add'])->name('cart.store');
// Route::post('/update', [CartController::class, 'update'])->name('cart.update');
// Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
// Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::post('/carrito', [App\Http\Controllers\CartController::class , 'add'] )->name('cart.agregar');
Route::post('/carrito/remover', [App\Http\Controllers\CartController::class , 'remover'] )->name('cart.remover');


Route::resource('shipping-costs', ShippingCostController::class);
Route::get('shipping-costs-total', [ShippingCostController::class, 'totalShippingCost'])->name('totalShippingCost');







Route::view('/Shipping', 'shipping');
Route::view('/Discount', 'discount');

Route::prefix('Products')->group(function () {
    Route::redirect('/', '/Products/List');
    Route::view('List', 'products/list');
    Route::view('Detail', 'products/detail');
});

Route::prefix('Orders')->group(function () {
    Route::view('Detail', 'orders/detail');
});

// Route::resource('orders', SalesController::class);
Route::group([], function(){
    Route::get('orders', [SalesController::class, 'index'])->name('index.orders');
    Route::get('orders/{id}', [SalesController::class, 'edit'])->name('edit.orders');
    Route::put('orders/update{id}', [SalesController::class, 'update'])->name('update.orders');
});

Route::resource('cart', CartController::class);




Route::prefix('Storefront')->group(function () {
    Route::redirect('/', '/Storefront/Home');
    Route::view('Home', 'storefront/home');
    Route::view('Filters', 'storefront/filters');
    Route::view('Categories', 'storefront/categories');
    Route::view('Detail', 'storefront/detail');
    Route::view('Cart', 'storefront/cart');
    Route::view('Checkout', 'storefront/checkout');
    Route::view('Invoice', 'storefront/invoice');
});

Route::prefix('Settings')->group(function () {
    Route::view('/', 'settings/index');
    Route::view('General', 'settings/general');
});

Route::get('/country/{id}/state', [App\Http\Controllers\CiudadesController::class, 'EstateByCountry']);
Route::get('/state/{id}/city', [App\Http\Controllers\CiudadesController::class, 'CityByState']);

Route::get('atributos', [App\Http\Controllers\AttributeController::class, 'index'])->name('atributos.index');

Route::resource('colors', ColorController::class);

Route::resource('brands', BrandController::class);

Route::resource('sizes', SizeController::class);

Route::resource('dimensiones', DimensioneController::class);
Route::resource('catalago-premios', CatalagoPremioController::class);

Route::get('evaluarPremio', [CatalagoPremioController::class, 'evaluarPremio'])->name('evaluarPremio');


// push notification

//make a push notification.


Route::get('/push',[App\Http\Controllers\PushController::class, 'push'])->name('push');

//store a push subscriber.
Route::post('/push',[App\Http\Controllers\PushController::class, 'store']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
