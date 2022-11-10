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

        /**
         * @return bool
         */
        public function arrayValuesArePositive(): bool
        {
            return count(array_filter($this->array, function ($element) {
                    return $element <= 0;
                })) === 0;
        }

        /**
         * @return void
         */
        public function arrayHasUniqueValues(): bool
        {
            return count($this->array) === count(array_flip($this->array));
        }

        /**
         * @return bool
         */
        public function isValid(): bool
        {
            return $this->arrayOnlyContainsIntegers() && $this->arrayValuesArePositive()
                && $this->arrayHasUniqueValues();
        }

    }

