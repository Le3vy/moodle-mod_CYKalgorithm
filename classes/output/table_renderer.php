<?php

namespace mod_cykalgorithm\output;

use renderable;
use templatable;
use renderer_base;

class table_renderer implements renderable, templatable
{
    private $input;

    public function __construct($inputstring)
    {
        $this->input = preg_split('//u', trim($inputstring), -1, PREG_SPLIT_NO_EMPTY);
    }

    public function export_for_template(renderer_base $output)
    {
        $n = count($this->input);
        $rows = [];

        for ($l = 1; $l <= $n; $l++) {
            $cells = [];
            for ($i = 1; $i <= $n - $l + 1; $i++) {
                $cells[] = [
                    'id' => "cell_{$l}_{$i}",
                    'value' => ''
                ];
            }
            $rows[] = [
                'length' => $l,
                'cells' => $cells
            ];
        }

        return [
            'rows' => array_reverse($rows),
            'symbols' => $this->input
        ];
    }
}
