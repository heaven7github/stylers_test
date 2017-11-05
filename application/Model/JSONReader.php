<?php

/**
 * Class Model_JSONReader
 */
class Model_JSONReader
{
    /**
     * @var string
     */
    protected $_fileLocation = 'stylersdev.com/teszt_feladat/adat.json';

    /**
     * @var string
     */
    protected $_filePath = 'data/adat.json';

    /**
     * @var string
     */
    protected $_httpAuthUser = 'tesztfeladat';

    /**
     * @var string
     */
    protected $_httpAuthPassword = 'tesztfeladat';

    /**
     * @var array $_data_array
     */
    protected $_data_array = false;

    /**
     * get array
     *
     * @return false|array
     */
    public function getArray()
    {
        if (!$this->_data_array) {
            $this->_readJSON();
        }
        return $this->_data_array;
    }

    /**
     * read JSON
     *
     * @throws Exception
     *
     * @return void
     */
    protected function _readJSON()
    {
        $filename = $this->_filePath;

        if (!file_exists($filename)) {
            $this->_downloadJSON();
        }

        $h = fopen($filename, 'r');
        $json = fread($h, filesize($filename));

        if ('' == $json) {
            throw new Exception('Üres JSON fájl.');
        }
        $this->_data_array = json_decode($json, true);

    }

    /**
     * download JSON
     */
    protected function _downloadJSON()
    {
        $out = fopen($this->_filePath, 'wb');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FILE, $out);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $this->_fileLocation);
        curl_setopt($ch, CURLOPT_USERPWD, $this->_httpAuthUser . ":" . $this->_httpAuthPassword);
        curl_exec($ch);
        curl_close($ch);
        fclose($out);
    }

}