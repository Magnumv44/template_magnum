<?php
/**
 * Данный шаблон был разработан под для сайта http://www.magnumblog.space
 * При копировнии данного шаблона в обезательно порядке уведомите адмнистрацию сайта http://www.magnum-blog.pp.ua
 * А так же укажите копирайт разработчика:
 * Developed by Magnum http://www.magnumblog.space
 */
 	// No direct access.
	defined('_JEXEC') or  die;
	
	//подключение bootstrap css
	JHtml::_('bootstrap.framework');
	JHtmlBootstrap::loadCss(true);
	
	//подключение переменных Joomla
	$app      = JFactory::getApplication();
	
	//подключение настрйки логотипа в шоблоне
	//$tmpl_logo = $this->params->get('logo');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name='yandex-verification' content='5141454251eba7ae' />
        <meta name="yandex-verification" content="078ecede026c3de9" />
        <meta name="google-site-verification" content="3EutjLuhAK4xbS7NQzrUoQ6oYs5eTv3nWno9ZiEEdOU" />
        <meta name="wot-verification" content="0da95e472682f0116875"/>
    	<jdoc:include type="head" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
        <script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-1697908-1', 'auto');
			ga('send', 'pageview');
		</script>
    </head>
	<body>
    	<!--начало шапки-->
    	<div class="container-fluid">
  			<div class="row-fluid">
            	<div class="hidden-phone">
    				<div class="span10 logo">
                		<img id="logo" src="templates/<?php echo $this->template; ?>/images/logo.jpg" alt="Magnum news" />
                	</div>
                </div>
        	</div>
		</div>
        <!--конец шапки-->
        <!--Начало меню и контента-->
        <div class="container-fluid">
        	<div class="row-fluid con">
            	<div class="hidden-phone"> <!--Будет отображатся только на планшетах и компьютерах-->
            		<div class="span10 content">
                		<div class="span2">
                			<jdoc:include type="modules" name="left" style="rounded" />
                		</div>
                		<div class="span8">
                			<jdoc:include type="message" />
                   			<jdoc:include type="component" />
                		</div>
            		</div>
                </div>
            </div>
            <div class="visible-phone mobicontent"> <!--Будет отображатся только на телефонах-->
                <div class="span2">
                	<jdoc:include type="modules" name="left" style="rounded" />
                </div>
            	<div class="span8">
                	<jdoc:include type="message" />
                    <jdoc:include type="component" />
                </div>
            </div>
        </div>
        <!--Конец меню и контента-->
        <!--Футер начало-->
        <div class="container-fluid">
        	<div class="row-fluid">
            	<div class="hidden-phone"> <!--Будет отображатся только на планшетах и компьютерах-->
            		<div class="span10 powered">
                		<div class="span2 developed">
                    		Developed by: <a href="http://www.magnum-blog.pp.ua" title="Developed by Magnum">Magnum</a>
                    	</div>
                    	<div class="span8 counter">
                        	<script type="text/javascript" src="/orphus/orphus.js"></script>
                    		<a href="http://orphus.ru" id="orphus" target="_blank" rel="nofollow"><img alt="Система Orphus" src="/orphus/orphus.gif" width="88" height="31" /></a>
							<!-- begin of Top100 code -->
							<a href="http://top100.rambler.ru/navi/2264667/">
								<img src="http://counter.rambler.ru/top100.cnt?2264667" alt="Rambler's Top100" />
							</a>
							<!-- end of Top100 code -->                            
                    	</div>
               		</div>
                </div>
            </div>
        </div>
        <!--Футер конец-->
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/lightbox.js" type="text/javascript"></script>
	</body>
</html>