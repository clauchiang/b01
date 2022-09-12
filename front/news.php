<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php
	include_once "./ad.php";
	?>
	<div style="height:32px; display:block;"></div>
	<h2 class="cent">更多最新消息顯示區</h2>
	<hr>
	<!--正中央-->
	<?php
	$all = $News->math('count', 'id', ['hidden' => 1]);
	$div = 5;
	$pages = ceil($all / $div);
	$now = $_GET['p'] ?? 1;
	$start = ($now - 1) * $div;
	$news = $News->all(['hidden' => 1], "limit $start,$div");
	?>
	<ol start="<?= $start + 1; ?>">
		<?php
		foreach ($news as $key => $new) {
		?>
			<li class="sswww">
				<?= mb_substr($new['text'], 0, 20); ?>...
				<span style="display: none;" class="all"><?= $new['text']; ?></span>
			</li>
		<?php
		}
		?>
	</ol>
	<div style="text-align:center;">
	<?php

	if(($now - 1) >0){
		$p = $now -1 ;
		echo "<a class='bl' style='font-size:30px;' href='?do=news&p=$p'>&lt;&nbsp;</a>";
	}else{
		echo "<a class='bl' style='font-size:30px;' href='?do=news&p=$now'>&lt;&nbsp;</a>";
	}
	for($i=1;$i<=$pages;$i++){
		$size = ($now == $i)?"24px":"";
		echo "<a class='bl' style='font-size:$size;' href='?do=news&p=$i'> $i </a>";
	}

	if(($now + 1) <=$pages){
		$p = $now +1 ;
		echo "<a class='bl' style='font-size:30px;' href='?do=news&p=$p'>&nbsp;&gt;</a>";
	}else{
		echo "<a class='bl' style='font-size:30px;' href='?do=news&p=$now'>&nbsp;&gt;</a>";
	}
	?>
		
		
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>