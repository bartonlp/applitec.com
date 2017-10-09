# Applied Technology Resouces Inc.

This is Applitec.com on my server 45.55.27.116 at DigitalOcean.com.
45.55.27.116 is a VPS (virtual private server).

The files now use the 'UpdateSite' class at '/var/www/vendor/bartonlp/updatesite' which lets the content be edited via the web. To edit the files use 'updatesite.php' and select the message area you want to edit. All of the text is contained in the 'site' table of the 'applitec' mysql database.

The "References" are now available via 'updatesite.php' under the 'Select Page [refernc.php]' and are no longer in a seperate table.

For each file name in the 'updatesite.php' 'Select Page' pull-down (index.php, refernc.php, contacts.php, applitecSitemap.php, AtriBio.php) there are three 'ItemName' items: Message1, CSS and BANNER. The 'Message1' contains the body HTML. The CSS contains the css (if any) and needs a &lt;style&gt;...&lt;/style&gt; prefix and suffix. The BANNER is the main title (if any). Normally the CSS and BANNER are empty.



