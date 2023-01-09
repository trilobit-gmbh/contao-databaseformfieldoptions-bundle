<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 */

use Trilobit\DatabaseformfieldoptionsBundle\Form\CheckboxDatabase;
use Trilobit\DatabaseformfieldoptionsBundle\Form\RadioDatabase;
use Trilobit\DatabaseformfieldoptionsBundle\Form\SelectMenuCountry;
use Trilobit\DatabaseformfieldoptionsBundle\Form\SelectMenuDatabase;
use Trilobit\DatabaseformfieldoptionsBundle\Form\SelectMenuGender;
use Trilobit\DatabaseformfieldoptionsBundle\Form\SelectMenuLanguage;

$GLOBALS['TL_FFL']['selectCountry'] = SelectMenuCountry::class;
$GLOBALS['TL_FFL']['selectLanguage'] = SelectMenuLanguage::class;
$GLOBALS['TL_FFL']['selectGender'] = SelectMenuGender::class;
$GLOBALS['TL_FFL']['selectDatabase'] = SelectMenuDatabase::class;
$GLOBALS['TL_FFL']['checkboxDatabase'] = CheckboxDatabase::class;
$GLOBALS['TL_FFL']['radioDatabase'] = RadioDatabase::class;
