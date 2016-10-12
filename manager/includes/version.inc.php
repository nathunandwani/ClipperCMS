<?php
define('CMS_DOMAIN', 'clippercms.com');
define('CMS_NAME', 'ClipperCMS');

define('CMS_RELEASE_VERSION', '1.3.1');
define('CMS_RELEASE_NAME', 'Thermopylae');
define('CMS_RELEASE_DATE', '6 Aug 2016');

define('CMS_FULL_APPNAME', CMS_NAME.' '.CMS_RELEASE_NAME.' ('.CMS_RELEASE_DATE.')');

// For backwards compatability
// ---------------------------

$modx_version = CMS_RELEASE_VERSION;
$modx_release_date = CMS_RELEASE_DATE;
$modx_branch = CMS_NAME;

$modx_full_appname = CMS_FULL_APPNAME;

