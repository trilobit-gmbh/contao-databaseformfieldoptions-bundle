<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-databaseformfieldoptions-bundle
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\DataContainer;

use Contao\Database;
use Contao\DataContainer;
use Contao\StringUtil;
use Contao\Widget;

/**
 * Class Helper.
 *
 * @author trilobit GmbH <https://github.com/trilobit-gmbh>
 */
class Options extends Widget
{
    /**
     * @var null
     */
    private $field;

    public function generate(): string
    {
        return '';
    }

    public static function getAllTables()
    {
        return Database::getInstance()->listTables();
    }

    public static function getAllTableFields(DataContainer $dc)
    {
        if (null === $dc->activeRecord->sourceTable || '' === $dc->activeRecord->sourceTable) {
            return [];
        }

        return Database::getInstance()->getFieldNames($dc->activeRecord->sourceTable);
    }

    public function prepareOptions($field)
    {
        $table = $field->sourceTable;
        $group = $field->sourceGroupBy;
        $value = $field->sourceValue;
        $label = $field->sourceLabel;

        $where = ('' !== $field->sourceWhere ? 'WHERE '.$field->sourceWhere : '');
        $order = ('' !== $field->sourceOrder ? 'ORDER BY '.('' !== $group ? $group.',' : '').$field->sourceOrder : '');

        $result = Database::getInstance()->prepare('SELECT DISTINCT '.$value.','.$label.('' !== $group ? ','.$group : '')." FROM $table $where $order")
            ->execute();

        $arrOptions = [];
        $chkCurrentGroup = '';
        $currentGroup = '';

        if ($field->addBlankOption) {
            $arrOptions = [[
                'type' => 'option',
                'value' => '',
                'selected' => $field->isSelected(['value' => '']),
                'label' => '-',
            ]];
        }

        if (null !== $result) {
            $i = 0;

            while ($result->next()) {
                $blnGroup = false;

                // Prepare group
                $currentGroup = $result->{$group};

                if ('' !== $group
                    && $currentGroup !== $chkCurrentGroup
                ) {
                    $chkCurrentGroup = $currentGroup;
                    $blnGroup = true;
                }

                if ($blnGroup) {
                    $arrOptions[] = [
                        'value' => '',
                        'label' => $chkCurrentGroup,
                        'group' => '1',
                    ];
                }

                $arrOptions[] = [
                    'type' => 'option',
                    'name' => $field->strName,
                    'id' => $field->strId.'_'.$i,
                    'value' => html_entity_decode($result->{$value}),
                    'attributes' => $field->getAttributes(),
                    'label' => $result->{$label},
                ];

                ++$i;
            }
        }

        // other custom options
        return array_merge($arrOptions, StringUtil::deserialize($field->sourceCustomOptions, true));
    }
}
