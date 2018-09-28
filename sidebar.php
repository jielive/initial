<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col" id="secondary">
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
<ul class="widget-list">
<?php $this->widget('Widget_Contents_Post_Recent')
->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
</section>
<?php endif; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<section class="widget">
<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
<ul class="widget-list">
<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
<?php while($comments->next()): ?>
<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
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
