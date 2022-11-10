<?php
    require_once 'PairFinder.php';

    var_dump((new PairFinder([1,2,3,4], 5))->find());
    var_dump((new PairFinder([2,5,1,3,4,6,7], 8))->find());
    var_dump((new PairFinder([3,3,5,6,7] , 11))->find());
    var_dump((new PairFinder([4,2,8,25], 26))->find());

    print("<pre>".print_r((new PairFinder([1,2,3,4], 5))->find(),true)."</pre>");
    print("<pre>".print_r((new PairFinder([2,5,1,3,4,6,7], 8))->find(),true)."</pre>");
    print("<pre>".print_r((new PairFinder([3,3,5,6,7] , 11))->find(),true)."</pre>");
    print("<pre>".print_r((new PairFinder([4,2,8,25], 26))->find(),true)."</pre>");
