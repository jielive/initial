<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('热门文章'); ?></h3>
<ul class="widget-list">
<?php Contents_Post_Hot($this->options->postsListSize);?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
<ul class="widget-list">
<?php $this->widget('Widget_Contents_Post_Recent')->to($posts); ?>
<?php while($posts->next()): ?>
<?php if ($this->options->PjaxOption == 'able' && isset($posts->password) && $posts->password !== Typecho_Cookie::get('protectPassword') && $posts->authorId !== $this->user->uid && !$this->user->pass('editor', true)): ?>
<li><a><?php $posts->title(); ?></a></li>
<?php else: ?>
<li><a href="<?php $posts->permalink(); ?>"><?php $posts->title(); ?></a></li>
<?php endif; ?>
<?php endwhile; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
<ul class="widget-list">
<?php if (in_array('IgnoreAuthor', $this->options->sidebarBlock)): $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true')->to($comments); else: $this->widget('Widget_Comments_Recent')->to($comments); endif; ?>
<?php while($comments->next()): ?>
<?php if ($this->options->PjaxOption == 'able' && $comments->title == '此内容被密码保护'): ?>
<li><a title="来自: <?php $comments->title(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
<?php else: ?>
<li><a href="<?php $comments->permalink(); ?>" title="来自: <?php $comments->title(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
<?php endif; ?>
<?php endwhile; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('分类'); ?></h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Category_List')
->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('标签'); ?></h3>
<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&desc=1&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<ul class="widget-tile">
<?php while($tags->next()): ?>
<li><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
<li><?php _e('没有任何标签'); ?></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('归档'); ?></h3>
<ul class="widget-list">
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 n 月')
->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->ShowLinks) && in_array('sidebar', $this->options->ShowLinks)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('链接'); ?></h3>
<ul class="widget-tile">
<?php Links($this->options->IndexLinksSort); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('其它'); ?></h3>
<ul class="widget-list">
<li><a href="<?php $this->options->feedUrl(); ?>" target="_blank"><?php _e('文章 RSS'); ?></a></li>
<li><a href="<?php $this->options->commentsFeedUrl(); ?>" target="_blank"><?php _e('评论 RSS'); ?></a></li>
<?php if($this->user->hasLogin()): ?>
<li class="last"><a href="<?php $this->options->adminUrl(); ?>" target="_blank"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
<li><a href="<?php $this->options->logoutUrl(); ?>"<?php if ($this->options->PjaxOption == 'able'): ?> no-pjax <?php endif; ?>><?php _e('退出'); ?></a></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
</div>
