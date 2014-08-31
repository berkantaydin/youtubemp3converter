<?php

//@file_put_contents('/tmp/ba-referrer',$_SERVER['SERVER_ADDR']."\n", FILE_APPEND);

if ($_GET['vid'] != '') {
    $vid = $_GET['vid'];

    if(strlen($vid) > 13)
        die;

} else {
    die;
}

if ($_GET['secret'] != '741852asdx')
    die;

if (!file_exists($vid . ".mp3")) {

    $cmd2 = "/usr/bin/python2.7 /usr/local/bin/youtube-dl --id --extract-audio --audio-format mp3 -f 17 --no-overwrites --no-part --no-post-overwrites --max-filesize 20m http://www.youtube.com/watch?v=" . $vid;

    $out2 = exec($cmd2);

}

$cmd = "/usr/bin/python2.7 /usr/local/bin/youtube-dl --get-id --get-title --get-description --get-id https://www.youtube.com/watch?v=" . $vid;

$out = shell_exec($cmd);

echo "http://youtubemp3donusturucu.com/indir/" . $vid . ".mp3\n";
echo $out;
//echo "\n\n";
//echo $out2;
?>