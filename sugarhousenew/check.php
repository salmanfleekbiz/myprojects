<?php
$db = mysqli_connect("localhost","root","","sugarhouse");
$res=mysqli_query($db,'SELECT v.title, vp.variation_price, CONCAT(pv.min_qty, " - ", pv.max_qty) AS qty  FROM products_variation_price vp LEFT JOIN variations v  ON vp.variation_title=v.id LEFT JOIN products_variation pv ON pv.id=vp.variation_id WHERE vp.product_id=1 ORDER BY pv.min_qty asc');
	while($row=mysqli_fetch_assoc($res)){
		$title=$row['title'];
		$qty=$row['qty'];
		$arr[$qty][$title]=$row['variation_price'];
		$arr1[$title][$qty]=$row['variation_price'];
	}

?>
<table width="100%" border="1">
<tr>
	<td></td>
	<?php 
		foreach($arr as $key => $value){
			echo '<td>'.$key.'</td>';
		}
		?>
</tr>
<?php 
		foreach($arr1 as $key => $value){
			echo '<tr>';
			echo '<td>'.$key.'</td>';
			foreach($value as $k => $v){
				echo '<td>'.$v.'</td>';
			}
			echo '<tr>';
		}
		?>

</table>