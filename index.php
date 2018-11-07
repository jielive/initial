<?php
/**
 * 基于默认主题深度优化并添加一些实用功能，希望做到简约而不简单。
 * 还原本质，不忘初心。
 * 
 * @package Initial
 * @author JIElive
 * @version 2.1
 * @link http://www.offodd.com/
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="main">
<?php while($this->next()): ?>
<article class="post"<?php if ($this->options->PjaxOption == 'able' && isset($this->password) && $this->password !== Typecho_Cookie::get('protectPassword') && $this->authorId !== $this->user->uid && !$this->user->pass('editor', true)): ?> id="protected"<?php endif; ?>>
<h2 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<ul class="post-meta">
<li><?php $this->date(); ?></li>
<li><?php $this->category(',', false); ?></li>
<li><?php $this->commentsNum('暂无评论', '%d 条评论'); ?></li>
</ul>
<div class="post-content">
<?php if ($this->options->PjaxOption == 'able' && isset($this->password) && $this->password !== Typecho_Cookie::get('protectPassword') && $this->authorId !== $this->user->uid && !$this->user->pass('editor', true)): ?>
<form class="protected" action="<?php echo Typecho_Widget::widget('Widget_Security')->getTokenUrl($this->permalink()); ?>" method="post">
<p class="word">请输入密码访问</p>
<p>
<input type="password" class="text" name="protectPassword" />
<input type="submit" class="submit" value="提交" />
</p>
</form>
<?php else: ?>
<?php if (postThumb($this) != ""): ?>
<p class="thumb"><?php echo postThumb($this); ?></p>
<?php endif; ?>
<p><?php $this->excerpt(200, ''); ?></p>
<?php endif; ?>
</div>
<p class="more"><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">- 阅读全文 -</a></p>
</article>
<?php endwhile; ?>
<?php $this->pageNav('上一页', '下一页', 0); ?>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>