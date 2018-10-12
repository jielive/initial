<?php
/**
 * 基于默认主题深度优化并添加一些实用功能，希望做到简约而不简单。
 * 还原本质，不忘初心。
 * 
 * @package Initial
 * @author JIElive
 * @version 2.0
 * @link http://www.offodd.com
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col" id="main">
<?php while($this->next()): ?>
<article class="post">
<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<ul class="post-meta">
<li><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></li>
<li><?php $this->category(','); ?></li>
<li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '%d 条评论'); ?></a></li>
</ul>
<div class="post-content">
<?php if (postThumb($this) != ""): ?>
<p class="thumb"><?php echo postThumb($this); ?></p>
<?php endif; ?>
<p><?php $this->excerpt(200, ''); ?></p>
</div>
<p class="more"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php _e('- 阅读全文 -'); ?></a></p>
</article>
<?php endwhile; ?>
<?php $this->pageNav('上一页', '下一页', 1); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>