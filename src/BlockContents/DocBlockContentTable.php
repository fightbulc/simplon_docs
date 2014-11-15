<?php

namespace Simplon\Docs\BlockContents;

/**
 * DocBlockContentTable
 * @package Simplon\Docs\BlockContents
 * @author Tino Ehrich (tino@bigpun.me)
 */
class DocBlockContentTable extends DocBlockContentAbstract
{
    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $rows = [];

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
        if (empty($this->headers) === false)
        {
            $thead = [];
            $tsep = [];

            foreach ($this->headers as $th)
            {
                $thead[] = $th;
                $tsep[] = '---';
            }

            $table[] = "|" . join(" | ", $thead);
            $table[] = "|" . join(" | ", $tsep);
        }

        $tbody = [];

        foreach ($this->rows as $row)
        {
            $trow = [];

            foreach ($row as $td)
            {
                $trow[] = $td;
            }

            $tbody[] = "|" . join(" | ", $trow);
        }

        $table[] = join("\n", $tbody);

        return join("\n", $table);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     *
     * @return DocBlockContentTable
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param array $columns
     *
     * @return DocBlockContentTable
     */
    public function addRow(array $columns)
    {
        $this->rows[] = $columns;

        return $this;
    }

    /**
     * @param array $rows
     *
     * @return DocBlockContentTable
     */
    public function setRows(array $rows)
    {
        $this->rows = $rows;

        return $this;
    }
}