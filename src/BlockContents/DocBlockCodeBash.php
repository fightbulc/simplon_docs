<?php

namespace Simplon\Docs\BlockContents;

/**
 * DocBlockCodeBash
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodeBash extends DocBlockContentAbstract
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
        $code[] = '<pre><code class="bash">';
        $code[] = join(" \\\n\t", $this->getData());
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