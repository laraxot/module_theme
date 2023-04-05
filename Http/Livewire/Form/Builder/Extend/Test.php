<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder\Extend;

use Illuminate\Support\Facades\Route;
use Modules\Theme\Http\Livewire\Form\Builder\FormComponent;
use Modules\Theme\Http\Livewire\Form\Builder\Input;

class Test extends FormComponent
{
    public $title = 'Test';
    public $layout = 'layouts.card';

    public function fields()
    {
        return [
            Input::make('name', 'Name'),
            Input::make('email', 'Email')->type('email'),
            Input::make('password', 'Password')->type('password'),
        ];
    }

    public function route()
    {
        return Route::get('/login', static::class)
            ->name('login')
            ->middleware('guest');
    }
}
