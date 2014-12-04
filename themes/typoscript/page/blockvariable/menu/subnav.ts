//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
// 
// Topnavigation in page 
// 
//


lib.subnav = HMENU
lib.subnav.entryLevel=1
lib.subnav.1 = TMENU
lib.subnav.1 {
  wrap = <ul class="subnavi">|</ul>
  expAll = 0
  NO.allWrap = <li class="mainNaviItem">|</li>
  RO < .NO
  RO = 1
  CUR < .NO
  CUR = 1
  CUR.allWrap = <li class="mainNaviItemActive">|</li>
  ACT < .CUR
}