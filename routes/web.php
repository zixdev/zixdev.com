<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//

Route::get('test', function () {

    return site()->seo;
});

Route::get('forms', function () {
    $forms = Zix\Core\Entities\Forms\Form::with(['fields' => function($q) {
        return $q->orderBy('field_to_form.order');
    }])

        ->get();


//    return $forms;
    return view('forms', compact('forms'));
});

Route::post('forms', function () {
    $form = Zix\Core\Entities\Forms\Form::where('slug', request()->get('form_name'))->first();
    $rules = [];
    foreach ($form->fields as $field) {
        $r = '';
        foreach($field->rules as $rule) {
            $r .= $rule->name.':'.$rule->value.'|';
        }
        $rules[$field->name] = $r;
    }
    $validator = Validator::make(request()->all(), $rules);
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // 1 . create new response form to that form id
    $response = $form->responses()->create([
        'identifier' => $form->slug . '-' . time(),
        'site_id' => 1
    ]);

    $fileds = [];

    foreach ($form->fields as $field) {
        $fileds[] = [
            'form_field_id' => $field->id,
            'value' => request()->get($field->name)
        ];
    }

    foreach ($fileds as $field) {
        $response->fields()->create($field);
    }
    $forms = Zix\Core\Entities\Forms\Form::all();
    return view('forms', compact('forms'));
});
Route::get('forms/table', function () {
    $forms = Zix\Core\Entities\Forms\Form::all();
    return view('form-table', compact('forms'));
});
////
//Auth::routes();
////
//Route::get('/home', 'HomeController@index');
