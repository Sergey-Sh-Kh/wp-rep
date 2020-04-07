<?php get_header(); ?>
	<div class="container-fluid">

		<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>

		<div class="row">
<?php

$queried_object = get_queried_object();
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
 
$sidebar = get_field('sidebar', $taxonomy . '_' . $term_id);
$sidebar_mob = get_field('sidebar_mob', $taxonomy . '_' . $term_id);

?>

			<aside class="mb-4 mb-md-0">
				<h6 style="text-align: center;border-bottom: 2px solid #00000021;padding-bottom: 15px;">Фильтры</h6>
				<div class="acc-head">
					<h6 class="link-orange" style="margin: unset;">Модель транспорта</h6>
					<img src="/img/arrow.gif" style="width: 20px;">
				</div>
				<div class="acc-body">
					<ul>
						<?php 
						$addhtml =  wp_list_categories('echo=0&exclude=1,2&style=none&orderby=count&show_count=1&hide_empty=1&use_desc_for_title=1&child_of=14&show_count=0');
						 $addhtml = str_replace('<a', '<li class="col-md-12 col-sm-12 col-xs-12"><span class="link-orange"><a ', $addhtml);
						 $addhtml = str_replace('</a>', '</a></span></li>', $addhtml);
						 echo $addhtml;

						?>
					</ul>
				</div>
				<div class="acc-head">
					<h6 class="link-orange" style="margin: unset;">Производитель</h6>
					<img src="/img/arrow.gif" style="width: 20px;">
				</div>
				<div class="acc-body">
					<ul>
						<?php 
						$addhtml =  wp_list_categories('echo=0&exclude=1,2&style=none&orderby=count&show_count=1&hide_empty=1&use_desc_for_title=1&child_of=15&show_count=0');
						 $addhtml = str_replace('<a', '<li class="col-md-12 col-sm-12 col-xs-12"><span class="link-orange"><a ', $addhtml);
						 $addhtml = str_replace('</a>', '</a></span></li>', $addhtml);
						 echo $addhtml;

						?>
					</ul>
				</div>
				<div class="acc-head">
					<h6 class="link-orange" style="margin: unset;">Длинна погружной части</h6>
					<img src="/img/arrow.gif" style="width: 20px;">
				</div>
				<div class="acc-body">
					<ul>
						<?php 
						$addhtml =  wp_list_categories('echo=0&exclude=1,2&style=none&orderby=count&show_count=1&hide_empty=1&use_desc_for_title=1&child_of=16&show_count=0');
						 $addhtml = str_replace('<a', '<li class="col-md-12 col-sm-12 col-xs-12"><span class="link-orange"><a ', $addhtml);
						 $addhtml = str_replace('</a>', '</a></span></li>', $addhtml);
						 echo $addhtml;

						?>
					</ul>
				</div>
				
<?php dynamic_sidebar('sidebar_catalog2'); ?>
					<?php
		$post_content = get_post(204);
		$content = $post_content->post_content;
		echo do_shortcode($content);
	?>			
			</aside>

			<main class="col">				
					<?php	
						$category = get_queried_object();
						$categories_id = $category->term_id;
						if($categories_id !== 13): ?>
							<h1><?php echo single_cat_title('', 0); ?></h1>
					
					<?php else:
						$post_content = get_post(2017);
						$content = $post_content->post_content;
						echo do_shortcode($content);
					?>					
					<?php endif; wp_reset_postdata();?>
					<?php if($categories_id == 15): ?>
						<ul>
					<?php 
						$addhtml =  wp_list_categories('echo=0&exclude=1,2&style=none&orderby=count&show_count=1&hide_empty=1&use_desc_for_title=1&child_of=15&show_count=0&separator=');
						 $addhtml = str_replace('<a', '<li style="float: left;margin: 0 10px 10px 0;><span class="link-orange"><a class="btn btn-secondary"', $addhtml);
						 $addhtml = str_replace('</a>', '</a></span></li>', $addhtml);
						 echo $addhtml;
					?>
						</ul>
					<?php elseif($categories_id == 16): ?>
						<ul>
					<?php 
						$addhtml =  wp_list_categories('echo=0&exclude=1,2&style=none&orderby=count&show_count=1&hide_empty=1&use_desc_for_title=1&child_of=16&show_count=0&separator=');
						 $addhtml = str_replace('<a', '<li style="float: left;margin: 0 10px 10px 0;><span class="link-orange"><a class="btn btn-secondary"', $addhtml);
						 $addhtml = str_replace('</a>', ' мм</a></span></li>', $addhtml);
						 echo $addhtml;
					?>
						</ul>
					<?php elseif($categories_id == 14): ?>
						<ul>
					<?php 
						$addhtml =  wp_list_categories('echo=0&exclude=1,2&style=none&orderby=count&show_count=1&hide_empty=1&use_desc_for_title=1&child_of=14&show_count=0&separator=');
						 $addhtml = str_replace('<a', '<li style="float: left;margin: 0 10px 10px 0;"><span class="link-orange"><a class="btn btn-secondary"', $addhtml);
						 $addhtml = str_replace('</a>', '</a></span></li>', $addhtml);
						 echo $addhtml;
					?>
						</ul>	
					<?php endif; wp_reset_postdata();?>


<?php
	if(have_posts()) : while(have_posts()) : the_post();
?>

				<div class="category-line col-lg-3 col-md-3 col-sm-3">					
					<div class="col-lg-auto">
						<div class="row">
							<div class="col-lg-auto">
								<a href="<?php echo get_permalink(); ?>" class="link-orange"><figure><?php the_post_thumbnail(array(145,130)); ?></figure></a>
							</div>
						</div>						
					</div>
					<span class="col-12"><a href="<?php echo get_permalink(); ?>" class="link-orange"><?php the_title('',''); ?></a></span>
					<div class="col-lg col-sm-8 mt-3 mt-sm-0">
						<div class="fsi-15 txt">							
							<p>Цена: <b class="link-orange"><?php echo (get_post_meta($post->ID, 'custom_cost', true)); ?>р.</b></p>
						</div>
					</div>
				</div>

<?php endwhile; endif; wp_reset_postdata();?>
					<?php	
					$category = get_queried_object();
					$categories_id = $category->term_id;
					if($categories_id == 13): ?>						
					<?php
						$post_content = get_post(1995);
						$content = $post_content->post_content;
						echo do_shortcode($content);
					?>
					<?php endif; wp_reset_postdata();?>			
			</main>

							<?php
		$post_content = get_post(206);
		$content = $post_content->post_content;
		echo do_shortcode($content);
	?>

		</div>
	</div>

<?php get_footer(); ?>
