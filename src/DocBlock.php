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
     * @var string
     */
    private $teaser;

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
     * @return bool
     */
    public function hasTeaser()
    {
        return empty($this->teaser) === false;
    }

    /**
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * @param string $teaser
     *
     * @return DocBlock
     */
    public function setTeaser($teaser)
    {
        $this->teaser = trim($teaser);

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
        $this->title = trim($title);

        return $this;
    }
}