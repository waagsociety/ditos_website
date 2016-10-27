<div class="seo-<?php echo $type; ?>">
	<div class="seo-label">
		<label class="label" for="seo-input-<?php echo $type; ?>">
			<?php echo l::get('seo.' . $type, 'SEO ' . $type); ?>
		</label>
		<div class="seo-count seo-<?php echo $type; ?>-count"></div>
	</div>

	<?php
	echo SeoCore::snippet( 'field-' . $type, $data = array(
		'controller' => $controller
	));
	?>

	<?php if(
	! empty( $controller[$type]['backup'] ) ||
	! empty( $controller[$type]['values'] ) ||
	! empty( $controller[$type]['prefix'] ) ||
	! empty( $controller[$type]['suffix'] )
	) : ?>
		<div class="seo-template">
			<table>
				<?php if( ! empty( $controller[$type]['backup'] ) ) : ?>
					<tr class="seo-fallback">
						<th><?php echo l::get('fallback', 'Fallback'); ?>:</th>
						<td><?php echo $controller[$type]['backup']; ?></td>
					</tr>
				<?php endif; ?>
				<?php if( ! empty( $controller['values'] ) ) : ?>
					<tr class="seo-values">
						<th><?php echo l::get('values', 'Values'); ?>:</th>
						<td><?php foreach( $controller['values'] as $key => $value ) { echo '{{' . $key . '}} '; } ?></td>
					</tr>
				<?php endif; ?>
				<?php if( ! empty( $controller[$type]['prefix'] ) ) : ?>
					<tr class="seo-prefix">
						<th><?php echo l::get('prefix', 'Prefix'); ?>:</th>
						<td><div class="seo-protected"><?php echo $controller[$type]['prefix']; ?></div></td>
					</tr>
				<?php endif; ?>
				<?php if( ! empty( $controller[$type]['suffix'] ) ) : ?>
					<tr class="seo-suffix">
						<th><?php echo l::get('suffix', 'Suffix'); ?>:</th>
						<td><?php echo $controller[$type]['suffix']; ?></td>
					</tr>
				<?php endif; ?>
			</table>
		</div>
	<?php endif; ?>
</div>