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

        public function __construct(array $entries, int $desiredSum)
        {
            $this->entries = $entries;
            $this->desiredSum = $desiredSum;
            $this->arrayValidator = new ArrayValidator($this->entries);
        }

    }
