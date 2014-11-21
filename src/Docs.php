<?php

namespace Simplon\Docs;

/**
 * Docs
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class Docs
{
    /**
     * @var string
     */
    private $title = 'Simplon Docs';

    /**
     * @var DocContent[]
     */
    private $contents = [];

    /**
     * @var string
     */
    private $pathAssets;

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
     * @return Docs
     */
    public function setTitle($title)
    {
        $this->title = trim($title);

        return $this;
    }

    /**
     * @return DocContent[]
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param DocContent $content
     *
     * @return Docs
     */
    public function addContent(DocContent $content)
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * @param DocContent[] $contents
     *
     * @return Docs
     */
    public function setContents(array $contents)
    {
        $this->contents = $contents;

        return $this;
    }

    /**
     * @return string
     */
    public function getPathAssets()
    {
        return $this->pathAssets;
    }

    /**
     * @param string $pathAssets
     *
     * @return Docs
     */
    public function setPathAssets($pathAssets)
    {
        $this->pathAssets = rtrim($pathAssets, '/');

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $document = [];

        $document[] = '<h1 class="doc-title"><strong>' . $this->getTitle() . '</strong></h1>';

        foreach ($this->getContents() as $docContent)
        {
            $document[] = '<h1 class="content-title"><strong>' . $docContent->getTitle() . '</strong></h1>';

            foreach ($docContent->getTopics() as $docTopic)
            {
                $document[] = '<h2 class="topic-title">' . $docTopic->getTitle() . '</h2>';

                if ($docTopic->hasTeaser())
                {
                    $document[] = $docTopic->getTeaser() . '<br><br>';
                }

                if (count($docTopic->getSections()) > 0)
                {
                    $sectionCounter = 0;

                    foreach ($docTopic->getSections() as $docSection)
                    {
                        if ($docSection->hasTitle())
                        {
                            ++$sectionCounter;
                            $idHash = md5($sectionCounter . $docSection->getTitle());

                            $document[] = '<h3 id="' . $idHash . '" class="section-title">' . $sectionCounter . '. ' . $docSection->getTitle() . '</h3>';
                            $document[] = '{{#collapse}}';
                        }

                        if ($docSection->hasTeaser())
                        {
                            $document[] = $docSection->getTeaser();
                        }

                        $document[] = '<br>';

                        if ($docSection->hasBlocks())
                        {
                            foreach ($docSection->getBlocks() as $docBlock)
                            {
                                $document[] = '{{#block}}';
                                $document[] = '#### ' . $docBlock->getTitle();

                                if ($docBlock->hasTeaser() === true)
                                {
                                    $document[] = $docBlock->getTeaser();
                                }

                                foreach ($docBlock->getContents() as $blockContent)
                                {
                                    $lastContentHadTitle = false;

                                    if ($blockContent->hasTitle() === true)
                                    {
                                        $lastContentHadTitle = true;
                                        $document[] = '#####' . $blockContent->getTitle();
                                    }

                                    if ($blockContent->hasTeaser() === true)
                                    {
                                        $document[] = $blockContent->getTeaser();
                                    }

                                    $document[] = $blockContent->render();

                                    if ($blockContent->hasTitle() === false)
                                    {
                                        $document[] = '<br>';
                                    }
                                }

                                if ($lastContentHadTitle === true)
                                {
                                    $document[] = '<br>';
                                }

                                $document[] = '{{/block}}';
                            }
                        }

                        if ($docSection->hasTitle())
                        {
                            $document[] = '{{/collapse}}';
                        }
                    }
                }
            }

            $document[] = '<br><br>';
        }

        // render markdown to html
        $docs = \Parsedown::instance()->text(join("\n\n", $document));

        // adjust table to work with bootstrap
        $docs = str_replace('<table>', '<table class="table table-striped">', $docs);

        // handle block content
        $docs = str_replace('{{#block}}', '<div class="block">', $docs);
        $docs = str_replace('{{/block}}', '</div>', $docs);

        // handle collapsable content
        $docs = str_replace('{{#collapse}}', '<div style="display:none;background: rgba(204, 238, 255, .1);border-radius:4px;padding:20px 40px 0">', $docs);
        $docs = str_replace('{{/collapse}}', '</div>', $docs);

        // set assets path
        $pathAssets = $this->getPathAssets();

        // return content
        return require __DIR__ . '/Template/template.phtml';
    }
}
