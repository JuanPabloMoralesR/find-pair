<?php

    class ArrayValidator
    {

        /**
         * @var array
         */
        private array $array;

        public function __construct(array $array)
        {
            $this->array = $array;
        }

        /**
         * @return bool
         */
        public function arrayOnlyContainsIntegers(): bool
        {
            return array_filter($this->array, 'is_int') === $this->array;
        }
    }
