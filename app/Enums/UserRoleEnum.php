<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
// use Illuminate\Validation\Rules\Enum as RulesEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserRoleEnum extends Enum
{
   public const ADMIN = 0;
   public const APPLICANT = 1;
   public const HR = 2; 
}
 