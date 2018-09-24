<?php

namespace nattaponra\testing;

class Triangle
{
    /**
     * @param $a double
     * @param $b double
     * @param $c double
     * @return string
     */
    public function validateTriangle($a, $b, $c)
    {
        $isATriangle = False;                                       # 1

        if (($a < $b + $c) && ($b < $a + $c) && ($c < $a + $b)) {   # 2
            $isATriangle = True;                                    # 3
        }                                                           # 4

        if ($isATriangle) {                                         # 5

            if ($a == $b && $b == $c) {                             # 6
                return "Equilateral";                               # 7

            } else if ($a != $b && $a != $c && $b != $c) {          # 8
                return "Scalene";                                   # 9

            } else {                                                # 10
                return "Isosceles";                                 # 11
            }                                                       # 12

        } else {                                                    # 13
            return "Not a Triangle";                                # 14
        }                                                           # 15

    }
}