<?php

namespace Simplon\Docs;

/**
 * DocSection
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocSection
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
     * @var DocBlock[]
     */
    private $blocks = [];

    /**
     * @return bool
     */
    public function hasBlocks()
    {
        return empty($this->blocks) === false;
    }

    /**
     * @return DocBlock[]
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @param DocBlock $block
     *
     * @return DocSection
     */
    public function addBlocks(DocBlock $block)
    {
        $this->blocks[] = $block;

        return $this;
    }

    /**
     * @param DocBlock[] $blocks
     *
     * @return DocSection
     */
    public function setBlocks(array $blocks)
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * @return string
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
     * @return DocSection
     */
    public function setTeaser($teaser)
    {
        $this->teaser = trim($teaser);

        return $this;
    }

    /**
     * @return bool
     */
    public function hasTitle()
    {
        return empty($this->title) === false;
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
     * @return DocSection
     */
    public function setTitle($title)
    {
        $this->title = trim($title);

        return $this;
    }
}