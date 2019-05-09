<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/odoo','SaleOrderController@coba');
Route::post('/create','OdooController@createSaleOrder');

Route::get('/product','ProductController@readProduct');
Route::get('/product-variant','ProductVariantController@readProductVariant');
Route::get('/product-attributes','ProductAttributesController@readProductAttribute');
Route::get('/readProductAttributeValue','ProductAttributeValue@readProductAttributeValue');
Route::get('/quotation-templates','QuotationTemplatesController@readQuotationTemplates');
Route::get('/sale-order-template-line','SaleOrderTemplateLineController@readSaleOrderTemplateLine');
Route::get('/sale-order-template-option','SaleOrderTemplateOptionController@readSaleOrderTemplateOption');



Route::get('/quotation', 'QuotationController@readQuotation');
Route::post('/create', 'odoo@create');
Route::get('/delete', 'odoo@delete');
Route::get('/update', 'odoo@update');