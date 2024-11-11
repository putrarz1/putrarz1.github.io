<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir dan membersihkan input
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validasi email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Kirim email
        $to = "rockp9416@gmail.com"; // Ganti dengan alamat email tujuan
        $subject = "Pesan dari Kontak Website";
        $body = "Nama: $name\nEmail: $email\nPesan:\n$message";
        $headers = "From: $email";

        // Mengirim email dan memberikan umpan balik
        if (mail($to, $subject, $body, $headers)) {
            echo "Pesan Anda telah dikirim!";
        } else {
            echo "Maaf, terjadi kesalahan saat mengirim pesan.";
        }
    } else {
        echo "Email tidak valid.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>