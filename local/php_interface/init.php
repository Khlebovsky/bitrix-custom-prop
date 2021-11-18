<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\EventManager;
use src\Properties\YoutubeVideo;

include_once('../../vendor/autoload.php');

$oEventManager = EventManager::getInstance();

$oEventManager->addEventHandler(
    'iblock',
    'OnIBlockPropertyBuildList',
    [
        YoutubeVideo::class,
        'GetUserTypeDescription'
    ]
);
