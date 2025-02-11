<?php

namespace Media\Api\Tools;

use Mtownsend\XmlToArray\XmlToArray;
use Spatie\ArrayToXml\ArrayToXml;

class Xml
{
    /**
     * @param $array
     * @return string
     */
    public static function arrayToXml($array): string
    {
        foreach ($array as $key => $value) {
            $value = (string) $value;
            $array[$key] = ['_cdata' => $value];
        }
        $arrayToXml = new ArrayToXml($array, 'xml', true, 'UTF-8');
        $arrayToXml->dropXmlDeclaration()->prettify();

        return $arrayToXml->toXml();
    }

    /**
     * @param $xml
     * @return array
     */
    public static function xmlToArray($xml): array
    {
        return XmlToArray::convert($xml);
    }
}