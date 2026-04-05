<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once '../config/Database.php';
include_once '../model/Komentar.php';

$database = new Database();
$db = $database->getConnection();
$komentar = new Komentar($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi id_artikel
    if (!isset($_POST['id_artikel']) || empty($_POST['id_artikel'])) {
        $_SESSION['error'] = "ID Artikel tidak valid";
        header("Location: " . $redirect_url);
        exit();
    }
    
    // Pastikan id_artikel adalah angka
    if (!is_numeric($_POST['id_artikel'])) {
        $_SESSION['error'] = "Format ID Artikel salah!";
        header("Location: " . $redirect_url);
        exit();
    }

    $komentar->id_artikel = $_POST['id_artikel'];
    $komentar->nama = $_POST['nama'];
    $komentar->isi_komentar = $_POST['isi_komentar'];
    
    // Ambil URL redirect dari form
    $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : '../../index.html#blog';
    
    if ($komentar->create()) {
        $_SESSION['flash_message'] = "Komentar berhasil dikirim!";
    } else {
        $_SESSION['flash_message'] = "Gagal mengirim komentar!";
    }

    // Redirect ke halaman yang sesuai
    header("Location: " . $redirect_url);
    exit();
}
?>