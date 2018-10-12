<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col" id="main">
<div class="breadcrumbs"><a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'author'    =>  _t('%s 发布的文章')
), '', ''); ?></div>
<?php if ($this->have()): ?>
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
<?php else: ?>
<article class="post">
<h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
</article>
<?php endif; ?>
<?php $this->pageNav('上一页', '下一页', 1); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>