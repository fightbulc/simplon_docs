<?php

namespace Simplon\Docs;

use Camspiers\JsonPretty\JsonPretty;

/**
 * DocBlockCodeCurlJson
 * @package Simplon\Docs
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
        $curl = ['CURL'];

        // add header
        foreach ($this->getHeaders() as $curlHeader)
        {
            $curl[] = "-H '{$curlHeader}'";
        }

        // add data
        foreach ($this->data as $data)
        {
            $json = preg_replace('/\n/', "\n\t", $jsonPretty->prettify(json_encode($data)));
            $curl[] = "-d '{$json}'";
        }

        // add url
        $curl[] = "'{$this->url}'";

        return '<pre><code class="json">' . join(" \\\n\t", $curl) . '</code></pre>';
    }
}