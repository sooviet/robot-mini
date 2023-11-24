<?php

namespace App\Service\Decorator;

class GridDecorator
{
    function displayGridPosition(int $x, int $y): string
    {
        $element = '<table>';
        for ($row = 9; $row >= 0; $row--) {
            $element .= '<tr>';
            for ($col = 0; $col < 10; $col++) {
                $element .= '<td>';
                if ($row == $y && $col == $x) {
                    $element .= '<strong>&#129302;</strong>';
                } else {
                    $element .= $col . ', ' . $row;
                }
                $element .= '</td>';
            }
            $element .= '</tr>';
        }
        $element .= '</table>';
        return $element;
    }
}