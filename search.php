<?php include "template/header.php";
include "template/connection.php";

$search=$_POST["search"];

$topic= array ();
$sql_topic= "SELECT * FROM topic WHERE topic_name LIKE '%".$search."%'";
$tiket= mysqli_query($mysqlConnection, $sql_topic);
while ($row= mysqli_fetch_assoc($tiket)){
	$topic[]=$row;
}

$post= array();
$sql_post= "SELECT * FROM post WHERE post_post LIKE '%".$search."%'";
$tiket = mysqli_query($mysqlConnection,$sql_post);
while ($row= mysqli_fetch_assoc($tiket)) {
	$post[]= $row;
}

$forum= array();
$sql_forum="SELECT * FROM forum WHERE forum_name LIKE '%".$search."%'";
$tiket= mysqli_query($mysqlConnection,$sql_forum);
while ($row = mysqli_fetch_assoc ($tiket)) {
	$forum[]=$row;
}
var_dump($topic);


?>

<table class="table table-striped table-bordered table-responsive" style="width: 1000px; margin: auto">
<thead class="thead-light">
	<tr>
			<th scope="col" style="width: 50%; margin: auto"> Searched word(s):</th>
			<th scope="col" style="width: 100%; margin: auto"><?php echo $search; ?></th>
	</tr>
</thead>
<tbody>
	<?php if(sizeof($forum) !=0) { ?>
	<tr><td scope="col" style="width: 100%"><b>Forums related to searched word(s)</b></td></tr>
	<tr>
			<td scope="col">Forum name</td>
			<td scope="col">Author</td>
			
	</tr>
	<?php } for ($i=0; $i<sizeof($forum);$i++) { ?>
		<tr>
			<td scope="col"><a href="forum.php?id=<?php echo $forum[$i]["forum_id"]; ?>&page=1"><?php echo $forum[$i]["forum_name"]; ?></a></td>
			<td scope="col"><?php $array= array();
								$sql= "SELECT user_username FROM users WHERE user_id = '".$forum[$i]["forum_user_id"]."'";
								$tiket = mysqli_query($mysqlConnection,$sql);
								while($row= mysqli_fetch_assoc($tiket)){
									$array[]=$row;
								}
								echo $array[0]["user_username"];

						?></td>
			
	</tr>
<?php }
	if (sizeof($topic) !=0) { ?>
		<tr><td scope="col" style="width: 100%"><b>Topics related to searched word(s)</b></td></tr>
		<tr>
			<td scope="col">Topic name</td>
			<td scope="col">Started</td>
	</tr>
	<?php }
	for ($y=0;$y<sizeof($topic);$y++) { ?> 
	<tr>
			<td scope="col"><a href="topic.php?forum=<?php echo $topic[$y]["topic_forum_id"]; ?>&topic=<?php echo $topic[$y]["topic_id"];?>&page=1"><?php echo $topic[$y]["topic_name"]; ?></a></td>
			<td scope="col"><?php echo $topic[0]["topic_date"]; ?></td>
	</tr>

<?php } ?>
</tbody>
	
