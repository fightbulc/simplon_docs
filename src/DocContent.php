<?php

namespace Simplon\Docs;

/**
 * DocContent
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocContent
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var DocTopic[]
     */
    private $topics = [];

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
     * @return DocContent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return DocTopic[]
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * @param DocTopic $topic
     *
     * @return DocContent
     */
    public function addTopic(DocTopic $topic)
    {
        $this->topics[] = $topic;

        return $this;
    }

    /**
     * @param DocTopic[] $topics
     *
     * @return DocContent
     */
    public function setTopics(array $topics)
    {
        $this->topics = $topics;

        return $this;
    }
}