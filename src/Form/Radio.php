<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\Form;

if (class_exists('\Contao\FormRadioButton')) {
    class Radio extends \Contao\FormRadioButton
    {
    }
} else {
    class Radio extends \Contao\FormRadio
    {
    }
}
