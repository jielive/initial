<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
Breadcrumbs($this); ?>
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<div class="post-content">
<?php $this->content(); ?>
</div>
</article>
<?php $this->need('comments.php'); ?>
</div>
<?php if (!$this->options->OneCOL): $this->need('sidebar.php'); endif; ?>
<?php $this->need('footer.php'); ?>