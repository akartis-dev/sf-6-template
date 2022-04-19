<?php

/**
 * @author <akartis-dev>
 */

namespace App\Annotations;

use Attribute;
use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target({"METHOD", "PROPERTY"})
 */
#[Attribute]
class AppTranslationField
{
}
