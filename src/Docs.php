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
     * @var DocContent[]
     */
    private $contents = [];

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
    public function render()
    {
        $document = [];

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

                $sectionCounter = 0;

                foreach ($docTopic->getSections() as $docSection)
                {
                    if ($docSection->hasTitle())
                    {
                        $document[] = '<h3 class="section-title">' . (++$sectionCounter) . '. ' . $docSection->getTitle() . '</h3>';
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
                            $document[] = '#### ' . $docBlock->getTitle();

                            foreach ($docBlock->getContents() as $blockContent)
                            {
                                $document[] = $blockContent->render();
                            }
                        }
                    }

                    if ($docSection->hasTitle())
                    {
                        $document[] = '{{/collapse}}';
                    }
                }
            }

            $document[] = '<br><br>';
        }

        // render markdown to html
        $data = \Parsedown::instance()->text(join("\n\n", $document));

        // adjust table to work with bootstrap
        $data = str_replace('<table>', '<table class="table table-striped">', $data);

        // handle collapsable content
        $data = str_replace('{{#collapse}}', '<div style="display:none;background: rgba(204, 238, 255, .1);border-radius:4px;padding:20px 40px 0">', $data);
        $data = str_replace('{{/collapse}}', '</div>', $data);

        // return content
        return require __DIR__ . '/Template/template.phtml';
    }
}
