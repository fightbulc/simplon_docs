<?php

namespace Simplon\Docs\BlockContents;

use Camspiers\JsonPretty\JsonPretty;

/**
 * DocBlockCodeCurlJson
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodeCurlJson extends DocBlockCodeCurl
{
    /**
     * @return string
     */
    public function render()
    {
        $jsonPretty = new JsonPretty();

        // start curl
        $curl = [
            "CURL '{$this->url}'"
        ];

        // add header
        foreach ($this->getHeaders() as $curlHeader)
        {
            $curl[] = "-H '{$curlHeader}'";
        }

        // add data
        $json = preg_replace('/\n/', "\n\t", $jsonPretty->prettify(str_replace('\/', '/', json_encode($this->data))));
        $curl[] = "-d '{$json}'";

        return '<pre><code class="json">' . join(" \\\n\t", $curl) . '</code></pre>';
    }
}