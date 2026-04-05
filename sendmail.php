<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = "rifkiyuliandra875@gmail.com"; 
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);
        $subject = "Pesan dari Portfolio Website";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $body = "Nama: $name\nEmail: $email\nPesan:\n$message";

        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Pesan berhasil dikirim!');window.location='index.html';</script>";
        } else {
            echo "<script>alert('Gagal mengirim pesan.');window.location='index.html';</script>";
        }
    } else {
        header("Location: index.html");
        exit();
    }
?>