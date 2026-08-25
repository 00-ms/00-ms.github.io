<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vx99n = $_POST["nomor"];
    $sub8x = trim(basename($_POST["subdo"])); // prevent path traversal

    if (isset($_POST["trigger_alpha_92"])) {
        $basePath = "x";
        $basePut92 = "$basePath/$sub8x";

        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }

        if (!is_dir($basePut92)) {
            if (!mkdir($basePut92, 0755, true)) {
                die("Gagal membuat folder tujuan: $basePut92");
            }
        }

        $sourceZip97 = "sckuyx/{$vx99n}.zip";
        $copyToZip73 = "$basePut92/{$vx99n}.zip";
        copy($sourceZip97, $copyToZip73);

        $zipX = new ZipArchive;
        if ($zipX->open($copyToZip73) === TRUE) {
            $zipX->extractTo($basePut92);
            $zipX->close();
        }

        unlink($copyToZip73);

        header("Location: success.php?folder=$basePut92");
        exit();
    }
}
?>
