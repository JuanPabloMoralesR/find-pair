<?php

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
         * @return array|null
         */
        public function find(): ?array
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
