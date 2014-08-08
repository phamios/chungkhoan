<?php
include('./adodb.inc.php');
include('./adodb-exceptions.inc.php');
include('./cURL.php');
$server = 'localhost';
$user = 'root';
$pwd = '';
$db = 'sqlstock';

$DB = NewADOConnection("mysql://$user:$pwd@$server/$db?persist");

$curl = new cURL();
$curl->setCookie('mhbs.txt');
$curl->setUrl('http://online.mhbs.vn/quote/data.ashx?seq=1418&se=0');
$curl->setReferer('http://google.com');
$curl->setOpt();
$page = $curl->getPage();

$page = explode(';', $page);

foreach ($page as $i => $row) {
    echo "Process row: $i<br />";
    $row = explode('|', $row);
    if (count($row) < 42)
        continue;

    try {
        $query = $DB->Execute("INSERT INTO `data` (`name`, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10, col11, col12, col13, col14, col15, col16, col17, col18, col19, col20, col21, col22, col23, col24, col25, col26, col27, col28, col29, col30, col31, col32, col33, col34, col35, col36, col37, col38, col39, col40, col41) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', '$row[12]', '$row[13]', '$row[14]', '$row[15]', '$row[16]', '$row[17]', '$row[18]', '$row[19]', '$row[20]', '$row[21]', '$row[22]', '$row[23]', '$row[24]', '$row[25]', '$row[26]', '$row[27]', '$row[28]', '$row[29]', '$row[30]', '$row[31]', '$row[32]', '$row[33]', '$row[34]', '$row[35]', '$row[36]', '$row[37]', '$row[38]', '$row[39]', '$row[40]', '$row[41]')");
    } catch (exception $e) {
        print_r($e);
    }
}