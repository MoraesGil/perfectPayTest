<?php
Route::redirect('/', '/sales');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
