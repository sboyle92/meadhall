<?=include('includes/header_view.php');?>
    <div id="content">
    	<div class="beers-list">
    		<table>
			<?php 
				$catName = '';
	 			foreach($beers as $b) 
	 			{
					if($b->c_parent_id == 0)
					{
						echo '<tr><td colspan="7"><h2>'.$b->c_name .'</h2></td></tr>';
					} 
						else 
					{
						if($catName =='' || $catName != $b->c_name)
						{	
							$catName = $b->c_name;
							echo '<tr><td colspan="7"><h3>'.$b->c_name.'</h3></td></tr>';
							echo '<tr><td>Name</td><td>Brewery</td><td>Origin</td><td>% ABV</td><td>Pour</td><td>Price</td><td>Description</td></tr>';
							echo '<tr><td>'.$b->b_name.' </td><td>'.$b->br_name.' </td><td>'.$b->br_origin.' </td><td> '. $b->b_abv .'% </td><td> '. $b->b_pour.' </td><td>$'. $b->b_price.'</td><td>'. $b->b_description.'</td></tr>';
						} else {
							echo '<tr><td>'.$b->b_name.' </td><td>'.$b->br_name.' </td><td>'.$b->br_origin.' </td><td> '. $b->b_abv .'% </td><td> '. $b->b_pour.' </td><td>$'. $b->b_price.'</td><td>'. $b->b_description.'</td></tr>';
						}
					}
	 			}
			?>
    		</table>
    	</div>
	</div>
<?=include('includes/footer_view.php');?>