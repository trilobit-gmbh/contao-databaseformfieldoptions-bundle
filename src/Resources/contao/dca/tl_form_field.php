<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 */

use Trilobit\DatabaseformfieldoptionsBundle\DataContainer\Options;

$customSelect = str_replace('{options_legend},options;', '{options_legend},sourceTable,sourceValue,sourceLabel,sourceGroupBy,sourceWhere,sourceOrder,addBlankOption,sourceCustomOptions;', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select']);

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['selectCountry'] = str_replace('{options_legend},options;', '{options_legend},addBlankOption,sourceCustomOptions;', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select']);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['selectLanguage'] = str_replace('{options_legend},options;', '{options_legend},addBlankOption,sourceCustomOptions;', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select']);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['selectGender'] = str_replace('{options_legend},options;', '{options_legend},addBlankOption,sourceCustomOptions;', $GLOBALS['TL_DCA']['tl_form_field']['palettes']['select']);
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['selectDatabase'] = $customSelect;
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['checkboxDatabase'] = $customSelect;
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['radioDatabase'] = $customSelect;

/*
 * Table tl_article
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields'] = array_merge(
    $GLOBALS['TL_DCA']['tl_form_field']['fields'],
    [
        'sourceTable' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'select',
            'options_callback' => [Options::class, 'getAllTables'],
            'eval' => ['mandatory' => true, 'submitOnChange' => true, 'includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'clr w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'sourceGroupBy' => [
            'exclude' => true,
            'inputType' => 'select',
            'options_callback' => [Options::class, 'getAllTableFields'],
            'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'clr w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'sourceValue' => [
            'exclude' => true,
            'inputType' => 'select',
            'options_callback' => [Options::class, 'getAllTableFields'],
            'eval' => ['mandatory' => true, 'chosen' => true, 'tl_class' => 'clr w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'sourceLabel' => [
            'exclude' => true,
            'inputType' => 'select',
            'options_callback' => [Options::class, 'getAllTableFields'],
            'eval' => ['mandatory' => true, 'chosen' => true, 'tl_class' => 'w50'],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'sourceWhere' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['allowHtml' => false, 'decodeEntities' => true, 'tl_class' => 'clr w50'],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'sourceOrder' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => ['tl_class' => 'w50'],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'addBlankOption' => [
            'exclude' => true,
            'inputType' => 'checkbox',
            'eval' => ['tl_class' => 'clr long'],
            'sql' => "char(1) NOT NULL default ''",
        ],
        'sourceCustomOptions' => $GLOBALS['TL_DCA']['tl_form_field']['fields']['options'],
    ]
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['sourceCustomOptions']['eval']['mandatory'] = false;
