<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php if ($this->options->favicon): ?>
<link rel="shortcut icon" href="<?php $this->options->favicon(); ?>" />
<?php endif; ?>
<title><?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'date'      =>  _t('在 %s 发布的文章'),
'author'    =>  _t('作者 %s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); if ($this->is('index') && $this->options->subTitle): ?> - <?php $this->options->subTitle(); endif; ?></title>
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&antiSpam=&atom='); ?>
<style>
    /* Dark mode */
    body.dark {
        background-color: #0d1117;
        color: #aaa;
    }
    body.dark .rewards a, body.dark .tags a, body.dark .comment-author a , body.dark .post-content a, body.dark .comment-content a {
        color: #6a85ca;
        border-bottom: 0px;
    }
    body.dark a, body.dark .nav-menu ul a, body.dark .post-content .more a, body.dark .post-meta {
        color: #888;
    }
    body.dark #header , body.dark .whisper .comment-list li.comment-parent , body.dark table td {
        background-color: #0d1117;
        border-bottom: 1px solid #182125;
    }
    body.dark table td , body.dark table th {
        border: 1px solid #182125;
    }
    body.dark #logo, body.dark .post-title a , body.dark .comment-author , body.dark blockquote {
        color: #aaa!important;
    }
    body.dark pre, body.dark code, body.dark input, body.dark textarea , body.dark button , body.dark blockquote , body.dark .post-content .links li a , body.dark .menu-parent ul , body.dark .comment-list li.comment-level-odd , body.dark .comment-list li.comment-by-author , body.dark .whisper .comment-child , body.dark table tr , body.dark table th {
        background: #161b22;
        color: #aaa;
    }
    body.dark .author-icon {
        background: linear-gradient(135deg,transparent 30%,rgba(111, 111, 111, 0.8) 0) left,linear-gradient(-135deg,transparent 30%,rgba(111, 111, 111, 0.8) 0) right;
        background-size: 50% 100%;
        background-repeat: no-repeat;
    }
    body.dark .menu-parent ul:before {
        border-bottom: 7px solid #161b22;
    }
    body.dark .post-content .links li a i {
        background: #808080;
        color: #aaa;
    }
    body.dark .post-content .links a {
        color: #aaa;
    }
    body.dark blockquote {
        border-left: 4px solid #2c383e;
    }
    body.dark textarea , body.dark .comment-list li  {
        border: 1px solid #161b22;
        color: #aaa;
    }
    body.dark button , body.dark pre code , body.dark blockquote {
        color: #aaa;
    }
    body.dark img {
        filter: brightness(50%);
    }
    body.dark #footer , body.dark .comment-list .respond{
        border-top: 1px solid #161b22;
    }
    body.dark .post-meta li {
        border-left: 1px solid #888;
    }
    body.dark .post-meta li:first-child {
        padding: 0;
        border: 0;
    }
    body.dark .ajaxload a, body.dark .ajaxload .loading:hover, body.dark .ajaxload .loading {
        color: #aaa;!important
    }
    /* 滚动条 */
    body.dark *::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }
    body.dark *::-webkit-scrollbar-thumb {
        background: #aaa;
    }
    body.dark *::-webkit-scrollbar-track {
        background: #161b22;
    }
    body.dark *::-webkit-scrollbar-corner {
        background: #161b22;
    }
    body.dark::-webkit-scrollbar-thumb {
        background: #aaa;
    }
    body.dark::-webkit-scrollbar-track {
        background: #161b22;
    }
    body.dark::-webkit-scrollbar-corner {
        background: #161b22;
    }
    /* Notice */
    body.dark .notie {
        background: rgba(0,0,0,.7)!important;
    }
</style>
<link rel="stylesheet" href="<?php cjUrl('style.min.css') ?>" />
<?php if ($this->options->CustomCSS): ?>
<style type="text/css"><?php $this->options->CustomCSS(); ?></style>
<?php endif; ?>


