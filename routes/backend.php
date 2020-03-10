<?php 
/*Route::get('nuevo', function(){

	$user = new App\User;
	$user->name = 'Raul Suarez';
	$user->email = 'raul.suarez12@gmail.com';
	$user->password = Hash::make('admin');
	$user->save();
	return $user;
});*/
//Auth::routes();
Route::resource('users', 'UserController');
Route::get('getUsers', 'UserController@getUsers');
//dashboard
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//BRANDS
Route::get('brands', 'BrandController@index')->name('brands');
Route::get('getBrand', 'BrandController@getBrand')->name('getBrand');
Route::post('brands/save', 'BrandController@store')->name('brands.save');
Route::get('brands/registers/{brand}', 'BrandController@showBrand');
Route::delete('brand/{brand}', 'BrandController@destroy');
Route::get('brand/edit/{brand}', 'BrandController@edit');
Route::post('brand/{brand}', 'BrandController@update');

//CATEGORIES
Route::resource('categories', 'CategoryController');
Route::get('getCategory/{slug}', 'CategoryController@getCategory')->name('getCategory');
Route::post('category', 'CategoryController@store')->name('admin.category.store');
//CUSTOMERS
Route::resource('customers', 'ClientController');
Route::get('getCustomers', 'ClientController@getCustomers');

//ATTRIBUTES
Route::resource('attributes', 'AttributeController');
Route::get('getAttributes', 'AttributeController@getAttributes');

//TERMS
Route::resource('terms', 'TermController');
Route::get('getTerms', 'TermController@getTerms');

//PRODUCTS
Route::resource('products', 'ProductController');
Route::get('products/{product}/up', 'ProductController@up')->name('products.stock');
Route::post('products/{product}/upload', 'ProductController@upload');


//ORDERS
Route::resource('orders', 'OrderController');
//REPORTS
Route::get('reports', 'ReportController@index');
Route::get('daySales', 'ReportController@daySales');
Route::get('monthlySales', 'ReportController@monthlySales');