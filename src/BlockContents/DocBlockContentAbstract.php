<?php

namespace Simplon\Docs\BlockContents;

/**
 * DocBlockContentAbstract
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
abstract class DocBlockContentAbstract implements DockBlockContentInterface
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $teaser;

    /**
     * @return string
     */
    public function getTeaser()
    {
        return trim($this->teaser);
    }

    /**
     * @return bool
     */
    public function hasTeaser()
    {
        return $this->getTeaser() !== '';
    }

    /**
     * @param string $teaser
     *
     * @return static
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return trim($this->title);
    }

    /**
     * @return bool
     */
    public function hasTitle()
    {
        return $this->getTitle() !== '';
    }

    /**
     * @param string $title
     *
     * @return static
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}