<script>
    // 在代码块右上角添加复制按钮
    document.addEventListener('DOMContentLoaded', initCodeCopyButton);
    function initCodeCopyButton() {
        function initCSS(callback) {
            const css = `
                .btn-code-copy {
                    position: absolute;
                    line-height: .6em;
                    top: .2em;
                    right: .2em;
                    color: rgb(87, 87, 87);
                }
                .btn-code-copy:hover {
                    color: rgb(145, 145, 145);
                    cursor: pointer;
                }
                `;
            const styleId = btoa('btn-code-copy').replace(/[=+\/]/g, '');
            const head = document.getElementsByTagName('head')[0];
            if (!head.querySelector('#' + styleId)) {
                const style = document.createElement('style');
                style.id = styleId;
                if (style.styleSheet) {
                    style.styleSheet.cssText = css;
                } else {
                    style.appendChild(document.createTextNode(css));
                }
                head.appendChild(style);
            }
            callback();
        };
        function copyTextContent(source) {
            let result = false;
            const target = document.createElement('pre');
            target.style.opacity = '0';
            target.textContent = source.textContent;
            document.body.appendChild(target);
            try {
                const range = document.createRange();
                range.selectNode(target);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
                result = true;
            } catch (e) { console.log('copy failed.'); }
            document.body.removeChild(target);
            return result;
        };
        function initButton(pre) {
            const code = pre.querySelector('code');
            if (code) {
                const preParent = pre.parentElement;
                const newPreParent = document.createElement('div');
                newPreParent.style = 'position: relative';
                preParent.insertBefore(newPreParent, pre);
                const copyBtn = document.createElement('div');
                copyBtn.innerHTML = 'copy';
                copyBtn.className = 'btn-code-copy';
                copyBtn.addEventListener('click', () => {
                    copyBtn.innerHTML = copyTextContent(code) ? 'success' : 'failure';
                    setTimeout(() => copyBtn.innerHTML = 'copy', 250);
                });
                newPreParent.appendChild(copyBtn);
                newPreParent.appendChild(pre);
            }
        };
        const pres = document.querySelectorAll('pre');
        if (pres.length !== 0) {
            initCSS(() => pres.forEach(pre => initButton(pre)));
        }
    };
</script>
</head>
<body class="<?php if($_COOKIE['dark']=='1'): ?>dark<?php endif; ?> <?php if ($this->options->HeadFixed): ?>head-fixed<?php endif; ?>">
<!--[if lt IE 9]>
<div class="browsehappy">当前网页可能 <strong>不支持</strong> 您正在使用的浏览器. 为了正常的访问, 请 <a href="https://browsehappy.com/">升级您的浏览器</a>.</div>
<![endif]-->
<header id="header">
<div class="container clearfix">
<div class="site-name">
<<?php echo $this->is('post') || $this->is('page') ? 'p' : 'h1' ?> class="site-title">
<a id="logo" href="<?php $this->options->siteUrl(); ?>" rel="home"><?php if ($this->options->logoUrl && ($this->options->titleForm == 'logo' || $this->options->titleForm == 'all')): ?><img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" /><?php endif; ($this->options->titleForm == 'logo' && $this->options->logoUrl) ? '' : ($this->options->customTitle ? $this->options->customTitle() : $this->options->title()) ?>
</a>
</<?php echo $this->is('post') || $this->is('page') ? 'p' : 'h1' ?>>
</div>
<script>function Navswith(){document.getElementById("header").classList.toggle("on")}</script>
<script>
	window.onload=function ()
    {
        var omenubtn = document.getElementById('menubtn');
        var oull = document.getElementById('ull');
        omenubtn.onclick=function ()
        {
            if(oull.style.display=='none')
            {
               oull.style.display='block'
            }
            else
            {
                oull.style.display='none'
            }
        }
    }
</script>
<button id="nav-swith" onclick="Navswith()"><span></span></button>
<div id="nav">
<div id="site-search">
<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
<input type="text" id="s" name="s" class="text" placeholder="输入关键字搜索" required />
<button type="submit"></button>
</form>
</div>
<ul class="nav-menu">
<li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
<?php if (!empty($this->options->Navset) && in_array('ShowCategory', $this->options->Navset)): if (in_array('AggCategory', $this->options->Navset)): ?>
    <li class="menu-parent" id="menubtn" onclick="Menuswith()"><a><?php if ($this->options->CategoryText): $this->options->CategoryText(); else: ?>分类<?php endif; ?></a>
<ul id="ull" style="display: none;">
<ul>
<?php
endif;
$this->widget('Widget_Metas_Category_List')->to($categorys);
while($categorys->next()):
if ($categorys->levels == 0):
$children = $categorys->getAllChildren($categorys->mid);
if (empty($children)):
?>
<li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
<?php else: ?>
<li class="menu-parent">
<a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
<ul class="menu-child">
<?php foreach ($children as $mid) {
$child = $categorys->getCategory($mid); ?>
<li><a href="<?php echo $child['permalink'] ?>" title="<?php echo $child['name']; ?>"><?php echo $child['name']; ?></a></li>
<?php } ?>
</ul>
</li>
<?php
endif;
endif;
endwhile;
?>
<?php if (in_array('AggCategory', $this->options->Navset)): ?>
</ul>
</li>
<?php
endif;
endif;
if (!empty($this->options->Navset) && in_array('ShowPage', $this->options->Navset)):
if (in_array('AggPage', $this->options->Navset)):
?>
<li class="menu-parent"><a><?php echo $this->options->PageText ? $this->options->PageText : '其他' ?></a>
<ul>
<?php
endif;
$this->widget('Widget_Contents_Page_List')->to($pages);
while($pages->next()):
?>
<li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile;
if (in_array('AggPage', $this->options->Navset)): ?>
</ul>
</li>
<?php endif;
endif; ?>
</ul>
</div>
</div>
</header>
<div id="body"<?php if ($this->options->PjaxOption): ?> in-pjax<?php endif; ?>>
<div class="container clearfix">
