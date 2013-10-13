<?=include('includes/header_view.php');?>
    <div id="content">
    	<div class="beers-list">
    		<table>
			<?php 
				$catName = '';
	 			foreach($beers as $b) 
	 			{
					if($b->parent_id == 0)
					{
						echo '<tr><td colspan="7"><h2>'.$b->cat_name .'</h2></td></tr>';
					} 
						else 
					{
						if($catName =='' || $catName != $b->cat_name)
						{	
							$catName = $b->cat_name;
							echo '<tr><td colspan="7"><h3>'.$b->cat_name.'</h3></td></tr>';
							echo '<tr><td>Name</td><td>Brewery</td><td>Origin</td><td>% ABV</td><td>Pour</td><td>Price</td><td>Description</td></tr>';
							echo '<tr><td>'.$b->name.' </td><td>'.$b->br_name.' </td><td>'.$b->br_origin.' </td><td> '. $b->abv .'% </td><td> '. $b->pour.' </td><td>$'. $b->price.'</td><td>'. $b->description.'</td></tr>';
						} else {
							echo '<tr><td>'.$b->name.' </td><td>'.$b->br_name.' </td><td>'.$b->br_origin.' </td><td> '. $b->abv .'% </td><td> '. $b->pour.' </td><td>$'. $b->price.'</td><td>'. $b->description.'</td></tr>';
						}
					}
	 			}
			?>
    		</table>
    	</div>
	</div>
<?=include('includes/footer_view.php');?>
