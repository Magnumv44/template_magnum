<?php
/**
 * Данный шаблон был разработан под для сайта http://www.magnum-blog.pp.ua
 * При копировнии данного шаблона в обезательно порядке уведомите адмнистрацию сайта http://www.magnum-blog.pp.ua
 * И пропишите копирайты разработчика:
 * Developed by Magnum http://www.magnum-blog.pp.ua
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
    	<jdoc:include type="head" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
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
                    		<a href="http://www.eomy.net/"><img src="http://www.eomy.net/eomy.net.3d-graf6.gif" border="0" alt="EOMY.NET: бесплатный хостинг" /></a>
                    	</div>
               		</div>
                </div>
            </div>
        </div>
        <!--Футер конец-->      	
	</body>
</html>