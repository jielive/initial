<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="col" id="main">
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<ul class="post-meta">
<li><time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></li>
<li><?php $this->category(','); ?></li>
<li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
</ul>
<div class="post-content">
<?php $this->content(); ?>
</div>
<?php if ($this->options->WeChat || $this->options->Alipay): ?>
<p class="rewards"><?php _e('打赏: '); ?>
<?php if ($this->options->WeChat): ?>
<a><img src="<?php $this->options->WeChat(); ?>" alt="<?php _e('微信收款二维码'); ?>" /><?php _e('微信'); ?></a>
<?php endif; ?>
<?php if ($this->options->WeChat && $this->options->Alipay): ?>, <?php endif; ?>
<?php if ($this->options->Alipay): ?>
<a><img src="<?php $this->options->Alipay(); ?>" alt="<?php _e('支付宝收款二维码'); ?>" /><?php _e('支付宝'); ?></a>
<?php endif; ?>
</p>
<?php endif; ?>
<p class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
</article>
<?php $this->need('comments.php'); ?>
<ul class="post-near">
<li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
<li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
</ul>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>