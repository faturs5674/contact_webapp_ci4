<html>

<head>
    <title>Membuat api whatsapp message generator dengan php| www.hakkoblogs.com</title>
</head>

<body>
    <?php
    if (isset($_POST['kirim'])) {
        $nohape  = $_POST['nohape'];
        $isi     = $_POST['isi'];

        echo "<a href=\'https://api.whatsapp.com/send?phone=$nohape&text=$isi&source=&data=' target=\_blank><script>window.location = </script></a>";
        // echo "<script>window.location = 'https://api.whatsapp.com/send?phone=+6285735902603&text=$isi&source=&data='</script>";
    }
    ?>
    <form method="post" action="">
        <input type="text" name="nohape" placeholder="contoh : 6285600000000" /><br /><br />
        <textarea cols="40" rows="5" name="isi" Placeholder="Isi pesan"></textarea>
        <br /><br />
        <input type="submit" name="kirim" value="Kirim Pesan" />
    </form>
</body>

</html>