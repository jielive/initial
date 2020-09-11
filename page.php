<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<?php Breadcrumbs($this); ?>
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<div class="post-content">
<?php $this->content(); ?>
</div>
</article>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>