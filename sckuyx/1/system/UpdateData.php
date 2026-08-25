<?php
$allowed_keys = ['linkweb', 'nama', 'ukuran', 'email_result', 'nama_result'];

foreach ($allowed_keys as $key) {
    if (isset($_POST[$key])) {
        $ngGet = file_get_contents("data.json");
        $data = json_decode($ngGet, true);

        $data[$key] = $_POST[$key];

        $ngResult = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $ngResult);
        echo "Sukses";
        exit;
    }
}
?>
