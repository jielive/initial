<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>" />
<?php if ($this->options->DNSPrefetch == 'able'): ?>
<meta http-equiv="x-dns-prefetch-control" content="on" />
<?php if ($this->options->cjcdnAddress): ?>
<link rel="dns-prefetch" href="<?php $this->options->cjcdnAddress(); ?>" />
<?php endif; ?>
<link rel="dns-prefetch" href="//<?php if ($this->options->cjCDN == 'bc'): ?>cdn.bootcss.com<?php elseif ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com<?php else: ?>cdn.jsdelivr.net<?php endif; ?>" />
<link rel="dns-prefetch" href="//secure.gravatar.com" />
<?php endif; ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="renderer" content="webkit" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php if ($this->options->favicon): ?>
<link rel="shortcut icon" href="<?php $this->options->favicon(); ?>" />
<?php endif; if($this->options->iosicon): ?>
<link rel="apple-touch-icon" href="<?php $this->options->iosicon();?>" />
<?php endif; ?>
<title><?php $this->archiveTitle(array(
'category'  =>  _t('分类 %s 下的文章'),
'search'    =>  _t('包含关键字 %s 的文章'),
'tag'       =>  _t('标签 %s 下的文章'),
'author'    =>  _t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); if ($this->is('index') && $this->options->subTitle): ?> - <?php $this->options->subTitle(); endif; ?></title>
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&antiSpam=&atom='); ?>
<link rel="stylesheet" href="<?php if ($this->options->cjcdnAddress): $this->options->cjcdnAddress(); ?>/style.min.css<?php else: $this->options->themeUrl('style.min.css'); endif; ?>" />
<!--[if lt IE 9]>
<script src="//<?php if ($this->options->cjCDN == 'bc'): ?>cdn.bootcss.com/html5shiv/r29/html5.min.js<?php elseif ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js<?php else: ?>cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js<?php endif; ?>"></script>
<script src="//<?php if ($this->options->cjCDN == 'bc'): ?>cdn.bootcss.com/respond.js/1.4.2/respond.min.js<?php elseif ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js<?php else: ?>cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js<?php endif; ?>"></script>
<![endif]-->
</head>
<body <?php if ($this->options->HeadFixed == 'able'): ?>class="head-fixed"<?php endif; ?>>
<!--[if lt IE 8]>
<div class="browsehappy">当前网页可能 <strong>不支持</strong> 您正在使用的浏览器. 为了正常的访问, 请 <a href="https://browsehappy.com/">升级您的浏览器</a>.</div>
<![endif]-->
<header id="header">
<div class="container clearfix">
<div class="site-name">
<?php if ($this->options->logoUrl): ?>
<h1>
<a id="logo" href="<?php $this->options->siteUrl(); ?>">
<img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" title="<?php $this->options->title() ?>" />
</a>
</h1>
<?php else: ?>
<h1>
<a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php if ($this->options->customTitle): $this->options->customTitle(); else: $this->options->title(); endif; ?></a>
</h1>
<?php endif; ?>
</div>
<button id="nav-swith"><span></span></button>
<div id="nav">
<div id="site-search">
<form id="search" method="post" action="<?php $this->options->siteUrl(); ?>">
<input type="text" id="s" name="s" class="text" placeholder="输入关键字搜索" required />
<button type="submit"></button>
</form>
</div>
<ul class="nav-menu">
<li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
<?php if (!empty($this->options->Navset) && in_array('ShowCategory', $this->options->Navset)): ?>
<?php if (!empty($this->options->Navset) && in_array('AggCategory', $this->options->Navset)): ?>
<li class="nav-menu-2"><a><?php if ($this->options->CategoryText): $this->options->CategoryText(); else: ?>分类<?php endif; ?></a>
<ul>
<?php endif; ?>
<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
<?php while($categorys->next()): ?>
<li><a href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a></li>
<?php endwhile; ?>
<?php if (!empty($this->options->Navset) && in_array('AggCategory', $this->options->Navset)): ?>
</ul>
<?php endif; ?>
<?php endif; ?>
<?php if (!empty($this->options->Navset) && in_array('ShowPage', $this->options->Navset)): ?>
<?php if (!empty($this->options->Navset) && in_array('AggPage', $this->options->Navset)): ?>
<li class="nav-menu-2"><a><?php if ($this->options->PageText): $this->options->PageText(); else: ?>其他<?php endif; ?></a>
<ul>
<?php endif; ?>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>
<?php if (!empty($this->options->Navset) && in_array('AggPage', $this->options->Navset)): ?>
</ul>
<?php endif; ?>
<?php endif; ?>
</ul>
</div>
</div>
</header>
<div id="body">
<div class="container clearfix">
