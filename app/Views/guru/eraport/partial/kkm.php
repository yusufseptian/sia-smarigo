<?php
function getInterval($kkm)
{
    return (100 - $kkm) / 3;
}

function getGrade($kkm, $nilai)
{
    if ($nilai <= 100 && $nilai >= (100 - getInterval($kkm))) {
        return 'A';
    } elseif ($nilai < (100 - getInterval($kkm)) && $nilai >= (100 - getInterval($kkm) * 2)) {
        return 'B';
    } elseif ($nilai < (100 - getInterval($kkm) * 2) && $nilai >= (100 - getInterval($kkm) * 3)) {
        return 'C';
    }
    return 'D';
}
