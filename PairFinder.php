<?php
    require_once 'ArrayValidator.php';

    class PairFinder
    {

        /**
         * @var array
         */
        private array $entries;

        /**
         * @var int
         */
        private int $desiredSum;

        /**
         * @var \ArrayValidator
         */
        private ArrayValidator $arrayValidator;

        /**
         * @param array $entries
         * @param int   $desiredSum
         */
        public function __construct(array $entries, int $desiredSum)
        {
            $this->entries = $entries;
            $this->desiredSum = $desiredSum;
            $this->arrayValidator = new ArrayValidator($this->entries);
        }

        /**
         * We are improving the time complexity by just taking the $desiredNum and subtract each entry of
         * the array, the result will be a number that if you add the entry we will get the desired value,
         * so we will check if that number is in the array. Note that if the entry is bigger than the desired sum,
         * we don't have to do this process since all values in the array are positive.
         *
         * @return array|null
         */
        public function find(): ?array
        {
            if (!$this->arrayValidator->isValid()) {
                return null;
            }
            $pairs = [];
            foreach ($this->entries as $entry)
            {
                if ($entry > $this->desiredSum)
                    continue;

                $valueToLookFor = $this->desiredSum - $entry;
                $valueIndexInEntries = array_search($valueToLookFor, $this->entries);

                if ($valueToLookFor !== false) {
                    $pairs[] = [$entry, $this->entries[$valueIndexInEntries]];
                }
            }

            return $pairs;
        }

        /**
         * This solution is not optimal mainly because it needs to loop the entire array twice,
         * so time complexity would be O(n2)
         *
         * @return array|null
         */
        public function findByBruteForce(): ?array
        {
            if (!$this->arrayValidator->isValid()) {
                return null;
            }
            $pairs = [];

            for($i = 0; $i < count($this->entries); $i ++){
                for ($j = count($this->entries) - 1; $j >= 0; $j--){
                    if (($this->entries[$i] + $this->entries[$j]) == $this->desiredSum)
                    {
                        $pair = [$this->entries[$i], $this->entries[$j]];
                        sort($pair);
                        $pairs[] = $pair;
                    }
                }
            }

            if (count($pairs)){
                usort($pairs, function($a, $b){
                    return $a[0] - $b[0];
                });

                return $pairs;
            }
            return null;
        }

    }
