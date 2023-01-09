<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\Form;

if (class_exists('FormCheckBox')) {
    class Checkbox extends \Contao\FormCheckBox
    {
    }
} else {
    class Checkbox extends \Contao\FormCheckbox
    {
    }
}
