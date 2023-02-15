<?php

namespace ElvisLeite\RecordSetDatabase;

date_default_timezone_set('America/Sao_paulo');

class Connection
{
    /**
     * Hostname of the connection
     * @const 
     */
    const DB_HOSTNAME = 'localhost';

    /**
     * User of the connection
     * @const 
     */
    const DB_USERNAME = 'root';

    /**
     * Password of the connection
     * @const 
     */
    const DB_PASSWORD = '';

    /**
     * Database of the connection
     * @const 
     */
    const DB_DATABASE = 'test';

    /**
     * Charset of the connection
     * @const 
     */
    const DB_CHARSET = 'utf8';

    /**
     * Method responsible for connecting to the database
     * @return void
     */
    public static function setConnect()
    {
        try {
            $link = mysqli_connect(self::DB_HOSTNAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_DATABASE) or die(mysqli_connect_error());
            mysqli_set_charset($link, self::DB_CHARSET) or die(mysqli_error($link));
            return $link;
        } catch (mysqli_sql_exception $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    /**
     * *Method responsible for Disconnecting to the database
     * @param string $link
     * @return void
     */
    public function getDesconnect($link)
    {
        mysqli_close($link);
    }
}
