<?php

require 'vendor/autoload.php';

use HeadlessChromium\BrowserFactory;

$html = fetch('https://www.google.com/');
echo $html;

/**
 * Feach html of the specified url
 *
 * @param string $url
 * @return string html
 */
function fetch($url)
{
    $browserFactory = new BrowserFactory('/Applications/Google\ Chrome.app/Contents/MacOS/Google\ Chrome');

    // starts headless chrome
    $browser = $browserFactory->createBrowser();

    // creates a new page and navigate to an url
    $page = $browser->createPage();
    $page->navigate($url)->waitForNavigation();

    // evaluate script in the browser
    $evaluation = $page->evaluate('document.documentElement.innerHTML');

    // wait for the value to return and get it
    $html = $evaluation->getReturnValue();

    // get page title
    $pageTitle = $page->evaluate('document.title')->getReturnValue();

    // screenshot - Say "Cheese"! 😄
    $page->screenshot()->saveToFile('./screen.png');

    $browser->close();

    return $html;
}
