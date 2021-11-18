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
    public function GetUserTypeDescription(): array
    {
        return [
            'USER_TYPE_ID' => 'youtube_video',
            'USER_TYPE' => 'YoutubeVideo',
            'CLASS_NAME' => __CLASS__,
            'DESCRIPTION' => 'Видео Youtube',
            'PROPERTY_TYPE' => PropertyTable::TYPE_STRING,
            'ConvertToDB' => [__CLASS__, 'ConvertToDB'],
            'ConvertFromDB' => [__CLASS__, 'ConvertFromDB'],
            'GetPropertyFieldHtml' => [__CLASS__, 'GetPropertyFieldHtml'],
            'CheckFields' => [__CLASS__, 'CheckFields']
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
                'VALUE' => $value['VALUE'],
                'HTML_VALUE' => $arHtmlControl['VALUE']
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

        if (!empty($value['VALUE']) && !preg_match(self::$sRegularExpression, $value['VALUE'])) {
            $arResult[] = 'Неверный формат ссылки на видео Youtube. Необходимый формат: https://www.youtube.com/embed/#ID#';
        }

        return $arResult;
    }
}