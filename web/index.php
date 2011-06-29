<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

if( substr_count($_SERVER["REQUEST_URI"], 'adminBlog')=='')
$configuration = ProjectConfiguration::getApplicationConfiguration('blog_frontend', 'prod', true);
else
$configuration = ProjectConfiguration::getApplicationConfiguration('blog_backend', 'prod', true);
sfContext::createInstance($configuration)->dispatch();
