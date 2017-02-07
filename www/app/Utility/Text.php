<?php

namespace App\Utility;

/**
 * Text:
 *
 * @author John Alex Ladra <heyitsme@johnalexladra.com>
 * @since 1.0.1
 */
class Text {

    /** @var array */
    private static $_texts = [];

    /**
     * Get:
     * @access public
     * @param string $key
     * @param array $data [optional]
     * @return string
     * @since 1.0.1
     */
    public static function get($key, array $data = []) {
        if (empty(self::$_texts)) {
            $texts = Config::get("TEXTS");
            self::$_texts = is_array($texts) ? $texts : [];
        }
        if (array_key_exists($key, self::$_texts)) {
            $text = self::$_texts[$key];
            foreach ($data as $search => $replace) {
                $text = str_replace($search, $replace, $text);
            }
            return $text;
        }
        return "";
    }

}
