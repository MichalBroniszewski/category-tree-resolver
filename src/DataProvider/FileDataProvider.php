<?php
/**
 * user: michal
 * michal.broniszewski@picodi.com
 * 22.10.2020
 */

namespace App\DataProvider;

use JsonException;

class FileDataProvider
{
    private const PROJECT_ROOT = __DIR__ . '/../../';
    private const LIST_JSON_FILE_DIR = self::PROJECT_ROOT . 'list.json';
    private const TREE_JSON_FILE_DIR = self::PROJECT_ROOT . 'tree.json';

    /**
     * @return array
     * @throws JsonException
     */
    public function getList(): array
    {
        return json_decode(
            file_get_contents(self::LIST_JSON_FILE_DIR), true, 512, JSON_THROW_ON_ERROR
        );
    }

    /**
     * @return array
     * @throws JsonException
     */
    public function getTree(): array
    {
        return json_decode(
            file_get_contents(self::TREE_JSON_FILE_DIR), true, 512, JSON_THROW_ON_ERROR
        );
    }
}
