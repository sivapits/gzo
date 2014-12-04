//
//	Project: GZO	
//	Version:	1.0.0
//	Date:
//	Auhor:	Azeef	
// 
//  facebook like and recommend, twitter share
//

lib.facebook = COA

lib.facebook{
    5 = TEXT
    5.value=<div id="iframe-facebook" class="facebook-share"></div><script>setTimeout(function(){  document.getElementById("iframe-facebook").innerHTML = '<iframe src="http://www.facebook.com/plugins/like.php?href=
    10 = COA
    10 {
      # This part creates an URL pointing to the current page
      # including all parameters from the query string.
      20 = TEXT
      20.typolink.parameter.data = page:uid
      20.typolink.addQueryString = 1
      20.typolink.addQueryString.exclude = id
      20.typolink.returnLast = url
       
      # Then everything is rawUrlEncoded so it can
      # be placed as a single parameter in the link URL
      stdWrap.rawUrlEncode = 1
    }
  
    15 = TEXT
    15.value = &amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=recommend&amp;colorscheme=light&amp;font&amp;height=35&amp;appId=318460288173268&share=true&show_faces=true&width=100&locale=de_DE" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:320px; height:35px;" allowTransparency="true"></iframe>'; },3000);</script>
    
    20 = TEXT
    20.value = <div class="clear"></div>       
  
}

lib.fbtweet = COA
lib.fbtweet{
  10 < lib.facebook
  20 = TEXT
  20.value(
    <div class="twitter"> <a href="https://twitter.com/share" class="twitter-share-button">Twitter</a> 
  <script type="text/javascript" src="/fileadmin/themes/templates/js/widgets.js"></script>
  
  <script type="text/javascript">
  /*<![CDATA[*/
  setTimeout(function(){  
  twttr.events.bind('tweet', function(event) {
  if (event) {
  var targetUrl;
  if (event.target && event.target.nodeName == 'IFRAME') {
  targetUrl = extractParamFromUri(event.target.src, 'url');
  }
  _gaq.push(['_trackSocial', 'twitter', 'tweet', targetUrl]);
  }
  });
  },10000);
  /*]]>*/
  </script>
</div>
  
  )
  
}