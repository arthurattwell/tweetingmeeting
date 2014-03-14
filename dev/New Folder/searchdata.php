<?php

include('config.php');

if(isset($_GET['search_word']))
{
$search_word=$_GET['search_word'];

$sql=mysql_query("SELECT * FROM messages WHERE msg LIKE '%$search_word%' ORDER BY mes_id DESC LIMIT 20");

$count=mysql_num_rows($sql);

if($count > 0)
{

while($row=mysql_fetch_array($sql))
{
$msg=$row['msg'];
$bold_word='<b>'.$search_word.'</b>';
$final_msg = str_ireplace($search_word, $bold_word, $msg);
?>


<li><?php echo $final_msg; ?></li>
<?php
}
}
else
{

echo "<li>No Results</li>";

}


}
?>
