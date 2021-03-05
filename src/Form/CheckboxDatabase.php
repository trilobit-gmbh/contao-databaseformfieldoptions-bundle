<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-databaseformfieldoptions-bundle
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\Form;

use Contao\Controller;
use Contao\FormCheckBox;
use Trilobit\DatabaseformfieldoptionsBundle\DataContainer\Options;

/**
 * Class FormCheckboxDatabase.
 */
class CheckboxDatabase extends FormCheckBox
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'form_checkboxDatabase';

    /**
     * FormCheckboxDatabase constructor.
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

    public function getOptions(): array
    {
        $this->arrOptions = (new Options())->prepareOptions($this);

        return parent::getOptions();
    }
}
