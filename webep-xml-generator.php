
<?php
$query = "
SELECT
st_product.code AS `product_id`,
st_product.opt_name AS `product_name`,
st_category.opt_name AS`category_name`,
st_product.opt_price_brutto AS `product_price`,
st_product.opt_description AS `product_desc`,
st_product.opt_image AS `product_image`,
st_product.opt_url AS `product_url`
FROM `st_product_has_category`
INNER JOIN `st_product` ON st_product_has_category.product_id = st_product.id
INNER JOIN `st_category` ON st_product_has_category.category_id = st_category.id
WHERE `active` = 1
";
$mysql=mysql_connect('xxx_host', 'xxx_user', 'xxx_password');
mysql_select_db('xxx_db');
mysql_query ('SET NAMES utf8');
$res=mysql_query($query) or die ("blad wykonania zapytania");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo '<!DOCTYPE tortura SYSTEM "http://www.nokaut.pl/integracja/nokaut.dtd">\n';
echo "<nokaut>\n";
    echo "\t<offers>\n";
    while($row = mysql_fetch_array($res))
    {
        $id=$row['product_id'];
        $nazwa=$row['product_name'];
        $cena=$row['product_price'];
        $link='http://www.store.diamante-wear.com/'. $row['product_url'] .'.html';
        $kategoria=$row['category_name'];
        $opis=$row['product_desc'];
        $zdjecie='http://www.store.diamante-wear.com/'. $row['product_image'];
        $brand='Diamante-Wear.com';
        echo "\t\t<offer>\n";
            echo "\t\t\t<id><![CDATA[ $id ]]></id>\n";
            echo "\t\t\t<name><![CDATA[ $nazwa ]]></name>\n";
            echo "\t\t\t<price><![CDATA[ $cena ]]></price>\n";
            echo "\t\t\t<url><![CDATA[ $link ]]></url>\n";
            echo "\t\t\t<category><![CDATA[ $kategoria ]]></category>\n";
            echo "\t\t\t<description><![CDATA[ $opis ]]></description>\n";
            echo "\t\t\t<image><![CDATA[ $zdjecie ]]></image>\n";
            echo "\t\t\t<producer><![CDATA[ $brand ]]></producer>\n";
        echo "\t\t</offer>\n";
    }
    echo "\t</offers>\n";
echo "</nokaut>\n";
mysql_close($mysql);
?>
