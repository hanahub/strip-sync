<?php

namespace App\StripSync\Validation\Rules;

class RequiredIf
{
    /**
     * The name of the rule.
     */
    protected $rule = 'required_if';

    /**
     * @var string
     */
    private $field;

    /**
     * @var
     */
    private $value;

    /**
     * Create a new in rule instance.
     *
     * @param $field
     * @param $value
     */
    public function __construct(string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * Convert the rule to a validation string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->rule . ':' . $this->field . ',' . $this->value;
    }
}