Early page initi script in wordpress header, can be used as an early reference for location and post type

````javascript
addLoadEvent = function(func){
    
    if (typeof jQuery != "undefined") 
        jQuery(document).ready(func);
    
    else if( typeof wpOnload != 'function'){ 
        wpOnload=func; 
    }
    
    else{
        var oldonload = wpOnload; 
        wpOnload=function(){ 
            oldonload();
            func();
        } 
    } 
};

var ajaxurl = '/wp-admin/admin-ajax.php',
	pagenow = 'landing_page',
	typenow = 'landing_page',
	adminpage = 'post-php',
	thousandsSeparator = ',',
	decimalPoint = '.',
	isRtl = 0;
	
````





http://192.168.1.113:8081/wp-admin/load-styles.php?c=0&dir=ltr&load%5B%5D=dashicons,admin-bar,common,forms,admin-menu,dashboard,list-tables,edit,revisions,media,themes,about,nav-menus,wp-pointer,widgets&load%5B%5D=,site-icon,l10n,buttons,media-views,wp-auth-check&ver=4.9.4