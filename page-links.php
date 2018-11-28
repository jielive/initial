<?php
/**
 * 链接
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
<?php if ($this->options->InsideLinksIcon == 'able'): ?>
<script>function erroricon(obj){var a=obj.parentNode;var i=document.createElement("i");var icon=document.createTextNode("★");i.appendChild(icon);a.removeChild(obj);a.insertBefore(i,a.childNodes[0])}</script>
<?php endif; ?>
<div class="post-content">
<?php $this->content(); ?>
<ul class="links">
<?php Links($this->options->InsideLinksSort, $this->options->InsideLinksIcon == 'able' ? 1 : 0); ?>
</ul>
</div>
</article>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>