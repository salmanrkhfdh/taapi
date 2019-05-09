<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/read', 'CustomerController@read');
Route::post('/update', 'CustomerController@update');
Route::post('/delete', 'CustomerController@delete');

//Quotation
Route::post('/quotation', 'QuotationController@createQuotation');
Route::get('/quotation', 'QuotationController@readQuotation');
Route::put('/quotation', 'QuotationController@updateQuotation');
Route::delete('/quotation', 'QuotationController@deleteQuotation');

//Product 
Route::post('/product', 'ProductController@createProduct');

Route::get('/product', 'ProductController@readProduct');
Route::put('/product', 'ProductController@updateProduct');
Route::delete('/product', 'ProductController@deleteProduct');

//Product Template Attribute Line
Route::post('/product-template-attribute-line', 'ProductTemplateAttributeLineController@createProductTemplateAttributeLine');
Route::get('/product-template-attribute-line', 'ProductTemplateAttributeLineController@readProductTemplateAttributeLine');
Route::put('/product-template-attribute-line', 'ProductTemplateAttributeLineController@updateProductTemplateAttributeLine');
Route::delete('/product-template-attribute-line', 'ProductTemplateAttributeLineController@deleteProductTemplateAttributeLine');

//Product Variant
Route::post('/product-variant', 'ProductVariantController@createProductVariant');
Route::post('/product-variant-photo', 'ProductVariantController@uploadProductPhoto');
Route::get('/product-variant', 'ProductVariantController@readProductVariant');
Route::put('/product-variant', 'ProductVariantController@updateProductVariant');
Route::delete('/product-variant', 'ProductVariantController@deleteProductVariant');

//Product Attributes
Route::post('/product-attributes', 'ProductAttributesController@createProductAttribute');
Route::get('/product-attributes', 'ProductAttributesController@readProductAttribute');
Route::put('/product-attributes', 'ProductAttributesController@updateProductAttribute');
Route::delete('/product-attributes', 'ProductAttributesController@deleteProductAttribute');

//Product Attribute Value
Route::get('/readProductAttributeValue', 'ProductAttributeValue@readProductAttributeValue');
Route::post('/createProductAttributeValue', 'ProductAttributeValue@createProductAttributeValue');
Route::post('/updateProductAttributeValue', 'ProductAttributeValue@updateProductAttributeValue');
Route::post('/deleteProductAttributeValue', 'ProductAttributeValue@deleteProductAttributeValue');

//Quotation Templates
Route::get('/quotation-templates', 'QuotationTemplatesController@readQuotationTemplates');
Route::post('/quotation-templates', 'QuotationTemplatesController@createQuotationTemplates');
Route::delete('/quotation-templates', 'QuotationTemplatesController@deleteQuotationTemplates');
Route::put('/quotation-templates', 'QuotationTemplatesController@updateQuotationTemplates');

//Sale order template line
Route::get('/sale-order-template-line','SaleOrderTemplateLineController@readSaleOrderTemplateLine');
Route::post('/sale-order-template-line','SaleOrderTemplateLineController@createSaleOrderTemplateLine');
Route::delete('/sale-order-template-line','SaleOrderTemplateLineController@deleteSaleOrderTemplateLine');
Route::put('/sale-order-template-line','SaleOrderTemplateLineController@updateSaleOrderTemplateLine');

//Sale order template option
Route::get('/sale-order-template-option','SaleOrderTemplateOptionController@readSaleOrderTemplateOption');
Route::post('/sale-order-template-option','SaleOrderTemplateOptionController@createSaleOrderTemplateOption');
Route::delete('/sale-order-template-option','SaleOrderTemplateOptionController@deleteSaleOrderTemplateOption');
Route::put('/sale-order-template-option','SaleOrderTemplateOptionController@updateSaleOrderTemplateOption');

//Order to invoice
Route::get('/orders-to-invoice','OrdersToInvoiceController@readOrdersToInvoice');

Route::get('/coba','SaleOrderController@coba');
Route::get('/read-sale-order','SaleOrderController@readSaleOrder');
Route::post('/create-sale-order','SaleOrderController@createSaleOrder');

Route::post('/login','UserController@login');

Route::get('/product-category','ProductCategoryController@readProductCategory');
Route::get('/tax','TaxController@readTax');
Route::get('/tax-vendor','TaxVendorController@readTaxVendor');
