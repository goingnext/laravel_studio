<?php

namespace GoingNext\LaravelStudio;

use Illuminate\Support\Facades\Http;

class LaravelStudio {
    public function justDoIt() {
        //$response = Http::get('https://inspiration.goprogram.ai/');

       // return $response['quote'] . ' -' . $response['author'];
       return 'Hello studio';
    }
}