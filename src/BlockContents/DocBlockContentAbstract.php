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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return static
     */
    public function setTitle($title)
    {
        $this->title = trim($title);

        return $this;
    }
}