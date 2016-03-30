

<?php
global $limit; 
if($limit){
	get_tips($limit); 
} else {
	get_tips();
}?>


<?php get_template_part('partials/loop', 'tips'); ?>



