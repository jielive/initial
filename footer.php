<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
</div>
<footer id="footer">
<div class="container">
<?php if (!empty($this->options->ShowLinks) && in_array('footer', $this->options->ShowLinks)): ?>
<ul class="links">
<?php Links($this->options->IndexLinksSort); ?>
<?php if (FindContents('page-links.php', 'order', 'a', 1)): ?>
<li><a href="<?php echo FindContents('page-links.php', 'order', 'a', 1)[0]['permalink']; ?>">更多...</a></li>
<?php endif; ?>
</ul>
<?php endif; ?>
<p>&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>. Powered by <a href="http://www.typecho.org" target="_blank">Typecho</a> &amp; <a href="http://www.offodd.com/17.html" target="_blank">Initial</a>.</p>
<?php if ($this->options->ICPbeian): ?>
<p><a href="http://beian.miit.gov.cn" class="icpnum" target="_blank" rel="noreferrer"><?php $this->options->ICPbeian(); ?></a></p>
<?php endif; if ($this->options->AjaxLoad): ?>
<input id="token" type="hidden" value="<?php echo Typecho_Widget::widget('Widget_Security')->getTokenUrl('Token'); ?>" readonly="readonly" />
<?php endif; ?>
</div>
</footer>
<?php if ($this->options->scrollTop || ($this->options->MusicSet && $this->options->MusicUrl)): ?>
<div id="cornertool">
<ul>
<?php if ($this->options->scrollTop): ?>
<li id="top" class="hidden"></li>
<?php endif; ?>
<li id="darkmode" onclick="switchDarkMode()"><?php if($_COOKIE['dark']=='1'){echo"☀️";}else{echo"🌙";} ?></li>
<?php if ($this->options->MusicSet && $this->options->MusicUrl): ?>
<li id="music" class="hidden">
<span><i></i></span>
<audio id="audio" data-src="<?php Playlist() ?>"<?php if ($this->options->MusicVol): ?> data-vol="<?php $this->options->MusicVol(); ?>"<?php endif; ?> preload="none"></audio>
</li>
<?php endif; ?>
</ul>
</div>
<?php endif; if ($this->options->PjaxOption || $this->options->AjaxLoad): ?>
<script src="//<?php if ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js<?php elseif ($this->options->cjCDN == 'sc'): ?>cdn.staticfile.org/jquery/2.1.4/jquery.min.js<?php else: ?>cdn.jsdelivr.net/npm/jquery@2.1.4/dist/jquery.min.js<?php endif; ?>"></script>
<?php endif; if ($this->options->PjaxOption): ?>
<script src="//<?php if ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js<?php elseif ($this->options->cjCDN == 'sc'): ?>cdn.staticfile.org/jquery.pjax/2.0.1/jquery.pjax.min.js<?php else: ?>cdn.jsdelivr.net/npm/jquery-pjax@2.0.1/jquery.pjax.min.js<?php endif; ?>"></script>
<?php endif; if ($this->options->Highlight):?>
<script src="//<?php if ($this->options->cjCDN == 'cf'): ?>cdnjs.cloudflare.com/ajax/libs/highlight.js/10.2.0/highlight.min.js<?php elseif ($this->options->cjCDN == 'sc'): ?>cdn.staticfile.org/highlight.js/10.2.0/highlight.min.js<?php else: ?>cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.0/build/highlight.min.js<?php endif; ?>"></script>
<?php endif; ?>
<script src="<?php cjUrl('main.min.js') ?>"></script>
<?php $this->footer(); ?>
<?php if ($this->options->CustomContent): $this->options->CustomContent(); ?>

<?php endif; ?>
<script>
function switchDarkMode(){
    var night = document.cookie.replace(/(?:(?:^|.*;\s*)dark\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
    if (night == '0'){
        document.body.classList.add('dark');
        document.cookie = "dark=1;path=/";
        console.log('Dark mode on');
        document.getElementById("darkmode").innerHTML="☀️";
    }else{
        document.body.classList.remove('dark');
        document.cookie = "dark=0;path=/";
        console.log('Dark mode off');
        document.getElementById("darkmode").innerHTML="🌙";
    }
}
(function(){
    if(document.cookie.replace(/(?:(?:^|.*;\s*)dark\s*\=\s*([^;]*).*$)|^.*$/, "$1") === ''){
        if(new Date().getHours() > 22 || new Date().getHours() < 6 || (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
)){
            document.body.classList.add('dark');
            document.cookie = "dark=1;path=/";
            console.log('Dark mode on');
            document.getElementById("darkmode").innerHTML="☀️";
        }else{
            document.body.classList.remove('dark');
            document.cookie = "dark=0;path=/";
            console.log('Dark mode off');
            document.getElementById("darkmode").innerHTML="🌙";
        }
    }else{
        var dark = document.cookie.replace(/(?:(?:^|.*;\s*)dark\s*\=\s*([^;]*).*$)|^.*$/, "$1") || '0';
        if(dark == '0'){
            document.body.classList.remove('dark');
        }else if(dark == '1'){
            document.body.classList.add('dark');
        }
    }
})();
</script>
</body>
</html><?php if ($this->options->compressHtml): $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); endif; ?>