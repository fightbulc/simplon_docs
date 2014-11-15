<?php

namespace Simplon\Docs;

use Camspiers\JsonPretty\JsonPretty;
use Simplon\Docs\BlockContents\DockBlockContentInterface;

/**
 * DocBlockCodeJson
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodeJson implements DockBlockContentInterface
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