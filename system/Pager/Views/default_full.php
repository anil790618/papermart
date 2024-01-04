<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
	<ul class="pagination">
		<?php if ($pager->hasPrevious()) : ?>
			<li class="page-item">
				<a class="page-link links" href="javascript:void(0)" tag="<?= $pager->getFirst()?>" aria-label="<?= lang('Pager.first') ?>">
					<span style="color:#6e6e6e !important;" aria-hidden="true"><?= lang('Pager.first') ?></span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="javascript:void(0)" id="previous" tag="<?= $pager->getPrevious()?>" aria-label="<?= lang('Pager.previous') ?>">
					<span style="color:#6e6e6e !important;" aria-hidden="true"><?= lang('Pager.previous') ?></span>
				</a>
			</li>
		<?php endif ?>

		<?php foreach ($pager->links() as $link) : ?>
			<li  class="page-item <?= $link['active'] ? 'active':''?>">
				<a id="main_link<?= $link['active']?'_active':''?>" class="page-link links" href="javascript:void(0)" tag="<?=$link['uri'] ?>">
					<?= $link['title'] ?>
				</a>
			</li>
		<?php endforeach ?>

		<?php if ($pager->hasNext()) : ?>
			<li class="page-item">
				<a class="page-link" href="javascript:void(0)" id="next" tag="<?= $pager->getNext()?>" aria-label="<?= lang('Pager.next') ?>">
					<span style="color:#6e6e6e !important;" aria-hidden="true"><?= lang('Pager.next') ?></span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link links" href="javascript:void(0)" tag="<?= $pager->getLast()?>" aria-label="<?= lang('Pager.last') ?>">
					<span style="color:#6e6e6e !important;" aria-hidden="true"><?= lang('Pager.last') ?></span>
				</a>
			</li>
		<?php endif ?>
	</ul>
</nav>
