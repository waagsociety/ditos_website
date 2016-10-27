<a class="seo-link" href="<?php echo u() . '/panel/pages/' . $page->uri() . '/edit'; ?>">
	<div class="seo"<?php echo $controller['description']['fake']; ?>>
		<div class="seo-preview">
			<div class="seo-wrap seo-wrap-title">
				<div class="seo-view seo-view-title"><?php echo $controller['title']['full-replaced']; ?></div>
			</div>
			<div class="seo-wrap seo-wrap-url">
				<div class="seo-view seo-view-url"><?php echo $controller['url']['preview']; ?></div>
			</div>
			<div class="seo-wrap seo-wrap-description">
				<div class="seo-view seo-view-description"><?php echo $controller['description']['full-replaced']; ?></div>
			</div>
		</div>
	</div>
</a>