<?php

namespace Simplon\Docs\BlockContents;

/**
 * DocBlockCodeCurl
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodeCurl extends DocBlockContentAbstract
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
        $curl[] = "-d '{($this->data}'";

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
     * @return static
     */
    public function addHeader($header)
    {
        $this->headers[] = $header;

        return $this;
    }

    /**
     * @param array $headers
     *
     * @return static
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
     * @return static
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
     * @return static
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}