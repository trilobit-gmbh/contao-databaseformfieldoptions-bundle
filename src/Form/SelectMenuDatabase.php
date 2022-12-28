<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\Form;

use Contao\Controller;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;
use Trilobit\DatabaseformfieldoptionsBundle\DataContainer\Options;

/**
 * Class FormSelectMenuDatabase.
 */
class SelectMenuDatabase extends Select
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'form_selectDatabase';

    /**
     * FormSelectMenuDatabase constructor.
     *
     * @param null $arrAttributes
     */
    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->arrOptions = $this->getOptions();

        if ($this->value) {
            $version = (method_exists(ContaoCoreBundle::class, 'getVersion') ? ContaoCoreBundle::getVersion() : VERSION);

            if (version_compare($version, '5.0', '>=')) {
                $this->varValue = System::getContainer()->get('contao.insert_tag.parser')->replace($this->value);
            } else {
                $this->varValue = Controller::replaceInsertTags($this->value);
            }
        }
    }

    protected function getOptions(): array
    {
        $this->arrOptions = (new Options())->prepareOptions($this);

        return parent::getOptions();
    }
}
