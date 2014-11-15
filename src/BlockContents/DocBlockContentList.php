<?php

namespace Simplon\Docs;

use Simplon\Docs\BlockContents\DockBlockContentInterface;

/**
 * DocBlockContentList
 * @package Simplon\Docs
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockContentList implements DockBlockContentInterface
{
    /**
     * @var array
     */
    private $bulletPoints = [];

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
        $lists = [];

        foreach ($this->bulletPoints as $bullet)
        {
            $lists[] = '- ' . trim($bullet);
        }

        return join("\n", $lists) . '<br>';
    }

    /**
     * @return array
     */
    public function getBulletPoints()
    {
        return $this->bulletPoints;
    }

    /**
     * @param string $bulletPoint
     *
     * @return DocBlockContentList
     */
    public function addBulletPoint($bulletPoint)
    {
        $this->bulletPoints[] = $bulletPoint;

        return $this;
    }

    /**
     * @param array $bulletPoints
     *
     * @return DocBlockContentList
     */
    public function setBulletPoints(array $bulletPoints)
    {
        $this->bulletPoints = $bulletPoints;

        return $this;
    }
}