<?php
/**
 * 轻语
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
$this->options->commentsThreaded = true;
$this->options->commentsMaxNestingLevels = '3';
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
<li id="li-<?php $comments->theId(); ?>" class="<?php
	if ($comments->levels == 0) {
		echo ' whisper-body';
	} elseif ($comments->levels == 1) {
		echo 'comment-body comment-parent';
	} else {
		echo 'comment-body comment-child';
	}
echo $commentClass;
?>">
<div id="<?php $comments->theId(); ?>"<?php
	if ($comments->levels > 0) {
		echo ' class="comment-whisper"';
	}
?>>
<?php if ($comments->levels == 0) { ?>
<div class="comment-author">
<?php $comments->gravatar('32'); ?>
<b><?php CommentAuthor($comments); ?></b>
<?php if ($comments->status == 'waiting') { ?>
<em>内容被拦截，请前往后台-管理评论-通过审核。</em>
<?php } ?>
</div>
<div class="comment-content">
<?php echo strip_tags(hrefOpen(Markdown::convert($comments->text)), '<p><br><strong><a><img><pre><code>' . Helper::options()->commentsHTMLTagAllowed); ?>
</div>
<div class="comment-meta">
<time><?php $comments->dateWord(); ?></time>
<?php if ($comments->parameter->allowComment || Typecho_Widget::widget('Widget_User')->pass('editor', true)) {
		echo '<a class="whisper-reply" onclick="return TypechoComment.reply(\'' . $comments->theId . '\', ' . $comments->coid . ');">评论</a>';
} ?>
</div>
<?php } else { ?>
<div class="comment-author comment-content">
<a <?php
	if ($comments->parameter->allowComment || Typecho_Widget::widget('Widget_User')->pass('editor', true)) {
		echo ' class="whisper-reply" title="@' . $comments->author . '" onclick="return TypechoComment.reply(\'' . $comments->theId . '\', ' . $comments->coid . ');"';
	}
?>><?php $comments->gravatar('16'); ?></a>
<b><?php CommentAuthor($comments); ?>: </b>
<span <?php
	if ($comments->parameter->allowComment || Typecho_Widget::widget('Widget_User')->pass('editor', true)) {
		echo ' class="whisper-reply" onclick="return TypechoComment.reply(\'' . $comments->theId . '\', ' . $comments->coid . ');"';
	}
?>><?php if ($comments->levels > 1) {CommentAt($comments->coid);}echo strip_tags(str_replace(PHP_EOL, "<br>", $comments->text), "<br>"); ?></span>
<?php if ($comments->status == 'waiting') { ?>
<em>您的评论正等待审核！</em>
<?php } ?>
</div>
<?php } ?>
</div>
<?php if ($comments->children) { ?>
<div class="comment-children">
<?php $comments->threadedComments($options); ?>
</div>
<?php } ?>
</li>
<?php } ?>
<div id="main">
<?php Breadcrumbs($this); ?>
<article class="post">
<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
<div class="post-content">
<?php $this->content(); ?>
</div>
</article>
<div id="comments" class="whisper<?php if($this->user->pass('editor', true)): ?> permission<?php endif; ?>">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<?php $comments->listComments(); ?>
<?php $comments->pageNav('上一页', '下一页', 0, '..'); ?>
<?php endif; ?>
<?php if($this->allow('comment') || $this->user->pass('editor', true)): ?>
<div id="<?php $this->respondId(); ?>" class="respond">
<div class="cancel-comment-reply">
<?php $comments->cancelReply('取消评论'); ?>
</div>
<h3 id="response">发表<?php echo $this->user->pass('editor', true) ? '轻语' : '评论' ?></h3>
<form method="post"<?php if($this->user->pass('editor', true)): ?> action="<?php $this->commentUrl() ?>"<?php endif; ?> id="comment-form"<?php if(!$this->user->hasLogin()): ?> class="comment-form clearfix"<?php endif; ?>>
<p <?php if(!$this->user->hasLogin()): ?>class="textarea"<?php endif; ?>>
<textarea name="text" id="textarea" placeholder="说点什么..." required ><?php $this->remember('text'); ?></textarea>
</p>
<p <?php if(!$this->user->hasLogin()): ?>class="textbutton"<?php endif; ?>>
<?php if(!$this->user->hasLogin()): ?>
<input type="text" name="author" id="author" class="text" placeholder="称呼 *" value="<?php $this->remember('author'); ?>" required />
<input type="email" name="mail" id="mail" class="text" placeholder="邮箱<?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
<input type="url" name="url" id="url" class="text" placeholder="http://<?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
<?php endif; ?>
<button type="submit" class="submit">提交</button>
</p>
</form>
</div>
<script>(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom('<?php $this->respondId(); ?>'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0],textarea=response.getElementsByTagName('textarea')[0];if(null==input){input=this.create('input',{'type':'hidden','name':'parent','id':'comment-parent'});form.appendChild(input)}input.setAttribute('value',coid);if(null==this.dom('comment-form-place-holder')){var holder=this.create('div',{'id':'comment-form-place-holder'});response.parentNode.insertBefore(holder,response)}form.setAttribute('action', '<?php $this->commentUrl() ?>');<?php if($this->user->pass('editor', true)): ?>this.dom('response').innerHTML='发表评论';<?php endif; ?>comment.appendChild(response);this.dom('cancel-comment-reply-link').style.display='';if(null!=textarea&&'text'==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom('<?php $this->respondId(); ?>'),holder=this.dom('comment-form-place-holder'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0];if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom('cancel-comment-reply-link').style.display='none';form.removeAttribute('action');<?php if($this->user->pass('editor', true)): ?>this.dom('response').innerHTML='发表轻语';<?php endif; ?>holder.parentNode.insertBefore(response,holder);return false}}})();</script>
<?php endif; ?>
</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>