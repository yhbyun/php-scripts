<?php

require 'vendor/autoload.php';

use Spatie\Browsershot\Browsershot;
use Spatie\Image\Manipulations;

Browsershot::url('https://naver.com')
    ->windowSize(1920, 1080)
    ->fit(Manipulations::FIT_CONTAIN, 400, 400)
    ->save('./screenshot.jpg');


