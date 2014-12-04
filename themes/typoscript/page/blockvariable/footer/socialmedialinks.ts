//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// social media icons menu

lib.socialmedia = COA
lib.socialmedia {
  10 = TEXT
  10 {
    typolink.parameter.data = TSFE:id
	typolink.returnLast = url
	dataWrap = <ul><li><a class="icon fb" onClick="window.open('http://www.facebook.com/sharer.php?app_id=309437425817038&amp;sdk=joey&amp;u=|&amp;display=popup&amp;ref=plugin', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0);">fb</a>
  }
  20 = TEXT
  20.value = <li><a class="icon tw" href="http://twitter.com/#!/GZO_Spital" target="_blank">Twitter</a></li>
  30 = TEXT
  30.value = <li><a class="icon gplus" href="https://plus.google.com/100422188118510718787" target="_blank">Google Plus</a></li></ul>
 }