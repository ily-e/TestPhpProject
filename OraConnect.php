<?php


class OraConnect
{
    /**
     * @return false|resource
     */

    private static ?OraConnect $instance = null; // инстанс под синглетон
    private $oraconnect; // переменная под коннект

    // конструктор
    private function __construct()
    {
        // имя пользователя
        $userName = 'parus';
        // пароль
        $userPassword = 'parusina';
        // строка подключения
        $tnsName = '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.84.33)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=YAPO1)))';
        // Подключаемся
        $this->oraconnect = oci_connect($userName,$userPassword,$tnsName);

        // проверка успешности подключения
        if (!$this->oraconnect) {
            // хватаем ошибку
            $e = oci_error();
            // выкидиваем ошибку
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
    }

    // деструтор
    public function __destruct() {

        // если ессть соединение то его нужно закрыть
        if ($this->oraconnect) {
            oci_close($this->oraconnect);
        }
    }

    // статическая функция возвращающая инстанс
    public static function getInstance(): OraConnect
    {
        if (self::$instance == null){
            self::$instance = new OraConnect();
        }
        return self::$instance;
    }

    public function getOraconnect()
    {
        return $this->oraconnect;
    }


}