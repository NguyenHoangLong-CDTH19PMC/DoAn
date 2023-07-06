<?php
function formatMoney($price = 0, $unit = 'vnđ', $html = false)
{
    $str = '';
    if ($price) {
        $str .= number_format($price, 0, ',', '.');
        if ($unit != '') {
            if ($html) {
                $str .= '<span>' . $unit . '</span>';
            } else {
                $str .= $unit;
            }
        }
    }
    return $str;
}
?>