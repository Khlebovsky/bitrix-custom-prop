<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Web\Uri;
use Bitrix\Main\HttpRequest;

$sItemID = 'row_' . substr(md5($arParams['HTML_CONTROLS']['VALUE']), 0, 10);
$sFieldName = htmlspecialcharsbx($arParams['HTML_CONTROLS']['VALUE']);
$sValue = htmlspecialcharsbx($arParams['VALUE']['VALUE']);
?>

<div class="video-container">
    <input type="text" id="video-input" name="<?= $sFieldName ?>" value="<?= $sValue ?>" size="50">
    <iframe id="video-iframe" width="400" height="300" src="<?= $sValue ?>" <iframe width="560" height="315" src="https://www.youtube.com/embed/n9uCgUzfeRQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></iframe>
</div>

<style>
    .video-container {
        width: 400px;
        display: flex;
        flex-direction: column;
    }

    #video-iframe {
        margin-top: 20px;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById('video-input');
        const iframe = document.getElementById('video-iframe');

        document.getElementById('video-input').addEventListener('input', function (e) {
            iframe.setAttribute('src', input.value);
        })
    });
</script>
