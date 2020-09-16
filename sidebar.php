<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="secondary"<?php if ($this->options->SidebarFixed): ?> sidebar-fixed<?php endif; ?>>
<?php if (!empty($this->options->ShowWhisper) && in_array('sidebar', $this->options->ShowWhisper)): ?>
<section class="widget">
<?php Whisper(1); ?>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">热门文章</h3>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize, 'commentsNum'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">最新文章</h3>
<ul class="widget-list">
<?php Contents_Post_Initial($this->options->postsListSize); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">最近回复</h3>
<ul class="widget-list">
<?php $this->widget('Initial_Widget_Comments_Recent', in_array('IgnoreAuthor', $this->options->sidebarBlock) ? 'ignoreAuthor=1' : '')->to($comments); ?>
<?php if($comments->have()): ?>
<?php while($comments->next()): ?>
<li><a <?php echo FindContent($comments->cid)['hidden'] && $this->options->PjaxOption ? '' : 'href="'.$comments->permalink.'" ' ?>title="来自: <?php $comments->title(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
<?php endwhile; ?>
<?php else: ?>
<li>暂无回复</li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">分类</h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Category_List')
->parse('<li><a href="{permalink}">{name}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTag', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">标签</h3>
<ul class="widget-tile">
<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
<?php if($tags->have()): ?>
<?php while($tags->next()): ?>
<li><a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?></a></li>
<?php endwhile; ?>
<?php else: ?>
<li>暂无标签</li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">归档</h3>
<ul class="widget-list">
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 n 月')
->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->ShowLinks) && in_array('sidebar', $this->options->ShowLinks)): ?>
<section class="widget">
<h3 class="widget-title">链接</h3>
<ul class="widget-tile">
<?php Links($this->options->IndexLinksSort); ?>
<?php if (FindContents('page-links.php', 'order', 'a', 1)): ?>
<li class="more"><a href="<?php echo FindContents('page-links.php', 'order', 'a', 1)[0]['permalink']; ?>">查看更多...</a></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title">其它</h3>
<ul class="widget-list">
<li><a href="<?php $this->options->feedUrl(); ?>" target="_blank">文章 RSS</a></li>
<li><a href="<?php $this->options->commentsFeedUrl(); ?>" target="_blank">评论 RSS</a></li>
<?php if($this->user->hasLogin()): ?>
<li><a href="<?php $this->options->adminUrl(); ?>" target="_blank">进入后台 (<?php $this->user->screenName(); ?>)</a></li>
<li><a href="<?php $this->options->logoutUrl(); ?>"<?php if ($this->options->PjaxOption): ?> no-pjax<?php endif; ?>>退出</a></li>
<?php endif; ?>
</ul>
</section>
<?php endif; ?>
</div>
