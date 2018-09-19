<?php
/**
 * 基于默认主题深度优化，做到最大化精简的同时，添加一些实用功能
 * 还原本质，不忘初心
 * 
 * @package Initial
 * @author JIElive
 * @version 1.2.1
 * @link http://www.offodd.com/
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col" id="main">
<?php while($this->next()): ?>
<article class="post">
<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<ul class="post-meta">
<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></li>
<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
<li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
</ul>
<div class="post-content">
<?php $this->content('- 阅读剩余部分 -'); ?>
</div>
</article>
<?php endwhile; ?>
<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>