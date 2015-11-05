# OpenWebAnalyticsTracker
A mediawiki extension for Open Web Analytics.

# What

 - This extension is made for MediaWiki 1.25.1 (it has been tested on this version)
 - It adds the Open Web Analytics Tracker (the javascript peice of code) on all pages.
 - So, you need to have installed Open Web Analytics somewhere...

# How

Goto your OWA admin page, and get your site ide : YOUR_OPEN_WEB_ANALYTICS_SITE_ID

Use it , in Your LocalSettings.php, add 

```php
/********************** Begin Open-Web-Analytics *************/
require_once ("$IP/extensions/OpenWebAnalyticsTracker/OpenWebAnalyticsTracker.php");
$wgOwaSiteId = 'YOUR_OPEN_WEB_ANALYTICS_SITE_ID';
/********************** End Open-Web-Analytics  *************/
```


That's all.
