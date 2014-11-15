<?php

namespace Simplon\Docs\BlockContents;

/**
 * DocBlockCodePhp
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockCodePhp extends DocBlockContentAbstract
{
    /**
     * @var string
     */
    private $file;

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
        $code = highlight_file($this->getFile(), true);
        $code = preg_replace('|\n*<span style="color: #0000BB">.*?</span>\n*|smi', '', $code);
        $code = preg_replace('#(<span.*?>|</span>|<code>|</code>)#smi', '', $code);

        return '<pre><code class="php">' . htmlspecialchars_decode($code) . '</code></pre>';
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     *
     * @return DocBlockCodePhp
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
}