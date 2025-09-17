<?php

declare(strict_types=1);

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 */

namespace Trilobit\DatabaseformfieldoptionsBundle\DataContainer;

use Contao\Database;
use Contao\DataContainer;
use Contao\StringUtil;
use Contao\System;
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
        $tables = Database::getInstance()->listTables();
        $views = System::getContainer()->get('database_connection')->createSchemaManager()->listViews();

        if (!empty($views)) {
            $tables = array_merge($tables, array_keys($views));
            natsort($tables);
        }

        return array_values($tables);
    }

    public static function getAllTableFields(DataContainer $dc)
    {
        if (null === $dc->activeRecord->sourceTable || '' === $dc->activeRecord->sourceTable) {
            return [];
        }

        return Database::getInstance()->getFieldNames($dc->activeRecord->sourceTable);
    }

    protected function getDatabaseResult($field): ?Database\Result
    {
        $where = ('' !== $field->sourceWhere
            ? 'WHERE '.str_replace(['&lt;', '&gt;', '\''], ['<', '>', ''], $field->sourceWhere)
            : ''
        );
        $order = ('' !== $field->sourceOrder
            ? 'ORDER BY '.('' !== $field->sourceGroupBy ? $field->sourceGroupBy.',' : '').str_replace(['&lt;', '&gt;', '\''], ['<', '>', ''], $field->sourceOrder)
            : ''
        );

        try {
            return Database::getInstance()
                ->prepare('SELECT DISTINCT '.$field->sourceValue.','.$field->sourceLabel.('' !== $field->sourceGroupBy ? ','.$field->sourceGroupBy : '')." FROM $field->sourceTable $where $order")
                ->execute()
            ;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function prepareOptions($field): array
    {
        $options = [];
        $lastGroup = '';

        if ($field->addBlankOption) {
            $options = [[
                'value' => '',
                'label' => '-',
            ]];
        }

        $result = $this->getDatabaseResult($field);

        if (null === $result) {
            return $options;
        }

        while ($result->next()) {
            $currentGroup = $result->{$field->sourceGroupBy};

            if ('' !== $field->sourceGroupBy
                && $currentGroup !== $lastGroup
            ) {
                $options[] = [
                    'value' => $currentGroup,
                    'label' => $currentGroup,
                    'group' => '1',
                ];

                $lastGroup = $currentGroup;
            }

            $options[] = [
                'value' => html_entity_decode((string) $result->{$field->sourceValue}),
                'label' => $result->{$field->sourceLabel},
            ];
        }

        return array_merge(
            $options,
            StringUtil::deserialize($field->sourceCustomOptions, true)
        );
    }
}
