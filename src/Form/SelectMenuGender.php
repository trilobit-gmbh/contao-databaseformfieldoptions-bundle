<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-databaseformfieldoptions-bundle
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\Form;

use Contao\Controller;
use Contao\FormSelectMenu;
use Contao\StringUtil;

/**
 * Class FormSelectMenuCountry.
 */
class SelectMenuGender extends FormSelectMenu
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'form_selectGender';

    /**
     * FormSelectMenuGender constructor.
     *
     * @param null $arrAttributes
     */
    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->arrOptions = $this->getOptions();

        if ($this->value) {
            $this->varValue = Controller::replaceInsertTags($this->value);
        }
    }

    protected function getOptions(): array
    {
        $arrOptions = [];

        if ($this->addBlankOption) {
            $arrOptions = [[
                'type' => 'option',
                'value' => '',
                'selected' => $this->isSelected(['value' => '']),
                'label' => isset($arrData['eval']['blankOptionLabel']) ? $arrData['eval']['blankOptionLabel'] : '-',
            ]];
        }

        \Controller::loadDataContainer('tl_member');
        \Controller::loadLanguageFile('default');

        $arrGender = $GLOBALS['TL_DCA']['tl_member']['fields']['gender']['options'];

        foreach ($arrGender as $value) {
            $arrOptions[] = [
                'value' => $value,
                'label' => $GLOBALS['TL_LANG']['MSC'][$value],
            ];
        }

        /*
         * other custom options
         */
        $this->arrOptions = array_merge($arrOptions, StringUtil::deserialize($this->sourceCustomOptions, true));

        return parent::getOptions();
    }
}
