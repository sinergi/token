<?php
namespace Sinergi\Token;

class StringGenerator
{
    const UUID_VERSION_4 = 4;

    /**
     * @var array
     */
    private static $randomAlphanum = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'o', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U',
        'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @var array
     */
    private static $randomAlphanumUppercase = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
        'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @var array
     */
    private static $randomAlpha = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'o', 'j', 'k', 'l',
        'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D',
        'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W',
        'X', 'Y', 'Z'
    ];

    /**
     * @var array
     */
    private static $randomAlphaUppercase = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'O', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S',
        'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    /**
     * @var array
     */
    private static $randomHexa = [
        'A', 'B', 'C', 'D', 'E', 'F', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @var array
     */
    private static $randomNumeric = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    /**
     * @param string $prefix
     * @return string
     */
    public static function randomId($prefix = '')
    {
        return uniqid($prefix, true);
    }

    /**
     * @param int $length
     * @param bool $onlyUppercase
     * @return string
     */
    public static function randomAlnum($length, $onlyUppercase = false)
    {
        if ($onlyUppercase) {
            $chars = self::$randomAlphanumUppercase;
        } else {
            $chars = self::$randomAlphanum;
        }

        return self::rand($length, $chars);
    }

    /**
     * @param int $length
     * @param bool $onlyUppercase
     * @return string
     */
    public static function randomAlpha($length, $onlyUppercase = false)
    {
        if ($onlyUppercase) {
            $chars = self::$randomAlphaUppercase;
        } else {
            $chars = self::$randomAlpha;
        }

        return self::rand($length, $chars);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function randomNumeric($length)
    {
        $chars = self::$randomNumeric;
        return self::rand($length, $chars);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function randomHexa($length)
    {
        $chars = self::$randomHexa;
        return self::rand($length, $chars);
    }

    /**
     * @param int $version
     * @return string
     */
    public static function randomUuid($version = self::UUID_VERSION_4)
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    /**
     * @param int $length
     * @param array $chars
     * @return string
     */
    public static function rand($length, array $chars)
    {
        srand((float)microtime() * 1000000);

        $string = '';

        do {
            shuffle($chars);
            $string .= $chars[mt_rand(0, (count($chars) - 1))];
        } while (strlen($string) < $length);

        return $string;
    }
}