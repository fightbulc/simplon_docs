<?php

namespace Simplon\Docs;

/**
 * DocTopic
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocTopic
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
     * @var DocSection[]
     */
    private $sections;

    /**
     * @return DocSection[]
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param DocSection $sections
     *
     * @return DocTopic
     */
    public function addSection(DocSection $sections)
    {
        $this->sections[] = $sections;

        return $this;
    }

    /**
     * @param DocSection[] $sections
     *
     * @return DocTopic
     */
    public function setSections($sections)
    {
        $this->sections = $sections;

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
     * @return DocTopic
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
     * @return DocTopic
     */
    public function setTitle($title)
    {
        $this->title = trim($title);

        return $this;
    }
}