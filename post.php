<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="page-main">
<?php if (!empty($this->options->Breadcrumbs) && in_array('Postshow', $this->options->Breadcrumbs)): ?>
<div class="breadcrumbs">
<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->category(); ?> &raquo; <?php if (!empty($this->options->Breadcrumbs) && in_array('Text', $this->options->Breadcrumbs)): ?>正文<?php else: $this->title(); endif; ?>
</div>
<?php endif; ?>
<article class="post<?php if ($this->options->PjaxOption && $this->hidden): ?> protected<?php endif; ?>">
<h1 class="post-title"><?php $this->title() ?></h1>
<ul class="post-meta">
<li><?php $this->date(); ?></li>
<!--<li><?php $this->category(','); ?></li>-->
<li><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></a></li>
<li><?php Postviews($this); ?></li>
</ul>
<div class="post-content">
<?php $this->content(); ?>
</div>
</br>
<?php if ($this->options->WeChat || $this->options->Alipay): ?>
<p class="rewards">打赏: <?php if ($this->options->WeChat): ?>
<a><img src="<?php $this->options->WeChat(); ?>" alt="微信收款二维码" />微信</a><?php endif; if ($this->options->WeChat && $this->options->Alipay): ?>, <?php endif; if ($this->options->Alipay): ?>
<a><img src="<?php $this->options->Alipay(); ?>" alt="支付宝收款二维码" />支付宝</a><?php endif; ?>
</p>
<?php endif; ?>
<p class="license"><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本作品采用 <a rel="license nofollow" href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></p>
</article>

<div class="post">
<p>相关文章：
<?php $this->related(5)->to($relatedPosts); ?>
    <ul>
    <?php while ($relatedPosts->next()): ?>
    <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
    <?php endwhile; ?>
</ul>
</p>
</div>

<?php if ($this->options->ADpost): ?>
<p><?php $this->options->ADpost(); ?></p>
<?php endif; ?>

<?php $this->need('comments.php'); ?>

<ul class="post-near">
<li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
<li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
</ul>
</div>

<?php $this->need('footer.php'); ?>
