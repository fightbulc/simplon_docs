<?php

namespace Simplon\Docs;

use Simplon\Docs\BlockContents\DockBlockContentInterface;

/**
 * DocBlockContentText
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockContentText implements DockBlockContentInterface
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