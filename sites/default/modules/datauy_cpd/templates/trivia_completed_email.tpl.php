<?php global $base_url; global $base_path; ?>
<div class='col-xs-12 search-result'>
	<?php if ( !empty($data2show) ): ?>
		<?php foreach ($data2show as $data): ?>
	    <div class="data2show">
				<?php //print_r($data, TRUE); ?>
			</div>
	  <?php endforeach; ?>
	<?php else: ?>
		<div>No llegó DATA :(</div>
	<?php endif; ?>
</div>
