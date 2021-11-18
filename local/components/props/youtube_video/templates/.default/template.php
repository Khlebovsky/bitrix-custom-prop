<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$sItemID = 'row_' . substr(md5($arParams['HTML_VALUE']), 0, 10);
$sFieldName = htmlspecialcharsbx($arParams['HTML_VALUE']);
$sValue = htmlspecialcharsbx($arParams['VALUE']);
?>

<div class="video-container">
    <input type="text" id="video-input" name="<?= $sFieldName ?>" value="<?= $sValue ?>" size="50">
    <iframe id="video-iframe" width="400" height="300" src="<?= $sValue ?>" <iframe width="560" height="315" src="https://www.youtube.com/embed/n9uCgUzfeRQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></iframe>
</div>
