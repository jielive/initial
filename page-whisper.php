<?php
/**
 * 轻语
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		} else {
			$commentClass .= ' comment-by-user';
		}
	}
?>
<li id="<?php $comments->theId(); ?>" class="comment-body<?php
	if ($comments->levels > 0) {
		echo ' comment-child';
		$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
	} else {
		echo ' comment-parent';
	}
	$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
<div class="comment-author">
<?php $comments->gravatar('32'); ?>
<cite><?php $comments->author(); ?></cite>
<?php if ($comments->status == 'waiting') { ?>
<em class="comment-awaiting-moderation">您的评论正等待审核！</em>
<?php } ?>
</div>
<div class="comment-content">
<?php echo strip_tags(Markdown::convert($comments->text), '<p><br><strong><a><img><pre><code>' . Typecho_Widget::widget('Widget_Options')->commentsHTMLTagAllowed); ?>
</div>
<div class="comment-meta">
<time><?php $comments->dateWord(); ?></time>
</div>
<div class="comment-reply">
<?php $comments->reply('评论'); ?>
</div>
<?php if ($comments->children) { ?>
<div class="comment-children">
<?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</li>
<?php } ?>
<div id="main">
<?php if (!empty($this->options->Breadcrumbs) && in_array('Pageshow', $this->options->Breadcrumbs)): ?>
<div class="breadcrumbs">
<a href="<?php $this->options->siteUrl(); ?>">首页</a> &raquo; <?php $this->title() ?>
</div>
<?php endif; ?>
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<div class="post-content">
<?php $this->content(); ?>
</div>
</article>
<div id="comments" class="whisper">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<?php $comments->listComments(); ?>
<?php $comments->pageNav('上一页', '下一页', 0, '..'); ?>
<?php endif; ?>
<?php if($this->allow('comment') && $this->user->hasLogin()): ?>
<div id="<?php $this->respondId(); ?>">
<h3 id="response">发表轻语</h3>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
<p>
<textarea name="text" id="textarea" placeholder="说点什么..." required ><?php $this->remember('text'); ?></textarea>
</p>
<p>
<button type="submit" class="submit">提交</button>
</p>
</form>
</div>
<?php endif; ?>
<?php if ($this->options->commentsThreaded): ?>
<script>(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom('<?php $this->respondId(); ?>'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0],textarea=response.getElementsByTagName('textarea')[0];if(null==input){input=this.create('input',{'type':'hidden','name':'parent','id':'comment-parent'});form.appendChild(input)}input.setAttribute('value',coid);if(null==this.dom('comment-form-place-holder')){var holder=this.create('div',{'id':'comment-form-place-holder'});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.dom('cancel-comment-reply-link').style.display='';if(null!=textarea&&'text'==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom('<?php $this->respondId(); ?>'),holder=this.dom('comment-form-place-holder'),input=this.dom('comment-parent');if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom('cancel-comment-reply-link').style.display='none';holder.parentNode.insertBefore(response,holder);return false}}})();</script>
<?php endif; ?>
</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>