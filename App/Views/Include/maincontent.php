<main>
	<div class="container">
		<div class="row">
			<!--  Center Content -->
			<div class="col-xs-12 col-sm-12 col-md-9 right_content">
				<ol class="breadcrumb">
					<li><span>demo store</span></a></li>
					<li><span>Laptops</span></li>
				</ol>           
				<div class="category">
					<h1 class="category_heading">Laptops</h1>				
					<div id="block">
						<div class="row row_catalog_products " id="r_spisok">
					
						</div>
					</div>	
				</div>
			</div>
			<!-- END CENTER CONTENT -->


			<!-- COLUMN LEFT -->			
			<div id="sidebar-left" class="col-sm-3 sidebar left_content">
				<aside>
					<div class="box-category accordion">
						<ul id="cat_accordion">
						<li class="custom_id378"><span class="like_a selected"><a href="#" style="border:none;" id="change" data-category="0">All products &nbsp; &nbsp; <?php echo count($products) ?></a></span></li>
							<?php  foreach ($categories as $category): ?>
								<li class="custom_id378"><span class="like_a"><a href="#" style="border:none;" data-category="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?> &nbsp; &nbsp; <?php echo $category['countProduct'] ?></a></span></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div id="filters_box" class="box filter_box">
							<div class="filter_box_in">					
								<div class="attrib_divs ajax">								
									<div class="filter_heading">Sort</div>									
										<div class="items"><input type="radio" id="price" name="sort" data-sort="1" value = "price"/>
											<label class ="radio" for="sort_by_price">by price</label>
										</div>
										<div class="items"><input type="radio" id="alphabet" data-sort="2" name="sort" value = "alphabet" />
											<label class ="radio" for="sort_alphabetically">Alphabetically</label>
										</div>
										<div class="items"><input type="radio" id="date" data-sort="3" name="sort" value = "data" />
											<label class ="radio" for="sort_newest_first">Newest first</label>
										</div>															
								</div>
							</div>
						</div>
				</aside>
			</div>
			<!-- END COLUMN LEFT -->
		</div>
	</div>
</main>