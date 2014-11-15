<?php

namespace Simplon\Docs;

use Simplon\Docs\BlockContents\DockBlockContentInterface;

/**
 * DocBlock
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlock
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var DockBlockContentInterface[]
     */
    private $contents = [];

    /**
     * @return DockBlockContentInterface[]
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param DockBlockContentInterface $dockBlockContent
     *
     * @return DocBlock
     */
    public function addContent(DockBlockContentInterface $dockBlockContent)
    {
        $this->contents[] = $dockBlockContent;

        return $this;
    }

    /**
     * @param DockBlockContentInterface[] $contents
     *
     * @return DocBlock
     */
    public function setContents(array $contents)
    {
        $this->contents = $contents;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return DocBlock
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}