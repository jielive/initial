<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<?php if ($this->options->DNSPrefetch == 'able'): ?>
<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="//cdn.bootcss.com" />
<link rel="dns-prefetch" href="//secure.gravatar.com" />
<?php if ($this->options->cjcdnAddress): ?>
<link rel="dns-prefetch" href="<?php $this->options->cjcdnAddress(); ?>" />
<?php endif; ?>
<?php endif; ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php if ($this->options->favicon): ?>
<link rel="shortcut icon" href="<?php $this->options->favicon(); ?>">
<?php endif; if($this->options->iosicon): ?>
<link rel="apple-touch-icon" href="<?php $this->options->iosicon();?>">
<?php endif; ?>
<title><?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'author'    =>  _t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&antiSpam=&atom='); ?>
<link rel="stylesheet" href="//cdn.bootcss.com/normalize/8.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php if ($this->options->cjcdnAddress): $this->options->cjcdnAddress(); ?>/style.css<?php else: $this->options->themeUrl('style.css'); endif; ?>">
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!--[if lt IE 8]>
<div class="browsehappy"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<header id="header" class="clearfix">
<div class="container">
<div class="row">
<div class="col site-name">
<?php if ($this->options->logoUrl): ?>
<h1>
<a id="logo" href="<?php $this->options->siteUrl(); ?>">
<img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" />
</a>
</h1>
<?php else: ?>
<h1>
<a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php if ($this->options->customtitle): $this->options->customtitle(); else: $this->options->title(); endif; ?></a>
</h1>
<p class="description"><?php if ($this->options->customdescription): $this->options->customdescription(); else: $this->options->description(); endif; ?></p>
<?php endif; ?>
</div>
<div class="col site-search">
<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
<input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" required />
<button type="submit"></button>
</form>
</div>
<div class="col nav">
<nav id="nav-menu" class="clearfix">
<a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
<?php endwhile; ?>
</nav>
</div>
<?php if ($this->options->PjaxOption == 'able'): ?>
<div id="loadingbar"></div>
<?php endif; ?>
</div>
</div>
</header>
<div id="body">
<div class="container">
<div class="row">
