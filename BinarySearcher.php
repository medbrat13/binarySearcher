<?php

/**
 * Класс бинарного поиска
 */
class BinarySearcher
{
    public function searchInFile(string $file, string $searchKey): string
    {
        $handle = fopen($file, 'r');

        while (!feof($handle)) {
            $string = fgets($handle, 4000);
            $exploded = explode('\x0A', $string);

            array_pop($exploded);

            $array = [];

            foreach ($exploded as $key => $value) {
                $array[] = explode('\t', $value);
            }

            $start = 0;
            $end = count($array) - 1;

            while ($start <= $end) {
                $middlePoint = (int) ceil(($start + $end) / 2);
                $middleValue = $array[$middlePoint][0];
                $compareResult = strnatcasecmp($searchKey, $middleValue);

                if ($compareResult < 0) {
                    $end = $middlePoint - 1;
                } elseif ($compareResult > 0) {
                    $start = $middlePoint + 1;
                } else {
                    return $array[$middlePoint][1] . "\n";
                }
            }
        }

        return "undef\n";
    }
}