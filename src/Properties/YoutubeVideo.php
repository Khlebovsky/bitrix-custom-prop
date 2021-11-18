<?php

namespace src\Properties;

use Bitrix\Iblock\PropertyTable;

class YoutubeVideo
{
    protected static string $sRegularExpression = '/^https:\/\/www\.youtube\.com\/embed\/.*$/';

    /**
     * Возвращает описание типа свойства
     *
     * @return array
     */
    public function GetDescription(): array
    {
        return [
            'USER_TYPE_ID' => 'youtube_video',
            'USER_TYPE' => 'STRING',
            'CLASS_NAME' => self::class,
            'DESCRIPTION' => 'Видео Youtube',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'ConvertToDB' => [self::class, 'ConvertToDB'],
            'ConvertFromDB' => [self::class, 'ConvertFromDB'],
            'GetPropertyFieldHtml' => [self::class, 'GetPropertyFieldHtml'],
            'CheckFields' => [self::class, 'CheckFields']
        ];
    }

    /**
     * @param $arProperty
     * @param $value
     *
     * @return mixed
     */
    public static function ConvertToDB($arProperty, $value)
    {
        return $value;
    }

    /**
     * @param $arProperty
     * @param $value
     * @param $format
     *
     * @return mixed
     */
    public static function ConvertFromDB($arProperty, $value, $format = '')
    {
        return $value;
    }

    /**
     * @param $arProperty
     * @param $value
     * @param $arHtmlControl
     *
     * @return mixed
     */
    public static function GetPropertyFieldHtml($arProperty, $value, $arHtmlControl)
    {
        global $APPLICATION;

        return $APPLICATION->IncludeComponent(
            'props:youtube_video',
            '',
            [
                'VALUE' => $value,
                'HTML_CONTROLS' => $arHtmlControl
            ]
        );
    }

    /**
     * @param $arProperty
     * @param $value
     *
     * @return array
     */
    public static function CheckFields($arProperty, $value)
    {
        $arResult = [];

        if (!preg_match(self::$sRegularExpression, $value['VALUE'])) {
            $arResult[] = 'Неверный формат ссылки на видео Youtube. Необходимый формат: https://www.youtube.com/embed/#ID#';
        }

        return $arResult;
    }
}