<?php

namespace Simplon\Docs\BlockContents;

/**
 * Interface DockBlockContentInterface
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
interface DockBlockContentInterface
{
    /**
     * @return bool
     */
    public function isCode();

    /**
     * @return string
     */
    public function render();
}