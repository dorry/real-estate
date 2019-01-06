<?php
require("./_connect.php");
session_start();
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$query="SELECT * FROM chat Where username = '".$_SESSION["username"]."'";
if ($db->real_query($query))
 {
    $res = $db->use_result();
    while ($row = $res->fetch_assoc())
    {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('G:i', strtotime($row["time"])); 
        echo "<p>$time | $username: $text</p>\n";
    }
}
$query2="SELECT * FROM chat Where username = usernametwo";
if ($db->real_query($query2))
 {
    $res2 = $db->use_result();
    while ($row2 = $res2->fetch_assoc())
    {
        $username2=$row2["username"];
        $text2=$row2["text"];
        $time2=date('G:i', strtotime($row2["time"]));
        echo "<p>$time2 | $username2: $text2</p>\n";
    }
}
else{
    echo "An error occured";
    echo $db->errno;
}
$db->close();
?>