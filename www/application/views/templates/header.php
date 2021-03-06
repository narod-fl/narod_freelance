<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php echo H($title); ?></title>
	<link rel="stylesheet" href="/css/style.css" type="text/css" />
	<style type="text/css">
	</style>
</head>
<body>
<?php if(!isset($notopmenu)): ?>
<div class="header">
	<div class="menu">
<?php	
if(!isset($section)) $section = 'projects';
$_menu_links = array(
#	'main'		=> array('', 		'Главная'),
	'projects'	=> array('projects', 	'Проекты'),
	'tags'		=> array('tags', 	'Теги'),
	'projects/create'	=> array('projects/create', 'Добавить проект'),
//	'about'		=> array('', ''),
);

if($this->session->loginned){
	$_menu_links[] = array('logout', 'Выход');
}else{
	$_menu_links[] = array('login', 'Вход');
}

foreach($_menu_links as $_section => $a){
	$_css_class = ($_section == $section) ? "active" : "";
	list($_href, $_text) = $a;
	$_href = site_url($_href);
	echo <<<EOS
		<a class="$_css_class" href="$_href" title="$_text">$_text</a>
EOS;
	}
?>
	</div>
</div>
<?php endif; ?>
<?
#var_dump( $this->session->login );
if(!isset($this->session->login)){
	$this->session->set_userdata('login', '');
}

if(!$this->session->loginned){
	$this->session->set_userdata('loginned', '0');
}
?>
<div id="container">
	<h1><?=H($title);?></h1>
	<div id="body">
