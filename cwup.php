<?php
/**
 * Created by PhpStorm.
 * User: aryx
 * Date: 2019.11.10.
 * Time: 9:44
 */

define('SITEMAP_XMLS', array(
    'https://yoursite.com/sitemap.xml'
));

foreach (SITEMAP_XMLS as $sitemap) {

    try {

        echo "Trying to warm up $sitemap...\n";

        $sxml = simplexml_load_file(
            $sitemap,
            null,
            LIBXML_NOCDATA);

        foreach ($sxml as $urls) {
            foreach ($urls as $url) {
                if ($url->getName() == "loc") {
                    echo "Getting $url... ";
                    echo getURL($url) ? "[OK]" : "[ERR]";
                    echo "\n";
                }
            }
        }

    } catch (Exception $ex) {
        echo "Failed to warm up this site. Exception: " . $ex->getMessage() . "\n";
    }

}

echo "Cache is warmed up nicely!\n";


function getURL($url) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'CacheWarmUp v1'
    ]);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}