<?php

class CurrencyAPI
{
    # ids Валют
    const KEY_CUR_EUR = 292;
    const KEY_CUR_USD = 145;
    const KEY_CUR_RUB = 298;

    const URL_API = 'http://www.nbrb.by/API/ExRates/Rates?Periodicity=0';

    # Аббривиатура валюты - например RUB, EUR, USD, ...
    const CUR_ABBREVIATION = 'Cur_Abbreviation';

    # Уникальный номер валюты - например 292 (это EUR)
    const CUR_ID = 'Cur_ID';

    # Курс валюты на сегодня (цифра)
    const CUR_OFFICIAL_RATE = 'Cur_OfficialRate';

    # Массив всех валют (около 27 шт.)
    private $currencies;

    public function __construct()
    {
        if($jsonString = file_get_contents(self::URL_API)){
            $this->currencies = json_decode($jsonString, true);
        }
    }

    /**
     * Получить валюту по id - например 292
     * @param int $id
     * @return mixed
     */
    public function getCurrencyById($id)
    {
        foreach ($this->currencies as $currency) {
            if ($currency[self::CUR_ID] == $id){
                return array(
                    $currency[self::CUR_ABBREVIATION] => $currency[self::CUR_OFFICIAL_RATE]
                );
            }
        }
        return null;
    }

    /**
     * Получить валюты по их ids - например [292,145,298]
     *
     * @param array $ids
     * @return array
     */
    public function getCurrenciesByIds(array $ids)
    {
        $currencies = array();
        foreach ($ids as $id) {
            $currencies[] = $this->getCurrencyById($id);
        }
        return $currencies;
    }

    /**
     * @return mixed
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

}

