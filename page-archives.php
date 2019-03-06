<?php
/**
 * 归档
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<?php if (!empty($this->options->Breadcrumbs) && in_array('Pageshow', $this->options->Breadcrumbs)): ?>
<div class="breadcrumbs">
<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->title() ?>
</div>
<?php endif; ?>
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<?php
$stat = Typecho_Widget::widget('Widget_Stat');
$this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
$year=0; $mon=0; $i=0; $j=0;
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
		$output .= '<li>'.date('m/d：',$archives->created).'<a>'. $archives->title .'</a></li>';
	} else {
		$output .= '<li>'.date('m/d：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a></li>';
	}
}
$output .= '</ul></div>';
echo $output;
?>
</article>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>