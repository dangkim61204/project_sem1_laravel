<?php

namespace App\Rules;

use App\Models\PostCatalogue;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Request;

class CheckDescendantsRule implements ValidationRule
{

    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
   
        $flag = PostCatalogue::isCheckDescendant($this->id);
        if($flag == false) {
            $fail('Không thể chọn lại danh mục của chính nó');
        }
    }
}
