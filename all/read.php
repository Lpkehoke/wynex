<?php
	$name = mysqli_fetch_assoc(mysqli_query($connection , "SELECT `nstory` FROM `story` WHERE `id` = '$_GET[id_of_story]'"));
	$storyR = [];
	$transR = [];

	$story = mysqli_query($connection , "SELECT * FROM `cell` WHERE `story` = '$_GET[id_of_story]'");
	while ($storyR[] = mysqli_fetch_assoc($story) ) {}

	$trans = mysqli_query($connection , "SELECT * FROM `button` WHERE `id_story` = '$_GET[id_of_story]'");
	while ($transR[] = mysqli_fetch_assoc($trans) ) {}

	$title = $name['nstory']; 

	require_once 'resources/blocks/head.php';
?>
<script type="text/javascript">
	
var GstoryR = [];
var GtransR = [];

<?php
	for( $i = 0; $i + 1 < count($storyR) ; $i++ )
	{
		echo " GstoryR[".$i."] = new Array(".$storyR[$i]['id_in_story']." , '".$storyR[$i]['text']."' , ".$storyR[$i]['status'].");";
		if ($i) echo " GtransR[".($i - 1)."] = new Array(".$transR[$i - 1]['parent_from']." , ".$transR[$i - 1]['child']." , '".$transR[$i - 1]['choise']."');";
	}

?>
</script>

</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<div id="main-body">
				
			</div>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>


<script type="text/javascript">
function newSlide( id )
{
	$(".main-text").remove();
	$("#main-body").append("<div class='main-text'><span>" + GstoryR[id][1] + "</span></div>");
	newButt(id);
}

function newButt( id )
{
	for (var i = 0; i < GtransR.length; i++) 
	{
		if (GtransR[i][0] == ( id + 1 ) )
			$("#main-body").append("<span class='main-text'><button onclick='newSlide(" + (GtransR[i][1] - 1) + ")'>" + GtransR[i][2] + "</button><br></span>");
	}
}

newSlide( 0 );

</script>

</body>
</html>