<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php'); ?>
<div class="error-page">
<h2 class="post-title">404 - 页面没找到</h2>
<p>你要查看的页面已被转移或删除了</p>
</div>
</div>
<?php if (!$this->options->OneCOL): $this->need('sidebar.php'); endif; ?>
<?php $this->need('footer.php'); ?>