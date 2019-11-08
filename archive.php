<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="page-main">
<div class="breadcrumbs"><a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->archiveTitle(array(
'category'  =>  _t('分类 "%s" 下的文章'),
'search'    =>  _t('包含关键字 "%s" 的文章'),
'tag'       =>  _t('标签 "%s" 下的文章'),
'date'      =>  _t('在 "%s" 发布的文章'),
'author'    =>  _t('作者 "%s" 发布的文章')
), '', ''); ?></div>
<?php if ($this->have()): ?>
<?php while($this->next()): ?>
<article class="post-list<?php if ($this->options->PjaxOption && $this->hidden): ?> protected<?php endif; ?>">
<h3 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
<ul class="post-meta">
<li>发布时间：<?php $this->date(); ?></li>
<li>文章分类：<?php $this->category(',', false); ?></li>
<li><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></li>
</ul>
<div class="post-content">
<?php if ($this->options->PjaxOption && $this->hidden): ?>
<form method="post">
<p class="word">请输入密码访问</p>
<p>
<input type="password" class="text" name="protectPassword" />
<input type="submit" class="submit" value="提交" />
</p>
</form>
<?php endif; ?>

</div>
</article>
<?php endwhile; ?>
<?php else: ?>
<article class="post">
<h2 class="post-title">没有找到内容</h2>
</article>
<?php endif; ?>
<?php $this->pageNav('上一页', $this->options->AjaxLoad ? '查看更多' : '下一页', 0, '..', $this->options->AjaxLoad ? array('wrapClass' => 'page-navigator ajaxload') : ''); ?>
</div>
<?php $this->need('footer.php'); ?>
