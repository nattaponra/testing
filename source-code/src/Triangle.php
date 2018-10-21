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
        }

        if ($isATriangle) {                                         # 4

            if ($a == $b && $b == $c) {                             # 5
                $TriangleType = "Equilateral";                      # 6

            } else if ($a != $b && $a != $c && $b != $c) {          # 7
                $TriangleType = "Scalene";                          # 8

            } else {                                                # 9
                $TriangleType = "Isosceles";                        # 10
            }

        } else {                                                    # 11
            $TriangleType = "Not a Triangle";                       # 12
        }

        return $TriangleType;                                       # 13
    }


}