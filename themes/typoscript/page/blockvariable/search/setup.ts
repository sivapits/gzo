//
//	Project:	
//	Version:	1.0.0
//	Date:
//	Auhor:		
//

// 
// search box [indexsearch form]
//

lib.search = COA_INT
lib.search {
  10 = TEXT
  10.typolink.parameter = {$searchPage}
  10.typolink.returnLast = url
  10.wrap = <form action="|" method="post" id="indexedsearch"><fieldset><legend>Site search</legend>
  20 = COA
  20 {
    10 = TEXT
    10.data = GP:tx_indexedsearch|sword
    10.wrap = <label><span>Search keyword(s):</span><lable class="rem">Search</label><input type="text" maxlength="32" size="20" value="|" name="tx_indexedsearch[sword]" id="tx-indexedsearch-searchbox-sword"   /></label><button name="tx_indexedsearch[submit_button]" value="{$searchLabel}" id="tx-indexedsearch-searchbox-button-submit" type="submit" class="search"><span>Search</span></button>
    20 = COA
    20 {
      10 = TEXT
      10.value (
        <div style="display:none;" class="hide">
         <input type="hidden" name="tx_indexedsearch[sections]" value="0" />
         <input name="tx_indexedsearch[submit_button]" value="Search" type="hidden" />
        </div>
      )
      15 = TEXT
      15.value = <div style="display:none;"><input type="hidden" name="tx_indexedsearch[lang]" value="0"/></div></fieldset></form>
    
    }
  }

  wrap = |
}

[globalVar = GP:L = 1]
lib.search.20.20.15.value = <div style="display:none;"><input type="hidden" name="tx_indexedsearch[lang]" value="1"/></fieldset></form>
[global]

#    <form action="post" method="#" id="search-form">
#              <input type="submit" class="btn-search" value="search">
#            </form>


lib.mobsearch = COA
lib.mobsearch{
5 = TEXT
5.value = <div class="mob-search desktop-hide"><div class="search mob-mode">

10 < plugin.tx_solr_pi_search
10.templateFiles.search = fileadmin/themes/templates/extensions/solr/pi_search/search-mob.htm

15 = TEXT
15.value = </div><span class="mob-button"></span></div>

}
