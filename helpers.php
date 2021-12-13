<?php

use Spatie\Url\Url;

function url_query($url, array $parameters = [])
{
    $url = Url::fromString($url);

    foreach ($parameters as $key => $value) {
        if ($value === null) {
            $url = $url->withoutQueryParameter($key);
        } else {
            $url = $url->withQueryParameter($key, $value);
        }
    }

    return (string) $url;
}

function query(array $parameters = [])
{
    return url_query(request()->fullUrl(), $parameters);
}
