<?php header('Content-Type: text/xml'); ?>
<?= '<?xml version="1.0" encoding="utf-8"?>'; ?>
<?php
require_once('../model/conf.php');
?>

<rss version="2.0">
    <channel>
        <title> Aliens abducted me - News Feed</title>
        <link>http://localhost/useacabeca_php-mysql/app/src/view/aa_rss.php </link>
        <description>
            Alien abduction reports from around the word courtesy of Owen and his abductrd dog Fang
        </description>
        <language>en-us</language>

        <?php
        $sql = "SELECT * FROM aliens_abduction ";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) :?>
            <item>
                <title><?= $row['aa_firstname']; ?></title>
                <link>http://localhost/useacabeca_php-mysql/app/src/view/aa_rss.php?abduction_id=<?=$row['aa_id']?></link>
                <pubDate> <?=date("y") ?></pubDate>
                <description>
                    <?= $row['aa_whattheydid']; ?>
                </description>
            </item>
        <?php endwhile ?>


    </channel>
</rss>