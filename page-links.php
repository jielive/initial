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
<?php Breadcrumbs($this); ?>
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<div class="post-content">
<?php $this->content(); ?>
<ul class="links">
<?php if ($this->options->InsideLinksIcon): ?>
<script>function erroricon(obj){var a=obj.parentNode,i=document.createElement("i");i.appendChild(document.createTextNode("★"));a.removeChild(obj);a.insertBefore(i,a.childNodes[0])}</script>
<?php endif; ?>
<?php Links($this->options->InsideLinksSort, $this->options->InsideLinksIcon ? 1 : 0); ?>
</ul>
</div>
</article>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>