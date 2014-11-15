<?php

namespace Simplon\Docs\BlockContents;

/**
 * DocBlockContentText
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockContentText extends DocBlockContentAbstract
{
    /**
     * @var array
     */
    private $lines = [];

    /**
     * @return bool
     */
    public function isCode()
    {
        return false;
    }

    /**
     * @return string
     */
    public function render()
    {
        return join('<br>', $this->lines);
    }

    /**
     * @param $line
     *
     * @return DocBlockContentText
     */
    public function addLine($line)
    {
        $this->lines[] = trim($line);

        return $this;
    }
}