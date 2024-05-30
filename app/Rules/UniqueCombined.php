<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueCombined implements ValidationRule
{

    protected $table;
    protected $firstColumn;
    protected $secondColumn;

    public function __construct($table, $firstColumn, $secondColumn)
    {
        $this->table = $table;
        $this->firstColumn = $firstColumn;
        $this->secondColumn = $secondColumn;
    }

    public function passes($attribute, $value)
    {
        $firstValue = request($this->firstColumn);

        // Convert both values to lowercase for case-insensitive comparison
        $firstValueLower = strtolower($firstValue);
        $valueLower = strtolower($value);

        return !DB::table($this->table)
            ->whereRaw('LOWER(' . $this->firstColumn . ') = ?', [$firstValueLower])
            ->whereRaw('LOWER(' . $this->secondColumn . ') = ?', [$valueLower])
            ->exists();
    }

    public function message()
    {
        return 'The combination of :attribute and ' . $this->firstColumn . ' already exists.';
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
