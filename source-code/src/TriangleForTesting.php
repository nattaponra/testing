<?php

namespace nattaponra\testing;

class TriangleForTesting
{

    /**
     * @param $name
     * @param $a double
     * @param $b double
     * @param $c double
     * @return string
     */
    public function validateTriangle($name, $a, $b, $c)
    {
        $path = [];

        $isATriangle = False;                                       $path[] = "1";  # Node 1

                                                                    $path[] = "2";
        if (($a < $b + $c) && ($b < $a + $c) && ($c < $a + $b)) {                   # Node 2
            $isATriangle = True;                                    $path[] = "3";  # Node 3
        }

        if ($isATriangle) {                                         $path[] = "4";  # Node 4

            if ($a == $b && $b == $c) {                             $path[] = "5";  # Node 5
                $TriangleType = "Equilateral";                      $path[] = "6";  # Node 6

            } else if ($a != $b && $a != $c && $b != $c) {          $path[] = "5";  $path[] = "7"; # Node 7
                $TriangleType = "Scalene";                          $path[] = "8";  # Node 8

            } else {                                                $path[] = "5"; $path[] = "7"; $path[] = "9";  # Node 9
                $TriangleType = "Isosceles";                        $path[] = "10"; # Node 10
            }

        } else {                                                    $path[] = "4"; $path[] = "11"; # Node 11
            $TriangleType = "Not a Triangle";                       $path[] = "12"; # Node 12
        }
                                                                    $path[] = "13"; # Node 13
        /** Print Path */
        sort($path);

        print_r(PHP_EOL.$name.":".implode("-", $path));

        return $TriangleType;
    }

}