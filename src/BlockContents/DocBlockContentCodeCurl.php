<?php

namespace Simplon\Docs;

use Simplon\Docs\BlockContents\DockBlockContentInterface;

/**
 * DocBlockCodeCurl
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodeCurl implements DockBlockContentInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @return bool
     */
    public function isCode()
    {
        return true;
    }

    /**
     * @return string
     */
    public function render()
    {
        // start curl
        $curl = ['CURL'];

        // add headers
        foreach ($this->getHeaders() as $curlHeader)
        {
            $curl[] = "-H '{$curlHeader}'";
        }

        // add data
        foreach ($this->data as $data)
        {
            $curl[] = "-d '{$data}'";
        }

        // add url
        $curl[] = "'{$this->url}'";

        return '<pre><code class="bash">' . join(" \\\n\t", $curl) . '</code></pre>';
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $header
     *
     * @return DocBlockCodeCurl
     */
    public function addHeader($header)
    {
        $this->headers[] = $header;

        return $this;
    }

    /**
     * @param array $headers
     *
     * @return DocBlockCodeCurl
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return DocBlockCodeCurl
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     *
     * @return DocBlockCodeJson
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}