<?php
namespace GoingNext\LaravelStudio\Controllers;

use GoingNext\LaravelStudio\LaravelStudio;
use Illuminate\Http\Request;

class LaravelStudioController
{
    public function __invoke(LaravelStudio $studio) {
        $quote = $studio->justDoIt();

        return view('laravel_studio::index', compact('quote'));
    }
}