<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<?php if (!empty($this->options->Breadcrumbs) && in_array('Postshow', $this->options->Breadcrumbs)): ?>
<div class="breadcrumbs">
<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->category(); ?> &raquo; <?php if (!empty($this->options->Breadcrumbs) && in_array('Text', $this->options->Breadcrumbs)): ?>正文<?php else: $this->title(); endif; ?>
</div>
<?php endif; ?>
<article class="post<?php if ($this->options->PjaxOption && $this->hidden): ?> protected<?php endif; ?>">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<ul class="post-meta">
<li><?php $this->date(); ?></li>
<li><?php $this->category(','); ?></li>
<li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></a></li>
<li><?php Postviews($this); ?></li>
</ul>
<div class="post-content">
<?php $this->content(); ?>
</div>
<?php if ($this->options->WeChat || $this->options->Alipay): ?>
<p class="rewards">打赏: <?php if ($this->options->WeChat): ?>
<a><img src="<?php $this->options->WeChat(); ?>" alt="微信收款二维码" />微信</a><?php endif; if ($this->options->WeChat && $this->options->Alipay): ?>, <?php endif; if ($this->options->Alipay): ?>
<a><img src="<?php $this->options->Alipay(); ?>" alt="支付宝收款二维码" />支付宝</a><?php endif; ?>
</p>
<?php endif; ?>
<p class="tags">标签: <?php $this->tags(', ', true, 'none'); ?></p>
</article>
<?php $this->need('comments.php'); ?>
<ul class="post-near">
<li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
<li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
</ul>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>