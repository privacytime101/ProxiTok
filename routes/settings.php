<?php

use Helpers\Following;
use Helpers\Settings;
use Helpers\Misc;
use Steampixel\Route;

Route::add("/settings", function () {
    $latte = Misc::latte();
    $latte->render(Misc::getView('settings'), ["proxy_elements" => Settings::PROXY, "following" => Following::get()]);
});

Route::add("/settings/proxy", function () {
    if (in_array(Settings::PROXY, $_POST)) {
        foreach (Settings::PROXY as $proxy_element) {
            Settings::set($proxy_element, $_POST[$proxy_element]);
        }
    }
    http_response_code(302);
	header('Location: ./home');
}, 'POST');


Route::add("/settings/following", function () {
    $following = Following::get();
    if (!isset($_POST['mode']) || empty($_POST['mode'])) {
        die('You need to send a mode');
    }

    switch ($_POST['mode']) {
        case 'add':
            // Add following
            array_push($following, $_POST['account']);
            break;
        case 'remove':
            // Remove following
            $index = array_search($_POST['account'], $following);
            if ($index !== false) {
                unset($following[$index]);
            }
            break;
        default:
            // Invalid
            die('Invalid mode');
    }

    // Build string
    $following_string = implode(',', $following);
    Settings::set('following', $following_string);
    header('Location: ../settings');
}, 'POST');
