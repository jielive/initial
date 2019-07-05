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
<div class="post-content">
<?php $this->content(); ?>
</div>
</article>
<?php if ($this->options->ADpage): ?>
<p><?php $this->options->ADpage(); ?></p>
<?php endif; ?>

<?php $this->need('comments.php'); ?>
</div>

<?php $this->need('footer.php'); ?>
