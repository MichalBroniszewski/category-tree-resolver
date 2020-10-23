<?php
/**
 * user: michal
 * michal.broniszewski@picodi.com
 * 22.10.2020
 */

namespace App;

class TreeResolver
{
    public function assignName(array $tree, array &$list, string &$translationKey): array
    {
        $result = [];
        foreach ($tree as $node) {
            $node['name'] = $this->getCategoryName((int) $node['id'], $list, $translationKey);
            if ($node['children']) {
                $node['children'] = $this->assignName($node['children'], $list, $translationKey);
            }
            $result[] = $node;
        }

        return $result;
    }

    private function getCategoryName(int $id, array $list, string $translationKey): ?string
    {
        foreach ($list as $category) {
            if ((int) $category['category_id'] === $id) {
                return array_key_exists($translationKey, $category['translations']) ?
                    $category['translations'][$translationKey]['name'] :
                    null;
            }
        }

        return null;
    }
}
