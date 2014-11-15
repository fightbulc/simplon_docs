<?php

namespace Simplon\Docs\BlockContents;

use Camspiers\JsonPretty\JsonPretty;

/**
 * DocBlockCodeJson
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodeJson extends DocBlockContentAbstract
{
    /**
     * @var array
     */
    private $data = [];

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
        $code[] = '<pre><code class="json">';
        $code[] = (new JsonPretty())->prettify(json_encode($this->getData()));
        $code[] = '</code></pre>';

        return join('', $code);
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