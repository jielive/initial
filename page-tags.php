<?php

/**
 * 标签云
 *
 * @package custom
 */

?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="page-main">
	<?php if (!empty($this->options->Breadcrumbs) && in_array('Pageshow', $this->options->Breadcrumbs)): ?>
	<div class="breadcrumbs">
	<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->title() ?>
	</div>
	<?php endif; ?>
	<article class="post">
        <h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
	<ul class="post-tags">
	<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&desc=0')->to($tags); ?>
	<?php if($tags->have()): ?>
	<?php while($tags->next()): ?>
	<li class="size-<?php $tags->split(5, 10, 20, 30); ?>"><a href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?> [<?php $tags->count(); ?>] </a></li>
	<?php endwhile; ?>
	<?php else: ?>
	<li>暂无标签</li>
	<?php endif; ?>
	</ul>
	</article>
  <?php if ($this->options->ADpage): ?>
  <p><?php $this->options->ADpage(); ?></p>
  <?php endif; ?>
</div>

<?php $this->need('footer.php'); ?>
