<?php
/**
 * 归档
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
<h3 class="widget-title">文章分类</h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Category_List')
->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
</ul>
</section>

<section class="widget">
<h3 class="widget-title">标签云</h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=40')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li><a href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?> [<?php $tags->count(); ?>] </a></li>
<?php endwhile; ?>
<?php else: ?>
<li>暂无标签</li>
<?php endif; ?>
</ul>
</section>

<?php
$this->widget('Widget_Contents_Post_Recent', 'pageSize='.Typecho_Widget::widget('Widget_Stat')->publishedPostsNum)->to($archives);
$year=0;
$output = '<div id="archives">';
while($archives->next()){
	$year_tmp = date('Y',$archives->created);
	if ($year > $year_tmp) {
		$output .= '</ul>';
	}
	if ($year != $year_tmp) {
		$year = $year_tmp;
		$output .= '<h3>'.date('Y 年',$archives->created).'</h3><ul>';
	}
	if ($this->options->PjaxOption && $archives->hidden) {
		$output .= '<li>'.date('m-d：',$archives->created).'<a>'. $archives->title .'</a></li>';
	} else {
		$output .= '<li>'.date('m-d：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
	}
}
$output .= '</ul></div>';
echo $output;
?>
</article>
<?php if ($this->options->ADpage): ?>
<p><?php $this->options->ADpage(); ?></p>
<?php endif; ?>
</div>

<?php $this->need('footer.php'); ?>
