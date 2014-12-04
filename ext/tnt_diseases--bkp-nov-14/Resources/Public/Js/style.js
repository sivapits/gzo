@font-face {
	font-family: 'roboto_slabregular';
	src: url('../fonts/robotoslab-regular-webfont.eot');
	src: url('../fonts/robotoslab-regular-webfont.eot?#iefix') format('embedded-opentype'), url('../fonts/robotoslab-regular-webfont.woff') format('woff'), url('../fonts/robotoslab-regular-webfont.ttf') format('truetype'), url('../fonts/robotoslab-regular-webfont.svg#roboto_slabregular') format('svg');
	font-weight: normal;
	font-style: normal;
}
@font-face {
	font-family: 'roboto_slabbold';
	src: url('../fonts/robotoslab-bold-webfont.eot');
	src: url('../fonts/robotoslab-bold-webfont.eot?#iefix') format('embedded-opentype'), url('../fonts/robotoslab-bold-webfont.woff') format('woff'), url('../fonts/robotoslab-bold-webfont.ttf') format('truetype'), url('../fonts/robotoslab-bold-webfont.svg#roboto_slabbold') format('svg');
	font-weight: normal;
	font-style: normal;
}
@font-face {
	font-family: 'roboto_slabthin';
	src: url('../fonts/robotoslab-thin-webfont.eot');
	src: url('../fonts/robotoslab-thin-webfont.eot?#iefix') format('embedded-opentype'), url('../fonts/robotoslab-thin-webfont.woff') format('woff'), url('../fonts/robotoslab-thin-webfont.ttf') format('truetype'), url('../fonts/robotoslab-thin-webfont.svg#roboto_slabthin') format('svg');
	font-weight: normal;
	font-style: normal;
}
@font-face {
	font-family: 'roboto_slablight';
	src: url('../fonts/robotoslab-light-webfont.eot');
	src: url('../fonts/robotoslab-light-webfont.eot?#iefix') format('embedded-opentype'), url('../fonts/robotoslab-light-webfont.woff') format('woff'), url('../fonts/robotoslab-light-webfont.ttf') format('truetype'), url('../fonts/robotoslab-light-webfont.svg#roboto_slablight') format('svg');
	font-weight: normal;
	font-style: normal;
}

/* global reset */
html, body {
	margin: 0;
	padding: 0;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	height: 100%;
	-webkit-overflow-scrolling: touch;
	min-width: 320px;
	position: relative;
}
h1, h2, h3, h4 {
	font-family: 'roboto_slabbold', Arial, Helvetica, sans-serif;
	color: #493d34;
}
h2, h1 {
	font-size: 32px;
}
h1 {
	font-size: 52px;
	margin: -8px 0px 25px;
}
a {
	color: #005a8c;
}
a:hover {
	text-decoration: none;
	color: #00456b
}
textarea {
	resize: none;
	padding: 5px;
	-webkit-appearance: none;
	box-shadow: none !important;
}
input[type="text"] {
	/* -webkit-appearance: none;
	*/	box-shadow: none !important;
	-webkit-appearance: none;
	-moz-appearance: none;
}
::-webkit-input-placeholder {
    color:#3f3f3f;
}

::-moz-placeholder {
    color:#3f3f3f;
}

::-ms-placeholder {
    color:#3f3f3f;
}

::placeholder {
    color:#3f3f3f;
}
.container {
	/* padding-right: 0;
	*/
}

/* remove focus ring from ff */
select:-moz-focusring {
	color: transparent;
	text-shadow: 0 0 0 #000;
}
a:focus {
	outline: 0;
}
.info {
	background: #ffcc00;
	padding-bottom: 10px;
	margin: 15px;
}
.documnets .info {
	background: #ffcc00;
	padding: 5px;
	margin: 0px;
	font: normal 12px arial;
}
.info-msg {
	border: 1px solid #00529b;
	padding: 5px;
	color: #00529b;
	background: #bde5f8;
	margin: 0px;
	font: normal 12px arial;
}
.info p {
	font-size: 23px;
	padding-right: 10%;
	line-height: 1.1em;
	color: #493d34;
	font-family: 'roboto_slablight', Arial, Helvetica, sans-serif;
}
.info h2 {
	font: bold 22px 'roboto_slabbold';
	margin: 14px 0px 0px 0px;
}
.mod.info p {
	font: normal 22px roboto_slablight;
	line-height: 1.1em
}
.mod.info p a {
	font: bold 22px 'roboto_slabbold';
	text-decoration: underline;
	color: #493d34;
}

/* generic styles */
span.align-left {
	float: left;
	margin: 0px 15px 10px 0px;
	display: block;
}
span.align-left span {
	display: block;
	/* width: 330px;
	*/
}
img.align-left {
	float: left;
	margin-right: 15px;
}
.mod.schritt .pos-spec .col-sm-8 span, .listedCnt ul li span {
	font: normal 16px arial;
	color: #aaa096;
}
.mod.schritt .pos-spec .col-sm-8 i {
	font: normal 16px arial;
	font-style: normal;
	word-wrap: break-word;
}
.mod.schritt .pos-spec .col-sm-8 {
	padding: 0px;
}
.mod.schritt .pos-spec .row {
	margin: 0px 0px 10px 0px;
}
.mod.schritt .pos-spec .row .col-sm-6, .mod.schritt .pos-spec .row .col-sm-12 {
	padding: 0px 270px 0px 0px;
	width: 100%;
}
.mod.schritt .pos-spec .col-sm-8 {
	padding: 0px 270px 0px 0px;
	width: 100%;
}
.pos-spec.step3_subhead {
	min-height: 300px;
}
.mod.schritt .pos-spec .row .col-sm-6 .form-group {
	margin-bottom: 12px;
}
.mod.schritt .pos-spec .row .col-sm-6 .form-group.radiobtn {
	margin-left: 20px;
}
.mod.schritt .pos-spec .row.thin .col-sm-6 .form-group.radiobtn, .mod.schritt .pos-spec .row.thin .col-sm-12 .form-group.radiobtn {
	margin-left: 0px;
}
.mod.schritt .pos-spec .row .col-sm-12 {
	padding: 0px 0px 0px 0px;
}
section.mod.generic .row.urologie .col-md-6:first-child {
padding: 0px 0px 0px 15px;
}
section.mod.generic .row.urologie .col-md-6:last-child {
padding: 0px 0px 0px 10px;
}
.thumbnail.zoom {
	width: 25px;
	height: 25px;
	position: absolute;
	bottom: 36px;
	right: 10px;
}
article.inhalt span.align-left img {
	width: 100%
}
.form-control.text.search.reset-field {
	padding: 0px 10px;
	height: 27px;
}
.icon:after {
	background: url(../images/sprite.png) no-repeat left top;
}
.icon {
	overflow: hidden;
	text-indent: -999em;
	display: inline-block;
	position: relative;
}
.icon:after {
	content: " ";
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
}
.icon.figure:after {
	background-position: 4px -69px;
}
.icon.cart:after {
	background-position: -26px -69px;
}
.icon.target:after {
	background-position: -53px -69px;
}
.icon.brief:after {
	background-position: -84px -69px;
}
.icon.contact:after {
	background-position: -118px -69px;
}
li:hover .icon.figure:after {
	background-position: 4px -167px;
}
li:hover .icon.cart:after {
	background-position: -26px -167px;
}
li:hover .icon.target:after {
	background-position: -53px -167px;
}
li:hover .icon.brief:after {
	background-position: -84px -167px;
}
li:hover .icon.contact:after {
	background-position: -118px -167px;
}
section.mod.data-list.tabbed .result-data.download .icon.icon-word:after, section.mod.data-list.tabbed .result-data.download .icon.icon-doc:after, section.mod.data-list.tabbed .result-data.download .icon.icon-docx:after {
	background-position: -115px -104px;
}
section.mod.data-list.tabbed .result-data.download .icon.icon-pdf:after{
	background-position: -26px -104px;
}
section.mod.data-list.tabbed .result-data.download .icon.icon-xls:after, section.mod.data-list.tabbed .result-data.download .icon.icon-xlsx:after {
	background-position: -43px -104px;
}
section.mod.data-list.tabbed .result-data.download .icon.icon-zip:after {
	background-position: -62px -104px;
}
section.mod.data-list.tabbed .result-data.download .icon.icon-pwp:after {
	background-position: -79px -104px;
}
section.mod.data-list.tabbed .result-data.download .icon.icon-access:after, section.mod.data-list.tabbed .result-data.download .icon.icon-jpg:after {
	background-position: -97px -104px;
}
.icon.icon-word:after, .icon.icon-doc:after, .icon.icon-docx:after {
	background-position: -559px -77px;
}
.icon.icon-pdf:after {
	background-position: -559px -21px;
}
.icon.icon-xls:after, .icon.icon-xlsx:after {
	background-position: -559px -163px;
}
.icon.icon-zip:after {
	background-position: -559px -49px;
}
.icon.icon-pwp:after {
	background-position: -559px -133px;
}
.icon.icon-jpg:after {
	background-position: -559px -105px;
}
.icon.icon-file:after {
	background: none;
	/*background-position:1px 3px;*/
}
.icon.icon-link:after {
	background-position: -168px -38px;
}
.icon.fb:after {
	background-position: -367px -58px
}
.icon.tw:after {
	background-position: -368px -103px;
}
.icon.gplus:after {
	background-position: -368px -151px;
}
.icon.fb:hover:after {
	background-position: -317px -58px
}
.icon.tw:hover:after {
	background-position: -317px -103px;
}
.icon.gplus:hover:after {
	background-position: -317px -151px
}
footer.innerpage .social-icons .icon.fb:after {
	background-position: -493px -1px
}
footer.innerpage .social-icons .icon.fb:hover:after {
	background-position: -423px -1px
}
footer.innerpage .social-icons .icon.tw:after {
	background-position: -493px -66px;
}
footer.innerpage .social-icons .icon.tw:hover:after {
	background-position: -423px -66px;
}
footer.innerpage .social-icons .icon.gplus:after {
	background-position: -493px -132px;
}
footer.innerpage .social-icons .icon.gplus:hover:after {
	background-position: -423px -132px;
}
.icon.icon-female:after {
	background-position: -50px -38px;
}
.icon.icon-male:after {
	background-position: -75px -38px;
}
li:hover .icon.icon-female:after {
	background-position: -25px -38px;
}
li:hover .icon.icon-male:after {
	background-position: -100px -38px;
}
.row.mod-detail .accordion-heading a.collapsing {
	overflow-y: hidden;
	max-height: 500px;
	-webkit-transition-property: all;
	-webkit-transition-duration: .5s;
	-webkit-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
	-moz-transition-property: all;
	-moz-transition-duration: .5s;
	-moz-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
	-ms-transition-property: all;
	-ms-transition-duration: .5s;
	-ms-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
	transition-property: all;
	transition-duration: .5s;
	transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
}
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="submit"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus {
	border-color: rgba(204, 204, 204, 0.8);
	box-shadow: none;
	outline: 0 none;
}
section.mod .tab-content.active {
	display: block;
}
section.mod .tab-content {
	display: none;
}
input#srch-term {
}
article.builder p {
	color: #493d34;
	font: normal 22px roboto_slablight;
}
article.kontakt p {
	margin: 0px 0px 30px 0px;
}
#box .mod-details h2 a:after {
	/* background: url(../images/sprite.png) no-repeat;
	background-position: -41px 0px;
	width: 20px;
	height: 15px;
	content: "";
	display: block;
	margin: 0px 0px 0px 0px;
	position: absolute;
	right: 0px;
	top: 5px;
	*/
	background: url(../images/sprite.png) no-repeat;
	background-position: -41px 0px;
	width: 20px;
	height: 15px;
	content: "";
	display: block;
	margin: 0px 0px 0px 0px;
	position: absolute;
	right: 0px;
	top: 10px;
}
#mod-urologie-generic1 .row.urologie div:first-child {
	padding: 0px 0px 0px 15px;
}
.result-listing label {
	margin: 0px 10px 10px 0px;
	font-weight: normal;
}
#box .mod-details h2.collapsed a:after {
	background-position: -64px 0px;
}

/* .mod-details h2 a:after {
	background: url(../images/sprite.png) no-repeat;
	background-position: -41px 0px;
	width: 20px;
	height: 15px;
	content: "";
	display: block;
	margin: 0px 0px 0px 0px;
	position: absolute;
	right: 0px;
	top: 5px;
}
.mod-details h2.collapsed a:after {
	background-position: -64px 0px;
}
*/
#wrapper {
	max-width: 1850px;
	margin: 0 auto;
	min-height: 100%;
	/* padding-bottom: 200px;
	*/
}
.link-wrapper.customized {
	border: dotted 1px #ccc;
	border-width: 1px 0px;
	margin: 10px 0px 25px;
	padding: 5px 0px
}
.link {
	padding-left: 13px;
	position: relative;
	font: normal 12px arial;
}
.joblinks .link {
	font: normal 16px arial;
}
.link:hover, .internal-link:hover {
	cursor: pointer;
	text-decoration: underline;
}
.link:after {
	content: " ";
	position: absolute;
	left: 0;
	top: 3px;
	height: 0;
	border-style: solid;
	border-width: 4px 0 4px 5px;
	border-color: transparent #005a8c;
}
.newspresse .link {
	margin: 0px 0px 0px 10px;
	font: normal 16px arial;
	padding-left: 9px;
}
.urologie .link {
	margin: 0px 0px 0px 0px;
	font: normal 12px 'roboto_slabbold', Arial, Helvetica, sans-serif;
}
#mod-urologie-generic9 .data-list.urologie .link {
	font: bold 12px arial;
	padding-left: 9px;
}
.mod.generic .row.urologie .link {
	font: normal 12px arial;
	display: block;
	margin: 0px 0px 10px 0px;
}
.newspresse .link:after, .urologie .link:after {
	top: 5px;
}
.mod-details .urologie .link:after{
	top:3px;
}
/* module styles */
.mod .icon.btn-close {
	position: absolute;
	right: 15px;
	top: 22px;
	width: 15px;
	height: 15px;
	cursor: pointer;
}
.quick-links {
	margin-top: 0px;
}
.quick-links ul {
	margin: 0;
	padding: 0;
	list-style: none;
	position: relative;
}
.primary-nav {
	margin: 0px 10px 7px 0px;
	display: inline-block;
	float: left;
	position: relative;
	z-index: 300;
}
.primary-nav  >  ul  >  li {
	float: left;
	display: block;
}
.primary-nav li {
	position: relative;
}
.primary-nav ul  >  li a {
	background: #f2f1ef;
	display: block;
	padding: 8px 10px;
	margin-right: 2px;
	position: relative;
	color: #493d34;
	min-width: 60px;
	text-align: center;
	-webkit-transition: background 0.2s linear;
}
.primary-nav .highlight {
	background: #f2a000;
	color: #fff;
}
.primary-nav .starter {
	background: #493d34;
	color: #fff;
}
.primary-nav .highlight:hover {
	background: #e62909;
}
.primary-nav ul ul {
	display: none;
	position: absolute;
	left: 0;
	top: 33px;
	border-top: solid 2px #fff;
}
.primary-nav ul ul ul {
	border: none;
	top: 0;
	left: 223px;
}
.primary-nav li:hover  >  ul {
	display: block;
	width: 225px;
	margin-bottom: 20px;
}
.primary-nav .sub-view  a {
	min-width: 110px;
	text-align: left;
}
.primary-nav .sub-view:hover  >  a {
	background: #e4e1dd;
}
.primary-nav .sub-view  li a {
	background: #e4e1dd;
	font-weight: bold;
}
.primary-nav .sub-view li li a {
	background: #f1efed;
}
.dropdown-submenu>a:after {
	content: " ";
	position: absolute;
	right: 11px;
	top: 5px;
	display: block;
	background: url(../images/sprite.png) no-repeat;
	background-position: left -21px;
	width: 14px;
	height: 14px;
}
.primary-nav .sub-view  >  a:after, .sub-view .sub-view  >  a:after {
	content: " ";
	position: absolute;
	right: 11px;
	top: 5px;
	display: block;
	/* background: url(../images/sprite.png) no-repeat;
	background-position: left -21px;
	*/
	background: url(../images/sprite.png) no-repeat;
	background-position: left -21px;
	width: 14px;
	height: 14px;
}
.primary-nav .sub-view:hover  >  a:after {
	background: url(../images/sprite.png) no-repeat -119px 4px;
}
.primary-nav .sub-view .sub-view  >  a:after, .dropdown-submenu>a:after {
	width: 9px;
	top: 9px;
	background: url(../images/sprite.png) no-repeat -119px 4px;
}
.sub-view li a:hover, .sub-view .sub-view:hover  >  a {
	background: #f1efed;
	color: #493d34;
	cursor: pointer;
}
.primary-nav .sub-view li li a:hover {
	background: #f9f8f7;
}
.secondary-nav {
	display: inline-block;
	/* width: 320px;
	*/
}
.secondary-nav ul li {
	float: left;
	margin-right: 4px;
}
.secondary-nav ul li:last-child {
	margin-right: 0px;
}
.secondary-nav .search {
	background: #f2f1ef
}
li:hover .subnav-drop {
	display: block;
}
.secondary-nav ul li:last-child .subnav-drop {
	right: 0px;
}
.subnav-drop {
	display: none;
	position: absolute;
	right: 0px;
	top: 32px;
	background: #e5e2dd;
	width: 172px;
	padding: 12px;
	z-index: 999;
	border-color: white;
	border-width: 0 2px 2px 2px;
	border-style: solid;
	color: #493d34;
}
.subnav-drop .nav-title {
	font: bold 12px arial;
	margin-bottom: 5px;
	display: inline-block;
}
.subnav-drop p {
	font: normal 12px arial;
	margin-bottom: 0;
}
.search .text {
	border: none;
	background: #f2f1ef;
	width: 140px;
	float: left;
	height: 33px;
	padding: 0px 30px 0px 8px;
}
.ui-menu .ui-menu-item:hover, .ui-menu .ui-menu-item a:hover, .ui-menu .ui-menu-item.label:hover {
	cursor: pointer;
}
.search .text:focus, input#inputText:focus {
	background: #e5e1de;
}
.search.mob-mode {
}
.ui-menu.ui-widget {
	background: #e5e2dd;
	padding: 0px;
	border: none;
	/* min-width: 190px;
	*/
}
.ui-state-focus {
	background: #f2f1ef !important;
	border: none !important;
}
.ui-menu.ui-autocomplete .ui-menu-item a.ui-state-hover {
	background: #f2f1ef;
	border: none;
	color: #493d34;
	margin: 0px;
}
.ui-widget-content {
	border: none;
}
.ui-widget-content a {
	color: #493d34;
}
.search #search-form, .tx-solr form {
	position: relative;
}
.search.mob-mode .btn-search, .mob-button {
	border: none;
	background: #f2f1ef url(../images/sprite.png) no-repeat -590px -153px;
	height: 39px;
	display: inline-block;
	overflow: hidden;
	text-indent: -999em;
	width: 48px;
	padding: 0;
	border-radius: 4px;
}
.search .btn-search {
	border: none;
	background: url(../images/sprite.png) no-repeat left -39px;
	height: 32px;
	display: inline-block;
	overflow: hidden;
	text-indent: -999em;
	width: 25px;
	padding: 0;
	position: absolute;
	top: 0px;
	right: 0px
}
.content-wrapper .col-md-12 > section.mod.data-list {
	border-bottom: 0px;
	margin-bottom: 0px;
}
.content-wrapper .col-md-12.krankheit section.mod.data-list {
	border-bottom: none;
	margin-bottom: 30px;
}
.secondary-nav .icon {
	background-color: #f2f1ef;
	height: 32px;
	width: 32px;
}
.secondary-nav .icons {
	background-color: #f2f1ef;
	height: 33px;
	width: 32px;
	display: block;
}
.quick-links.mob-hide .secondary-nav .icons {
	width: auto;
	padding: 1px;
}
.quick-links.mob-hide .secondary-nav ul li {
	margin-right: 2px
}
.secondary-nav li:hover .icon {
	background-color: #e5e2dd;
}
.secondary-nav li:hover .icons {
	/* background-color: red;
	*/	height: 34px;
	background-color: #e5e2dd;
}
.logo {
	margin-top: 26px;
	display: block;
	margin-bottom: 19px;
}
.nav-main {
	background: #f2f1ef;
	z-index: 15;
}
.nav-main ul {
	margin: 0;
	padding: 0;
	position: relative;
	z-index: 15;
}
.nav-main ul ul {
	/* display: none;
	*/
	position: absolute;
	left: 0;
	top: 43px;
	width: 85%;
	background: #e4e1dc;
	margin-top: 41px;
	border-top: solid 2px #fff;
	padding-top: 15px;
	padding-bottom: 10px;
	top: -999em;
	opacity: 0;
	margin-left: 2px;
}
.yamm .dropdown-menu {
	background: #e4e1dc !important;
	border: none;
	box-shadow: none;
	margin-top: 41px;
	border-top: solid 0px #fff;
	padding-top: 15px;
	padding-bottom: 10px;
	border-radius: 0px;
	min-width: 200px
}
.yamm >.dropdown-menu {
	border-top: solid 2px #fff;
}
.yamm .dropdown-menu.nonmega {
	padding: 0px;
	border-radius: 0px;
}
.nav-main ul  >  li:hover  >  a, .nav-main .active a {
	background: #e5e2dd;
}
.nav-main ul  >  li:hover  >  a {
	padding-bottom: 9px;
	z-index: 17;
	position: relative;
}
.nav-main li:hover ul {
	/* display: block;
	*/
	top: 0;
	opacity: 1;
}
.nav-main ul  >  li {
	display: inline-block;
	border-right: solid 2px #fff;
	margin-right: 0px;
}
.navbar-nav > li:first-child, .navbar-nav > li.lft-bdr {
	border-left: solid 2px #ffffff
}
.navbar-nav > li {
	border-right: solid 2px #fff;
	margin-right: 0px;
}
.nav-main ul  >  li  >  a, .navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
	background: #f2f1ef;
	display: block;
	padding: 9px 12px;
	font-family: 'roboto_slabregular', Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #493d34;
	-webkit-transition: background 0.5s linear;
	line-height: 1.42857143;
}
nav.navbar-default .navbar-nav>li.dropdown>a:hover, nav.navbar-default .navbar-nav > li.dropdown:hover > a, nav.navbar-default .navbar-nav > li.dropdown.hover > a {
	background: #e4e1dd;
}
nav.navbar-default .navbar-nav>li.dropdown>a.menuactive {
	background: #e4e1dd;
}
.bootstrap-select.btn-group .dropdown-menu li {
	position: relative;
	padding: 0px;
	border: none;
}

/* .navbar-default .navbar-nav > li > a:focus {
	background: red
}
*/
.navbar .nav li.dropdown.open>.dropdown-toggle, .navbar .nav li.dropdown.active>.dropdown-toggle, .navbar .nav li.dropdown.open.active>.dropdown-toggle {
	background-color: #e4e1dd !important;
	color: #493d34 !important;
	text-shadow: none !important;
}
.navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
	background: #e5e2dd;
}
.nav-main ul  >  li:first-child, .navbar-nav > li:first-child {
	border-left: solid 2px #fff;
}
a.navbar-brand {
	display: none;
}
.nav-main ol {
	list-style: none;
	padding-left: 0;
}
.nav-main ul ul  >  li:first-child {
	border: none;
}
.nav-main ul ul  >  li {
	border: none;
	float: left;
	width: 19%;
	margin-left: 15px;
	opacity: 0;
	-webkit-transition: opacity 0.2s ease-in;
}
.list-unstyled, .list-unstyled ul {
	border: none;
	float: left;
	width: 19%;
	margin-left: 15px;
	-webkit-transition: opacity 0.2s ease-in;
}
.col-sm-2.nav-widget h2 {
	font: bold 12px arial;
}
.nav-main li:hover ul  >  li {
	opacity: 1;
}
.nav-main ol li:first-child, ul.col-sm-2.list-unstyled li:first-child {
	border-top: solid 1px #fff;
}
.nav-main ol li, ul.col-sm-2.list-unstyled li {
	border-bottom: solid 1px #fff;
}
.nav-main ol li a, ul.col-sm-2.list-unstyled li a {
	padding: 4px 6px;
	display: block;
	color: #493d34;
	font-weight: bold;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.nav-main ol li a:hover, ul.col-sm-2.list-unstyled li a:hover {
	background: #fff;
	color: #00456b;
}
.nav-main .sub-nav a, ul.col-sm-2.list-unstyled li.sub-nav a {
	padding-left: 18px;
	font-weight: normal;
}
.nav-main .thumb, .nav-widget .thumb {
	width: auto;
	float: left;
	margin-right: 16px;
}
.nav-main .nav-widget, .navbar-nav .nav-widget {
	width: 35%;
	margin-left: 15px;
}
.nav-main .nav-widget li, .navbar-nav .nav-widget li {
	list-style: none;
}
.nav-widget .item {
	overflow: hidden;
	margin-bottom: 4px;
}
.nav-widget .item:hover {
}
.nav-widget .item:hover p {
	color: #00456b;
}
.nav-widget .item:hover a {
	color: #00456b;
}
.nav-widget * {
}
.nav-widget * {
}
.nav-main h2, .details h2 {
	font-size: 12px;
	margin-top: 0;
	margin-bottom: 2px;
}
.details p {
	font-size: 12px;
}
.nav-widget a {
	color: #493d34;
}

/* spotlight custom style */
.spotlight .carousel-inner>.item>img, .spotlight .carousel-inner>.item>a>img {
	width: 100%
}
.fade-slide .item {
	opacity: 0;
	transition-property: opacity;
}
.fade-slide .item.active {
	opacity: 1;
	z-index: 1;
}
.fade-slide .item.right, .fade-slide .item.left {
	left: 0;
}
.fade-slide .active.left, .fade-slide .active.right {
	left: 0;
	opacity: 0;
	z-index: 1;
}
.fade-slide .carousel-indicators {
	z-index: 6;
}
.lightboxOverlay{ width: 100%; height: 100%}
.spotlight .carousel-caption {
	text-align: left;
	/* left: 13.5%;
	*/
	left: 0px;
	right: 0px;
	bottom: 0px;
}
.spotlight .carousel-indicators {
	text-align: right;
	width: 1170px;
	left: 0px;
	right: 0px;
	padding: 0px 30px;
	margin: 0px auto;
}
.spotlight .carousel-caption a {
	padding: 0px 15px;
	display: block;
}
.spotlight .carousel-caption span {
	font-size: 38px;
	font-family: 'roboto_slablight', Arial, Helvetica, sans-serif;
	display: inline-block;
	background: rgba(255, 255, 255, 0.5);
	padding: 2px 13px 2px 10px;
	text-shadow: none;
	color: #493d34;
	margin-bottom: 5px;
	-webkit-transition: all 0.2s ease-in-out;
	display: block;
	float: left;
	clear: left;
}
.spotlight .carousel-caption span:last-child {
	margin-bottom: 0px;
}
.spotlight .carousel-indicators li {
	background: rgba(255, 255, 255, 0.5);
	width: 15px;
	height: 15px;
	border: none;
	margin: 0 3px;
}
.spotlight .carousel-indicators li:last-child{
	margin-right: 0px;
}
.spotlight .carousel-indicators .active {
	background: #fff;
	border: none;
}
.spotlight .carousel-caption a:hover span{
	background: #493d34;
	color: #fff;
}
#carousel-example-generic.spotlight {
	padding: 0px 15px;
}
.navbar-default .navbar-brand{
	display: none;
}
.content-wrapper {
	padding-top: 30px;
	padding-bottom: 30px;
}
.content-wrapper>.row {
	margin: 0px;
}
.row-fluid.schritt2 .col-md-8, .row-fluid.inhalt .col-md-8, .row-fluid.jobs .col-md-8, .row-fluid.krankheit .col-md-8, .row-fluid.kontakt .col-md-8, .row-fluid.webcam .col-md-8, .row-fluid.urologie .col-md-8 {
	/* padding: 0px 15px 0px 0px;
	*/
}
.row-fluid.schritt2 .col-md-4, .row-fluid.inhalt .col-md-4, .row-fluid.jobs .col-md-4, .row-fluid.krankheit .col-md-6, .row-fluid.kontakt .col-md-4, .row-fluid.webcam .col-md-4, .row-fluid.urologie .col-md-4 {
	/* padding: 0px 0px 0px 15px;
	*/
}
.row-fluid.krankheit .post-box.col-md-6 {
}
article.kontakt .row-fluid .col-md-4 {
	padding: 0px 10px 0px 0px;
}
article.kontakt .row-fluid .col-md-8 {
	padding: 0px 0px 0px 10px;
}
.jobdetail-2 a.email {
	font-weight: bold;
}
#mod-teaser4 .link {
	display: inline;
	margin: 0px 0px 0px 10px;
	font: normal 12px arial;
}
.data-list.type-2 .details h3 {
	margin: 0px 0px;
	line-height: 0;
}
.data-list.type-2 .details a {
	font: bold 12px arial;
}
.data-list.type-2 .details p {
	font: normal 12px arial;
	margin: 0px;
}
.data-list.type-2 .details:hover p {
	color: #00456b;
}
section.mod.data-list.tabbed {
	padding-bottom: 7px;
}
section.mod, section.mod.tabbed.news {
	padding-bottom: 0px;
	border-bottom: dotted 1px #ccc;
	margin-bottom: 30px;
}
#box section.mod{
	margin-bottom: 25px;
}
section.mod.noborder {
	border-bottom: none;
	margin-bottom: 0px;
}
section.mod .linkblock {
	position: relative;
	padding: 5px;
	display: block;
	border-top: 1px dotted #cccccc;
	padding: 5px 5px 5px 13px;
	font: normal 12px arial;
}
section.mod .linkblock:hover {
	color: #00456b;
	text-decoration: underline;
}
section.mod .infocontent .linkblock {
	position: relative;
	padding: 5px;
	display: block;
	border-top: 1px dotted #cccccc;
	padding: 5px 5px 5px 13px;
	font: normal 16px arial;
}
.krankheit section.mod .infocontent .linkblock {
	font: normal 16px arial;
}
.krankheit #box .col-md-6:first-child {
	width: 50%;
	padding: 0px 15px 0px 0px;
	float: left;
}
.krankheit #box .col-md-6:last-child {
	width: 50%;
	padding: 0px 0px 0px 15px;
	float: left;
}
section.mod .linkblock:after {
	content: " ";
	position: absolute;
	left: 0;
	top: 9px;
	height: 0;
	border-style: solid;
	border-width: 4px 0 4px 5px;
	border-color: transparent #005a8c;
}
section.mod.gallery {
	margin-bottom: 60px;
	border: none;
}
section.mod.schritt, section.mod.downloadData {
	margin-bottom: 0px;
	border: none;
}
section.mod.schritt fieldset.pos-spec:nth-child(even) {
	padding: 10px 0px 0px
}
.content-wrapper section.mod.downloadData {
	margin-bottom: 30px;
}
.content-wrapper .scroll-pane section.mod.downloadData {
	margin-bottom: 0px;
}
.content-wrapper .scroll-pane .news-related.news-related-links, .content-wrapper .scroll-pane .news-related.news-related-news {
	margin: 0px 0px 0px 0px
}
section.mod.infos {
	border-bottom: dotted 1px #ccc;
}
section.mod.data-list.weblinks {
	border-bottom: dotted 0px #ccc;
}
section.mod.generic3 p strong {
	color: #005a8c;
}
section.mod.schritt .col-xs-6.col-md-4 {
	padding: 15px;
}
section.mod.schritt .col-xs-6.col-md-4 a, span.blumen_title {
	display: block;
	font: bold 16px arial;
	margin: 10px 0px 0px;
	outline: none;
}
section.mod.schritt .col-xs-6.col-md-4 a:hover{
	text-decoration: underline;
}
section.mod.schritt .col-xs-6.col-md-4 a.category {
	margin: 0px 0px 0px 0px;
}
section.mod iframe {
	margin: 0px 0px 0px;
}
section.mod iframe.twitter-timeline.twitter-timeline-rendered {
	margin: 0px 0px 20px;
	min-width: 100% !important;
	width: 100% !important;
	overflow-x: hidden;
}
.customisable-border.timeline {
	border-radius: 0px;
	border: none;
}
section.mod #mod-urologie-generic4 iframe {
	margin: 0px;
}
.datepicker table {
}
.datepicker.dropdown-menu {
	padding: 8px 10px 10px;
}
.datepicker table.table-condensed thead tr:last-child {
	background: #e5e2dd;
}
.datepicker table.table-condensed tbody {
	background: #f6f5f4;
}
.datepicker.dropdown-menu th, .datepicker.dropdown-menu td {
	border-radius: 0px;
	font: normal 12px arial;
	border: 1px solid white
}
.datepicker.dropdown-menu th {
	font: bold 12px arial;
}
.datepicker.dropdown-menu table tr td.day:hover, .datepicker.dropdown-menu table tr td.day.focused {
	background: #e5e2dd;
}
.datepicker.dropdown-menu thead tr:first-child th:hover, .datepicker.dropdown-menu tfoot tr th:hover {
	background: transparent;
}
.datepicker.dropdown-menu thead tr:first-child th {
	padding: 0px 6px 8px 0px;
	position: relative;
}
.datepicker table.table-condensed .fa-angle-right:before {
	content: "";
	width: 10px;
	height: 18px;
	background: url(../images/sprite.png) no-repeat transparent;
	background-position: -650px -112px;
	display: block;
	top: 0px;
	right: 0px;
	position: absolute;
}
.datepicker table.table-condensed .fa-angle-left:before {
	content: "";
	width: 10px;
	height: 18px;
	background: url(../images/sprite.png) no-repeat transparent;
	background-position: -650px -84px;
	display: block;
	top: 0px;
	left: 0px;
	position: absolute;
}
p.error_class, .contact_errorclass, .formErrorContent {
	font: normal 12px arial;
	color: red
}
.errormessage{
	background: #f2f1ef;
	padding: 5px;
	color: red;
}
.time {
	font: normal 12px arial;
	color: #3f3f3f;
}
.data-list li span.time {
	font: normal 16px arial;
	color: #3f3f3f;
}
.mod .data-list li span.time, .mod.data-list li span.time {
	font: normal 12px arial;
}
.listing .birthdetails {
	margin: 0px 0px 10px 0px
}
.listing .birthdetails a, .data-list.type-1 h3 a {
	font: bold 12px arial;
}
.listing .birthdetails:last-child {
	margin: 0px 0px 0px 0px
}
.mod .mod-highlight {
	border-top: solid 2px #493d34;
	position: relative;
}
.mod .mod-highlight {
	*zoom: 1;
}
.mod .mod-highlight:after, .mod .mod-highlight:before {
	display: table;
	content: ""
}
.mod .mod-highlight:after {
	clear: both;
}
.mod .mod-highlight a {
	cursor: default;
	display: block;
	float: left;
}
.mod .mod-highlight a span {
	cursor: default;
}
.mod .mod-highlight a.desktop-hide {
	display: none;
}
.mod .mod-highlight a:hover {
	cursor: pointer;
}
.mod .mod-highlight.multy-tab a, .mod .mod-highlight.multy-tab a span {
	cursor: pointer;
}
.mod-highlight span {
	background: #493d34;
	padding: 3px 6px;
	display: inline-block;
	color: #f2f1ef;
}
section.mod .mod-highlight span {
	padding: 3px 7px;
}
section.mod.generic .mod-highlight span {
	padding: 3px 8px;
}
.mod-highlight .icon-twitter span {
	background: url(../images/sprite.png) no-repeat #f2f1ef;
	background-position: -147px -74px;
	text-indent: -9999em;
	width: 28px
}
.mod-highlight .icon-twitter.active span, .mod-highlight .icon-twitter span:hover {
	background: url(../images/sprite.png) no-repeat #493d34;
	background-position: -173px -74px;
	text-indent: -9999em;
	width: 28px
}
.mod-highlight.list span, .mod-highlight.infos span, section.mod .mod-highlight.list span, section.mod .mod-highlight.infos span {
	padding: 7px 10px;
}
.mod-highlight .col-sm-8 span, .mod-highlight .col-sm-6 .cnt>span {
	background: transparent;
	font: normal 14px arial;
	color: #aaa096;
	padding: 5px 0px;
}
.datepicker.dropdown-menu {
	z-index: 1000 !important;
}
section.mod .mod-highlight .col-sm-8 span, section.mod .mod-highlight .col-sm-6 .cnt>span {
	padding: 5px 5px 5px 0px;
}
.mod-highlight .listedCnt span {
	background: transparent;
	color: #aaa096;
	padding: 7px 0px;
	font: normal 16px arial;
}
section.mod .mod-highlight .listedCnt span {
	padding: 7px 5px 7px 0px
}
.mod-highlight .listedCnt i {
	font: normal 16px arial;
}
.mod-highlight .col-sm-8 i, .mod-highlight .col-sm-6 .cnt i {
	font: normal 14px arial;
	color: #3f3f3f
}
.mod-highlight a span {
	background: #f2f1ef;
	color: #493d34;
	border-right: solid 2px #fff;
}
.mod-highlight .active span, .mod-highlight a span:hover {
	background: #493d34;
	color: #f2f1ef;
}
.mod-highlight a#trigger span:hover {
	background-color: #f2f1ef
}
.mod-details h2 {
	margin: 11px 0px;
	position: relative;
	cursor: pointer;
	font: normal 22px roboto_slabregular;
}
.mod-details .infocontent h2 {
	padding: 0px 30px 0px 0px;
	position: relative;
	background: none;
}
.krankheit .mod-details .infocontent h2 {
	font: bold 22px'roboto_slabbold';
}

/* .mod-details.infocontent h2::after {
	background: url(../images/sprite.png) no-repeat;
	background-position: -41px 0px;
	width: 20px;
	height: 15px;
	content: "";
	display: block;
	margin: 0px 0px 0px 0px;
	position: absolute;
	right: 0px;
	top: 5px;
}
.mod-details.infocontent h2.collapsed::after {
	background-position: -64px 0px;
}
*/
.mod-details h2 a {
	color: #493d34;
	padding-right: 30px;
	display: block;
}
.mod-details.infocontent h2 {
	font: bold 22px 'roboto_slabbold';
	margin: 8px 0px 10px;
	padding: 0px 30px 0px 0px;
	overflow: hidden;
	word-wrap: break-word;
}
.mod-details.infocontent h2 a {
	color: #493d34;
	padding-right: 0px;
	/* position: relative;
	*/
}
.mod .icon-large {
	width: 34px;
	height: 29px;
	position: relative;
	float: left;
	margin-top: 0px;
	margin-left: -5px;
}
.mod .icon:after {
	content: " ";
	position: absolute;
	left: 0;
	top: 0;
}
.mod .figure:after {
}
.mod-details p, .urologie .mod-details p, section.mod.generic5 .mod-details p, .mod-details .contact-info p {
	font-family: 'roboto_slablight', Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #3f3f3f;
	margin: 10px 0px 5px;
}
.mod.generic .mod-details.theme-blue .data-list  p, .mod.data-list.tabbed .mod-details p {
	font-family: 'roboto_slablight', Arial, Helvetica, sans-serif;
	margin: 7px 0px 5px;
	font-size: 14px;
}
.mod-details p a {
	font: bold 14px roboto_slabbold;
}
.mod-details p a:hover {
	text-decoration: underline;
}
.urologie .mod-details p {
	margin: 0px 0px 5px;
}
.mod-details p b {
	font-family: 'roboto_slabbold', Arial, Helvetica, sans-serif;
	/* color: #005a8c;
	*/
}
.mod-details p .highlight {
	font-weight: bold;
}
.mod-details span.tel, .mod-details p.urologie-generic-7 b {
	color: #3f3f3f
}
.mod-details.infocontent p {
	font-family: arial;
	font-size: 16px;
	color: #333333;
	line-height: 1.4em;
	margin: 5px 0px 8px
}
.mod-details strong {
	font-family: 'roboto_slabbold', Arial, Helvetica, sans-serif;
	font-weight: normal;
}
.mod fieldset {
	margin-bottom: 12px;
	position: relative;
}
.mod-details.theme-blue fieldset {
	margin-bottom: 0px;
}
.mod #mod-generic1 fieldset, .mod #mod-generic2 fieldset, .mod #mod-generic fieldset, #download-mod fieldset, #mod-generic7 fieldset {
	margin-bottom: 0px;
}
#mod-generic7 fieldset:first-child {
	margin-bottom: 10px;
}
.mod #mod-generic1 .btn.btn-primary {
	margin-bottom: 10px;
}
.mod #mod-generic7 .btn.btn-primary {
	margin: 0px 0px 10px 0px;
	font: normal 12px arial;
}
.mod form.list-detail {
	margin: 10px 0px 30px;
	/* overflow: hidden;
	*/
}
.mod form.list-detail.galerie {
	margin: 10px 0px 10px;
	overflow: inherit;
}
.mod form.list-detail fieldset {
	margin: 0px 12px 0px 0px;
	float: left;
}
.mod form.list-detail.galerie fieldset {
	margin: 0px;
	float: left;
}
#mod-Kontakt .address ul {
	margin: 0px 0px 20px 0px;
}
#mod-Kontakt .address li {
	float: none;
	list-style: none;
	padding: 0px 0px 0px 0px;
	margin: 0px 0px 0px;
	font-family: 'roboto_slablight', Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #3f3f3f;
}
.address ul, .contact ul {
	overflow: hidden;
	margin: 0px;
	padding: 0px;
}
.address li, .contact li {
	font-size: 20px;
	float: left;
	margin: 0px 20px 0px;
}
.form-control {
	padding: 2px;
	height: 27px;
	font-size: 12px;
	border-color: #c6c0b9;
	box-shadow: none;
}
.list-detail.galerie .form-control {
	height: 34px
}
.list-detail.galerie .form-control.datepicker {
	width: 82px;
	background: white
}
.reset-field {
	width: 90%;
}
.mod .btn {
	padding: 4px 7px;
	font-size: 12px;
}
.list-detail.galerie .btn {
	padding: 7px 7px 7px;
}
.row.mitarbeiter .btn-primary.btn {
	padding: 5px 7px 5px;
}
select.disabled {
	color: #ccc;
	border-color: #f3f1f0;
}
.mod form {
	margin-bottom: 5px;
}
.mod #mod-generic  form, .mod #mod-generic2 form, .mod #mod-generic1 form, .mod #mod-generic7 form {
	margin-bottom: 0px;
}
.mod #download-mod form {
	margin-bottom: 10px;
}
.mod #download-mod form input[type="submit"] {
	margin-top: 10px;
}
#download-mod .default-sm.btn-group.bootstrap-select.form-control, .download-mod .default-sm.btn-group.bootstrap-select.form-control {
	width: 90%
}
.thumb {
	margin-bottom: 10px;
	display: block;
}
.box-gallery a.thumb {
	margin-bottom: 0px;
}
.thumb img {
	width: 100%;
}
.box-gallery a.thumb  img {
	height: auto;
}

/* data-list styles */
.data-list ul {
	padding: 0;
	list-style: none;
}
.data-list ul {
	border-top: dotted 0px #ccc;
	margin-bottom: 0px;
}
.data-list ul.tabbed {
	margin: 0px 0px 5px 0px;
}
.result-data.download ul.tabbed li, .result-data.download li {
	font: normal 12px arial;
}
.data-list li, .news-related-links li, .news-related-news li, .news-related-files li {
	padding-top: 10px;
	padding-bottom: 10px;
	border-top: dotted 1px #ccc;
	overflow: hidden;
	position: relative;
	*zoom: 1;
}

/* .data-list li:after, */
.news-related-links li:after, .news-related-news li:after, .news-related-files li:after, /* .data-list li:before, */ .news-related-links li:before, .news-related-news li:before, .news-related-files li:before {
	display: table;
	content: "";
}

/* .data-list li:after, */
.news-related-links li:after, .news-related-news li:after, .news-related-files li:after {
	clear: both;
}
.mod.generic .mod-details .data-list.type-2 li {
	padding: 12px 0px;
}
.mod.data-list .mod-details  li, .mod.generic .mod-details .data-list li {
	padding: 6px 0px;
}
.mod.generic .mod-details .data-list .doc li {
	position: relative;
}
.mod.generic .mod-details .news-related-links li, .mod.generic .mod-details .news-related-news li, article.inhalt .news-related-links li, article.inhalt .news-related-news li {
	padding: 6px 6px 6px 25px;
	position: relative;
	font-size: 16px;
}
.mod.generic .tab-content .mod-details .news-related-links li, .mod.generic .tab-content .mod-details .news-related-news li {
	font-size: 12px
}
.mod.generic .tab-content .mod-details .news-related-news li a:hover {
	text-decoration: underline;
}
.mod.generic .tab-content .mod-details .news-related-news li a span.news-related-news-date {
	font-weight: normal;
}
.mod.generic .tab-content .mod-details .news-related-links li a:after, .mod.generic .tab-content .mod-details .news-related-news li:after {
	top: 5px;
}
.news-text-wrap p {
	margin-top: -5px;
	color: #3f3f3f;
}
.news-text-wrap ul{
	float: left;
}
.mod.data-list .mod-details ul.lists li.list-item, .mod.generic .mod-details .data-list  ul.lists li.list-item {
	padding: 9px 12px 8px;
}
.mod.generic .mod-details .data-list ul.lists li.list-item:hover{
	cursor:pointer;
}
.mod-details.theme-blue .data-list li {
	padding-top: 12px;
	padding-bottom: 12px;
}
.mod-details.theme-blue .data-list .bootstrap-select.btn-group .dropdown-menu li {
	padding-top: 0px;
	padding-bottom: 0px;
}
.data-list.downloadData li, .news-related-files li {
	padding: 5px 0px;
}
.data-list ul.lists {
	margin: 0px 0px 12px 0px
}
.data-list ul.tabbed li:last-child {
	border-bottom: dotted 1px #ccc;
}
b.serial-no {
	font: bold 20px arial;
	display: block;
	margin: 0px 0px 20px 0px
}
.data-list .weblinks li:last-child, .news-related li:last-child {
	border-bottom: 1px dotted #cccccc;
}
.data-list li:last-child {
	/* border-bottom: none */
}
.data-list h3 {
	margin-top: 3px;
	font-size: 16px;
	margin-bottom: 4px;
}
.mod.data-list .mod-details h3, .mod.generic .mod-details .data-list h3 {
	margin-top: 1px;
	font: bold 16px roboto_slabbold;
	margin-bottom: 0px;
}
.mod.data-list .mod-details .data-list.type-2 .details h3, .mod.generic .mod-details .data-list.type-2 .details h3 {
	margin: 0px 0px;
	font: bold 12px arial;
}
.data-list h3 a:hover {
	color: #00456b;
	text-decoration: underline;
	cursor: pointer;
}
.data-list .infos p {
	font: normal 12px arial;
	margin: 0px 0px 0px 10px;
	line-height: normal;
}
.data-list li p {
	line-height: 17px;
	font-size: 12px;
}
.mod.data-list .mod-details p, .mod.generic .mod-details .data-list p, .mod.data-list .mod-details #pressemitteilungen p, .mod.generic .mod-details .data-list #mod-teaser4 p {
	line-height: 17px;
	font: normal 12px arial;
	color: #3f3f3f;
	margin: 7px 0px 0px;
}
.mod.data-list .mod-details ul.infos p {
	margin: 0px 0px 0px 13px;
}
.mod.data-list .mod-details.infocontent p {
	font: normal 16px arial;
	line-height: 1.4em;
	margin: 0px 0px 5px 0px;
}
.mod.data-list .mod-details .data-list.type-2 p, .mod.generic .mod-details .data-list.type-2 p {
	margin: 0px;
	font: normal 12px arial;
}
.mod.generic .mod-details .data-list.type-2 .details .bodytext {
	margin: 0px 0px 0px 0px
}
.mod.generic .mod-details .data-list.type-2 .details.quicklinks .bodytext {
	margin: 0px 0px 0px 13px
}
.data-list.urologie li p {
	margin: 0px 0px 0px 11px;
}
.data-list .icon {
	width: 25px;
	height: 25px;
	float: left;
	margin: 6px 7px 0px 0px;
}
.mod.generic .mod-details .data-list.type-1 .icon {
	margin: 0px 7px 0px 0px;
}
.data-list.type-1 .time {
	margin-left: 32px;
}
.mod-details .icon.reset-this {
	margin: 3px 0px 0px 0px;
	/*display: none;*/
}
.mitarbeiter.detailpage .data-list .icon {
	width: 30px;
	height: 30px;
	float: left;
	margin: 0px 7px 0px 0px;
}
.mitarbeiter.detailpage .file-title {
	font-weight: bold;
	line-height: 30px;
}
.mitarbeiter.detailpage .size {
	color: #3f3f3f;
}
.mod.data-list.downloadData a:hover{
	text-decoration: underline;
}
.data-list .thumb-img {
	float: left;
	margin-right: 8px;
}
.data-list .details h3 {
	margin-top: 0;
}

/* data-list type 1 */
.data-list.type-1 {
	overflow: hidden;
}
.data-list.type-1 ul {
	margin-left: -12px;
	*zoom: 1;
}
.data-list.type-1 ul:after, .data-list.type-1 ul:before {
	content: " "; /* 1 */
	display: table; /* 2 */
}
.data-list.type-1 ul:after {
	clear: both
}
#tx_babygallaery .data-list.type-1 ul {
	margin-left: -12px;
	overflow: initial;
}
.babydtl-listing {
}
.mod.data-list .mod-details .data-list.type-1 li, .mod.generic .mod-details .data-list.type-1 li {
	padding: 0px 0px 10px 12px;
}
.mod.generic .mod-details .data-list.type-1 li h3 {
	margin-top: 6px;
	font: bold 16px roboto_slabbold;
	margin-bottom: 2px;
}
.mod.generic .mod-details .data-list.type-1 li h3 a {
	font:bold 12px arial;
	display: block;
	padding: 0px 0px 0px 32px;
	word-wrap: break-word;
}
.mod.data-list .mod-details #babielisting .data-list.type-1 li:nth-child(odd) {
	clear: none;
}
.mod.data-list .mod-details .data-list.type-1 li:nth-child(odd), .mod.generic .mod-details .data-list.type-1 li:nth-child(odd) {
	clear: left
}
.mod-details p, .urologie .mod-details p, section.mod.generic5 .mod-details p, .mod-details .contact-info p {
	font-size: 13px;
}
.mod.data-list .mod-details .data-list.type-1 li a.thumb, .mod.generic .mod-details .data-list.type-1 li a.thumb {
	margin-bottom: 0px
}
.data-list.type-1 li {
	float: left;
	width: 50%;
	min-height: 60px;
	padding-left: 12px;
	border-top: none;
}
#tx_babygallaery.data-list.type-1 li {
	min-height: 0px;
}
.data-list.type-1 li.listing {
	display: block;
	float: none;
	width: 100%;
	border: 1px dotted #cccccc;
	border-width: 1px 0px;
	margin: 0px 0px 10px 0px;
}

/* data-list type 2 */
.data-list.type-2 li:last-child {
	border-bottom: none;
	/* padding-bottom: 0;
	margin-bottom: -5px;
	*/
}
.lists .list-item:hover {
	background: #e4e1dd;
}
.img-babygalerie .group.list-group-image {
	border: 0px
}
.reset-this {
	right: 0;
	height: 21px;
	position: absolute;
	width: 21px;
	top: 3px;
}
.col-sm-1 .reset-lrg-this {
	right: 0;
	top: 9px;
	right: 10px;
	height: 34px;
	position: absolute;
	width: 34px;
}
.reset-this:after {
	width: 25px;
	height: 25px;
	background-position: 6px -104px;
}
.reset-this.deactive:after {
	background-position: 6px -104px;
	opacity: .4;
}
.reset-lrg-this:after {
	width: 34px;
	height: 34px;
	background-position: -116px -129px;
}
.reset-lrg-this.deactive:after {
	width: 34px;
	height: 34px;
	background-position: -157px -129px;
}
.reset-lrg-this.active:after {
	width: 34px;
	height: 34px;
	background-position: -116px -129px;
}
.theme-blue {
	color: #005a8c;
}
.mod .lists li {
	background: #f2f1ef;
	padding-left: 15px;
	padding-right: 15px;
	border: none;
	margin-bottom: 4px;
	-webkit-transition: background 0.2s linear;
}
ul.infos li a {
	font-weight: bold;
}
ul.sociallinks {
	padding: 0px;
	margin: 20px 0px;
	border-top: 0px;
}
ul.sociallinks li {
	padding: 10px;
	border-bottom: 0px;
	border-top: none;
	margin: 0px 0px 10px 0px;
	background: #f2f1ef;
}
ul.sociallinks li>a {
	float: left;
	width: 41px;
	height: 41px;
	margin: 0px 10px 0px 0px;
}
ul.sociallinks a.google {
	background: url(../images/sprite.png) no-repeat;
	background-position: -269px -157px;
}
ul.sociallinks a.facebook {
	background: url(../images/sprite.png) no-repeat;
	background-position: -269px -88px;
}
ul.sociallinks a.twitter {
	background: url(../images/sprite.png) no-repeat;
	background-position: -269px -43px;
}
#news-mod .carousel-indicators {
	position: inherit;
	bottom: 0px;
	left: 0px;
	margin: 10px 0px;
	width: auto;
	text-align: left;
}
.data-list ol.carousel-indicators li, .mod-details.theme-blue .data-list ol.carousel-indicators li {
	border-radius: 50%;
	padding: 0px !important;
	background-color: #f2f1ef;
	border: none;
	margin-bottom: 0px;
}
.data-list ol.carousel-indicators li.active, .mod-details.theme-blue .data-list ol.carousel-indicators li.active {
	background-color: #493d34;
	border: none;
	width: 10px;
	height: 10px;
}
#trigger {
}
#drop {
	display: none;
	background: #f2f1ef;
	position: absolute;
	top: 31px;
	left: 0px;
	width: 100%;
	z-index: 10;
	padding: 0px 0px 10px 0px;
	border-top: 2px solid white;
}
#drop a {
}
#drop a:hover {
}

/* imagemap css starts here */
.body {
	float: left;
	position: relative;
}
.mask {
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
}
.mask .part {
	position: absolute;
	left: 0;
	top: 0;
	opacity: 0;
	-webkit-transition: opacity 0.2s linear;
	-moz-transition: opacity 0.2s linear;
	-ms-transition: opacity 0.2s linear;
	-o-transition: opacity 0.2s linear;
	transition: opacity 0.2s linear;
}
.mask .part:hover, .mask .part.active {
	opacity: 1;
}
.part img {
	cursor: pointer;
}
.female-body {
	margin-top: 12px;
}
.female-body .part-1 {
	top: 0;
	left: 0;
	z-index: 1;
}
.female-body .part-2 {
	top: 19px;
	left: 75px;
	z-index: 3;
}
.female-body .part-3 {
	top: 151px;
	left: 71px;
	z-index: 3;
}
.female-body .part-4 {
	top: 287px;
	left: 59px;
	z-index: 3;
}
.female-body .part-5 {
	top: 363px;
	left: 59px;
	z-index: 3;
}
.female-body .part-6 {
	top: 153px;
	left: 15px;
	z-index: 2;
}
.male-body .part-1 {
	top: 0;
	left: 0;
	z-index: 1;
}
.male-body .part-2 {
	top: 10px;
	left: 91px;
	z-index: 3;
}
.male-body .part-3 {
	top: 137px;
	left: 63px;
	z-index: 3;
}
.male-body .part-4 {
	top: 292px;
	left: 63px;
	z-index: 3;
}
.male-body .part-5 {
	top: 363px;
	left: 62px;
	z-index: 3;
}
.male-body .part-6 {
	top: 145px;
	left: 16px;
	z-index: 2;
}
.default-img img {
	opacity: 0.4;
}
.builder-tooltip {
	position: absolute;
	background: #005a8c;
	padding: 10px;
	z-index: 50;
	border-radius: 15px;
	color: #fff;
	line-height: 8px;
	font: normal 12px roboto_slabregular;
	display: none;
}
.body .counter {
	display: none;
}
.builder-tooltip p {
	background: none;
	margin: 0px 0px 0px
}
.builder-tooltip p:last-child {
	margin: 0px
}
form#builder {
	margin: 30px 0px;
}
form#builder fieldset, .downloadcenter fieldset {
	margin: 0px 0px 20px 0px;
}
form#builder fieldset select, .downloadcenter fieldset select {
	font: bold 22px roboto_slabbold;
	height: auto;
}
form#builder .btn.btn-primary {
	font: bold 22px roboto_slabbold;
}
.btn-imagemap {
	font: normal 22px roboto_slabregular;
	border-radius: 5px;
	color: #493d34;
	background-color: #f2f1ef;
	border: 1px solid #e5e2dd;
	text-align: center;
	padding: 9px;
	display: block;
	margin: 0px auto;
	width: 90%;
}
a.btn-imagemap:hover {
	cursor: pointer;
}
.humanbuilder a span {
	position: relative;
	padding: 0px 0px 0px 30px;
	display: block;
}
.humanbuilder a span:before {
	width: 25px;
	height: 27px;
	content: "";
	background: url(../images/sprite.png) no-repeat left top;
	position: absolute;
	top: 0px;
	margin-left: -29px;
	/* left: 0px;
	*/
}
.humanbuilder a.btn-imagemap.m span:before {
	background-position: -675px -42px;
}
.humanbuilder a.btn-imagemap.w span:before {
	background-position: -672px -2px;
}
.humanbuilder {
	overflow: hidden;
	margin: 0px 0px 30px 0px;
}

/* imagemap css ends here */
/* customized dropdown css starts here */
button.selectpicker {
	border: 2px solid #e5e2dd;
	background: white;
}
#mod-generic7 button.selectpicker, .powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select button.selectpicker {
	border: 1px solid #e5e2dd;
}
.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select button.selectpicker {
	border: 1px solid #c6c0b9;
	box-shadow: none;
	background: none;
}
.row.mitarbeiter button.selectpicker {
	border: 1px solid #e5e2dd;
}
.downloadcenter button.selectpicker {
	padding: 8px 50px 8px 12px;
}
#builder button.selectpicker {
	padding: 8px 50px 8px 12px;
}
.babygallerie-dropdown button.selectpicker, .krankheit-dropdown button.selectpicker {
	border: 1px solid #e5e2dd;
}
.blumenservice button.selectpicker {
	border: 1px solid #c6c0b9;
}
.bootstrap-select.btn-group .btn .filter-option {
	font: bold 22px roboto_slabbold;
}
.default-sm.bootstrap-select.btn-group .btn .filter-option, .row.mitarbeiter .default-sm.bootstrap-select.btn-group .btn .filter-option {
	font: normal 12px arial;
	color: #3f3f3f;
	height: 20px;
	line-height: 20px;
}
.mod form.list-detail  .btn.btn-primary {
	padding: 9px 7px 8px;
	background: #005a8c;
	font: bold 12px arial;
}
.default-sm.bootstrap-select.btn-group.krankheit-dropdown .btn .filter-option {
	line-height: 19px;
	height: 19px;
}
.default-sm.bootstrap-select.btn-group.babygallerie-dropdown .btn .filter-option {
}
section.mod.schritt .default-sm.bootstrap-select.btn-group .btn .filter-option, .bootstrap-select.powermail_field.powermail_select .btn .filter-option {
	font: normal 14px arial;
	background: white;
	padding: 0px;
}
section.mod.schritt .default-sm.bootstrap-select.btn-group .btn .filter-option {
	font: normal 16px arial;
}
.bootstrap-select.powermail_field.powermail_select .btn .filter-option {
	height: 21px;
	line-height: 21px;
}
.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select {
	width: 72% !important;
	margin: 0px
}
.default-sm.bootstrap-select > .btn {
	padding: 3px 25px 3px 10px;
	border: 1px solid #c6c0b9;
}
.default-sm.bootstrap-select.blumenservice > .btn {
	border: 1px solid #c6c0b9;
}
#mod-generic7 .default-sm.bootstrap-select > .btn, .row.mitarbeiter .default-sm.bootstrap-select > .btn {
	padding: 3px 25px 3px 10px;
}
.row.mitarbeiter .default-sm.bootstrap-select > .btn {
	padding: 3px 25px 3px 10px;
}
.default-sm.bootstrap-select.blumenservice > .btn {
	padding: 7px 25px 7px 10px;
}
.default-sm.bootstrap-select.krankheit-dropdown > .btn {
	padding: 6px 25px 6px 10px;
}
.default-sm.bootstrap-select.babygallerie-dropdown > .btn {
	padding: 6px 25px 5px 10px;
}

/* .row .mitarbeiter .default-sm.bootstrap-select > .btn {
	padding: 6px 25px 5px 10px;
}
*/
.bootstrap-select.btn-group .btn.btn-default:hover {
	background: white
}
.bootstrap-select.btn-group .btn.btn-default:focus {
	background: white; /* border: none */
}
.btn-group.bootstrap-select.form-control.open:focus {
	background: white;
	border: none;
}
.btn-group.bootstrap-select.form-control.open>.dropdown-toggle.btn-default {
	background: white;
	box-shadow: none;
	border-color: #c6c0b9;
}
.btn-group.bootstrap-select.blumenservice.form-control.open>.dropdown-toggle.btn-default {
	border-color: #c6c0b9
}
.btn-group.bootstrap-select.form-control {
	height: 41px;
	margin: 0px;
}
.default-sm.btn-group.bootstrap-select.form-control {
	height: 27px;
	margin-bottom: 10px;
}
section.mod.schritt .default-sm.btn-group.bootstrap-select.form-control/* , .row.mitarbeiter .default-sm.btn-group.bootstrap-select.form-control */ {
	height: 33px;
	min-width: 150px;
}
section.mod.schritt .default-sm.btn-group.bootstrap-select.form-control.blumenservice {
	height: 36px;
	margin: 0px
}
.default-sm.btn-group.bootstrap-select.form-control.babygallerie-dropdown, .default-sm.btn-group.bootstrap-select.form-control.krankheit-dropdown {
	height: 33px;
	min-width: 140px;
}
.bootstrap-select.btn-group .dropdown-menu {
	/* border: 2px solid #e5e2dd;
	*/	box-shadow: none;
	margin: 0px;
	border: 2px solid #c6c0b9;
}
#builder>.bootstrap-select.btn-group .dropdown-menu {
	border: 2px solid #c6c0b9;
}
.default-sm.bootstrap-select.btn-group .dropdown-menu {
	border: 1px solid #c6c0b9;
}
.default-sm.bootstrap-select.btn-group.blumenservice .dropdown-menu.open {
	border: 1px solid #c6c0b9
}
.bootstrap-select.btn-group .dropdown-menu li a {
	font: normal 22px 'roboto_slablight';
	margin: 0px 12px;
	padding: 6px 23px;
}
.bootstrap-select.btn-group .dropdown-menu li a:focus {
	border-color: rgba(204, 204, 204, 0.8);
	box-shadow: none;
	outline: 0 none;
}
.navbar-default .navbar-toggle .icon-bar {
	background-color: #ffffff;
	width: 31px;
height: 4px;
border-radius: 2px;
}
.default-sm.bootstrap-select.btn-group .dropdown-menu li a {
	font: normal 12px arial;
	color: #3f3f3f;
	margin: 0px 10px;
	padding: 5px 10px;
	display: block;
	float: none;
}
.default-sm.bootstrap-select.btn-group.blumenservice .dropdown-menu li a {
	font: normal 16px arial;
}
.scroll-pane {
	width: 100% !important;
	height: 420px;
	overflow: auto;
	margin: 0px 0px 10px 0px;
	overflow-x: hidden;
}
.mod-details .jspContainer, .mod-details .jspPane {
	width: 100% !important;
}
.mod-details .jspPane {
	padding-right: 15px !important;
}
#webcambild {
	margin: 0px 15px;
}
.scroll-pane .mod.data-list.downloadData.tabbed ul {
	margin: 0px 0px 0px 0px;
	padding:0px;
}
.outerdiv.hdr .pull-right {
	padding: 0px 15px 0px 0px
}
/* .bootstrap-select.btn-group .btn .caret, */
#builder .bootstrap-select.btn-group .btn .caret, .downloadcenter .bootstrap-select.btn-group .btn .caret {
	width: 28px;
	height: 17px;
	z-index: 1;
	display: block;
	margin: 0px;
	border: 0px;
	background: red;
	top: 13px;
	background: url(../images/sprite.png) no-repeat -599px -5px;
	right: 14px;
}
#builder .bootstrap-select.btn-group.open .btn .caret, .downloadcenter .bootstrap-select.btn-group.open .btn .caret {
	background: url(../images/sprite.png) no-repeat -599px -41px
}
.default-sm.bootstrap-select.btn-group .btn .caret {
	width: 14px;
	height: 14px;
	z-index: 1;
	display: block;
	margin: 0px;
	border: 0px;
	background: red;
	top: 2px;
	background: url(../images/sprite.png) no-repeat;
	background-position: left -21px;
}
.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select button.selectpicker .caret {
	width: 14px;
	height: 14px;
	z-index: 1;
	display: block;
	margin: 0px;
	border: 0px;
	background: red;
	top: 5px;
	background: url(../images/sprite.png) no-repeat;
	background-position: left -21px;
}
.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select .dropdown-menu li a {
	font: normal 14px arial;
	padding: 5px;
}
.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select.open button.selectpicker .caret {
	background: url(../images/sprite.png) no-repeat -119px 4px;
}
.default-sm.bootstrap-select.btn-group.babygallerie-dropdown .btn .caret, .default-sm.bootstrap-select.btn-group.krankheit-dropdown .btn .caret, .default-sm.bootstrap-select.btn-group.blumenservice .btn .caret/* , .row.mitarbeiter .default-sm.bootstrap-select.btn-group .btn .caret */ {
	top: 5px;
	right: 8px;
}
.default-sm.bootstrap-select.btn-group.open .btn .caret {
	background: url(../images/sprite.png) no-repeat -119px 4px;
}
.bootstrap-select.btn-group .dropdown-menu li a .glyphicon {
	display: none;
}
.select-wrapper {
	float: left;
	display: inline-block;
	border: 1px solid #d8d8d8;
	/* background: url("../images/dropdown.png") no-repeat right center;
	*/		cursor: pointer;
}
.select-wrapper, .select-wrapper select {
	width: 200px;
	height: 26px;
	line-height: 26px;
}
.select-wrapper:hover {
	/* background: url("../images/dropdown-hover.png") no-repeat right center;
	*/		border-color: #239fdb;
}
.select-wrapper .holder {
	display: block;
	margin: 0 35px 0 5px;
	white-space: nowrap;
	overflow: hidden;
	cursor: pointer;
	position: relative;
	z-index: -1;
}
.select-wrapper select {
	margin: 0;
	position: absolute;
	z-index: 2;
	cursor: pointer;
	outline: none;
	opacity: 0; /* CSS hacks for older browsers */
	_noFocusLine: expression(this.hideFocus=true);
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	-khtml-opacity: 0;
	-moz-opacity: 0;
}

/* customized dropdown css ends here */
.m-view {
	display: none !important;
}

/* customized checkbox css starts here */
span.custom-checkbox, span.powermail_checkbox, .mod-highlight span.custom-checkbox {
	width: 16px;
	height: 16px;
	display: inline-block;
	position: relative;
	z-index: 1;
	top: 3px;
	background: url(../images/sprite.png) no-repeat left top;
	background-position: -341px -38px;
	margin: 0px 10px 0px 0px;
}
.mod-highlight span.custom-checkbox {
	margin: 0px 5px 0px 0px;
}
span.custom-checkbox:hover, span.powermail_checkbox:hover {
	background-position: -341px -38px;
}
span.custom-checkbox.selected, span.powermail_checkbox.selected {
	background-position: -317px -38px;
}
span.custom-checkbox input[type="checkbox"], span.powermail_checkbox input[type="checkbox"] {
	margin: 0;
	position: absolute;
	z-index: 2;
	cursor: pointer;
	outline: none;
	opacity: 0; /* CSS hacks for older browsers */
	_noFocusLine: expression(this.hideFocus=true);
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	-khtml-opacity: 0;
	-moz-opacity: 0;
	width: 16px;
	height: 16px;
}

/* customized checkbox css starts here */
/* customized radio css starts here */
.custom-radio, .mod-highlight span.custom-radio {
	width: 16px;
	height: 16px;
	display: inline-block;
	position: relative;
	z-index: 1;
	top: 3px;
	background: url(../images/sprite.png) no-repeat left top transparent;
	background-position: -398px -38px;
	margin: 0px 5px 0px 0px;
}
.custom-radio:hover {
	background-position: -398px -38px;
	cursor: pointer;
}
.custom-radio.selected, .mod-highlight span.custom-radio.selected {
	background-position: -373px -38px;
}
.custom-radio input[type="radio"] {
	margin: 1px;
	position: absolute;
	z-index: 2;
	cursor: pointer;
	outline: none;
	opacity: 0; /* CSS hacks for older browsers */
	_noFocusLine: expression(this.hideFocus=true);
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	-khtml-opacity: 0;
	-moz-opacity: 0;
}

/* customized radio css ends here */
.inhalt .Kontakt .col-md-3 img {
	width: 100%;
	height: auto;
}
.result-data.download .file-title, .weblinks ul li a, .news-related-links li a, .news-related-news li a {
	font-weight: bold;
}
.news-related-links li a, .news-related-news li a{
	color: #005a8c;	
}

.weblinks ul li a:hover, .news-related-links li a:hover, .news-related-news li a:hover, .news-related-news li a:hover span {
	text-decoration: underline;
	color: #00456b
}
.news-related-links ul, .news-teaser .jspPane .news-related-news ul, .news-related-news ul, .news-related-files ul {
	padding: 0px;
	margin: 0px;
}
.news-related-links ul li, .news-related-news ul li, .news-related-files ul li {
	list-style: none;
}
section.mod.data-list.tabbed .result-data.download .file-title, .result-data.download .file-title {
	font: bold 12px arial;
	line-height: 18px;
	float: left;
	display: block;
}
article .result-data.download .news-related-files-link.file-title {
	width: 60%;
}
section.mod.data-list.tabbed .result-data.download .size {
	font: normal 12px arial;
	line-height: 18px;
	word-wrap:break-word;
}
.result-data.download .file-info, .news-related-files-size {
	/*float: right;
	line-height: 18px;*/
	float: right;
	line-height: 18px;
	max-width: 30%;
	/*position: absolute;*/
	right: 0px;
	top: 5px;
	margin-left: 3%
}
.documnets .result-data.download .file-info{
	max-width: 40%;
	word-wrap:break-word;
	margin-left: 0;

}

.col-md-8 .result-data.download .file-info, .col-md-8 .result-data.download .file-title {
	line-height: 30px;
}
.home .result-data.download .file-info .size, .home .result-data.download .file-title {
	/* line-height: 30px;
	*/
}
.result-data.download .file-title {
	width: 55%;
	margin: 5px 5% 0px 0px;
	font: bold 14px arial;
	word-wrap:break-word;
}
.result-data.download .teaserlist .file-title:hover {
	text-decoration: none;
}
.result-data.download .teaserlist .file-title a:hover, .result-data.download .file-title:hover, .news-related-files-link:hover{
	text-decoration: underline;
}
.news-related-files-link, .result-data.download .news-related-files-link.file-title {
	font: bold 16px arial;
	line-height: 30px;
}
.news-related-news li:hover {
	/*text-decoration: underline;*/
}
.result-data.download .icon {
	width: 30px;
	height: 30px;
	float: right;
	margin: 0px;
}
article.inhalt .result-data.download .news-related-files-size.size .icon {
	margin: 0px 0px 0px 10px;
}
.result-data.download .icon.mod-teaser {
	float: left;
	margin-right: 5px;
}
.result-data.download.doc .icon.mod-teaser {
	position: absolute
}
.teaserlist a {
	font: bold 12px arial;
}
.teaserlist span {
	font: normal 12px arial;
	display: block;
	color: #3f3f3f;
}
section.mod.data-list.tabbed .result-data.download .icon {
	width: 18px;
	height: 18px;
	float: right;
	margin: 0px;
}
.result-data.download .size, .news-related-files-size {
	margin-right: 10px;
	font: normal 14px arial;
	line-height: 30px;
	float: left;
}
article .result-data.download .news-related-files-size.size {
	line-height: 30px;
}
article .result-data.download .size, .col-md-8 .result-data.download .size {
	font: normal 16px arial;
	color: #3f3f3f;
	word-wrap:break-word;
	line-height: 30px
}
article.result-data.download .file-title, .col-md-8 .result-data.download .file-title {
	font: bold 16px arial;
	/* line-height: 30px;
	*/
}
.news-related-files-size {
	margin-right: 0px;
	font: normal 16px arial;
	line-height: 30px;
}
.news-backlink-wrap {
	margin: 30px 0px 30px;
	overflow: hidden;
}
.news-backlink-wrap a {
	background: #005a8c;
	padding: 9px;
	border-radius: 5px;
	font: normal 16px arial;
	color: white;
	display: block;
	float: left;
}
.weblinks ul li a span {
	height: 16px;
	width: 18px;
	background: url(../images/sprite.png) no-repeat;
	background-position: -173px -43px;
	display: block;
	float: left;
	margin: 0px 10px 0px 0px;
}
.news-related-links li a:after, .news-related-news li:after {
	content: "";
	height: 16px;
	width: 18px;
	background: url(../images/sprite.png) no-repeat;
	background-position: -173px -43px;
	display: block;
	float: left;
	margin: 0px 10px 0px 0px;
	position: absolute;
	left: 0px;
	top: 10px;
}
.mod-Kontakt .mod.contact-info .address ul {
	padding: 0px;
	margin: 0px 0px 10px 0px;
}
.mod-Kontakt .mod.contact-info .address ul li {
	padding: 0px;
	margin: 0px;
	list-style-type: none;
	display: block;
	float: none;
}
.mod-Kontakt .mod.contact-info .address ul li p {
	margin: 0px 0px 0px 0px;
}
.urologie h3 {
	font: bold 12px arial;
	margin: 0px;
}
.urologie h4 {
	font: bold 12px arial;
	margin: 0px;
}
.urologie .sociallinks h3 {
	margin: 5px 0px 0px 0px
}
.urologie p {
	margin: 20px 0px 10px;
	font: normal 12px arial;
}
.mod-details .urologie p{
	margin-bottom: 7px;
}
.row-fluid.tablet {
	display: none;
}

/* breadcrumb styles */
.breadcrumbs {
	border-bottom: dotted 1px #ccc;
	margin-bottom: 30px;
	padding-bottom: 2px;
	overflow: hidden;
}
.breadcrumbs ul {
	padding-left: 0;
	list-style: none;
	float: left;
	margin-bottom: 0;
}
.breadcrumbs li {
	display: inline-block;
	margin-right: 0px;
}
.breadcrumbs li span, .breadcrumbs li a {
	color: #493d34;
}
.breadcrumbs li a {
	position: relative;
	padding-right: 18px;
}
.breadcrumbs li a:after {
	/*content: " \00BB ";*/
	content: "";
	width: 5px;
	height: 5px;
	font-size: 12px;
	right: 5px;
	margin: 0px 0px 0px 0px;
	top: 6px;
	position: absolute;
	display: block;
	 background: url(../images/sprite.png) no-repeat;
	background-position: -616px -145px;
	
	/* position: absolute;
	*/
}
.breadcrumbs .btn-print {
	float: right;
	color: #493d34;
	padding-right: 20px;
	position: relative;
}
.breadcrumbs .btn-print:after {
	content: " ";
	position: absolute;
	right: 0;
	width: 15px;
	height: 15px;
	background: url(../images/sprite.png) no-repeat -38px -21px;
	top: 1px;
}
.urologie-home .breadcrumbs {
	margin-bottom: 30px;
	padding-bottom: 5px;
}
.clear {
	clear: both;
}

/* article styles */
article h2, article h1, h1, h2 {
	margin-top: 0;
	font-size: 52px;
	margin: -9px 0px 20px 0px
}
article.inhalt h1.inhalt_header, h1.inhalt_header {
	font-size: 42px;
	/* margin: 0px 0px 10px;
	*/
}
article.inhalt h1 {
}
article.downloadcenter h1, article.inhalt .downloadcenter h1 {
	font-size: 52px;
	margin: -6px 0px 20px 0px;
}
article h3 {
	font-size: 16px;
	font-family: arial;
	font-weight: bold;
}
article.newsarchiv h3 {
	padding: 0px;
	margin: 0px 0px 10px;
}
article summary, article .summary, .teaser-text p {
	color: #493d34;
	font-family: 'roboto_slablight';
	font-size: 20px;
	margin: 0px 0px 45px;
	line-height: normal;
}
article .summary, article p.summary, .teaser-text p {
	margin: -15px 0px 45px 0px
}
article p {
	font-size: 16px;
	font-family: arial;
	line-height: 1.5em;
}
article.blumen p {
	margin: 0px 0px 20px 0px
}
article ul {
	padding-left: 15px;
}
article li {
	font-size: 16px;
}
article.mitarbeiter.detailpage h2 {
	font-size: 32px;
	margin: 0px;
}
article.mitarbeiter.detailpage h3 {
	font-size: 20px;
	margin: 30px 0px 15px;
	/* margin: 0px;
	*/
}
article.mitarbeiter.detailpage h4 {
	font: bold 14px arial;
}
article.mitarbeiter.detailpage ul {
	margin: 0px 0px 25px;
}
article.mitarbeiter.detailpage ul li {
	font: normal 14px arial;
	list-style-type: disc;
	margin: 0px 0px 5px 0px;
	color: #3f3f3f;
}
article.webcam {
	margin: 0px 0px 10px 0px;
}

/* footer styles */
footer {
	background: #493d34;
	color: #a2988e;
	padding-top: 0px;
	margin: 0px 15px 15px
}
footer>.container {
	padding: 25px 15px 23px;
}
footer.innerpage {
	padding: 0px 0px;
	margin-top: -145px;
	*zoom: 1;
}
footer.innerpage:after, footer.innerpage:before {
	display: table;
	content: " ";
}
footer.innerpage:after {
	clear: both;
}
footer h3 {
	color: #fff;
	margin-top: 3px;
	font-size: 18px;
	margin-bottom: 5px;
}
footer.innerpage .address li.h3 {
	color: #fff;
	margin-top: 0px;
	font-size: 18px;
	margin-bottom: 0px;
	font: bold 18px 'roboto_slabbold', Arial, Helvetica, sans-serif;
}
.footermenu, footer.innerpage {
	max-width: 1850px;
	margin: 0 auto;
	margin-bottom: 10px;
	padding-bottom: 0px;
}
footer .quick-list {
	margin-left: -20px;
}
footer .quick-list ul {
	float: left;
	padding-left: 0;
	list-style: none;
}
footer .quick-list p {
	font: normal 11px arial;
}
footer .quick-list a {
	display: inline-block;
	color: #aaa096;
}
footer h4 {
	color: #aaa096;
	font-size: 12px;
	display: inline;
}
.col-md-3 .contact-info h3:nth-child(even) {
	margin: 15px 0px 5px 0px
}
.col-md-3 .contact-info p {
	margin-bottom: 0px
}
.contact-info p, footer .contact-info a {
	font-size: 18px;
	margin-bottom: 4px;
	color: #fff;
	font-family: 'roboto_slablight', Arial, Helvetica, sans-serif;
}
footer .contact-info a:hover, footer .quick-list a:hover{
	text-decoration: underline;
	color: #ddd9d5;
}
footer.innerpage .address li, footer.innerpage .contact li {
	margin: 0px 5px 0px 0px;
	color: #fff;
	font: normal 19px 'roboto_slablight', Arial, Helvetica, sans-serif;
	list-style: none;
	position: relative;
}
footer.innerpage .address li span, footer.innerpage .contact li span {
	font: normal 19px 'roboto_slablight', Arial, Helvetica, sans-serif;
}
footer.innerpage .address li:first-child, footer.innerpage .contact li.tel {
	list-style-type: none;
	/* margin: 0px 5px 0px 0px;
	*/
}
footer.innerpage .address li p:before, footer.innerpage .contact li p:before {
	content: "";
	background: url(../images/sprite.png) no-repeat -173px -2px;
	width: 9px;
	height: 9px;
	display: block;
	position: absolute;
	top: 10px;
	left: 0px
}
footer.innerpage .address li p, footer.innerpage .contact li p {
	padding: 0px 0px 0px 12px
}
footer.innerpage .contact li.tel p:before {
	display: none
}
footer.innerpage .contact li.tel p {
	padding: 0px;
}
footer.footermenu .col-md-3 {
	width: 25%;
	float: left;
}
footer.footermenu .col-md-9 {
	width: 75%;
	float: left;
}

/* footer quick links */
footer.innerpage .footer-links ul {
	margin: 0px
}
.footer-links ul {
	padding: 0;
	list-style: none;
	margin: 10px 0px 0px 0px;
}
.footer-links li {
	float: left;
	padding-right: 10px;
	margin-right: 5px;
}
.footer-links li:nth-child(3) {
	clear: left;
}
footer.innerpage .footer-links li:nth-child(3) {
	clear: none;
}
.footer-links li.clear-lft {
	clear: left;
}
.footer-links a {
	color: #a2988e;
	padding-left: 8px;
}
.footer-links a:hover {
	color: #ddd9d5;
}
.footer-links .link:after {
	border-color: transparent #a2988e;
}
.footer-links .link:after:hover {
	border-color: transparent #ddd9d5;
}
footer.innerpage .social-icons {
	float: right
}
.social-icons ul {
	list-style: none;
	padding-left: 0;
	margin-top: 10px;
}
.social-icons li {
	float: left;
	margin-right: 7px;
}
.social-icons li:last-child {
	margin-right: 0px;
}
.social-icons .icon {
	width: 37px;
	height: 37px;
}
footer.innerpage .social-icons .icon {
	width: 60px;
	height: 60px;
}
.list-unstyled, .list-unstyled ul {
	min-width: 120px
}
.yamm .nav, .yamm .collapse, .yamm .dropup, .yamm .dropdown {
	position: static;
}
.yamm .container {
	position: relative;
}
.yamm .dropdown-menu {
	left: auto;
}
.yamm .yamm-content {
	padding: 0px 0px;
}
.yamm .dropdown.yamm-fw .dropdown-menu {
	left: 0;
	right: 0;
}
.nav.navbar-nav.mob-hide {
	padding: 0px 15px 0px 13px
}
.navbar-default {
	background: #f2f1ef;
	z-index: 200;
	border-radius: 0px;
	border: none;
	min-height: 1px;
	margin: 0px 15px 2px
}
article.inhalt ul.listing li {
	font-size: 16px;
	color: #aaa096;
}
article.inhalt ul.listing li span {
	color: #3f3f3f;
}
article.inhalt ul li span.news-related-news-date {
	color: #005a8c;
}
article.inhalt ul li span.news-related-news-date:hover {
	color: #005a8c;
}
.downloadcenter p {
	font-family: 'roboto_slablight';
	font-size: 22px
}
article.Kontakt p {
	font: normal 16px arial;
	margin: 0px 0px 30px;
}
article.urologie {
	margin: 0px 0px 0px 0px;
}
.downloadcenter fieldset, .downloadcenter #step2 fieldset {
	position: relative;
	margin: 0px 0px 30px;
}
.downloadcenter fieldset:last-child {
	margin: 0px 0px 60px;
}
#step2 .downloadcenter fieldset {
	margin: 0px 0px 30px;
}
.downloadcenter .col-sm-11, .downloadcenter .col-sm-2, .mitarbeiter col-sm-12 {
	padding: 0px
}
.downloadcenter .col-sm-1 {
	position: relative;
	padding: 0px
}
.downloadcenter .col-sm-11 .form-control, article.mitarbeiter .col-sm-12 .form-control {
	height: auto;
	font: normal 22px roboto_slabbold
}
.downloadcenter .col-sm-11 .form-control {
	height: 48px;
}
article.mitarbeiter .col-sm-12 .form-control {
	padding: 8px 35px 8px 15px;
}
.downloadcenter .col-sm-11 .form-control {
	margin: 0px
}
.downloadcenter .col-sm-11 .form-control.bdr-rgt-none, article.mitarbeiter .col-sm-12 .form-control.bdr-rgt-none {
	border-radius: 4px;
	position: relative;
	padding: 8px 35px 8px 15px;
}
.downloadcenter .col-sm-11 input.form-control.bdr-rgt-none {
	border: 2px solid #e5e2dd;
	height: 50px;
	padding: 8px 35px 7px 15px
}
article.mitarbeiter fieldset {
	position: relative;
	margin: 30px 0px 30px;
}
article .row.mitarbeiter fieldset {
	float: left;
	margin: 0px 10px 0px 0px;
}
article.mitarbeiter h3 {
	color: #493d34;
	font: bold 20px roboto_slabbold;
	margin: 30px 0px 15px;
}
article ul.listing li {
	font-size: 16px;
}
.downloadcenter .input-group.col-sm-11 {
	float: left;
	position: relative;
}
.downloadcenter .input-group.col-sm-11 i.icon-search, article.mitarbeiter .col-sm-12 i.icon-search {
	top: 15px;
}
article.webcam ul {
	margin: 0px;
	padding: 0px
}
article.webcam li {
	list-style: none;
	padding: 10px 0px
}
article.webcam ul li .hdg {
	font: bold 16px arial;
	margin: 0px 0px 5px 0px;
}
span.input-group-addon.bgnone {
	background: none
}
i.icon-search {
	height: 20px;
	width: 20px;
	position: absolute;
	background: url(../images/sprite.png) no-repeat left -44px;
	z-index: 10;
	right: 10px;
	top: 10px;
}
i.icon-search.babygallerie {
	top: 7px;
}
.newspresse .glyphicon-time {
	padding-left: 0;
}
th.sorting {
	cursor: pointer;
}
th.sorting_asc, th.sorting_desc {
	font: bold 16px arial;
	color: #005a8c;
}
#mod-generic7 i.icon-search, .row.mitarbeiter i.icon-search {
	top: 4px;
}
.blue {
	color: #005a8c
}
.tx-solr-search-form input[type="text"] {
	border: 2px solid #e5e2dd;
	border-radius: 5px;
	color: #493d34;
	font: bold 22px roboto_slabbold;
	padding: 8px 10px;
	margin: 0px 3% 0px 0px;
	width: 77%;
	float: left;
}
.tx-solr-search-form input[type="submit"] {
	background: #005a8c;
	color: #ffffff;
	font: bold 22px roboto_slabbold;
	border-radius: 5px;
	border: none;
	padding: 10px 10px;
	width: 19%;
	float: right;
}
.tx-solr-search, .range-search {
	font: normal 16px arial;
}
.tx-solr-search-form {
	overflow: hidden;
	margin: 0px 0px 20px 0px;
}
#tx-solr-search-functions {
	margin: 20px 0px;
	border: 1px dotted #cccccc;
	border-width: 1px 0px;
}
ul.facets {
	margin: 0px;
	padding: 10px 0px;
	list-style-type: none
}
ul.facets li {
	margin: 0px;
	padding: 0px 0px;
	list-style-type: none;
	display: inline;
	font: bold 12px arial;
}
ul.facets li li {
	padding: 0px 10px 0px 0px;
}
ul.facets ul {
	padding: 0px;
	margin: 0px;
}
hr.twopx, hr.twoPx {
	height: 2px;
	background: #493d34;
}
.facet-result-count {
	color: #005a8c;
	font: normal 12px arial;
	margin: 0px 0px 0px 5px;
}
.results-list {
	padding: 0px;
	margin: 0px;
}
.results-list li {
	list-style: none;
	padding: 10px 0px;
	margin: 0px;
	border-bottom: 1px dotted #cccccc;
}
.results-list li:first-child {
	padding: 0px 0px 10px 0px
}
h5.results-topic {
	font: bold 22px roboto_slabbold;
	margin: 0px 0px 15px 0px;
}
.results-entry>a {
	font: normal 16px arial;
}
.result-content {
	color: #333333;
	font: normal 16px arial;
}
.results-teaser {
	margin: 15px 0px 0px 0px;
}
.tx-solr-relevance-bar {
	width: 98px;
	height: 9px;
	overflow: hidden;
	border: 1px solid #005a8c;
	margin: 0px 0px 3px 0px;
}
.tx-solr-relevance-fill {
	background: white;
}
.tx-solr-relevance {
	background: #9ec0d3;
	height: 7px;
}
.relevance {
	font: normal 12px arial;
}
.relevance-label {
	float: left;
}
hr.year {
	margin: 0px;
}
hr.twopx.tabular {
	margin: 30px 0px 0px 0px;
}
.margBot30 {
	margin-bottom: 30px;
}
h2.videohdg, h2.basicSlider, h2.Links, h2.datadownload, h2.formHdg, article.mitarbeiter.detailpage h2.videohdg, .news-related h4, article.inhalt .mod.data-list.downloadData h2 {
	font-size: 16px;
	margin: 40px 0px 0px;
	font-family: arial;
	font-weight: bold;
	border-top: 2px solid #493d34;
	padding: 15px 0px 15px;
}
.news-related h4 {
	margin: 30px 0px 0px 0px;
	padding: 0px 0px 10px;
	color: #3f3f3f
}
h2.Links, h2.datadownload.main, .news-related h4, article.inhalt .mod.data-list.downloadData h2 {
	border-top: none
}
h2.datadownload.main, article.inhalt .mod.data-list.downloadData h2 {
	padding: 0px 0px 15px
}
section.mod.generic h2.datadownload.main, section.mod.generic .news-related h4, section.mod.generic .news-related h4 {
	font: bold 12px arial;
	margin: 10px 0px 0px;
}
section.mod.generic .news-related-files-link, section.mod.generic .result-data.download .news-related-files-link.file-title {
	/*font: bold 12px arial;
	width: auto;
	line-height: 18px;*/
	font: bold 12px arial;
	/*width: 75%;*/
	width: 67%;
	line-height: 18px;
	margin: 0;
	display: block;
	float: left;
	padding: 0px 0 0px 0px;
	word-wrap:break-word;
}
section.mod.generic .news-related-files-link a:hover, section.mod.generic .result-data.download .news-related-files-link.file-title a:hover, h3.urologie-generic2 a:hover, .mod-details .scroll-pane p a:hover{
	text-decoration: underline;
	color: #00456b
}
section.mod.generic .mod.data-list.downloadData.tabbed .result-data.download .news-related-files-size {
	line-height: normal;
}
h3.urologie-generic2 {
	font-size: 20px;
	margin: 10px 0px
}
article.mitarbeiter.detailpage h2.videohdg {
	margin: 0px;
}
form.form-horizontal label {
	font-size: 16px;
	font-weight: normal;
}
form.form-horizontal .form-control {
	height: auto;
	padding: 8px;
}
form.schritt h5:first-child {
	font: bold 16px arial;
	margin: 17px 0px 4px;
}
form.schritt h5 {
	margin: 7px 0px 4px;
}
.mod.schritt .col-sm-6 .form-group input[type="text"] {
	padding: 5px;
	height: 35px;
}
form.list-detail.galerie.mitarbeiter .custom-select.form-control {
	float: left;
	width: auto;
	margin: 0px 12px 0px 0px;
}
div.jobdetail-2, .powermail_form_1.rulertb/* , .tx-powermail */ {
	border: 2px solid #493d34;
	border-width: 2px 0px;
}
.jobdetail-2 h5, .tx-powermail h3 {
	font: bold 14px arial;
	margin: 13px 0px 5px;
}
.jobdetail-2 h6, .tx-powermail legend {
	font: normal 14px arial;
	margin: 0px 0px 20px;
	border: none;
}
.tx-powermail .powermail_check_legend {
	width: 25%;
	padding: 8px 15px 8px 0px;
	float: left;
	margin: 0px
}
input[type=checkbox].powermail_checkbox {
	float: left;
	margin: 2px 10px 0px 0px
}
.jobdetail-2 .form-group {
	*zoom: 1;
	/* overflow: hidden;
	*/
}
.jobdetail-2 .form-group:after, .jobdetail-2 .form-group:before {
	content: " "; /* 1 */
	display: table; /* 2 */
}
.jobdetail-2 .form-group:after {
	clear: both;
}
.jobdetail-2 .form-group .form-control {
	padding: 8px;
	height: auto;
	font: normal 14px arial;
}
.news-img-wrap .outer {
	float: left;
	clear: left;
	margin: 0px 20px 20px 0px;
	/* width: 330px;
	*/
	display: table;
}
.news-img-wrap .outer {
	display: none;
}
.news-img-wrap .outer:first-child {
	display: table;
}
.news-img-wrap .outer .news-img-caption {
	display: table-caption;
	caption-side: bottom;
	margin: 0px 0px 15px 0px;
}
input.powermail_field {
	padding: 8px;
	height: auto;
	font-size: 12px;
	border-color: #c6c0b9;
	display: block;
	width: 72%;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	border: 1px solid #ccc;
	border-radius: 4px;
	-webkit-box-shadow: none;
	box-shadow: none;
	-webkit-transition: none;
	-o-transition: none;
	transition: none;
	/* float: left;
	*/
}
input.powermail_field.powermail_file {
	border: none;
	box-shadow: none;
	padding: 0px;
}
input.powermail_field.powermail_file:focus {
	outline: none;
	border-color: rgba(204, 204, 204, 0.8);
	box-shadow: none;
	outline: 0 none;
}
input.powermail_field.powermail_textarea {
	width: 75%;
	border-radius: 4px;
	border: 1px solid #c6c0b9;
}
.powermail_fieldwrap.powermail_fieldwrap_submit {
	margin: 0px 0px 15px 28%;
	overflow: hidden;
}
input.powermail_field.powermail_submit {
	color: #fff;
	background-color: #3071a9;
	border-color: #285e8e;
	display: inline-block;
	padding: 6px 12px;
	margin-bottom: 0;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	border: 5px solid transparent;
	border-radius: 4px;
	width: auto;
	font: normal 16px arial;
	padding: 9px 23px;
	margin-bottom: 0;
}
label#fileLabel {
	margin: 0px 0px 0px 10px;
	font: normal 14px arial;
	color: #3f3f3f;
}
span.mandatory {
	color: red;
}
.jobdetail-2 .form-group .col-sm-10 label {
	padding: 8px 0px 8px 10px;
	margin: 0px;
}
.jobdetail-2 .form-group label, .tx-powermail label {
	padding: 8px 0px;
	height: auto;
	font: normal 16px arial
}
.jobdetail-2 .btn.btn-primary {
	font: normal 16px arial
}
.tx-powermail label {
	width: 28%;
	padding: 8px 15px 8px 0px;
	float: left;
}
.tx-powermail .powermail_check_inner  label {
	padding: 0px 15px 0px 0px;
	margin: 0px;
	width: auto;
}
.powermail_check_inner {
	float: left;
	width: auto;
	*zoom: 1;
}
.powermail_form_3.spontan .powermail_check_outer {
	width: 72%;
	float: right;
}
.powermail_fieldwrap.powermail_fieldwrap_input, .powermail_fieldwrap.powermail_fieldwrap_textarea, .powermail_fieldwrap.powermail_fieldwrap_file, .powermail_fieldwrap.powermail_fieldwrap_text {
	/* overflow: hidden;
	*/	margin: 0px 0px 15px 0px;
	width: 100%;
	*zoom: 1;
}
.powermail_fieldwrap.powermail_fieldwrap_select, .powermail_fieldwrap.powermail_fieldwrap_check {
	/* overflow: inherit;
	*/	margin: 0px 0px 15px 0px;
	clear: both;
	*zoom: 1;
}
.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_input .formError, .powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_textarea .formError, .powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_file .formError, .powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_select .formError, .powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_check .formError {
	position: inherit !important
}
.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_textarea .formError .formErrorContent {
	position: inherit;
	padding: 0px 0px 0px 28%;
}
.powermail_fieldwrap.powermail_fieldwrap_input:after, .powermail_fieldwrap.powermail_fieldwrap_textarea:after, .powermail_fieldwrap.powermail_fieldwrap_file:after, .powermail_fieldwrap.powermail_fieldwrap_check:after, .powermail_fieldwrap.powermail_fieldwrap_text:after, .powermail_fieldwrap.powermail_fieldwrap_input:before, .powermail_fieldwrap.powermail_fieldwrap_textarea:before, .powermail_fieldwrap.powermail_fieldwrap_file:before, .powermail_fieldwrap.powermail_fieldwrap_check:before, .powermail_fieldwrap.powermail_fieldwrap_text:before, .powermail_check_inner:before, .powermail_check_inner:after {
	display: table;
	content: ""
}
.powermail_fieldwrap.powermail_fieldwrap_input:after, .powermail_fieldwrap.powermail_fieldwrap_textarea:after, .powermail_fieldwrap.powermail_fieldwrap_file:after, .powermail_fieldwrap.powermail_fieldwrap_text:after, .powermail_fieldwrap.powermail_fieldwrap_check:after, .powermail_check_inner:after {
	clear: both;
}
.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_textarea {
	margin: 0px;
}
.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_textarea#powermail_fieldwrap_32, .powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_textarea#powermail_fieldwrap_28 {
	margin: 0px 0px 15px 0px;
}
.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_text {
	padding-left: 28%
}
.bootstrap-filestyle.input-group .group-span-filestyle.input-group-btn {
	background: #f2f1ef;
	border-radius: 5px;
	font: normal 14px arial;
	border: none;
	padding: 9px 10px;
}
.bootstrap-filestyle.input-group input[type=text].form-control {
	height: 36px;
}
.bootstrap-filestyle.input-group .group-span-filestyle.input-group-btn label {
	padding: 0px;
	border: none;
	background: none;
	color: #aaa096;
}
.bootstrap-filestyle.input-group .group-span-filestyle.input-group-btn label span.glyphicon {
	display: none
}
.bootstrap-filestyle.input-group  input[type=text].form-control {
	background: none;
	border: none;
	font: normal 14px arial;
	color: #3f3f3f;
	margin: 0px 0px 0px 10px;
}
table.jobdetail-2 p.bodytext{
	margin: 0px;
	padding:0px;
}
.bootstrap-filestyle.input-group  input[type=text].form-control:after {
	/* content: "test";
	*/
}
.jobdetail-2 .form-group div {
	padding-right: 0px
}
.jobdetail-2 input[type=file] {
	display: block;
	margin: 0px 0px 0px;
	width: 124px;
	float: left;
	height: 34px;
}
.joblinks {
	margin: 20px 0px;
}
.social-likes__button:hover {
	cursor: pointer;
}
.btn-facebook, .social-likes__button.social-likes__button_facebook {
	color: #ffffff;
	/* text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	*/
	background-color: #4763b3;
	/* background-image: -moz-linear-gradient(top, #3b5998, #133783);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#3b5998), to(#133783));
	background-image: -webkit-linear-gradient(top, #3b5998, #133783);
	background-image: -o-linear-gradient(top, #3b5998, #133783);
	background-image: linear-gradient(to bottom, #3b5998, #133783);
	background-repeat: repeat-x;
	border-color: #133783 #133783 #091b40;
	border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff3b5998', endColorstr='#ff133783', GradientType=0);
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
	*/
	padding: 3px 7px;
	font: bold 12px arial;
	margin: 0px 0px 0px 0px;
	border-radius: 4px;
}
.social-likes__icon.social-likes__icon_facebook:after {
	content: "\f09a";
	background: white;
	padding: 2px;
	color: #4763b3;
	margin: 0PX 3PX 0PX 0PX;
	display: inline-block;
	font-family: FontAwesome;
	font-style: normal;
	font-weight: normal;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
.fa-facebook:before {
	content: "\f09a";
	background: white;
	padding: 2px;
	color: #4763b3;
	margin: 0PX 3PX 0PX 0PX;
}
div.kontakt-form {
	border: 1px dotted #cccccc;
	border-width: 1px 0px 0px;
	margin: 30px 0px 0px;
}
.kontakt-form .btn.btn-primary {
	font: normal 16px arial;
}
.kontakt-form h5, .kontakt-form .powermail_legend {
	font: bold 16px arial;
	margin: 20px 0px 15px;
}
.kontakt-form .powermail_legend {
	font: bold 16px arial;
	padding: 20px 0px 15px;
	margin: 0px;
}
.kontakt-form .form-group {
	overflow: hidden;
}
.kontakt-form .form-group .form-control {
	padding: 8px;
	height: auto;
}
.kontakt-form .form-group label {
	padding: 8px 0px;
	height: auto;
	font: normal 16px arial;
}
.kontakt-form .form-group div {
	padding-right: 0px
}
.kontakt-form input[type=file] {
	display: block;
	margin: 7px 0px 0px;
}
.mitarbeiter .listings {
}
.mitarbeiter .listings .row-fluid {
	border-top: dotted 1px #ccc;
	padding: 10px 0px 0px;
}
.mitarbeiter .listings .row-fluid:last-child {
	border-bottom: dotted 0px #ccc;
}
.mitarbeiter .listings .link {
	margin: 0px 15px 0px 0px;
	font: normal 12px arial;
}
.listings .tag.label.label-info {
	background: none;
	font: normal 12px arial;
	color: #3f3f3f;
	margin: 0px 20px 0px 0px;
	padding: 0px;
}
.listings .tag.label.label-info span {
	position: relative;
	padding: 0px 0px 0px 21px
}
.listings .tag.label.label-info a {
	position: absolute;
	top: 0px;
	left: 0px;
	padding: 0px 2px;
	background: white;
	border-radius: 5px;
	border: 1px solid #e5e2dd;
}
.listings .fa-times:before {
	content: "\f00d";
	color: #493d34;
}
.mitarbeiter .btn-primary {
	margin: 30px 0px 35px;
	font: normal 20px roboto_slabbold;
}
.mitarbeiter .btn-primary.btn.mod {
	margin: 0px;
	font: normal 12px arial;
}
.joblinks {
	margin: 20px 0px;
}
fieldset.pos-spec, div.pos-spec {
	position: relative;
	border-top: dotted 1px #ccc;
	padding: 25px 0px 0px
}
div.pos-spec {
	border-top: dotted 1px #ccc;
	border-bottom: dotted 1px #ccc;
}
fieldset.pos-spec {
	padding: 10px 0px 0px
}
form.schritt .btn {
	background-color: #005a8c;
	font: bold 16px arial;
	padding: 8px 12px;
	margin: 0px 0px 50px 0px
}
form.schritt .btn.dropdown-toggle.selectpicker {
	background: transparent;
}
ul.dropdown-menu.inner.selectpicker span {
	background: transparent;
	border: none;
	color: #493d34;
	padding: 5px 0px
}
.krankheit ul.dropdown-menu.inner.selectpicker span {
	white-space: nowrap;
}
ul.dropdown-menu.inner.selectpicker span:hover {
	color: #493d34;
}
.schritt3 fieldset .form-group label.radio {
	width: 100%;
	padding: 0px;
	margin: 0px
}
.schritt3 {
	border-top: dotted 1px #ccc;
}
.schritt3 fieldset {
	padding: 10px 0px 0px 0px;
	border: none;
	margin-bottom: 0px;
}
.schritt3 fieldset .form-group label {
	padding: 8px 0px 0px;
	width: 15%;
	font: normal 16px arial;
}
.schritt3 fieldset .form-group div.col-sm-10 {
	padding-right: 0px;
	width: 85%;
	font: normal 16px arial;
}
form.schritt .col-sm-offset-2.col-sm-10 {
	margin-left: 0%;
	width: 100%;
	padding: 0px;
}
.schritt3 fieldset .form-group div.col-sm-3 {
	padding: 0px;
}
.schritt3 fieldset .form-group div.col-sm-9 {
	padding-right: 0px;
}
.schritt3 fieldset .form-group div input, .schritt3 fieldset .form-group div select {
	height: auto;
	padding: 7px;
	font: normal 14px arial;
	box-shadow: none;
}
.schritt3 fieldset .form-group {
	margin-bottom: 15px;
	*zoom: 1;
}
.schritt3 fieldset .form-group:after {
	clear: both;
}
.schritt3 fieldset .form-group:before, .schritt3 fieldset .form-group:after {
	display: table;
	content: " ";
}
.schritt3 fieldset .form-group.overridden {
	/* overflow: inherit;
	height: 36px;
	*/
}
div.pos-spec a.link {
	font-weight: bold;
	display: block;
	margin: 10px 0px 30px;
	font: bold 16px arial;
}
fieldset.pos-spec img, div.pos-spec img {
	position: absolute;
	right: 0px;
	top: 27px;
	height: 250px;
	width: 250px;
}
fieldset.pos-spec Label {
	font-weight: normal;
	font: normal 16px arial;
}
fieldset.pos-spec Label input[type=radio] {
	margin: 2px 0px 0px -20px;
}
textarea.span12 {
	width: 100%;
	border-radius: 4px;
	border: 1px solid #c6c0b9;
	resize: none;
}
.powermail_field.powermail_textarea {
	width: 72%;
	border-radius: 4px;
	border: 1px solid #c6c0b9;
	resize: none;
}
.listedCnt h5 {
	font: bold 16px arial;
	margin: 20px 0px 10px;
}
.schritt3 h5 {
	font: bold 16px arial;
	margin: 20px 0px 5px;
}
.listedCnt ul {
	margin: 0px 0px 20px;
	padding: 0px
}
.listedCnt ul li {
	margin: 0px 0px 10px 0px;
	padding: 0px;
	list-style: none;
	font: normal 16px arial;
}
.listedCnt ul li i {
	font-style: normal;
}
.form-group.radiobtn {
	margin: 0px 0px 0px 21px;
}
.form-horizontal .control-label {
	text-align: left;
}
.basicslides .carousel-control.left, .basicslides .carousel-control.right {
	background-image: none;
}
.basicslides .carousel-inner > .item > img {
	width: 100%
}
.basicslides .carousel-caption {
	display: block;
	position: relative;
	left: 0px;
	text-align: left;
	background: #f2f1ef;
	color: #3f3f3f;
	top: 0px;
	font-family: arial;
	padding: 10px;
}
.basicslides .carousel-caption h3 {
	display: inline;
	margin: 0px;
	padding: 0px 5px 0px 0px;
	font-family: arial;
	font-size: 12px;
	text-shadow: none;
	font-weight: bold;
}
.basicslides .carousel-caption p {
	padding: 0px;
	margin: 0px;
	font-size: 12px;
	text-shadow: none;
	display: inline;
}
.basicslides .carousel-indicators {
	display: none
}
.btn-primary.VidBtn, .mitarbeiter .btn-primary.VidBtn {
	font-size: 16px;
	margin: 40px 0px 35px;
}
.btn.btn-primary.lrg {
	font: bold 16px arial;
}

/* customized file input css starts here */
.custom-file-input, input.powermail_file {
	color: transparent;
}
.custom-file-input::-webkit-file-upload-button, .powermail_file::-webkit-file-upload-button {
	visibility: hidden;
}
.custom-file-input::before, .powermail_file::before {
	content: 'Datei auswählen';
	color: black;
	display: inline-block;
	background: #f2f1ef;
	border: 0px solid #999;
	border-radius: 3px;
	padding: 9px 10px;
	outline: none;
	white-space: nowrap;
	-webkit-user-select: none;
	cursor: pointer;
	text-shadow: none;
	font: normal 14px arial;
	color: #aaa096;
}
.custom-file-input:hover::before, .powermail_file:hover::before {
	border-color: black;
}
.custom-file-input:active, .powermail_file:active {
	outline: 0;
}
.custom-file-input:active::before, .powermail_file:active::before {
	background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}

/* customized file input css ends here */
.mod-highlight a span span.infos, .mod-highlight a span span.liste, .mod-highlight a span span.detail, .mod-highlight a span span.search {
	width: 19px;
	height: 19px;
	background: url(../images/sprite.png) no-repeat left top;
	border: none;
	float: left;
	display: block;
}
div.csc-textpic .csc-textpic-imagewrap .csc-textpic-image {
	margin: 0px 15px 0 0px;
}
div.csc-textpic-intext-left .csc-textpic-imagewrap, div.csc-textpic-intext-left-nowrap .csc-textpic-imagewrap{
	margin: 0px;
}
.mod-highlight a span span.infos, .mod-highlight a span span.bilder {
	background-position: -60px -15px;
}
.mod-highlight a.active span span.infos, .mod-highlight a.active span span.bilder {
	background-position: -81px -15px;
}
.mod-highlight a:hover span span.infos, .mod-highlight a:hover span span.bilder {
	background-position: -81px -15px;
}
.mod-highlight a span span.liste {
	background-position: -101px -15px;
}
.mod-highlight a.active span span.liste {
	background-position: -123px -15px;
}
.mod-highlight a:hover span span.liste {
	background-position: -123px -15px;
}
.mod-highlight a.active span span.detail {
	background-position: -165px -15px;
}
.mod-highlight a:hover span span.detail {
	background-position: -165px -15px;
}
.mod-highlight a span span.search {
	background-position: 0px -44px;
}
.mod-highlight a span span.detail {
	background-position: -144px -15px;
}
.mod-highlight a.active span span.detail {
	background-position: -165px -15px;
}
.mod-highlight a:hover span span.detail {
	background-position: -165px -15px;
}
.mod-highlight a span i {
	display: block;
	padding: 0px 0px 0px 10px;
	float: left;
	height: 19px;
	line-height: 19px;
	font-style: normal;
}
.mod-highlight a span i.search {
	display: block;
	padding: 0px 0px 0px 10px;
	float: left;
	height: 19px;
	line-height: 19px;
	text-indent: -9999em;
	width: 13px;
	background: url(../images/sprite.png) no-repeat left top;
	background-position: 0px -21px;
	margin: 0px 0px 0px 10px;
}
.mod-highlight a.eventactive span i.search {
	background: url(../images/sprite.png) no-repeat left top;
	/* background-position: -120px 4px;
	*/
	background-position: 0px -21px;
}
.mod-highlight.infos a span i {
	padding: 0px 0px 0px 0px;
	font-style: normal;
}
.highlighted {
	border: dotted 1px #ccc;
	border-width: 1px 0px;
	padding: 15px 38px;
	color: #aaa096;
	font-family: 'roboto_slabbold';
	font-size: 20px;
}
.highlighted:after {
	content: "»"
}
.highlighted:before {
	content: "«"
}
.container .col-md-12 {
	/* padding: 0px;
	*/
}
.linkHeading {
	font-size: 16px;
	font-weight: bold;
}
.krankheit .col-xs-12.col-md-4.linkHeading {
	padding: 0px 0px 0px 15px
}
.linkContent {
	font-size: 16px;
	font-weight: normal;
	color: #333333
}
.krankheit .col-xs-12.col-md-4.linkHeading .link {
	font: bold 16px arial;
}
.krankheit .col-xs-12.col-md-8.linkContent {
	font: normal 16px arial;
	padding: 0px;
}
.mod-details.listView > div:nth-child(even) {
	background: #f2f1ef;
	padding: 6px
}
.mod-details.listView > div:nth-child(odd) {
	background: #f6f5f4;
	padding: 6px;
}
.mod-details.listView > div {
	border-bottom: 2px solid #fff;
	margin: 0px
}
.mod-details.listView > div:last-child {
	border-bottom: 2px solid #fff;
}
section.mod.generic5 .row {
	border-top: dotted 1px #ccc;
	padding: 14px 0px;
	margin: 0px
}
section.mod.generic5 h3 {
	font-size: 12px;
	font-weight: bold;
	color: #005a8c;
	margin: 0px;
	padding: 0px;
	font-family: arial;
}
section.mod.generic5 p, section.mod.generic5.quicklinks p {
	font-size: 12px;
	font-weight: normal;
	margin: 5px 0px 0px 0px;
	padding: 0px;
	font-family: arial;
}
section.mod.schritt h3 {
	font-size: 26px;
	font-family: 'roboto_slablight';
	margin-bottom: 26px;
}
.masonry-brick {
	width: 350px;
	margin-left: -1px;
	transform: translateX(1px);
	padding: 0px
}
.post-box {
	/* margin-right: 15px;
	*/
	/* padding: 0px;
	*/
	/* padding: 0px 15px 0px 0px;
	*/
}
a.lightbox, .news-img-wrap .outer a, article.inhalt span.align-left a {
	position: relative;
	display: block;
}
a.lightbox:after, .news-img-wrap .outer a:after, article.inhalt span.align-left a:after {
	content: " ";
	border: none;
	background: url(../images/sprite.png) no-repeat -564px 0px;
	height: 19px;
	text-indent: -999em;
	width: 19px;
	padding: 0;
	position: absolute;
	bottom: 10px;
	right: 10px;
}
#lightbox .modal-content {
	display: inline-block;
	text-align: center;
	width: 100%
}
#lightbox .close {
	opacity: 1;
	color: rgb(255, 255, 255);
	background-color: rgb(25, 25, 25);
	padding: 5px 8px;
	border-radius: 30px;
	behavior: url(http://css3pie.com/pie/PIE.htc);
	border: 2px solid rgb(255, 255, 255);
	position: absolute;
	top: -15px;
	right: -10px;
	z-index: 1032;
}

/* #lightbox {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: url(../images/overlay.png) repeat;
	text-align: center;
	z-index: 99
}
#lightbox p {
	text-align: right;
	color: #fff;
	margin-right: 20px;
	font-size: 12px;
	text-indent: 999999em;
	width: 16px;
	height: 16px;
	position: absolute;
	z-index: 1;
	top: 3px;
	background: url(../images/sprite.png) no-repeat left top;
	background-position: -317px -38px;
	margin: 0px 10px 0px 0px;
	right: 0px;
	cursor: pointer;
}
#lightbox img {
	box-shadow: 0 0 25px #111;
	-webkit-box-shadow: 0 0 25px #111;
	-moz-box-shadow: 0 0 25px #111;
	max-width: 940px;
}
#lightbox #content {
	margin-top: 50px;
}
*/
.well {
	position: relative;
	display: block;
	overflow: visible;
}
.item {
	/* display: inline-block;
	padding: .25rem;
	width: 25%;
	*/
}
#box.row {
	-moz-column-width: 25em;
	-webkit-column-width: 25em;
	-moz-column-gap: .5em;
	-webkit-column-gap: 1em;
}
.topdottedline {
	border-top: dotted 1px #ccc;
	padding: 10px 0px 3px;
	font-family: arial;
	font-size: 16px;
}
.show-btn {
	background: url(../images/sprite.png) no-repeat;
	background-position: -65px 0px;
	width: 18px;
	height: 11px;
	display: block;
	position: absolute;
	top: 5px;
	right: 0px;
}
.right-inner-addon {
	position: relative;
}
.right-inner-addon input {
	padding-right: 30px;
}
.right-inner-addon i {
	position: absolute;
	right: 0px;
	padding: 10px 12px;
	pointer-events: none;
}
input#srch-term.babygallerie {
	padding: 0px 32px 0px 10px;
	font: normal 12px arial;
	height: 33px;
	box-shadow: none;
	border: 1px solid #e5e2dd;
	color: #3f3f3f;
}
#mod-generic7 input#srch-term, .row.mitarbeiter input#srch-term {
	height: 27px;
	padding: 0px 32px 0px 10px;
	font: normal 12px arial;
	box-shadow: none;
	border: 1px solid #e5e2dd;
}

/* a.pagination-lft, a.pagination-rgt {
	width: 34px;
	height: 34px;
	background: #f2f1ef;
	border-radius: 50%;
	display: block;
	position: relative;
	float: left;
}
a.pagination-lft span, a.pagination-rgt span {
	display: block;
	width: 12px;
	height: 19px;
	background: url(../images/sprite.png) no-repeat;
	position: absolute;
}
a.pagination-lft span {
	background-position: -134px -43px;
	top: 8px;
	left: 9px;
}
a.pagination-rgt span {
	background-position: -154px -43px;
	top: 8px;
	left: 9px;
}
*/
.total {
	float: right;
	font-weight: bold;
	padding: 10px;
}
.pagination ul {
	display: inline-block;
	*display: inline; /* IE7 inline-block hack */
	*zoom: 1;
	margin: 0px;
	padding: 0px;
}
.pagination li, .tx-pagebrowse>li {
	display: block;
	float: left;
}
.tx-pagebrowse ol li {
	list-style: none;
	display: inline;
	line-height: 40px;
}
.tx-pagebrowse li a:hover, .tx-pagebrowse li:after:hover {
	cursor: pointer;
}
.pagination a, .tx-pagebrowse li a, .tx-pagebrowse li.tx-pagebrowse-first, .tx-pagebrowse li.tx-pagebrowse-prev, .tx-pagebrowse li.tx-pagebrowse-next, .tx-pagebrowse li.tx-pagebrowse-last {
	float: left;
	padding: 0 0px;
	line-height: 40px;
	text-decoration: none;
	border: 0px solid #ddd;
	border-left-width: 0;
	width: 34px;
	height: 34px;
	border-radius: 50%;
	background: #f2f1ef;
	text-indent: -9999em;
	position: relative;
	margin: 0px 10px 0px 0px;
	outline: none
}
.pagination a {
	margin: 0px 10px 0px 0px
}
.pagination a:focus {
	outline: none;
}
.pagination a:hover, .pagination .active a {
	background-color: #f5f5f5;
	outline: none
}
.pagination .active a {
	color: #999999;
	cursor: default;
}
.pagination .disabled span, .pagination .disabled a, .pagination .disabled a:hover {
	color: #999999;
	cursor: default;
}
.pagination .disabled.seitenos span, .pagination .disabled.seitenos a, .pagination .disabled.seitenos a:hover {
	color: #999999;
	background-color: transparent;
	cursor: default;
	outline: none
}
.pagination li:first-child a {
	outline: none
}
.pagination li:last-child a {
	margin: 0px 0px 0px 0px;
	outline: none
}
.tx-pagebrowse-pi1, .pagination-centered {
	text-align: center;
}
.pagination-right {
	text-align: right;
}
.list-detail.galerie .pagination, .yearpanel .pagination {
	float: right;
	margin: 0px 0px 0px;
}
.list-detail.galerie .pagination li, .yearpanel .pagination li {
	display: block;
	float: left;
	margin: 0px;
}
.list-detail.galerie .pagination .disabled a, .list-detail.galerie .pagination .disabled a:hover, .yearpanel .pagination .disabled a, .yearpanel .pagination .disabled a:hover {
	color: #3f3f3f;
	font: bold 12px arial;
	line-height: 40px;
}
div.pagination, .tx-pagebrowse-pi1 {
	float: none;
	margin: 0px auto 30px;
	display: block;
}
.tx-pagebrowse-pi1 {
	margin: 30px auto 0px;
}
.yearpanel .pagination {
	float: right;
}
div.pagination li:first-child a, .tx-pagebrowse-first {
	margin: 0px 10px 0px 0px;
}
div.pagination a b {
	background: url(../images/sprite.png) no-repeat;
	background-position: 2px 9px;
	width: 34px;
	height: 34px;
	display: block;
}
div.pagination .older a b {
	background-position: -136px -102px;
	top: 7px;
	left: 6px;
	width: 21px;
	height: 21px;
	position: absolute;
}
.tx-pagebrowse {
	position: relative;
	display: inline-block;
	margin: 0px auto;
	padding: 0px;
}
.tx-pagebrowse li.tx-pagebrowse-first:after, .tx-pagebrowse li.tx-pagebrowse-last:after, .tx-pagebrowse li.tx-pagebrowse-prev:after, .tx-pagebrowse li.tx-pagebrowse-next:after {
	background: url(../images/sprite.png) no-repeat;
	background-position: -136px -102px;
	top: 7px;
	left: 6px;
	width: 21px;
	height: 21px;
	content: "";
	position: absolute;
	pointer-events: none;
}
.tx-pagebrowse li.tx-pagebrowse-last:after {
	background-position: -167px -102px;
}
.tx-pagebrowse li a:after {
}
.tx-pagebrowse li.tx-pagebrowse-first a:after {
	background-position: -136px -102px;
}
.tx-pagebrowse li.tx-pagebrowse-prev:after {
	background-position: -134px -43px;
	top: 8px;
	left: 10px;
	width: 12px;
	height: 19px;
	position: absolute;
}
.tx-pagebrowse li.tx-pagebrowse-next:after {
	background-position: -154px -43px;
	top: 8px;
	left: 12px;
	width: 12px;
	height: 19px;
}
div.pagination .prev a b {
	background-position: -134px -43px;
	top: 8px;
	left: 10px;
	width: 12px;
	height: 19px;
	position: absolute;
}
div.pagination .newer a b {
	background-position: -167px -102px;
	top: 7px;
	right: 4px;
	width: 21px;
	height: 21px;
	position: absolute;
}
div.pagination .next a b {
	background-position: -154px -43px;
	top: 8px;
	right: 9px;
	width: 12px;
	height: 19px;
	position: absolute;
}

/* div.pagination a b {
	background: url(../images/sprite.png) no-repeat;
	background-position: 2px 9px;
	width: 40px;
	height: 40px;
	display: block;
}
div.pagination .older a b {
	background-position: -136px -102px;
	top: 10px;
	left: 9px;
	width: 21px;
	height: 21px;
	position: absolute;
}
div.pagination .prev a b {
	background-position: -134px -43px;
	top: 11px;
	left: 13px;
	width: 12px;
	height: 19px;
	position: absolute;
}
div.pagination .newer a b {
	background-position: -167px -102px;
	top: 10px;
	right: 7px;
	width: 21px;
	height: 21px;
	position: absolute;
}
div.pagination .next a b {
	background-position: -154px -43px;
	top: 11px;
	right: 13px;
	width: 12px;
	height: 19px;
	position: absolute;
}
*/
.searchalign {
	width: 25%;
	float: left;
	margin: 0px 12px 0px 0px;
	position: relative;
}
#mod-generic7 .searchalign {
	width: auto;
	float: none;
	margin: 0px;
}
.txtalign {
	display: block;
	float: left;
	padding: 8px 10px;
}
.filtern {
	margin: 0px 0px 0px 12px
}
.filterDetail {
	border: 1px dotted #ccc;
	border-width: 1px 0px;
	padding: 0px 0px;
	overflow: hidden;
	margin: 10px 0px 10px 0px;
	padding: 10px 0px 10px 0px;
}
.filterDetail .babydetails, .filterDetail .hdg {
	color: #3f3f3f;
	float: left;
	font: bold 16px arial;
	margin: 0 20px 5px 0;
	padding: 0;	
	line-height: 25px;
}

.box-gallery .name {
	padding: 8px 0px;
	color: #005a8c;
	float: none;
	border-bottom: 1px dotted #ccc;
	margin: 0px 0px 0px 0px;
	font:bold 16px arial;
	line-height: normal;
	padding-left:30px;
	position: relative;
}
.filterDetail > div.hdg {
}
.filterDetail > div i, .box-gallery .name i, .babygalerie td i, h3.subheading i {
	height: 25px;
	width: 25px;
	margin: 0px 5px 0px 0px;
	float: left;
	display: block;
	background: url(../images/sprite.png) no-repeat;
}
.box-gallery .name i{
	position: absolute;
	left: 0px;
	top: 5px;
}
h3.subheading i {
	height: 30px;
	width: 26px;
	margin: 0px 10px 0px 0px;
	position: absolute;
	top:2px;
	left: 0px
}
.babygalerie td i {
	height: 30px;
	width: 26px;
}
.filterDetail > div i.w, .box-gallery .name i.w, h3.subheading i.w {
	background-position: -675px -142px;
}
.downloadcenter .bootstrap-select.btn-group .dropdown-menu {
	z-index: 999;
	padding-right: 10px;
}
.downloadcenter .col-sm-11 .form-control, article.mitarbeiter .col-sm-12 .form-control {
	/* font-size: 16px;
	*/
}
.babygalerie td i {
	margin: 0px auto;
	float: none;
}
.filterDetail div i.m, h3.subheading i.m, .box-gallery .name i.m {
	background-position: -675px -170px;
}
.babygalerie td i.m {
	background-position: -644px -44px;
}
.babygalerie td i.w {
	background-position: -641px 0px;
}
h3.subheading i.m {
	background-position: -644px -44px;
}
h3.subheading i.w {
	background-position: -641px 0px;
}
.filterDetail > div span, .box-gallery .name span {
	font-weight: normal;
	color: #3f3f3f
}
.inhalt .Kontakt .box-gallery {
	margin: 0px 0px 30px 0px;
}
.mitarbeiter .box-gallery {
	margin: 30px 0px 0px 0px;
}
article.urologie .box-gallery {
	margin: 0px 0px 30px 0px;
}
.bold {
	font-weight: bold;
}
ul.nav-tabs.year {
	margin: 10px 0px 45px;
	border: none;
}
.nav-tabs.year > li {
	margin: 0px 12px 10px 0px;
}
ul.nav-tabs.year {
	margin: 10px 0px 15px;
}
.nav-tabs.year > li.active > a {
	background: #005a8c;
	border: 1px solid #005a8c;
	color: white;
	font-weight: bold;
}
.nav-tabs.year > li > a {
	padding: 8px 8px;
	background: #f2f1ef;
	border: 1px solid #e5e2dd;
	border-radius: 5px;
	color: #3f3f3f;
	margin: 0px
}
.yearpanel .tab-content {
	margin: 0px 0px 60px;
	overflow: hidden;
}
.yearpanel .tab-content table {
	margin: 0px 0px 0px;
}
.yearpanel .col-md-6:first-child {
	padding: 0px 15px 0px 0px;
}
.yearpanel .col-md-6:last-child {
	padding: 0px 0px 0px 15px;
}
.row.mod-detail {
	display: table;
	margin: 10px 0px 0px 0px;
	border-top: solid 2px #493d34;
	padding: 30px 0px 0px 0px;
	width: 100%;
}
.row.mod-detail [class*="col-"] {
	float: none;
	display: table-cell;
	vertical-align: top;
}
#gridview .col-md-4.col-sm-4.colLft.mob-hide.reset-left {
	padding: 0px 15px 0px 0px;
}
.col-md-3.col-sm-3.colLft.desktop-hide {
	display: none;
}
.row.mod-detail h2 {
	color: #493d34;
	font-size: 26px;
	font-family: 'roboto_slablight';
	/*margin: 0px 0px 25px 0px;*/
	margin: 0px 0px 32px 0px;
}
.row.mod-detail h2 span {
	display: block;
	height: 28px;
	margin: 0px 0px 10px;
}
.row.mod-detail h2 span i {
	background: url(../images/sprite.png) no-repeat;
	background-position: -150px -170px;
	display: block;
	height: 28px;
	width: 29px;
}
.row.mod-detail h2 span i.m {
	background-position: -150px -170px;
}
/*.row.mod-detail .accordion-heading a {
	font-family: arial;
	font-size: 16px;
	color: #3f3f3f;
	display: block;
	padding: 7px 0px 7px;
	background: url(../images/temp/exp-col.png) no-repeat;
	background-position: 100% 10px;
}
.row.mod-detail .accordion-heading a.collapsed {
	background-position: 100% -25px;
}*/
.row.mod-detail .accordion-heading{
	position: relative;
	width: 100%
}
.row.mod-detail .accordion-heading a {
	font-family: arial;
	font-size: 16px;
	color: #3f3f3f;
	display: block;
	padding: 7px 0px 7px;
}
.row.mod-detail .accordion-heading a:after {
	background: url(../images/sprite.png) no-repeat;
	background-position: 100% 10px;
	height: 11px;
	width: 18px;
	position: absolute;
	top: 12px;
	right: 0px;
	display: block;
	content: "";
	background-position: -64px 0px;
	}
.row.mod-detail .accordion-heading a.collapsed {
}
.row.mod-detail .accordion-heading a.collapsed:after {
	background-position: -40px 0px;
}
.row.mod-detail #accordion2, .row.mod-detail #accordion1, .row.mod-detail #accordion3 {
	background: #f2f1ef;
	padding: 0px 10px;
	overflow: hidden;
}
.row.mod-detail #accordion2 {
	position: absolute;
	bottom: 0px;
	width: 92%;
	right: 8%;
}
.row.mod-detail #accordion2.flexi {
	/* width: 97%;
	right: 10px;
	*/
}
.row.mod-detail .flexi .collapse.in {
	min-height: 300px;
}
.row.mod-detail #accordion2 form, .row.mod-detail #accordion1 form, .row.mod-detail #accordion3 form {
	padding-bottom: 12px;
	margin-bottom: 0px;
}
.col-md-8.col-sm-8.colrgt.thumb-details.reset-right {
	padding: 0px 0px 0px 15px;
}
.col-md-4.col-sm-4.colLft.mob-hide.reset-left {
	padding: 0px 15px 0px 0px;
}
#accordion2 .form-control, #accordion1 .form-control, #accordion3 .form-control {
	padding: 8px;
	font-size: 12px;
	border-color: #e5e2dd;
	font-family: arial;
	font-size: 12px;
	height: auto;
}
.mod #accordion2  .btn {
	padding: 7px;
	margin-top: 6px;
}
.mod #accordion2  .btn.resetBack:focus {
	box-shadow: none;
	outline-offset: 0px;
	outline: none;
}
#accordion2 form textarea.form-control {
	min-height: 131px;
}
#accordion2 .form-group, #accordion1 .form-group, #accordion3 .form-group {
	margin-bottom: 6px;
}
#accordion2 .form-group:first-child {
	margin-top: 10px;
}
.socialmedia>div:first-child {
	margin: 20px 0px 0px 0px
}
.socialmedia>div, .social-likes__widget {
	margin: 10px 0px 0px 0px
}
.socialmedia>div:last-child {
	margin: 10px 0px 20px;
}
.col-md-3.col-sm-3.colLft {
	padding: 0px 15px 0px 0px;
	position: relative;
}
.col-md-9.col-sm-9.colrgt, .thumb-details {
	text-align: center;
	vertical-align: middle;
	/* background: #f2f1ef;
	*/
}
article.kontakt>.row-fluid, article.krankheit>.row-fluid {
	overflow: hidden;
}
article.mitarbeiter .image-gallery {
	margin-bottom: 30px;
}
.btn-transparent {
	color: #005a8c;
	background-color: transparent;
	border-color: none;
}
.imgcaption, figcaption.csc-textpic-caption, .news-img-wrap .outer .news-img-caption {
	padding: 10px;
	background: #f2f1ef;
	color: #3f3f3f;
	font-size: 12px;
	margin: 0px 0px 0px 0px
}
.seitenos, .tx-pagebrowse-pages {
	font: bold 16px arial;
	margin: 0px 20px 0px 10px
}
.tx-pagebrowse-pages ol {
	margin: 0px;
	padding: 0px;
}
li.disabled.seitenos a {
	width: auto;
	border: none;
	text-indent: inherit;
	color: #3f3f3f;
}
li.disabled.seitenos a:hover {
	color: #3f3f3f;
}
.seitenos i {
	font-style: normal;
	text-indent: inherit;
}
ul.pager.newsarchiv li a {
	width: 40px;
	height: 40px;
	border-radius: 50%;
	text-indent: -9999999em;
	padding: 0px;
}
ul.pager.newsarchiv li {
	margin: 0px 10px;
}

/* Generic Styling, for Desktops/Laptops */
table.babygalerie, table.babyname, table.title, table.jobdetail {
	width: 100%;
	border-collapse: collapse;
	margin: 0px 0px 0px;
	border-top: solid 0px #493d34;
}
table.jobdetail th, table.jobdetail, table.jobdetail td {
	font: normal 16px arial;
	padding: 10px;
}
.tx-tnt-jobs table td {
	vertical-align: middle;
}
table.jobdetail th {
	padding: 10px 0px;
}
table.jobdetail th.mob-hide.bold {
	font-weight: bold;
}
table.jobdetail td.mob-view {
	white-space: nowrap;
}
table.jobdetail {
	margin: 0px 0px 20px 0px;
}
table.jobdetail th:first-child, table.jobdetail tr td:first-child {
	font: bold 16px arial;
}
table.jobdetail caption {
	color: #493d34;
	font: normal 22px roboto_slablight;
	padding: 0px 0px 23px;
	text-align: left;
	border-bottom: 2px solid #493d34
}
table.title {
	font-size: 16px;
	font-family: arial;
	color: #3f3f3f;
}

/* Zebra striping */
table.babygalerie tbody tr:nth-of-type(odd), table.babyname tbody tr:nth-of-type(odd), table.title tbody tr:nth-of-type(odd), table.jobdetail tbody tr:nth-of-type(odd) {
	background: #f2f1ef;
}
table.babygalerie tbody tr:nth-of-type(even), table.babyname tbody tr:nth-of-type(even), table.title tbody tr:nth-of-type(even), table.jobdetail tbody tr:nth-of-type(even) {
	background: #f6f5f4;
}
table.babygalerie thead tr th {
	vertical-align: top
}
table.babygalerie thead tr th.sorting {
	position: relative;
	padding: 6px 35px 6px 6px
}
table.babygalerie thead tr th.vorname.sorting {
	font-weight: normal;
	color: #3f3f3f;
}
table.babygalerie thead tr th.sorting_asc, table.babygalerie thead tr th.sorting_desc {
	position: relative;
	padding: 6px 35px 6px 15px
}
table.babygalerie thead tr th.sorting_asc:hover, table.babygalerie thead tr th.sorting_desc:hover {
	cursor: pointer;
}
.babygalerie th, .babyname th, .jobdetail th {
	background: #ffffff;
	color: #3f3f3f;
	font-weight: bold;
}
.babygalerie td, .babygalerie th, .title th, .title td, .jobdetail td, .jobdetail th {
	padding: 6px 6px 6px 15px;
	border: 2px solid #fff;
	text-align: left;
}
.babygalerie .nachname, .babygalerie .vorname {
	font: bold 16px arial;
	color: #005a8c;
}
table.babygalerie tbody tr:hover {
	cursor: pointer;
	background: #e4e1dd
}
.title td {
	vertical-align: top;
}
.babygalerie td, .babygalerie th, .babygalerie th.nachname, .babygalerie th.vorname {
	font: normal 16px arial;
	color: #3f3f3f;
}
table.jobdetail-2 {
	margin: 20px 0px
}
.jobdetail-2 td {
	border: 1px dotted #ccc;
	border-width: 1px 0px;
	padding: 10px;
	font: normal 16px arial;
	line-height: 1.5em;
	vertical-align: top;
	color: #3f3f3f;
}
.jobdetail-2 td:first-child {
	font-weight: bold;
	vertical-align: top;
}
.jobdetail-2 tr:last-child td {
	border-bottom: none;
}
table.newspresse {
	margin: 20px 0px
}
.newspresse td {
	border: 1px dotted #ccc;
	border-width: 1px 0px;
	padding: 10px;
	font: normal 14px arial;
	line-height: 1.5em;
	width: 80%
}
.newspresse td:first-child {
	font: normal 22px roboto_slablight;
	vertical-align: top;
	width: 20%;
	padding-left: 0px
}
.newspresse td:last-child h3 a {
	font: bold 22px roboto_slabbold;
}
.newspresse tr:last-child td {
	/* border-bottom: none;
	*/
}
.tblmitarbeiter {
	margin: 0px 0px 30px;
	width: 100%;
}
.tblmitarbeiter td {
	border: 1px dotted #ccc;
	border-width: 1px 0px;
	padding: 10px 10px;
	font: normal 14px arial;
}
.tblmitarbeiter td:first-child {
	font: bold 14px arial;
	vertical-align: top;
	color: #aaa096;
	padding: 10px 0px;
	width: 25%;
}
.tblmitarbeiter td:last-child h3 a {
	font: bold 20px roboto_slabbold;
}
.tblmitarbeiter tr:last-child td {
}
.babyname td, .babyname th {
	padding: 6px 10px;
	border: 2px solid #fff;
	text-align: left;
}
.babygalerie th.mw, .babygalerie td.mw {
	text-align: center;
}

/* .babygalerie td:first-child, */
.babygalerie td.img-babygalerie {
	padding: 0;
	border: 2px solid #fff;
	text-align: left;
	width: 75px;
}
.babyname td:first-child {
	background: #e5e2dd;
	font: normal 22px 'roboto_slablight';
}
.babyname td:last-child {
	width: 100%;
	color: #005a8c;
	font: bold 16px arial;
}
.title td:first-child {
	width: 40%;
}
.title td:last-child {
	/* font-weight: bold;
	*/
}
.title td:last-child span {
	font-weight: normal;
	display: block;
}
.title td p b {
	display: block;
}
.babygalerie th.sorting:after {
	background: url("../images/sprite.png") no-repeat;
	background-position: -596px -72px;
	cursor: pointer;
	content: " ";
	height: 15px;
	width: 30px;
	position: absolute;
	top: 8px;
	right: 5px;
}
.babygalerie th.sorting_desc:after {
	background: url("../images/sprite.png") no-repeat;
	background-position: -600px -98px;
	cursor: pointer;
	content: " ";
	height: 15px;
	width: 30px;
	position: absolute;
	top: 8px;
	right: 5px;
}
.babygalerie th.sorting_asc:after {
	background: url("../images/sprite.png") no-repeat;
	background-position: -596px -122px;
	cursor: pointer;
	content: " ";
	height: 15px;
	width: 30px;
	position: absolute;
	top: 8px;
	right: 5px;
}
h3.subheading {
	color: #493d34;
	font: normal 26px 'roboto_slablight';
	position: relative;
	padding: 0px 0px 0px 36px;
	word-wrap: break-word;
}
.count-o {
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	height: 20px;
	max-width: 100%;
}
.count-o {
	margin: 0 0 0 5px;
}
.count-o, .social-likes__counter {
	position: relative;
	background: #fff;
	border: #9ea3ae solid 1px;
	border-radius: 2px;
	min-height: 20px;
	min-width: 15px;
	padding: 1px 5px;
	line-height: 18px;
}
.social-likes__counter {
	margin: 0px 0px 0px 5px;
}
.social-likes__button_twitter {
	background: url("../images/tweet.jpg") no-repeat center right white;
	width: 55px;
	height: 20px;
	text-indent: -9999em;
	display: block;
	float: left;
	margin-right: 5px;
}
.social-likes__button_plusone {
	background: url("../images/google-plus.jpg") no-repeat center right white;
	width: 32px;
	height: 20px;
	text-indent: -9999em;
	display: block;
	float: left;
	margin-right: 5px;
}
.btn-o, .count-o, #count {
	display: inline-block;
	vertical-align: top;
	zoom: 1;
}
.count-o i, .count-o u, .social-likes__counter:after, .social-likes__counter:before {
	content: "";
	position: absolute;
	zoom: 1;
	line-height: 0;
	width: 0;
	height: 0;
	left: 0;
	top: 50%;
	margin: -4px 0 0 -4px;
	border: 4px transparent solid;
	border-right-color: #aaa;
	border-left: 0;
}
.count-o u, .social-likes__counter.social-likes__counter_facebook:before, .social-likes__counter:before {
	margin-left: -2px;
	border-right-color: white;
	z-index: 10;
}
.row.email-tel {
	margin: 20px 0px;
	padding: 10px 0px;
	border: 1px dotted #cccccc;
	border-width: 1px 0px;
}
.row.email-tel .email, .row.email-tel .tel {
	padding: 0px;
}
.row.email-tel .email {
	width: auto;
	padding: 0px 30px 0px 0px;
}
.row.email-tel .email span, .row.email-tel .tel span {
	background: url(../images/sprite.png) no-repeat;
	display: block;
	margin: 0px 5px 0px 0px;
	float: left;
}
.row.email-tel .tel span {
	height: 15px;
	width: 15px;
	background-position: -22px -0px;
}
.row.email-tel .email span {
	height: 15px;
	width: 18px;
	background-position: -91px 2px;
}
.row.email-tel .email a {
	font-weight: bold;
}
.row.email-tel .email a:hover, .personaldetails a:hover, .news-text-wrap a:hover{
	text-decoration: underline;
}
.row.mitarbeiter {
	padding: 10px 0px;
	border-top: 2px solid #493d34;
	border-bottom: 1px dotted #ccc;
	margin: 0px;
}
.row.mitarbeiter .formelement {
	padding: 0px;
}
.personaldetails {
	margin: 10px 0px 0px;
}
.personaldetails a {
	font: bold 12px arial;
	display: block;
}
.designation {
	display: block;
	font: normal 12px arial;
	color: #3f3f3f;
}
.nonmedia-clr {
	clear: both;
}
.desktop-hide, .navbar-nav > li.desktop-hide {
	display: none;
}
.hdg-desktop-hide {
	display: none
}
.babygalerie td.desktop-hide, .jobdetail td.desktop-hide, .jobdetail th.desktop-hide {
	display: none;
}
.babygalerie td.mob-hide {
}
.dropdown-menu.nonmega li {
	border-bottom: 1px solid white;
}
.dropdown-menu.nonmega li:last-child {
	border-bottom: none;
}
.dropdown-submenu {
	position: relative;
}
.dropdown-submenu>.dropdown-menu {
	top: 0;
	left: 100%;
	margin-top: 0px;
	margin-left: -1px;
	-webkit-border-radius: 0px 0 0px 0px;
	-moz-border-radius: 0px 0 0px 0px;
	border-radius: 0px 0 0px 0px;
}
.mob-hide .dropdown .dropdown-submenu:hover>.dropdown-menu, .mob-hide .dropdown .dropdown-submenu.hover>.dropdown-menu {
	display: block;
}
.dropdown-submenu>a:after {
	background-position: -22px -21px
}
.dropdown-submenu:hover>a:after {
	border-left-color: #ffffff;
}
.dropdown-submenu.pull-left {
	float: none;
}
.dropdown-submenu.pull-left>.dropdown-menu {
	left: -100%;
	margin-left: 10px;
	-webkit-border-radius: 0px 0 0px 0px;
	-moz-border-radius: 0px 0 0px 0px;
	border-radius: 0px 0 0px 0px;
}
.navbar .nav li.dropdown.open>.dropdown-toggle, .navbar .nav li.dropdown.active>.dropdown-toggle, .navbar .nav li.dropdown.open.active>.dropdown-toggle {
	background: #e4e1dd
}
.dropdown-menu {
}
.dropdown-menu.pull-right {
	right: 0;
	left: auto;
}
.dropdown-menu .divider {
	*width: 100%;
	height: 1px;
	margin: 9px 1px;
	*margin: -5px 0 5px;
	overflow: hidden;
	background-color: #e5e5e5;
	border-bottom: 1px solid #ffffff;
}
.dropdown-menu>li>a {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #493d34;
	display: block;
	padding: 6px 10px;
	clear: both;
	font-weight: normal;
	color: #333333;
	white-space: pre-wrap;
	word-break: break-word;
}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus, .dropdown-submenu:hover>a, .dropdown-submenu:focus>a, .dropdown-submenu a.menuactive, .dropdown-menu a.menuactive {
	text-decoration: none;
	color: #2A6499;
	background-color: #f9f8f7;
}
.dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus {
	color: #ffffff;
	text-decoration: none;
	outline: 0;
	background-color: #0081c2;
	background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
	background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
	background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
	background-image: -o-linear-gradient(top, #0088cc, #0077b3);
	background-image: linear-gradient(to bottom, #0088cc, #0077b3);
	background-repeat: repeat-x;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0);
}
.dropdown-menu>.disabled>a, .dropdown-menu>.disabled>a:hover, .dropdown-menu>.disabled>a:focus {
	color: #999999;
}
.dropdown-menu>.disabled>a:hover, .dropdown-menu>.disabled>a:focus {
	text-decoration: none;
	background-color: transparent;
	background-image: none;
	filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
	cursor: default;
}
.open {
	*z-index: 1000;
}
.open>.dropdown-menu {
	display: block;
}

/* .dropdown-backdrop {
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;
	z-index: 990;
}
*/
.pull-right>.dropdown-menu {
	right: 0;
	left: auto;
}
.dropdown:hover>.dropdown-menu, .dropdown.hover>.dropdown-menu {
	display: block;
}
.navbar-default .navbar-nav > .open .dropdown-submenu:hover>a:after {
	/* background-position: left -21px;
	*/
}
.pos-rel {
	/* position: relative;
	*/
}
.showmenu {
	display: block;
}
.content-wrapper .mod.data-list.downloadData li:last-child {
	border-bottom: 1px dotted #cccccc;
}
.content-wrapper .mod.data-list.downloadData .doc li:last-child {
	border-bottom: 0px dotted #cccccc;
}
.btn.inhalt {
	font-weight: bold;
	font-size: 16px;
}
.data-list li {
	font-size: 16px;
}
article.kontakt h4 {
	font: bold 16px arial;
	padding: 0PX;
	margin: 0px 0px 5px 0px;
}
table.baby-dtl {
	width: 100%
}
table.baby-dtl td {
	padding: 5px;
	font: normal 16px arial;
	width: 25%;
}
table.baby-dtl td:last-child {
	font-weight: bold;
	width: 75%;
}
table.baby-dtl tr {
	border-bottom: 1px dotted #cccccc;
}
.thumb-details {
	/* height: 460px;
	*/    vertical-align: middle !important;
}
.thumb-details img {
	/*max-height: 100%;*/
}
label.error {
	font-weight: normal;
	color: red;
	margin-top: 5px;
	margin-left: 10px;
	font-size: 12px;
}
.accordion-inner label.error{
	margin-left: 0px;
}
.mod-details p {
	margin-bottom: 8px;
}
.mod.generic .mod-details .data-list .scroll-pane p, .mod.generic .mod-details .scroll-pane p {
	color: #3e3e3e;
	font: normal 14px roboto_slablight;
	margin-bottom: 8px;
}
.mod.generic .mod-details .data-list .scroll-pane p.teaser-date, .mod.generic .mod-details .scroll-pane p.teaser-date {
		font:bold 14px roboto_slabbold;
	}
.mod-details .scroll-pane p a {
	font-weight: normal;
}
.mod.generic .mod-details .data-list.type-2 li {
	padding: 14px 0px !important;
}
.mod.generic .mod-details .data-list.type-2 li>img {
float: left;
margin-right: 8px;
}
article.Kontakt h4 {
	margin:-2px 0px 2px 0px;
	font:bold 16px arial;
}
article.Kontakt p {
	margin: 0px 0px 28px;
}
.kontakt-form .tx-powermail label {
	width: 16.28%;
}
.kontakt-form input[type="text"], .kontakt-form  .powermail_field.powermail_textarea {
	width: 83.72%
}
.kontakt-form  .powermail_field.powermail_textarea {
	width: 83.72%;
}
.kontakt-form .powermail_fieldwrap.powermail_fieldwrap_submit {
	margin: 0px 0px 15px 16.28%;
}
.news-text-wrap a {
	font-weight: bold
}
.inhalt .csc-textpic.csc-textpic-intext-left p {
	margin-top: -5px;
}
.inhalt h3 {
	margin-bottom: 4px;
}
.mitarbeiter.detailpage .col-xs-12.col-md-3 .thumb img {
	width: auto;
}
.mitarbeiter.detailpage .col-xs-12.col-md-3>.thumb img {
	width: 100%;
	height: auto;
}
.mitarbeiter p.caption {
	font: normal 22px roboto_slablight;
}
.csc-default iframe {
	width: 100% !important;
}
.news-related .news-related-news-date {
	float: left;
	margin-right: 7px;
}
.news-related .list-details {
	display: table;
}
#tx-solr-facets-in-use .csc-header {
	display: none;
}
#tx-solr-facets-in-use ul {
	margin: 0;
}
#tx-solr-facets-in-use ul li {
	display: none;
}
#tx-solr-facets-in-use ul .facets-remove-all {
	display: block;
	float: right;
	margin-top: 10px;
}
#builder .btn-group.bootstrap-select.form-control {
	height: 48px;
	margin: 0px;
}
#builder .bootstrap-select.btn-group .dropdown-menu.inner {
	min-width: 100%;
}
.jScrollPaneContainer {
	outline: 0 none;
}
.dataTables_processing {
	text-indent: -99999em;
	background: url(../images/loading.gif) no-repeat;
	width: 20px;
	height: 20px;
	position: absolute;
	background-size: 100%;
	top: 5px;
	left: 25px;
}
.dataTables_wrapper {
	position: relative;
}
.deactive:hover {
	cursor: default !important;
}
.active:hover {
	/* cursor: pointer !important;
	*/
}
.babydtl-listing {
	border: 1px dotted #cccccc;
	border-width: 1px 0px;
}
.data-list.type-1 .babydtl-listing ul li {
	display: block;
	width: 50%;
	float: left;
}
.col-md-12.krankheit #grid-mode .collapse.in, article.krankheit .collapse.in {
	height: auto !important
}
.print-show {
	display: none;
}
.tx-powermail .powermail_form.spontan .powermail_check_inner label {
	padding-right: 6px;
}
.tx-powermail .powermail_form.spontan span.custom-checkbox {
	top: 2px;
	float: left;
}
.powermail_fieldwrap.powermail_fieldwrap_input.layout2 label {
	padding: 2px 15px 0px 0px;
}
.result-data.download .teaserlist .file-title {
	margin: 0px 0% 0px 0px;
	width: 100%;
	padding: 0px 0px 0px 35px;
}
.news-date{
		font: bold 14px roboto_slabbold;
	}
.humanbuilder>div{
		width: 50%
	}
.humanbuilder .prevent-touch{
	height: 100%;
	width: 100%;
	position: absolute;
	top: 0px;
	right: 0px;
	left: 0px;
	bottom: 0px;
	z-index: 999;
	display: none;
	}
	table.jobdetail-2{
	margin-bottom: 0px;
}
 .news-teaser .jspPane ul {
  padding: 0px 0px 0px 17px;
}
/* Smartphones (portrait and landscape) ----------- */
@media only screen and (min-device-width:320px) and (max-device-width:480px) {
}

/* iPads (portrait and landscape) ----------- */
@media only screen and (min-device-width:768px) and (max-device-width:1024px) {
}
@media only screen and (min-device-width:320px) and (max-device-width:480px) {
	/* STYLES GO HERE */
}
@media only screen and (max-width:420px) {
	.tblmitarbeiter td:first-child {
		width: auto;
	}
	div.csc-textpic .csc-textpic-imagewrap .csc-textpic-image {
		margin: 0 0 15px;
	}
}
@media only screen and (max-width:480px) {
	.default-sm.btn-group.bootstrap-select.form-control.babygallerie-dropdown, .default-sm.btn-group.bootstrap-select.form-control.krankheit-dropdown {
		min-width: 89px;
	}
	.default-sm.btn-group.bootstrap-select.form-control.krankheit-dropdown {
		min-width: 89px;
	}
	.mod-highlight.list span, .mod-highlight.infos span, section.mod .mod-highlight.list span, section.mod .mod-highlight.infos span {
		padding: 7px 9px;
	}
	.mod-highlight a span i.search {
		margin: 0px 0px 0px 11px;
		position: absolute;
		right: 5px;
	}
	.box-gallery .name {
		padding: 8px 0px 12px;
		border-bottom: 0px dotted #ccc;
	}
	.img-babygallerie .col-md-4 {
		width: 50%;
		float: left;
	}
	.img-babygallerie .col-md-4:nth-child(2n+1) {
		clear: left;
	}
	div.csc-textpic .csc-textpic-imagewrap img {
		max-width: 100%;
	}
	.personaldetails {
		margin: 10px 0px 0px;
	}
	.inhalt .Kontakt .col-md-3 {
		width: 100%;
		float: none;
	}
	.inhalt .Kontakt .col-md-3:nth-child(3n+1) {
		clear: left;
	}
	.inhalt .Kontakt .col-md-3 a {
		width: 50%;
		display: block;
		padding: 0px 15px 0px 0px;
		float: left;
	}
	.krankheit #box .col-md-6:first-child {
		width: 100%;
		padding: 0px 0px 0px 0px;
		float: left;
	}
	.krankheit #box .col-md-6:last-child {
		width: 100%;
		padding: 0px 0px 0px 0px;
		float: left;
	}
	.mod-details.infocontent h2.collapsed
	{
		margin:8px 0px 10px;
	}
	h3.subheading {
		color: #493d34;
		font-size: 18px;
	}
	div.csc-textpic-intext-left .csc-textpic-imagewrap, div.csc-textpic-intext-left-nowrap .csc-textpic-imagewrap {
		margin: 0px 0px 0px 0px
	}
	#builder .bootstrap-select.btn-group .dropdown-menu {
		margin-top: -5px;
	}
	.krankheit .mod form.list-detail fieldset {
		width: 30%;
	}
	.krankheit .mod form.list-detail fieldset:nth-child(odd) {
		width: 39%;
	}
	.krankheit .mod form.list-detail .krankheit-dropdown .btn {
		min-width: 0;
	}
	.krankheit .mod form.list-detail .btn.btn-primary {
		width: 25%;
		float: left;
	}
	.krankheit .mod form.list-detail fieldset {
		margin: 0px 3% 0px 0px;
	}
	.listView.krankheit {
		display: none;
	}
}
@media only screen and (max-width:767px) {
	.row.mod-detail #accordion2, .row.mod-detail #accordion1, .row.mod-detail #accordion3{
		overflow: inherit;
	}
	section.mod.schritt .default-sm.bootstrap-select.btn-group .btn .filter-option {
	font: normal 14px arial;
	}
	.lb-outerContainer{
		max-width: 300px !important;
	}
	.lightbox .lb-image{
		width: 100% !important;
		height: auto !important;
	}
	.news-date{
		font: bold 13px roboto_slabbold;
	}
	.female-body {
	margin-top: 6px;
	}
	.humanbuilder a span:before {
	width: 20px;
	height: 21px;
	}
	.humanbuilder a.btn-imagemap.w span:before {
background-position: -672px -83px;
}
.humanbuilder a.btn-imagemap.m span:before {
background-position: -675px -113px;
}
	.bootstrap-select.btn-group .btn .filter-option {
	font: bold 16px roboto_slabbold;
	}
	.bootstrap-select.btn-group .dropdown-menu li a {
	font: normal 16px 'roboto_slablight';
	}
	.btn-imagemap {
	font: normal 16px roboto_slabregular;
	padding: 8px;
	}
	form#builder .btn.btn-primary {
	font: bold 16px roboto_slabbold;
	}
	article.builder p {
color: #493d34;
font: normal 16px roboto_slablight;
}
	article.inhalt .news-related-links li, article.inhalt .news-related-news li{
		font-size: 14px;
	}
	footer>.container {
		padding: 13px 15px 10px;
	}
	.tx-powermail .powermail_form.spontan span.custom-checkbox {
		top: 0px;
		float: left;
	}
	.data-list.type-1 .babydtl-listing ul li {
		display: block;
		clear: both;
		width: 100%;
		float: none;
	}
	section.mod.schritt .col-xs-6.col-md-4 img {
		width: 152px;
		height: 152px;
	}
	.contact-info p, footer .contact-info a {
		margin-bottom: 0px;
	}
	.downloadcenter fieldset, .downloadcenter #step2 fieldset {
		position: relative;
		margin: 0px 0px 10px;
	}
	.outerdiv.hdr .pull-right {
		padding: 0px 0px 0px 0px;
	}
	.logo {
	margin-top: 15px;
	display: block;
	margin-bottom: 12px;
	}
	.outerdiv.hdr .pull-right img {
		width: 143px
	}
	section.mod.schritt .col-xs-6.col-md-4 img {
		width: 152px;
		height: 152px;
	}
	.mod-details p {
		margin-top: 0;
	}
	.urologie p {
		margin: 20px 0px 10px;
	}
	fieldset.pos-spec>img, div.pos-spec img {
		width: 117px;
		height: 117px;
	}
	.mod.schritt .pos-spec .col-sm-8 {
		padding: 0px 137px 0px 0px;
		width: 100%;
	}
	.mod.schritt .pos-spec .row {
		padding: 0px 0px 0px 0px;
		width: 100%;
	}
	form.schritt h5 {
		font: bold 14px arial;
		margin: 17px 0px 100px;
		padding: 0px 130px 0px 0px
	}
	form.schritt .row.thin h5, form.schritt .col-sm-12 h5 {
		font: bold 14px arial;
		margin: 17px 0px 10px;
	}
	form.schritt .col-sm-12 h5{
		padding: 0px;

	}
	form.schritt .row.thin h5{
		margin:0px 0px 10px 0px;
	}
	.mod.schritt .pos-spec .row .col-sm-6 {
		padding: 0px 0px 0px 0px;
		width: 100%;
	}
	.mod.schritt .pos-spec .row .col-sm-6.step2_subhead {
		padding: 0px 0px 91px 0px;
	}
	section.mod.schritt h3 {
		font-size: 20px;
	}
	.krankheit .mod form.list-detail fieldset {
		width: 30%;
	}
	.krankheit .mod form.list-detail fieldset:last-child {
		width: 36%;
	}
	#box .mod-details.infocontent h2 a:after{
		top: 10px
	}
	.krankheit #box .mod-details.infocontent h2 a:after {
		/*top: 17px !important;*/
	}
	#box .mod-details h2 a:after{
		top: 17px;
	}
	#builder .bootstrap-select.btn-group .dropdown-menu.inner {
		min-width: 100%;
	}
	#builder .btn-group.bootstrap-select.form-control {
		height: 40px;
		margin: 0px;
	}
	#builder button.selectpicker {
		padding: 8px 50px 8px 12px;
	}
	.kontakt-form .powermail_legend {
		font: bold 14px arial;
	}
	.social-icons ul {
		margin-top: 0;
	}
	#builder .bootstrap-select.btn-group .btn .caret, .downloadcenter .bootstrap-select.btn-group .btn .caret {
		width: 18px;
		height: 11px;
		background: url(../images/sprite.png) no-repeat -65px 0px;
	}
	#builder .bootstrap-select.btn-group.open .btn .caret, .downloadcenter .bootstrap-select.btn-group.open .btn .caret {
		width: 18px;
		height: 11px;
		background: url(../images/sprite.png) no-repeat -41px 0px;
	}
	
	form#builder fieldset, .downloadcenter fieldset {
		margin: 0px 0px 10px 0px;
	}
	.downloadcenter fieldset, .downloadcenter span fieldset:last-child {
		position: relative;
		margin: 0px 0px 10px;
	}
	.downloadcenter .col-sm-11 input.form-control.bdr-rgt-none {
		border: 2px solid #e5e2dd;
		height: 42px;
		padding: 8px 35px 8px 8px;
	}
	.downloadcenter .input-group.col-sm-11 i.icon-search {
		top: 12px;
		right: 13px;
	}
	.col-sm-1 .reset-lrg-this {
		right: 0;
		top: 3px;
		right: 0px;
		height: 34px;
		position: absolute;
		width: 34px;
	}
	.mod .mod-highlight > a.desktop-hide.eventactive > span:hover {
		background: #f2f1ef
	}
	.mitarbeiter p.caption {
		font: normal 16px roboto_slablight;
	}
	article summary, article .summary, article p.summary, .teaser-text p {
		font-size: 15px;
		margin:-5px 0px 20px 0px;
	}
	article.result-data.download .file-title, .col-md-8 .result-data.download .file-title {
		font: bold 14px arial;
	}
	.news-backlink-wrap a {
		font: normal 14px arial;
	}
	.newspresse .link {
		font: normal 14px arial;
	}
	.newspresse td:last-child h3 a {
		font: bold 20px roboto_slabbold;
	}
	.newspresse td, .newspresse td:first-child {
		width: 100%;
	}
	.m-view {
		display: block !important;
	}
	.d-view {
		display: none !important;
	}
	#wrapper {
		padding-bottom: 0px;
	}
	.seitenos, .tx-pagebrowse-pages {
		margin: 0px 5px;
	}
	li.disabled.seitenos a {
		font: bold 14px arial;
		line-height: 34px;
		margin: 0px 15px 0px 0px;
	}
	.pagination a, div.pagination li:first-child a, .tx-pagebrowse-first {
		margin: 0px 15px 0px 0px;
	}
	.pagination.yearfilter a{
		width:60px;
		height:60px;
	}
	div.pagination.yearfilter .next a b{
		width:22px;
		height:35px;
		background-position:-721px -4px;
		top: 10px;
		left: 21px;
	}
	div.pagination.yearfilter .prev a b {
	background-position: -721px -55px;
top: 11px;
left: 16px;
width: 22px;
height: 35px;
	}
	table.title tbody tr {
		border-bottom: 9px solid white
	}
	article.inhalt h1.inhalt_header,  h1.inhalt_header{
		font-size: 28px;
		margin: 20px 0px 10px;
	}
	.mod-highlight {
		display: none;
	}
	.mod.schritt .mod-highlight {
		display: block;
	}
	.tab-content .desktop-hide {
		border-top: solid 2px #493d34;
		position: relative;
		padding-top: 11px;
		margin-bottom: 11px;
	}
	section.mod {
		/* border-bottom: none;
		margin-bottom: 0;
		*/
	}
	.krankheit .col-md-6 section.mod {
		border-bottom: 1px dotted #cccccc;
		/*margin-bottom: 30px;*/
		margin-bottom: 24px
	}
	.krankheit .col-md-6 .mod .mod-highlight,  .krankheit .col-md-4 .mod .mod-highlight  {
		display: block
	}
	.tab-content .mod-details h2 a:after {
		top: 10px;
	}
	.mod.schritt .pos-spec .col-sm-8 span, .listedCnt ul li span, form.schritt h5, fieldset.pos-spec Label {
		font: normal 14px arial;
	}
	.mod.schritt .pos-spec .col-sm-8 i, .listedCnt ul li i, .schritt3 fieldset .form-group label, .schritt3 fieldset .form-group div input, .schritt3 fieldset .form-group div select, .schritt3 fieldset .form-group div.col-sm-10 {
		font: normal 14px arial;
	}
	.btn.btn-primary.lrg {
		font: bold 14px arial;
	}
	.mod.schritt .pos-spec .col-sm-8 i {
	}
	div.pos-spec a.link, .listedCnt h5, .schritt3 h5, form.schritt h5, form.schritt .btn {
		font: bold 14px arial;
	}
	section.mod.schritt fieldset.pos-spec .col-sm-6, section.mod.schritt fieldset.pos-spec .col-sm-12 {
		padding: 0px
	}
	span.blumen_title {
		font: bold 14px arial;
		display: block;
		float: left;
		margin: 0px 0px 0px 10px;
	}
	section.mod.schritt .col-xs-6.col-md-4 a {
		font: bold 14px arial;
		display: block;
		margin: 0px 0px 0px 0px;
	}
	section.mod.schritt .col-xs-6.col-md-4 a img {
		float: left;
		margin: 0px 10px 0px 0px;
	}
	.schritt3 fieldset .form-group div.col-sm-10, .schritt3 fieldset .form-group label {
		width: 100%
	}
	.schritt3 fieldset .form-group div.col-sm-3 {
		width: 25%;
		float: left
	}
	.schritt3 fieldset .form-group div.col-sm-9 {
		width: 75%;
		float: left;
		padding-left: 15px;
	}
	.teaser-content .mod.generic .mod-highlight a, .mod.generic .mod-highlight.amulty-tab a {
		display: none;
	}
	.powermail_check_inner {
		float: none;
		width: auto;
	}
	article.downloadcenter h1, article.inhalt .downloadcenter h1 {
		font-size: 28px;
	}
	.downloadcenter p {
		font-family: 'roboto_slablight';
		font-size: 16px;
	}
	article.result-data.download .file-title, .col-md-8 .result-data.download .file-title {
		font: bold 14px arial;
		line-height: 30px;
	}
	article .result-data.download .size, .col-md-8 .result-data.download .size {
		font: normal 14px arial;
		line-height: 30px;
	}
	.col-md-12.krankheit .mod-highlight.list {
		display: none
	}
	.col-md-12.krankheit .mod.gallery .mod-highlight.list {
		display: block;
	}
	.mod form.list-detail:after, .mod form.list-detail:before {
		display: table;
		content: "";
	}
	.mod form.list-detail:after {
		clear: both;
	}
	.mod form.list-detail {
		*zoom: 1;
		margin: 0px 0px 10px 0px;
	}
	.krankheit .mod form.list-detail {
		margin: 0px 0px 15px 0px;
	}
	article.downloadcenter h1, article.inhalt .downloadcenter h1 {
		font-size: 28px;
		margin: 20px 0px;
	}
	.downloadcenter p {
		font-family: 'roboto_slablight';
		font-size: 20px;
	}
	.downloadcenter .col-sm-11 .form-control, article.mitarbeiter .col-sm-12 .form-control {
		height: auto;
		font: normal 16px roboto_slabbold;
	}
	.downloadcenter .col-sm-11 input.form-control.bdr-rgt-none {
		height: auto;
	}
	.downloadcenter button.selectpicker {
		padding: 7px 35px 7px 12px;
	}
	#builder .bootstrap-select.btn-group .btn .caret, .downloadcenter .bootstrap-select.btn-group .btn .caret {
		width: 18px;
		height: 11px;
		z-index: 1;
		display: block;
		margin: 0px;
		border: 0px;
		top: 13px;
		right: 14px;
	}
	article.result-data.download .file-title, .col-md-8 .result-data.download .file-title {
		font: bold 14px arial;
		line-height: 30px;
		/* width: 70%;
		*/margin: 0px 5% 0px 0px;
	}
	article .result-data.download .size, .col-md-8 .result-data.download .size {
		font: normal 14px arial;
		line-height: 30px;
	}
	span.align-left {
		float: left;
		margin: 0px 15px 10px 0px;
	}
	.mod.data-list .mod-details.infocontent p {
		font: normal 14px arial;
		line-height: 1.4em;
	}
	.nav-main ul > li > a, .navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
		font-family: 'roboto_slabregular', Arial, Helvetica, sans-serif;
		font-size: 14px;
	}
	.powermail_fieldwrap.powermail_fieldwrap_submit {
		margin: 0px 0px 15px 0px;
	}
	.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_text {
		padding-left: 0px;
	}
	.powermail_form_3.spontan .powermail_fieldwrap.powermail_fieldwrap_textarea .formError .formErrorContent {
		padding: 0px 0px 0px 0px;
	}
	.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select {
		width: 100% !important;
	}
	.jobdetail-2 td {
		font: normal 14px arial;
	}
	table.jobdetail caption {
		font: normal 16px roboto_slablight;
	}
	.tx-solr-search, .range-search {
		font: normal 14px arial;
	}
	h5.results-topic {
		font: bold 20px roboto_slabbold;
	}
	.results-entry>a {
		font: normal 14px arial;
	}
	.result-content {
		font: normal 14px arial;
	}
	.seitenos, .tx-pagebrowse-pages {
		font: bold 14px arial;
	}
	.tx-solr-search-form input[type="text"] {
		font: bold 16px roboto_slabbold;
		width: 100%;
		padding: 7px 10px;
		margin-bottom: 15px
	}
	.tx-solr-search-form input[type="submit"] {
		float: none;
		width: auto;
		font: bold 16px roboto_slabbold;
		padding: 9px 10px
	}
	.powermail_check_inner {
		overflow: hidden;
	}
	.powermail_form_3.spontan .powermail_check_outer>div {
		margin-bottom: 7px;
	}
	.powermail_form_3.spontan .powermail_check_outer>div:last-child {
		margin-bottom: 0px;
	}
	.tx-powermail .powermail_check_inner label {
		width: auto;
	}
	.krankheit #box>.col-md-4 {
		padding: 0px 15px;
	}
	.krankheit #box>.col-md-4 {
		width: 100%;
		padding: 0px;
	}
	.krankheit .col-xs-12.col-md-4.linkHeading {
		float: none;
		width: 100%;
		padding: 0px;
	}
	.krankheit .col-xs-12.col-md-4.linkHeading .link {
		font: bold 14px arial;
	}
	.krankheit .col-xs-12.col-md-8.linkContent {
		font: normal 14px arial;
		padding: 0px;
	}
	.content-wrapper>.col-md-12 {
		padding: 0px;
	}
	.krankheit section.mod .infocontent .linkblock {
		font: normal 14px arial;
	}
	
	/* .babygalerie table, */
	.babygalerie thead, .babygalerie th, .babygalerie td/* , .babygalerie tr */ {
		display: none;
	}
	.babygalerie td.desktop-hide {
		display: table-cell
	}
	.babygalerie td, .babygalerie th {
		font: normal 12px arial;
	}
	
	/* Hide table headers (but not display: none;
	, for accessibility) */
	.babygalerie thead tr {
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	.babygalerie tr {
		border: 1px solid #ccc;
	}
	.babygalerie td {
		/* Behave  like a "row" */
		border: none;
		/* border-bottom: 1px solid #eee;
		*/		position: relative;
		padding-left: 0;
	}
	footer.innerpage .address li p:before, footer.innerpage .contact li p:before {
		display: none
	}
	footer.innerpage .address li p, footer.innerpage .contact li p {
		padding: 0px
	}
	.spotlight .carousel-indicators {
		position: inherit;
		bottom: 0px;
		padding: 10px;
		text-align: center;
		width: auto
	}
	.spotlight .carousel-indicators li {
		background: #e7e4e1;
	}
	.spotlight .carousel-indicators li.active {
		background: #493d34;
	}
	.spotlight .carousel-caption a {
		position: absolute;
		bottom: 10px;
	}
	article.mitarbeiter form {
		margin: 0px 0px 10px 0px;
	}
	article.kontakt .row-fluid .col-md-8 {
		padding: 0px;
	}
	.dropdown.pos-rel.open>span.icon-mobiledropdown{
		height: 38px;
	}
	span.icon-mobiledropdown {
		cursor: pointer;
		position: absolute;
		right: 0;
		top: 0;
		z-index: 20;
		width: 38px;
		height: 30px;
		/* background: url("https://www.zkb.ch/design/clientlibs/img/icons/subnav-arrow.png") no-repeat center center;
		*/
	}
	span.icon-mobiledropdown:hover {
	}
	article.kontakt h4 {
		font: bold 14px arial;
	}
	.kontakt-form .form-group label {
		font: normal 14px arial;
	}
	.kontakt-form .btn.btn-primary {
		font: normal 14px arial;
	}
	table.jobdetail th:first-child, table.jobdetail tr td:first-child {
		font: bold 12px arial;
	}
	table.jobdetail th, table.jobdetail, table.jobdetail td {
		font: normal 12px arial;
	}
	.btn.inhalt {
		font-weight: bold;
		font-size: 14px;
	}
	article h3 {
		font-size: 14px;
	}
	.highlighted {
		font-size: 15px;
		padding-left: 0;
		padding-right: 0;
	}
	.mod-details.infocontent h2 {
		font-size: 20px;
		margin: 8px 0px 10px;
	}
	.krankheit .mod-details .infocontent h2 {
		font: bold 20px'roboto_slabbold';
		/*border-top: solid 2px #493d34;
		padding-top: 9px;
		margin-top: 0px*/
	}
	.krankheit .mod-details .infocontent h2 a:after {
		top: 20px;
	}
	.mod-details.infocontent p {
		font-size: 14px;
		color: #333333;
	}
	h1 {
		font-size: 28px;
		margin: 20px 0px;
	}
	article h2, article h1 {
		font-size: 28px;
		margin: 20px 0px;
	}
	#mod-urologie-generic1 .row.urologie div {
		padding: 0px 15px;
		float: left;
		width: 50%
	}
	.desktop-hide .dropdown>.dropdown-menu {
		display: none;
	}
	.desktop-hide .dropdown.open>.dropdown-menu {
		display: block;
	}
	.yamm .nav, .yamm .collapse, .yamm .dropup, .yamm .dropdown {
		position: relative;
	}
	.social-icons li {
		/* float: right;
		*/margin:0px 0px 5px 0px;
		clear: left;
		height: 37px;
width: 37px;
	}
	.social-icons li:last-child {
	margin: 0px;
}
#map-canvas{
	height: 275px !important;
}
	section.mod .tab-content {
		display: block;
		/* padding-bottom: 0px;
		*/
		border-bottom: dotted 1px #ccc;
		margin-bottom: 20px;
		/* border-top: solid 2px #493d34;
		*/
	}
	section.mod.generic.multy-content .tab-content {
		border-bottom: dotted 1px #ccc;
		margin-bottom: 20px;
	}
	section.mod.generic .tab-content {
		border-bottom: dotted 0px #ccc;
		margin-bottom: 0px;
	}
	.krankheit section.mod .tab-content {
		border-bottom: dotted 0px #ccc;
		margin-bottom: 0px;
	}
	.mod.data-list.tabbed {
		border-bottom: none;
	}
	.mod-widget-gallery-mod .data-list li:last-child {
		border-bottom: dotted 1px #ccc;
	}
	.row-fluid.home .col-md-4 section.mod.data-list.tabbed {
		border-bottom: none;
	}
	.result-listing {
		display: none
	}
	.result-listing label {
		margin: 0px 10px 0px;
	}
	article.mitarbeiter fieldset {
		position: relative;
		margin: 15px 0px 0px;
	}
	.post-box section.mod {
		margin-bottom: 10px;
	}
	.row-fluid.urologie-home, .row-fluid.home {
		margin: 10px 0px;
	}
	
	/* .row-fluid.urologie-home .col-md-4, */
	.row-fluid.home .col-md-4 {
		padding: 0px;
	}
	
	/* .row-fluid.urologie-home .col-md-4 section.mod.noborder, .row-fluid.urologie-home .col-md-4 section.mod, */
	.row-fluid.home .col-md-4 section.mod.noborder, .row-fluid.home .col-md-4 section.mod/* , .row-fluid.mitarbeiter .col-md-4 section.mod.noborder, .row-fluid.mitarbeiter .col-md-4 section.mod */ {
		padding-bottom: 0px;
		border-bottom: dotted 1px #ccc;
		margin-bottom: 20px
	}
	section.multy-content {
		border-bottom: none !important;
	}
	.spotlight .carousel-caption span {
		font-size: 18px;
	}
	.newspresse td {
		display: block;
		border: none;
	}
	.newspresse td:first-child {
		border-top: 0px dotted #cccccc;
		padding: 10px 0px 0px;
		font: bold 14px arial;
	}
	.newspresse td:last-child {
		border-top: 0px dotted #cccccc;
		padding: 0px 0px 10px
	}
	.newspresse tr {
		border-top: 1px dotted #cccccc;
	}
	.newspresse tr:last-child {
		border-bottom: 1px dotted #cccccc;
	}
	article.newsarchiv h3 {
		padding: 0px;
		margin: 0px 0px 0px;
		font-size: 14px
	}
	.kontakt-form .form-group div {
		padding: 0px 0px 0px;
	}
	.jobdetail-2 tr {
		border-top: 1px dotted #cccccc;
	}
	.jobdetail-2 td {
		border: none;
		display: block;
		line-height: 1.5em;
	}
	.jobdetail-2 td:first-child {
		padding: 10px 0px 5px 0px
	}
	.jobdetail-2 td:last-child {
		padding: 0px 0px 10px 0px
	}
	.powermail_field.powermail_textarea {
		width: 100%
	}
	.powermail_form_3.spontan .powermail_check_outer {
		width: 100%;
		float: right;
	}
	.tx-powermail label {
		width: 100%
	}
	input.powermail_field {
		width: 100%
	}
	article.Kontakt h4 {
		font: bold 14px arial;
		margin-bottom: 2px;
	}
	.kontakt-form input[type="text"], .kontakt-form .powermail_field.powermail_textarea {
		width: 100%
	}
	.kontakt-form .powermail_fieldwrap.powermail_fieldwrap_submit {
		margin: 0px 0px 15px;
	}
	.kontakt-form .tx-powermail label {
		width: 100%;
	}
	article.Kontakt p, .jobdetail-2 .form-group label, .tx-powermail label, input.powermail_field.powermail_submit {
		font: normal 14px arial;
	}
	.kontakt-form .powermail_legend {
		font: bold 14px arial;
	}
	.jobdetail-2 .form-group div {
		padding: 0px;
	}
	.downloadcenter .input-group.col-sm-11, .downloadcenter .col-sm-11 {
		width: 91.66666667%;
		float: left;
		padding-right: 0px;
	}
	.downloadcenter .col-sm-1, .downloadcenter .col-sm-2 {
		width: 8.33333333%;
		float: left;
	}
	.mod.generic5 .row .col-xs-12.col-md-4 {
		width: 33.3333333%;
		padding: 0px 10px 0px 0px;
	}
	.mod.generic5 .row .col-xs-12.col-md-4 img {
		width: 100%
	}
	.mod.generic5 .row .col-xs-12.col-md-8 {
		width: 66.666666%;
		padding: 0px 0px 0px 10px;
	}
	.yearpanel .col-md-6:first-child {
		padding: 0px 15px 0px 0px;
		width: 50%;
		float: left;
	}
	.yearpanel .tab-content {
		margin: 0px 0px 20px;
	}
	.yearpanel .col-md-6:last-child {
		padding: 0px 0px 0px 0px;
		width: 50%;
		float: left;
	}
	.krankheit .row.img-babygallerie .col-md-4 {
		padding: 0px 15px;
		width: 50%;
	}
	.thumb img {
		width: 100%;
		height: auto;
	}
	.box-gallery .name span {
		display: block;
	}
	.box-gallery .name {
		font-size: 12px;
		padding: 7px 0px 11px 30px;
		position: relative;
		border-bottom: none;
		line-height: normal;
	}
	.box-gallery .name i {
		margin: 5px 5px 0px 0px;
		top: 0px;
	}
	hr.twopx.tabular, hr.twopx.year {
		display: none;
	}
	.babygalerie tr {
		border: none;
		border-bottom: 1px solid #fff;
	}
	.row.mod-detail {
		display: table;
		margin: 0px;
	}
	.row.mod-detail {
		display: block;
		margin: 0px;
		border: none;
		padding: 20px 0px 0px 0px;
	}
	.row.mod-detail [class*="col-"] {
		float: none;
		display: block;
		vertical-align: top;
	}
	.row.mod-detail .colLft.desktop-hide h2 {
		margin: 15px 0px;
	}
	.row.mod-detail [class*="col-"].colLft.mob-hide.reset-left {
		display: none
	}
	.col-md-9.col-sm-9.colrgt {
		background: none;
		margin: 10px 0px 10px;
		padding: 0px;
	}
	.col-md-9.col-sm-9.colrgt>img {
		width: 100%
	}
	.col-md-3.col-sm-3.colLft.mob-hide {
		padding: 0px 0px 0px 0px;
		display: none
	}
	.col-md-3.col-sm-3.colLft.desktop-hide {
		display: block;
		padding: 0px;
	}
	.btnpanel {
		margin: 15px 0px;
	}
	table.baby-dtl {
		width: 100%
	}
	table.baby-dtl td {
		padding: 5px;
		font: normal 14px arial;
		width: 25%;
	}
	table.baby-dtl td:last-child {
		font-weight: bold;
		width: 75%;
	}
	table.baby-dtl tr {
		border-bottom: 1px dotted #cccccc;
	}
	nav {
		/* background: #2d2f33;
		display: block;
		height: 100%;
		overflow: auto;
		position: fixed;
		right: -20em;
		font-size: 15px;
		top: 0;
		width: 20em;
		z-index: 2000;
		transition: right 0.3s ease-in-out 0s;
		-webkit-transition: right 0.3s ease-in-out 0s;
		-moz-transition: right 0.3s ease-in-out 0s;
		-o-transition: right 0.3s ease-in-out 0s;
		*/
	}
	#navbar-collapse-1 {
		transition: left 0.3s ease-in-out 0s;
		-webkit-transition: left 0.3s ease-in-out 0s;
		-moz-transition: left 0.3s ease-in-out 0s;
		-o-transition: left 0.3s ease-in-out 0s;
		background: #f2f1ef;
		display: block;
		height: 100%;
		/* overflow: auto;
		*/
		position: fixed;
		left: -100%;
		top: 0;
		width: 75%;
		z-index: 2000;
	}
	.nav-expanded #navbar-collapse-1 {
		left: 0%;
		position: fixed;
	}
	html.nav-expanded {
		margin-left: 75%;
		width: 75%;
		overflow: hidden;
		transition: left 0.4s ease-in-out 0s;
		-webkit-transition: left 0.4s ease-in-out 0s;
		-moz-transition: left 0.4s ease-in-out 0s;
		-o-transition: left 0.4s ease-in-out 0s;
	}
	html.nav-expanded body{
		overflow-x: hidden;
	}
	#nav-expander {
		transition: right 0.3s ease-in-out 0s;
		z-index: 99;
		transition: right 0.3s ease-in-out 0s;
		-webkit-transition: right 0.3s ease-in-out 0s;
		-moz-transition: right 0.3s ease-in-out 0s;
		-o-transition: right 0.3s ease-in-out 0s;
		background: #493d34;
		margin: 15px 0px 0px;
	}
	#nav-expander.navbar-toggle {
		padding: 9px 9px 10px 8px;
		border: none;
	}
	.nav-main ul > li > a, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
		border-bottom: 2px solid white;
		/* font-size: 14px;
		*/		background-color: #e4e1dc;
	}
	.navbar-default .navbar-nav > li > a {
		border-bottom: 2px solid white;
		background-color: #f2f1ef;
		padding: 6px 12px;
	}
	.dropdown-menu.nonmega li {
		border-bottom: 0px solid white;
	}
	.navbar-default .navbar-nav > li > a:after {
		content: " ";
		position: absolute;
		right: 11px;
		top: 10px;
		display: block;
		background: url(../images/sprite.png) no-repeat;
		background-position: -144px 0px;
		width: 14px;
		height: 14px;
	}
	.navbar-default .navbar-nav > .open > a:after {
		background-position: left -21px;
		top: 12px;
	}
	.navbar-nav .open .dropdown-menu>li.dropdown-submenu>a {
		font-family: 'roboto_slabregular', Arial, Helvetica, sans-serif;
		font-size: 14px;
	}
	.navbar-default .navbar-nav > .open .dropdown-submenu.activelink>a {
		font-weight: bold;
	}
	.navbar-default .navbar-nav > .open .dropdown-submenu.activelink>a:after {
		background-position: left -21px;
		width: 14px;
		height: 14px;
		right: 11px;
		top: 5px;
	}
	.navbar-default .navbar-nav > .open .dropdown-submenu>a:after {
		/* background-position: left -21px;
		*/		background-position: -144px 0px;
		right: -3px;
		width: 23px;
	}
	.yamm .dropdown-menu {
		padding: 0px;
	}
	.navbar-default .navbar-nav > .open .dropdown-menu>li> a, .navbar-default .navbar-nav > .open > a:hover {
		/* color: red;
		*/		border-bottom: 2px solid white;
		font-family: 'roboto_slabregular', Arial, Helvetica, sans-serif;
		font-size: 14px;
	}
	.dropdown.pos-rel.open {
		border-top: 0px solid white
	}
	.navbar-default .navbar-nav > .open .dropdown-submenu li a {
		/* color: yellow;
		*/		padding-left: 40px;
	}
	#navbar-collapse-1>.navbar-nav {
		margin: 0px;
	}
	.outerdiv.hdr {
		position: relative;
	}
	nav.navbar-default {
		position: absolute;
		background: none;
		top: 0px;
	}
	.nonmedia-clr, .mob-hide, .navbar-nav>li.mob-hide {
		display: none;
	}
	table.jobdetail th.mob-hide {
		display: table-cell;
	}
	.desktop-hide, .navbar-nav > li.desktop-hide {
		display: block;
	}
	.desktop-hide .primary-nav {
		float: none;
	}
	.desktop-hide .pagination.pagination-centered {
		margin: 20px 0px 0px;
	}
	.desktop-hide .pagination.pagination-centered.yearfilter {
		margin: 9px 0px 0px;
	}
	section.mod.gallery {
margin-bottom: 33px;
border: none;
}
.dataTables_wrapper {
margin-bottom: 26px;
}
	.babyname td:first-child {
	font: normal 19px 'roboto_slablight';
	}
	.babyname td:last-child {
	font: bold 14px arial;
}
h3.subheading{
font: normal 22px 'roboto_slablight';
padding: 0px 0px 0px 26px
}
	
	h3.subheading i {
	height: 20px;
	width: 23px;
	top:5px;
}
h3.subheading i.m {
	background-position: -677px -114px;
}
h3.subheading i.w {
	background-position: -677px -83px;
}
	#trigger.desktop-hide {
		display: inline-block;
		position: absolute;
		z-index: 99;
	}
	#trigger.desktop-hide span {
		border-right: 0px solid #fff;
		padding: 7px 16px 7px 8px;
		position: relative;
	}
	.content-wrapper>.col-md-12:first-child {
		border-top: 1px dotted #cccccc;
		padding: 0px 0px 0px 0px;
	}
	.humanbuilder .female, .humanbuilder .male {
		zoom: 53%;
	}
	.humanbuilder .female, .humanbuilder .male {
		-moz-transform: scale(.50);
		-moz-transform-origin: left top 0;
	}

	.humanbuilder a span:after {
		top: -3px
	}
	form#builder .btn.btn-primary {
		font: bold 16px roboto_slabbold;
	}
	h2.videohdg, h2.basicSlider, h2.Links, h2.datadownload, h2.formHdg, article.mitarbeiter.detailpage h2.videohdg {
		font-size: 14px;
	}
	.data-list li a {
		font-size: 14px;
	}
	.data-list li a.link {
		font-size: 12px;
	}
	table.title {
		font-size: 14px;
	}
	form.form-horizontal Label {
		font-size: 14px;
	}
	.fixedoverlay{
		height: 100%;
width: 100%;
position: fixed;
top: 0;
right: 0;
left: 0;
bottom: 0;
background: grey;
opacity: .5;
z-index: 9999;
left: 252px;
 display: none; 
	}
	/* .container .col-md-12, .row-fluid.schritt2>.col-md-8, .row-fluid.inhalt>.col-md-8, .row-fluid.jobs>.col-md-8, .row-fluid.krankheit>.col-md-8, .row-fluid.kontakt>.col-md-8, .row-fluid.newspresse>.col-md-8, .row-fluid.webcam>.col-md-8, .row-fluid.urologie>.col-md-8, .row-fluid.mitarbeiter>.col-md-8, */
	.content-wrapper .row-fluid>.col-md-8, .content-wrapper>.col-md-8 {
		border-top: 1px dotted #cccccc;
		padding: 0px 0px 0px 0px;
	}
	.content-wrapper .row-fluid.webcam>.col-md-8, .row.mitarbeiter .formelement{
		border-top: none;
	}
	
	/* .row-fluid.schritt2>.col-md-4, .row-fluid.inhalt>.col-md-4, .row-fluid.jobs>.col-md-4, .row-fluid.krankheit>.col-md-4, .row-fluid.kontakt>.col-md-4, .row-fluid.newspresse>.col-md-4, .row-fluid.webcam>.col-md-4, .row-fluid.urologie>.col-md-4, .row-fluid.mitarbeiter>.col-md-4 */
	.content-wrapper .row-fluid>.col-md-4 {
		padding: 0px 0px 0px 0px;
	}
	
	/* .row-fluid.schritt2 .col-md-8, .row-fluid.inhalt .col-md-8, .row-fluid.jobs .col-md-8, .row-fluid.krankheit .col-md-8, .row-fluid.kontakt .col-md-8, .row-fluid.newspresse .col-md-8, .row-fluid.webcam .col-md-8, .row-fluid.urologie .col-md-8, .row-fluid.mitarbeiter .col-md-8 {
		padding: 0px 0px 0px 0px;
	}
	.row-fluid.schritt2 .col-md-4, .row-fluid.inhalt .col-md-4, .row-fluid.jobs .col-md-4, .row-fluid.krankheit .col-md-4, .row-fluid.kontakt .col-md-4, .row-fluid.newspresse .col-md-4, .row-fluid.webcam .col-md-4, .row-fluid.urologie .col-md-4, .row-fluid.mitarbeiter .col-md-4 {
		padding: 0px 0px 0px 0px;
	}
	*/
	article summary, article .summary {
		font: normal 15px roboto_slablight;
		margin: 0px 0px 20px 0px
	}
	.row.mitarbeiter .col-md-12 {
		border-top: none;
		padding: 0px 0px
	}
	.tblmitarbeiter td {
		display: block;
		float: left;
		border: none;
		width: 100%;
		padding: 0px;
	}
	.tblmitarbeiter td:first-child {
		padding: 0px;
	}
	.tblmitarbeiter td:last-child {
		padding: 0px 0px 10px 0px;
	}
	.mitarbeiter .btn-primary.btn.VidBtn {
		margin: 15px 0px;
		width: auto;
		float: left;
	}
	article.mitarbeiter .image-gallery .col-md-3:after {
		content: ".";
		display: block;
		height: 0;
		clear: both;
		visibility: hidden;
	}
	.row.image-gallery {
		margin-bottom: 30px;
	}
	article.mitarbeiter .image-gallery .col-md-3 img {
		width: 100%
	}
	.col-md-12.formelement .searchalign {
		width: 75%;
		margin: 0px 2% 0px 0px
	}
	.mitarbeiter .btn-primary.btn {
		margin: 15px 0px 30px 0px;
	}
	section.mod.infos {
		border-bottom: 1px solid #cccccc;
	}
	.data-list li:last-child {
		border-bottom: none;
	}
	.content-wrapper .mod.data-list.downloadData li:last-child {
		border-bottom: 1px dotted #cccccc;
	}
	.mod .mod-highlight > a > span, .mod .mod-highlight > span {
		/* display: none */
	}
	.mod-details h2 {
		margin: 10px 0px;
		font: normal 20px roboto_slabregular;
	}
	.content-wrapper {
		padding: 0px 0px 30px;
		/* border-top: 1px dotted #cccccc;
		*/
	}
	.content-wrapper>div {
		padding: 0px;
	}
	.yearpanel .pagination {
		display: none;
	}
	.yearpanel .pagination.yearfilter {
		display: block;
		float: none;
		margin: 20px 0px 20px;
	}
	h2, article h2, article.mitarbeiter.detailpage h2 {
		margin: 20px 0px;
		font-size: 28px;
	}
	article.mitarbeiter.detailpage h2 {
		margin: 20px 0px 0px;
	}
	article.mitarbeiter.detailpage h3 {
		font-size: 17px;
	}
	.mitarbeiter.detailpage .col-xs-12.col-md-3 .thumb img {
		width: auto;
	}
	.col-md-12.breadcrumb-media {
		display: none;
	}
	.filterDetail .babydetails, .filterDetail .hdg {
		font:bold 12px arial;
		line-height: normal;
		margin: 0 7px 5px 0;
	}
	.filterDetail {
		padding: 10px 0px;
	}
	.filterDetail > div i{
		display: none;
	}
	footer.innerpage.mobilemenu {
		background: #f2f1ef;
		color: #493d34;
		padding: 0px;
		margin: 0px 15px
	}
	footer.innerpage.mobilemenu h3 {
		font: bold 14px roboto_slabbold;
		color: #493d34;
	}
	footer.innerpage.mobilemenu p {
		font: normal 14px roboto_slabregular;
		color: #493d34;
	}
	footer.innerpage.mobilemenu .tele a.tel p {
		font: bold 20px roboto_slabbold;
		color: white;
		margin: 0px;
	}
	footer.innerpage.mobilemenu .contact-mob p:last-child {
		/*margin-bottom: 0px;*/
	}
	footer.innerpage.mobilemenu .contact-mob li:last-child p {
		margin-bottom: 10px;
	}
	footer.innerpage.mobilemenu a {
		font: normal 12px arial;
		color: #493d34;
	}
	footer.innerpage.mobilemenu li {
		list-style-type: none;
		margin: 0px;
		padding: 0px;
		float: none;
	}
	footer.innerpage.mobilemenu .col-xs-12.col-md-8 {
		padding: 0px;
	}
	footer.innerpage.mobilemenu .address {
		margin-bottom: 5px
	}
	.bg-mobile {
		background: #f2f1ef;
	}
	.desktop-hide .quick-links {
		padding: 0px 15px;
		margin: 10px 0px 0px 0px;
	}
	.navbar.yamm.navbar-default .desktop-hide  .quick-links {
		margin: 30px  0px;
	}
	.desktop-hide .quick-links .subnav-drop {
		display: none
	}
	.desktop-hide .bg-mobile .secondary-nav .icon {
		width: 40px;
		height: 40px;
		border-radius: 50%;
		background: #aaa096;
		text-indent: inherit;
		position: inherit;
		overflow: inherit;
		display: block;
	}
	.desktop-hide .bg-mobile .secondary-nav .icon img {
		margin: 5px 0px 0px 5px
	}
	
	/* nav .secondary-nav .icon:after {
		content: " ";
		position: absolute;
		left: 6px;
		top: 8px;
		width: 27px;
		height: 27px;
	}
	*/
	.icon.figure:after {
		/*background-position: -265px -7px;*/
		background-position: 4px -73px;
	}
	.icon.cart:after {
		background-position: -297px -7px;
	}
	.icon.target:after {
		background-position: -324px -6px;
	}
	.icon.brief:after {
		background-position: -353px -7px;
	}
	.icon.contact:after {
		background-position: -388px -7px;
	}
	li:hover .icon.figure:after {
		background-position: -265px -7px;
	}
	li:hover .icon.cart:after {
		background-position: -297px -7px
	}
	li:hover .icon.target:after {
		background-position: -324px -6px;
	}
	li:hover .icon.brief:after {
		background-position: -353px -7px;
	}
	li:hover .icon.contact:after {
		background-position: -388px -7px;
	}
	footer.innerpage.mobilemenu .col-xs-12.col-md-8 {
		width: 100%
	}
	footer.innerpage.mobilemenu .tele {
		background: #005a8c;
		border-radius: 5px;
		font: bold 20px roboto_slabbold;
		color: white;
		padding: 5px;
		text-align: center;
		margin: 10px 0px 10px;
	}
	footer.innerpage.mobilemenu .tele a.tel {
		font: bold 20px roboto_slabbold;
		color: white;
	}
	footer.innerpage.mobilemenu .tele a.tel:hover {
		text-decoration: none;
	}
	footer.innerpage .tele {
		background: transparent;
		border-radius: 0px;
		font: normal 14px 'roboto_slablight', Arial, Helvetica, sans-serif;
		color: white;
		padding: 0px;
		text-align: left;
		margin: 0px;
	}
	.babygal-content span {
		display: block;
	}
	.babygalerie td:first-child {
		padding: 0;
		border: 0px solid #fff;
		text-align: left;
		width: 55px;
		padding: 10px;
	}
	.col-md-8.col-sm-8.colrgt.thumb-details.reset-right {
		padding: 0px;
	}
	.thumb-details img {
		width: 100%
	}
	footer.innerpage.mobilemenu .footer-links li {
		width: 50%;
		float: left;
		padding: 5px 0px;
		border-bottom: 1px solid #ffffff;
	}
	footer.innerpage .footer-links ul {
		border-top: 1px solid #ffffff;
	}
	input.mac-style {
		width: 0px;
		-webkit-transition: width 1s ease-in-out;
		-moz-transition: width 1s ease-in-out;
		-o-transition: width 1s ease-in-out;
		transition: width 1s ease-in-out;
		padding: 0px;
	}
	input.mac-style:focus {
		width: 200px;
	}
	.mob-search {
		position: absolute;
		top: 15px;
		left: 67px;
	}
	button.mobsearch {
		padding: 6px 12px;
		background: #f2f1ef;
		border-radius: 3px;
		border: none;
	}
	#drop .searchalign {
		width: 100%;
		padding: 0px 15px;
		margin: 10px 0px 10px 0px;
		float: none;
	}
	i.icon-search.babygallerie {
		top: 7px;
		right: 25px;
	}
	.row.mitarbeiter i.icon-search.babygallerie{
		right: 13px;
	}
	.bootstrap-select.btn-group.babygallerie-dropdown .btn .filter-option {
		padding: 0px;
		background: white;
	}
	.mod #drop form.list-detail.galerie fieldset {
		float: left;
		width: 100%;
		padding: 0px 15px;
		margin: 0px 0px 10px 0px;
	}
	.mod #drop form.list-detail.galerie fieldset {
		margin: 0px;
	}
	.datum-bis {
		padding: 0px 15px;
		margin: 0px  0px 10px 0px;
		*zoom: 1;
		/* overflow: hidden;
		*/
	}
	.datum-bis:after, .datum-bis:before, .powermail_check_inner:before, .powermail_check_inner:after {
		display: table;
		content: "";
	}
	.datum-bis:after, .powermail_check_inner:after {
		clear: both
	}
	.mod-highlight.list .datum-bis span {
		background: none;
		color: #493d34;
		padding: 7px 7px 7px 0px !important;
		float: left;
		margin: 0px 0px 0px 0px;
		width: 20%;
		text-align: center
	}
	
	/* .mod-highlight.list .datum-bis span.bis, */
	.mod-highlight.list .datum-bis span.bold {
		padding-left: 10px;
		text-align: left
	}
	.mod #drop form.list-detail.galerie .datum-bis fieldset {
		float: left;
		width: auto;
		width: 30%;
		padding: 0px
	}
	.mod #drop form.list-detail.galerie .btn {
		float: left;
		margin-right: 10px;
	}
	li.reset {
		float: right;
		padding: 0px 15px 0px;
	}
	.mob-resetbtn {
		margin: 0px 0px 10px 0px;
		/* overflow: hidden;
		*/
	}
	.mob-resetbtn ul {
		padding: 0px;
		margin: 0px;
	}
	.mob-resetbtn li {
		list-style-type: none;
		padding: 0px;
		float: left;
	}
	.mob-resetbtn li.reset {
		float: right;
		padding: 7px 15px 0px 0px;
	}
	.mob-resetbtn a {
		color: #3f3f3f;
		font: bold 12px arial;
		line-height: 34px;
	}
	.mob-resetbtn a i {
		font-style: normal;
	}
	a.resetbtn, a.resetbtn.btn.active {
		background: url(../images/sprite.png) no-repeat left top;
		background-position: -277px -132px;
		display: block;
		float: right;
		height: 23px;
		width: 25px;
		cursor: pointer;
		box-shadow: none;
	}
	.mod-details h2 {
		/* background: url(../images/temp/exp-col.png) no-repeat;
		background-position: 100% -35px;
		*/
	}
	.mod-details h2 a:after {
		/* background: url(../images/temp/exp-col.png) no-repeat;
		background-position: 100% -35px;
		*/
	}
	.mod-details h2.collapsed {
		/* background-position: 100% 0px;
		*/
	}
	/*.mod-details h2 a:after {
		background: url(../images/sprite.png) no-repeat;
		background-position: -41px 0px;
		width: 20px;
		height: 15px;
		content: "";
		display: block;
		margin: 0px 0px 0px 0px;
		position: absolute;
		right: 0px;
		top: 5px;
	}
	.mod-details h2.collapsed a:after {
		background-position: -64px 0px;
	}*/
	.mod-details h2 a:after {
		background: url(../images/sprite.png) no-repeat;
		background-position: -625px -139px;
		width: 40px;
		height: 30px;
		content: "";
		display: block;
		margin: 0px 0px 0px 0px;
		position: absolute;
		right: 0px;
		top: 5px;
	}
	.mod-details h2.collapsed a:after {
		background-position: -625px -169px;
	}
	.title td {
		border: 1px solid #fff;
		text-align: left;
		display: block;
	}
	.title td:first-child {
		width: 100%;
	}
	.title td p {
		margin: 0px;
	}
	.post-box {
		/* margin-right: 15px;
		*/
		padding: 0px;
		width: 100%
	}
	.post-box:nth-of-type(3n-1) {
		padding: 0px 0px;
	}
	article.blumen h2 {
		border-top: 0px dotted #cccccc;
	}
	section.mod.schritt .col-xs-6.col-md-4 {
		width: 100%;
	}
	section.mod.schritt .col-xs-6.col-md-4 img {
		float: left;
	}
	section.mod.schritt .col-xs-6.col-md-4 a.category {
		margin: 0px 0px 0px 0px;
	}
	article.kontakt .col-md-4 {
	}
	.schritt3 fieldset .form-group div {
		padding: 0px
	}
	article ul.listing li, article p, article li  {
		font-size: 14px;
	}
	article.inhalt ul.listing li {
		font-size: 14px;
		color: #aaa096;
	}
	article.inhalt ul.listing li span {
		color: #3f3f3f;
	}
	img.align-left {
		width: 50%
	}
	footer.innerpage {
		padding: 0px 0px;
		margin: 0px 15px 15px;
	}
	.address li, .contact li {
		font-size: 20px;
		float: none;
		margin: 0px 00px 0px;
		list-style-type: none;
		padding: 0px;
		display: block;
	}
	footer.innerpage .social-icons .icon {
		width: 37px;
		height: 37px;
	}
	footer.innerpage .social-icons .icon.fb:after {
		background-position: -367px -58px;
	}
	footer.innerpage .social-icons .icon.fb:hover:after {
		background-position: -367px -58px;
	}
	footer.innerpage .social-icons .icon.tw:after {
		background-position: -368px -103px;
	}
	footer.innerpage .social-icons .icon.tw:hover:after {
		background-position: -368px -103px;
	}
	footer.innerpage .social-icons .icon.gplus:after {
		background-position: -368px -151px;
	}
	footer.innerpage .social-icons .icon.gplus:hover:after {
		background-position: -368px -151px;
	}
	footer.innerpage .col-xs-12.col-md-8 {
		padding: 0px 10px 0px 0px;
		width: 75%;
		float: left
	}
	footer.innerpage .col-xs-12.col-md-4 {
		padding: 0px 0px 0px 10px;
		width: 25%;
		float: left
	}
	footer h3 {
		font-size: 14px;
		margin-top: 20px;
		margin-bottom: 1px;
	}
	footer h3:first-child {
		margin-top: 0;
	}
	footer .contact-info p, footer .contact-info a {
		font-size: 14px;
	}
	.address {
		margin-bottom: 15px;
	}
	.frm-mitarbeiter {
		/*overflow: hidden;*/
	}
	.mitarbeiter .frm-mitarbeiter .btn-primary.btn {
		float: left;
	}
	footer.innerpage .social-icons {
		margin: 2px 0px 0px 0px;
	}
}
@media only screen and (min-width:481px) and (max-width:768px) {
	article .contact-address {
		width: 40%;
		float: left;
		padding-right: 0;
	}
	article .contact-map {
		width: 60%;
		float: left;
		padding-left: 0;
	}
	.inhalt .Kontakt .col-md-3 {
		width: 33.333%;
		float: left;
	}
	.inhalt .Kontakt .col-md-3:nth-child(3n+1) {
		clear: left;
	}
	.inhalt .Kontakt .col-md-3:nth-child(4n+1) {
		clear: none;
	}
	.inhalt .Kontakt .col-md-3 img {
		width: 100%;
		height: auto;
	}
	#infos-mod .post-box:nth-child(3n+1) {
		clear: left;
	}
	#infos-mod .post-box:nth-child(even) {
		padding: 0px 0px
	}
	p.inhalt span.align-left {
		width: 50%
	}
	p.inhalt span.align-left img {
		width: 100%
	}
	footer.innerpage .col-xs-12.col-md-8 {
		float: left;
		width: 60%;
		padding: 0px
	}
	footer.innerpage .col-xs-12.col-md-4 {
		float: left;
		width: 40%;
		padding: 0px
	}
	.spotlight .carousel-caption span {
		font-size: 200%;
	}
	fieldset.pos-spec .row:first-child {
		overflow: hidden;
	}
	.schritt3 fieldset .form-group label.col-sm-2, .schritt3 fieldset .form-group div.col-sm-2 {
		float: left;
	}
	.schritt3 fieldset .form-group div.col-sm-2 {
		padding: 0px 0px 0px 15px;
	}
	.schritt3 fieldset .form-group .col-sm-10 {
		float: left;
	}
	.schritt3 fieldset .form-group .col-sm-8 {
		width: 66.66666667%;
		float: left;
	}
	.row.schritdtl .col-sm-6 {
		width: 50%;
		float: left;
		position: relative;
		height: 160px;
	}
	.row.schritdtl .col-sm-6 img {
		display: block;
	}
}
@media only screen and (min-width:320px) and (max-width:480px) {
	.krankheit .row.img-babygallerie .col-md-4 {
padding: 0px 15px;
width: 50%;
}
.img-babygallerie .col-md-4:nth-child(2n+1) {
clear: left;
}
	article.mitarbeiter .image-gallery .col-md-3 {
		width: 50%;
		float: left;
		padding: 0px 15px;
	}
	article.mitarbeiter .image-gallery .col-md-3:nth-child(2n+1) {
		clear: left;
	}
	.col-md-12.krankheit .mod.gallery .mod-highlight.list {
		display: block;
	}
	.news-img-wrap .outer .lightbox img {
		width: 100%
	}
	.col-sm-1 .reset-lrg-this {
		top: 5px
	}
	article.builder p {
		color: #493d34;
		font: normal 16px roboto_slablight;
	}
	.row-clear {
		clear: both;
	}
	p.inhalt span.align-left {
		width: auto;
		padding: 0px;
		margin: 0px 0px 15px;
	}
	p.inhalt span.align-left img {
		width: 100%
	}
	img.align-left {
		width: 100%;
		float: none;
		margin: 0px 0px 10px 0px;
	}
	
	/* .row-fluid.urologie .row .col-md-3 .row-clear, */
	.mitarbeiter .image-gallery .col-md-3 .row-clear {
		display: block;
		clear: both;
	}
	
	/* .row-fluid.urologie .row .col-md-3 .clear, */
	.mitarbeiter .image-gallery .col-md-3 .clear {
		display: none
	}
	.mod-details .reset-field {
		width: 86%;
	}
	.mod-details .tx-tnt-download-module  .reset-field {
		width: 90%;
	}
	.listings .tag.label.label-info {
		font: normal 10px arial;
		margin: 0px 10px 5px 0px;
		padding: 0px;
		float: left;
		display: block;
	}
	.mitarbeiter .listings .row-fluid {
		padding: 5px 0px;
		overflow: hidden;
	}
	article.urologie .row .col-md-3 .box-gallery a {
		width: 50%;
		float: left;
		padding: 0px 10px 0px 0px;
	}
	.col-md-3 .box-gallery img {
		width: 100%
	}
	article.urologie .row .col-md-3:last-child .box-gallery {
		/* margin: 0px 0px 30px 0px;
		*/
	}
	.box-gallery {
		overflow: hidden;
	}
	.carousel-caption {
		top: 10%;
		padding: 0px;
	}
	.pagination a {
		height: 35px;
		width: 35px;
	}
	.seitenos {
		font: bold 12px arial;
		margin: 0px 0px;
	}
	div.pagination .prev a b {
		top: 9px;
		right: 10px;
	}
	div.pagination .next a b {
		top: 9px;
		left: 13px;
	}
	div.pagination .newer a b {
		top: 7px;
		right: 5px;
	}
	div.pagination .older a b {
		top: 7px;
		left: 5px;
	}
	.krankheit .col-xs-12.col-md-4.linkHeading .link {
		font: bold 14px arial;
	}
	.krankheit .col-xs-12.col-md-8.linkContent {
		font: normal 14px arial;
		padding: 0px;
	}
	.mod-details.infocontent h2 a {
		color: #493d34;
		font-size: 20px;
	}
	.hdg-desktop-hide {
		display: table-cell;
	}
	table.jobdetail th.mob-hide {
		display: none;
	}
	table.jobdetail a {
		font-weight: bold;
	}
	table.jobdetail span {
		display: block;
	}
	.hdg-desktop-hide span {
		font-weight: normal;
		display: block;
	}
	.babygalerie td.desktop-hide, .jobdetail td.desktop-hide, .jobdetail td.mob-view {
		display: table-cell;
	}
	.babygalerie td, .jobdetail td {
		display: none;
	}
	.filterDetail .babydetails i.w, .filterDetail .babydetails i.m {
		display: none;
	}
	.mod-highlight a span i {
		padding: 0px 0px 0px 10px;
	}
	.mod-highlight.list span, .mod-highlight.infos span {
		padding: 5px;
	}
	.mod-highlight.list ul.selectpicker span {
		/*background: white;*/
		background: transparent;
	padding: 0px;
	width: 100%;
	display: block;
	}
	.downloadcenter .input-group.col-sm-11, .downloadcenter .col-sm-11 {
		width: 85%;
		float: left;
	}
	.downloadcenter .col-sm-1, .downloadcenter .col-sm-2 {
		width: 15%;
		float: left;
	}
	.row.schritdtl>div:first-child {
		width: 70%;
		float: left;
		position: relative;
		/* height: 160px;
		*/
	}
	.row.schritdtl>div:nth-child(even) {
		width: 30%;
		float: left;
	}
	.row.schritdtl .col-sm-6 img {
		display: block;
		width: 100%;
	}
	fieldset.pos-spec>img, div.pos-spec img {
		/* display: none */
	}
	fieldset.pos-spec .row {
	}
	fieldset.pos-spec .row .col-sm-6.mob-view {
		width: 50%;
		float: left;
		height: 160px;
	}
	.schritt3 fieldset .form-group label.col-sm-2, .schritt3 fieldset .form-group div.col-sm-2 {
		width: 100%;
		float: none;
	}
	.schritt3 fieldset .form-group div.col-sm-2 {
		padding: 0px 10px 0px 0px;
	}
	.schritt3 fieldset .form-group .col-sm-10 {
		width: 75%;
		float: left;
	}
	.schritt3 fieldset .form-group .col-sm-8 {
		width: 50%;
		float: left;
	}
}
@media only screen and (min-width:768px) and (max-width:992px) {
	.humanbuilder .female, .humanbuilder .male  {
		zoom: 58%;
	}
	.humanbuilder .female, .humanbuilder .male  {
		-moz-transform: scale(.58);
		-moz-transform-origin: left top 0;
	}
	.spotlight .carousel-indicators {
		width: 750px;
		padding: 0px 15px;
	}
	#mod-urologie-generic1 .row.urologie div {
		padding: 0px 15px;
		float: left;
		width: 50%
	}
	footer h3 {
		font-size: 14px;
		margin: 0px;
	}
	footer .contact-info p, footer .contact-info a {
		font-size: 13px;
	}
	.footer-links a {
		font-size: 10px;
	}
	footer.innerpage .col-md-8 {
		width: 66.66666667%;
	}
	footer.innerpage .col-md-4 {
		width: 33.333333333%;
	}
	.outerdiv.hdr .col-md-9.col-sm-6 {
		width: 75%
	}
	.primary-nav {
		/* float: none;
		*/
	}
	.container {
	}
	.img-babygallerie .col-md-4 {
		width: 33.33333333%;
		float: left;
	}
	.img-babygallerie .col-md-4:nth-child(3n+1) {
		clear: left;
	}
	.nav-main ul > li > a, .navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
		font-size: 14px;
	}
}
@media only screen and (min-width:480px) and (max-width:1024px) {
	section.mod.generic .row.urologie .col-md-6 {
		width: 50%;
		float: left;
	}
	section.mod.generic .row.urologie .col-md-6:first-child {
		padding: 0px 0px 0px 15px;
	}
	section.mod.generic .row.urologie .col-md-6:last-child {
		padding: 0px 0px 0px 10px;
	}
	.mitarbeiter.detailpage .col-md-3 {
		float: left;
		width: 25%
	}
	.mitarbeiter.detailpage .col-md-9 {
		float: left;
		width: 75%
	}
	.mitarbeiter.detailpage .col-xs-12.col-md-3 .thumb img {
		width: 100%
	}
	.krankheit .col-md-4 {
		width: 33.33333333%;
		float: left;
		padding: 0px;
	}
	.krankheit .row.img-babygallerie .col-md-4 {
		padding: 0px 15px;
		width: 33.33333333%;
	}
	article.urologie .col-md-3:nth-child(4n+1) {
		clear: left;
	}
	.btn.inhalt {
		font-weight: bold;
		font-size: 14px;
	}
	p.inhalt span.align-left {
		width: 50%
	}
	p.inhalt span.align-left img {
		width: 100%
	}
	article.urologie .row .col-md-3 {
		width: 25%;
		float: left;
	}
	article.mitarbeiter .image-gallery .col-md-3 {
		width: 33.33%;
		float: left;
	}
	article.mitarbeiter .image-gallery .col-md-3:nth-child(3n+1) {
		clear: left;
	}
	article.mitarbeiter .image-gallery .col-md-3:nth-child(2n+1) {
		clear: none;
	}
	.krankheit .row.img-babygallerie .col-md-4 {
	width: 33.33%;
}
.img-babygallerie .col-md-4:nth-child(2n+1) {
clear: none;
}
.img-babygallerie .col-md-4:nth-child(3n+1) {
clear: none;
}
	.col-md-3 .box-gallery img {
		width: 100%
	}

	/* .row-fluid.urologie .row .col-md-3 .row-clear, */
	.mitarbeiter .image-gallery .col-md-3 .row-clear {
		display: none;
	}
	article.urologie .row .col-md-3 .box-gallery a, .mitarbeiter .image-gallery .col-md-3 .box-gallery a {
		width: auto;
		float: none;
		padding: 0px 10px 0px 0px;
	}
}
@media only screen and (min-width:768px) and (max-width:1024px) {
	.filterDetail .babydetails, .filterDetail .hdg{
		font: bold 14px arial;
		line-height: 25px;
	}
	.quick-links.mob-hide .secondary-nav ul li {
		position: relative;
	}	
	.subnav-drop {
		left: -2px;
		width: 313px;
	}
	footer.innerpage .address li p:before, footer.innerpage .contact li p:before {
	top: 9px;
	left: 0px
}
	.downloadcenter .col-sm-11 .form-control {
height: 46px;
}
	.yamm .lft-bdr.hover-init .dropdown-menu {
		right:15px;
		left: 17px;
	}
	.news-date{
		font: bold 13px roboto_slabbold;
	}
.btn-imagemap {
font: normal 20px roboto_slabregular;
}
.bootstrap-select.btn-group .dropdown-menu li a {
font: normal 20px 'roboto_slablight';
}
form#builder .btn.btn-primary {
font: bold 20px roboto_slabbold;
}
	article.builder p {
color: #493d34;
font: normal 20px roboto_slablight;
}
	section.mod.generic .news-related-files-link, section.mod.generic .result-data.download .news-related-files-link.file-title{
		width: 65%;
	}
	.result-data.download .file-info, .news-related-files-size{
		max-width: 35%;
	}
	article.inhalt .news-related-links li, article.inhalt .news-related-news li{
		font-size: 14px;
	}
	article.mitarbeiter.detailpage ul li{
		list-style-type: square;
	}
	article.mitarbeiter .image-gallery .col-md-3 {
		width: 33.33%;
		float: left;
	}
	article.mitarbeiter .image-gallery .col-md-3:nth-child(3n+1) {
		clear: left;
	}
	.social-icons ul {
		margin-top: 5px;
	}
	.footer-links {
		margin-top: 5px;
	}
	footer>.container {
		padding: 20px 15px 18px;
	}
	footer h3 {
		margin-bottom: 0px;
		font-size: 16px;
	}
	footer.innerpage .address li, footer.innerpage .contact li, .contact-info p {
		font-size: 16px;
	}
	.contact-info p {
		margin-bottom: 0px;
	}
	.secondary-nav {
		display: block;
		clear: left;
		float: left;
	}
	.schritt3 fieldset .form-group label {
		font: normal 14px arial;
	}
	.data-list.type-1 .babydtl-listing ul li {
		display: block;
		clear: both;
		width: 100%;
		float: none;
	}
	section.mod.schritt .col-xs-6.col-md-4 img {
		width: 152px;
		height: 152px;
	}
	.default-sm.btn-group.bootstrap-select.form-control.babygallerie-dropdown.genderFilter {
		min-width: 120px;
	}
	.navbar-default {
		margin: 0px 0px 2px;
	}
	.outerdiv.hdr .col-md-9.col-sm-6 {
		width: 75%;
		padding: 0px;
	}
	.outerdiv.hdr .pull-right {
		padding: 0px 0px 0px 0px;
	}
	.col-md-12.breadcrumb-media {
		padding: 0px;
	}
	.col-md-12.krankheit {
		/*padding: 0px;*/
	}
	.container .col-md-12 {
		/*padding: 0px;*/
	}
	.content-wrapper .col-md-12.breadcrumb-media{
		padding:0px 15px 0px 17px;
	}
	div.pagination li:first-child a {
		margin: 0px 5px 0px 0px;
	}
	.list-detail.galerie .pagination li.disabled.seitenos a {
		line-height: normal;
	}
	.list-detail.galerie .pagination li.disabled.seitenos i {
		line-height: normal;
		display: block;
		margin: 3px 0px;
		text-align: right;
	}
	.list-detail.galerie>.col-md-9 {
		float: left;
		width: 82%;
		padding: 0px 5px 0px 15px;
	}
	.list-detail.galerie>.col-md-3 {
		float: left;
		padding: 0px 15px 0px 0px;
		width: 18%
	}
	.tx-powermail label {
		width: 28%;
	}
	input.powermail_field {
		width: 72%;
	}
	.powermail_fieldwrap_select .btn-group.bootstrap-select.powermail_field.powermail_select {
		width: 72% !important;
	}
	.powermail_form_3.spontan .powermail_check_outer {
		width: 728%;
	}
	.powermail_form_3.spontan .powermail_check_outer {
		width: 72%;
	}
	section.mod.schritt .col-xs-6.col-md-4 img {
		width: 152px;
		height: 152px;
	}
	.mod.schritt .pos-spec .row .col-sm-6, .mod.schritt .pos-spec .row .col-sm-12 {
		padding: 0px 185px 0px 0px;
		width: 100%;
	}
	.mod.schritt .pos-spec .col-sm-8 {
		padding: 0px 185px 0px 0px;
		width: 100%;
	}
	.mod.schritt .pos-spec .row .col-sm-12 {
		padding: 0px 0px 0px 0px;
	}
	form.schritt h5 {
		font: bold 14px arial;
	}
	fieldset.pos-spec Label {
		font-weight: normal;
		font: normal 14px arial;
	}
	form.schritt .btn {
		font: bold 14px arial;
	}
	.galerie .searchalign {
		width: 23%;
	}
	.carousel-caption {
		padding: 0px;
	}
	.spotlight .carousel-caption {
		bottom: 25px !important;
		left: 32px;
		position: absolute;
		height: 107px;
	}
	.spotlight .carousel-caption a {
		padding: 0px 0px;
	}
	#builder .bootstrap-select.btn-group .dropdown-menu.inner {
		min-width: 100%;
	}
	#builder .btn-group.bootstrap-select.form-control {
		height: 45px;
	}
	.col-md-4.contact-address {
		width: 35%;
		float: left;
	}
	.col-md-8.contact-map {
		width: 65%;
		float: left;
	}
	article.Kontakt h4 {
		font: bold 14px arial;
	}
	.kontakt-form input[type="text"], .kontakt-form .powermail_field.powermail_textarea {
		width: 75%
	}
	.kontakt-form .tx-powermail label {
		width: 25%;
	}
	article.Kontakt p, .jobdetail-2 .form-group label, .tx-powermail label, input.powermail_field.powermail_submit {
		font: normal 14px arial;
	}
	.kontakt-form .powermail_fieldwrap.powermail_fieldwrap_submit {
		margin: 0px 0px 15px 25%;
	}
	.kontakt-form .powermail_legend {
		font: bold 14px arial;
	}
	.mod .data-list type-2 .data-list .details {
		width: 100%;
	}
	h3.urologie-generic2 {
		font-size: 16px
	}
	.mod.generic .mod-details .data-list .scroll-pane p, .mod.generic .mod-details .scroll-pane p {
	font: normal 13px roboto_slablight;
}
.mod.generic .mod-details .data-list .scroll-pane p.teaser-date, .mod.generic .mod-details .scroll-pane p.teaser-date {
		font:bold 13px roboto_slabbold;
	}
	.downloadcenter .col-sm-11 {
		padding-right: 15px;
	}
	.downloadcenter .col-sm-11 {
		padding-right: 15px;
	}
	.downloadcenter .input-group.col-sm-11 i.icon-search {
		right: 30px;
	}
	.bootstrap-select.btn-group .btn .filter-option {
		font: bold 20px roboto_slabbold;
	}
	.downloadcenter .col-sm-11 .form-control, article.mitarbeiter .col-sm-12 .form-control {
		font: normal 20px roboto_slabbold;
	}
	.downloadcenter .col-sm-11 input.form-control.bdr-rgt-none {
		height: auto;
	}
	.downloadcenter .input-group.col-sm-11 i.icon-search, article.mitarbeiter .col-sm-12 i.icon-search {
		top: 13px;
	}
	.mitarbeiter p.caption {
		font: normal 20px roboto_slablight;
	}
	article summary, article .summary, .teaser-text p {
		font-size: 17px;
		margin:-15px 0px 25px 0px;
	}
	article.result-data.download .file-title, .col-md-8 .result-data.download .file-title {
		font: bold 14px arial;
	}
	.news-backlink-wrap a {
		font: normal 14px arial;
	}
	.newspresse td:first-child {
		font: normal 20px roboto_slablight;
	}
	.newspresse .link {
		font: normal 14px arial;
	}
	.newspresse td:last-child h3 a {
		font: bold 20px roboto_slabbold;
	}
	.data-list .thumb-img {
		float: left;
		/* width: 45%;
		*/
		margin-right: 8px;
	}
	.data-list .details {
		/* width: 51%;
		float: left;
		*/
	}
	.data-list.type-2 .details {
		/* width: auto;
		*/
	}
	.data-list.type-2 .details.quicklinks {
		/* width: 51%;
		*/
	}
	.mod.generic .mod-details .data-list.type-2 .details.quicklinks .bodytext {
		margin: 0px 0px 0px 0px;
		word-wrap: break-word;
	}
	.nav-widget .thumb {
		width: 49% !important;
		margin-right: 2%;
	}
	.inhalt .Kontakt {
	}
	.inhalt .Kontakt .col-md-3 {
		width: 25%;
		float: left;
	}
	.inhalt .Kontakt .col-md-3 img {
		width: 100%;
		height: auto;
	}
	.primary-nav .sub-view a {
		min-width: 145px;
	}
	article.inhalt h1.inhalt_header,  h1.inhalt_header {
		font-size: 32px;
		margin:-2px 0px 20px 0px;
	}
	.col-md-8.col-sm-8.colrgt.thumb-details.reset-right {
		padding: 0px 0px 0px 0px;
		background: #f2f1ef;
		height: 513px !important
	}
	.form-control {
		padding: 6px;
		height: 33px;
	}
	.mod.schritt .pos-spec .col-sm-8 span, .listedCnt ul li span {
		font: normal 14px arial;
	}
	.mod.schritt .pos-spec .col-sm-8 i, .listedCnt ul li i, .schritt3 fieldset .form-group label, .schritt3 fieldset .form-group div input, .schritt3 fieldset .form-group div select, .schritt3 fieldset .form-group div.col-sm-10 {
		font: normal 14px arial;
	}
	section.mod.schritt .default-sm.bootstrap-select.btn-group .btn .filter-option {
	font: normal 14px arial;
	}
	.btn.btn-primary.lrg {
		font: bold 14px arial;
	}
	div.pos-spec a.link, .listedCnt h5, .schritt3 h5 {
		font: bold 14px arial;
	}
	section.mod.schritt .col-xs-6.col-md-4 a, span.blumen_title {
		font: bold 14px arial;
	}
	.babygalerie td, .babygalerie th {
		font: normal 14px arial;
	}
	.babygalerie .nachname, .babygalerie .vorname {
		font: bold 14px arial;
	}
	.babygalerie th.nachname, .babygalerie th.vorname {
		color: #3f3f3f;
		font-weight: normal;
	}
	.row.mod-detail [class*="col-"].colLft.mob-hide.reset-left {
		display: none
	}
	.colrgt.thumb-details.reset-right {
		padding: 0px;
		width: 100%;
	}
	.thumb-details img {
		max-width: 100%;
		height: 100%
	}
	.box-gallery .name {
		font-size: 14px;
	}
	.thumb img {
		width: 100%;
		height: auto;
	}
	.list-unstyled, .list-unstyled ul {
		border: none;
		float: left;
		width: 33.33%;
		margin-left: 0px;
		-webkit-transition: opacity 0.2s ease-in;
	}
	.navbar-nav>li>.dropdown-menu {
	}
	.yamm .yamm-content>.row {
		margin: 0px
	}
	.nav-main .nav-widget, .navbar-nav .nav-widget {
		clear: left;
		width: 100%;
		margin: 10px 0px;
		padding: 0px
	}
	.nav-widget .item {
		overflow: hidden;
		margin-bottom: 4px;
		width: 33.33%;
		float: left;
		padding: 0px 15px;
	}
	.jobdetail-2 td {
		font: normal 14px arial;
	}
	.jobdetail-2 h6, .tx-powermail legend {
		font: normal 14px arial;
	}
	.jobdetail-2 h5, .tx-powermail h3 {
		font: bold 14px arial;
	}
	.navbar-default .navbar-nav > li > a {
		font-size: 15px;
		padding: 10px 12px;
	}
	.spotlight .carousel-caption span {
		font-size: 30px;
		padding: 5px 13px 4px 10px;
	}
	.content-wrapper {
		padding-top: 24px;
		padding-bottom: 30px;
		margin:0px -15px;
	}
	.mod-details h2 {
		font-size: 20px;
	}
	.mod.generic .mod-details.theme-blue .data-list p, .mod.data-list.tabbed .mod-details p {
		font-size: 13px;
	}
	.mod.data-list .mod-details h3, .mod.generic .mod-details .data-list h3 {
		font: bold 15px roboto_slabbold;
	}
	.krankheit #box>.col-md-4:first-child {
		padding: 0px 15px 0px 0px;
	}
	.krankheit #box>.col-md-4:nth-child(even) {
		padding: 0px 15px;
	}
	.krankheit #box>.col-md-4:last-child {
		padding: 0px 0px 0px 15px;
	}
	.krankheit section.mod .infocontent .linkblock {
		font: normal 14px arial;
	}
	.humanbuilder .female, .humanbuilder .male  {
		zoom: 55%;
	}
	.humanbuilder .female, .humanbuilder .male  {
		-moz-transform: scale(.55);
		-moz-transform-origin: left top 0;
	}
	.nav.navbar-nav.mob-hide {
		padding: 0px 0px;
	}
	.col-md-12.krankheit .col-md-6 {
		width: 50%;
		float: left;
	}
	article.urologie .col-md-3:nth-child(4n+1) {
		clear: left;
	}
	#infos-mod .post-box:nth-child(3n+1) {
		clear: left;
	}
	#infos-mod .post-box:nth-child(even) {
		padding: 0px 15px
	}
	.row.email-tel .email {
		width: auto;
		padding: 0px 30px 0px 0px;
		float: left;
	}
	
	/* footer h3 {
		font-size: 14px;
		margin: 0px;
	}
	footer .contact-info p, footer .contact-info a {
		font-size: 13px;
		margin: 0px
	}
	*/
	article.kontakt h4 {
		font: bold 14px arial;
	}
	.kontakt-form .form-group label {
		font: normal 14px arial;
	}
	.kontakt-form .btn.btn-primary {
		font: normal 14px arial;
	}
	fieldset.pos-spec>img, div.pos-spec img {
		display: block;
		height: 165px;
		width: 165px;
	}
	.pos-spec.step3_subhead {
		min-height: 200px;
	}
	.krankheit .col-xs-12.col-md-4.linkHeading {
		float: left;
		width: 33.3333%;
		font: bold 14px arial;
	}
	.krankheit .col-xs-12.col-md-8.linkContent {
		float: left;
		width: 66.666666%;
		font: normal 14px arial;
	}
	h1 {
		font-size: 46px;
	}
	.data-list li {
		font-size: 14px;
	}
	form.form-horizontal Label {
		font-size: 14px
	}
	table.title {
		font-size: 14px;
	}
	article p, article li{
		font-size: 14px;
	}
	.highlighted {
		font-size: 17px
	}
	article h3 {
		font-size: 14px;
	}
	article summary, article .summary {
		font-size: 17px;
		margin: 0px 0px 30px;
	}
	h2.videohdg, h2.basicSlider, h2.Links, h2.datadownload, h2.formHdg, article.mitarbeiter.detailpage h2.videohdg {
		font-size: 14px
	}
	article.inhalt ul.listing li {
		font-size: 14px;
		color: #aaa096;
	}
	article.inhalt ul.listing li span {
		color: #3f3f3f;
	}
	article h2, article h1 {
		font-size: 46px;
		margin: 0px 0px 20px 0px
	}
	.breadcrumbs {
		margin-bottom: 20px
	}
	article.urologie .row .col-md-3 {
		width: 25%;
		float: left;
	}
	.row-fluid.urologie-home .col-md-4 {
		width: 33.33333%;
		float: left;
	}
	.content-wrapper .row-fluid.urologie-home>.col-md-4:first-child {
		/*padding: 0px 15px 0px 0px*/
	}
	.content-wrapper .row-fluid.urologie-home>.col-md-4:nth-child(even) {
		/*padding: 0px 15px;*/
	}
	.content-wrapper .row-fluid.urologie-home>.col-md-4:last-child {
		/*padding: 0px 0px 0px 15px*/
	}
	.mod-details.infocontent h2 a {
		color: #493d34;
		font-size: 20px;
	}
	.krankheit .mod-details .infocontent h2 {
		font: bold 20px'roboto_slabbold';
	}
	.mod.data-list .mod-details.infocontent p {
		font: normal 14px arial;
		line-height: 1.4em;
	}
	.krankheit .col-xs-12.col-md-4.linkHeading .link {
		font: bold 14px arial;
	}
	.mod-details.infocontent p {
		font-family: arial;
		font-size: 14px;
		color: #333333;
	}
	.jobdetail-2 .form-group label.col-sm-2 {
		width: 25%
	}
	.jobdetail-2 .form-group div {
		width: 75%
	}
	.jobdetail-2 .form-group div.col-sm-offset-2.col-sm-10 {
		margin-left: 25%;
	}
	.row-fluid.kontakt .col-md-8 {
		padding: 0px 0px 0px 10px;
		width: 50%;
		float: left;
	}
	.row-fluid.kontakt .col-md-4 {
		padding: 0px 10px 0px 0px;
		width: 50%;
		float: left;
	}
	
	/* .row-fluid.schritt2 .col-md-8, .row-fluid.inhalt .col-md-8, .row-fluid.jobs .col-md-8, .row-fluid.krankheit .col-md-8, .row-fluid.kontakt>.col-md-8, .row-fluid.newspresse .col-md-8, .row-fluid.webcam .col-md-8, .row-fluid.urologie .col-md-8, .row-fluid.mitarbeiter .col-md-8, */
	.content-wrapper .row-fluid>.col-md-8, .content-wrapper>.col-md-8 {
		/*padding: 0px 15px 0px 0px;*/
		width: 66.66666%;
		float: left;
	}
	
	/* .row-fluid.schritt2 .col-md-4, .row-fluid.inhalt .col-md-4, .row-fluid.jobs .col-md-4, .row-fluid.krankheit .col-md-4, .row-fluid.kontakt>.col-md-4, .row-fluid.newspresse .col-md-4, .row-fluid.webcam .col-md-4, .row-fluid.urologie .col-md-4, .row-fluid.mitarbeiter .col-md-4 */
	.content-wrapper .row-fluid>.col-md-4, .content-wrapper>.col-md-4 {
		/*padding: 0px 15px 0px 15px;*/
		width: 33.33333%;
		float: left;
	}
	.content-wrapper .row-fluid.home>.col-md-4:first-child, .content-wrapper .row-fluid.urologie-home>.col-md-4:first-child {
		padding-left: 17px;

	}
	section.mod.schritt .col-xs-6.col-md-4 {
		width: 33.33333333%;
	}
	.yearpanel .col-md-6:first-child {
		width: 50%;
		float: left;
	}
	.yearpanel .col-md-6:last-child {
		width: 50%;
		float: left;
	}
	.row .col-xs-12.col-md-4 {
		width: 33.3333333%
	}
	.mod.generic5 .row .col-xs-12.col-md-4 {
		width: 33.3333333%;
		padding: 0px 5px 0px 0px;
	}
	.mod.generic5 .row .col-xs-12.col-md-4 img {
		width: 100%
	}
	.mod.generic5 .row .col-xs-12.col-md-8 {
		width: 66.666666%;
		padding: 0px 0px 0px 5px;
	}
	.row.mod-detail {
		display: table;
		margin: 0px;
	}
	.row.mod-detail {
		display: block;
		margin: 0px;
	}
	.row.mod-detail [class*="col-"] {
		float: none;
		display: block;
		vertical-align: top;
	}
	.col-md-9.col-sm-9.colrgt {
		background: none;
		margin: 10px 0px 20px;
		padding: 0px;
		width: 100%;
	}
	.col-md-9.col-sm-9.colrgt>img {
		width: 100%
	}
	.col-md-3.col-sm-3.colLft.mob-hide {
		padding: 0px 0px 0px 0px;
		display: none
	}
	.col-md-3.col-sm-3.colLft.desktop-hide.tablet-hide {
		/* display: none;
		padding: 0px;
		*/
	}
	.col-md-3.col-sm-3.colLft.desktop-hide {
		display: block;
		width: 100%;
		padding: 0px;
	}
	.row.mod-detail h2 span {
		float: left;
		margin: 0px 10px 0px 0px;
	}
	table.baby-dtl {
		display: none;
	}
	.socialmedia {
		overflow: hidden;
	}
	.socialmedia>div:first-child, .socialmedia>div, .socialmedia>div:last-child {
		margin: 10px 10px 10px 0px;
		float: left;
	}
	.colLft .socialmedia>div:first-child, .colLft .socialmedia>div, .colLft .socialmedia>div:last-child {
		margin: 0px;
		float: left;
	}
	.colLft.socialmedia>div, .colLft .social-likes__widget {
		margin: 10px 10px 0px 0px;
		display: block;
		float: left;
	}
	.count-o, .social-likes__counter {
		position: relative;
		background: #fff;
		border: #bbb solid 1px;
		border-radius: 2px;
		min-height: 20px;
		min-width: 15px;
		padding: 2px 5px 2px;
		/* height: 20px;
		*/
		bottom: 0px;
		line-height: 20px;
	}
	.btnpanel {
		margin: 15px 0px;
	}
	table.baby-dtl {
		width: 100%
	}
	table.baby-dtl td {
		padding: 5px;
		font: normal 13px arial;
		width: 25%;
	}
	table.baby-dtl td:last-child {
		font-weight: bold;
		width: 75%;
	}
	table.baby-dtl tr {
		border-bottom: 1px dotted #cccccc;
	}
	.row-fluid.tablet {
		overflow: hidden;
		display: block;
		padding: 0px 0px;
		border: 1px dotted #cccccc;
		border-width: 1px 0px;
		margin: 0px 0px 20px 0px;
	}
	.row-fluid.tablet .col-md-8 {
		width: 70%;
		float: left;
		padding: 0px;
	}
	.row-fluid.tablet .col-md-8>span {
		display: block;
		float: left;
		margin: 10px 10px 0px 0px;
		font: normal 14px arial;
	}
	.row-fluid.tablet .col-md-4 {
		width: 30%;
		float: left;
		padding: 0px;
	}
	.tablet-hide {
		display: none
	}
	.row.mod-detail .colLft.desktop-hide h2 {
		margin: 15px 0px;
	}
	.row.mod-detail .accordion-heading a {
		font-family: arial;
		font-size: 14px;
		padding: 7px 0px;
	}
}
@media only screen and (min-width:940px) and (max-width:1200px) {
	.humanbuilder .female, .humanbuilder .male  {
		zoom: 80%;
	}
	.humanbuilder .female, .humanbuilder .male  {
		-moz-transform: scale(.8);
		transform-origin: left top 0;
	}
	.female-body {
margin-top: 10px;
}
}
@media only screen and (min-width:890px) and (max-width:939px) {
	.humanbuilder .female, .humanbuilder .male  {
		zoom: 75%;
	}
	.humanbuilder .female, .humanbuilder .male  {
		-moz-transform: scale(.75);
		transform-origin: left top 0;
	}
	.female-body {
	margin-top: 10px;
	}
}
@media only screen and (min-width:820px) and (max-width:889px) {
	.humanbuilder .female, .humanbuilder .male  {
		zoom: 68%;
	}
	.humanbuilder .female, .humanbuilder .male  {
		-moz-transform: scale(.68);
		transform-origin: left top 0;
	}
	.female-body {
	margin-top: 9px;
	}
}
@media only screen and (min-width:767px) and (max-width:819px) {
	.humanbuilder .female, .humanbuilder .male  {
		zoom: 62%;
	}
	.humanbuilder .female, .humanbuilder .male  {
		-moz-transform: scale(.62);
		transform-origin: left top 0;
	}
	.female-body {
	margin-top: 7px;
	}
}
@media only screen and (min-width:600px) and (max-width:766px) {
	.humanbuilder .female, .humanbuilder .male {
		zoom: 100%;
	}
	.humanbuilder .female, .humanbuilder .male {
		-moz-transform: scale(.77);
		-moz-transform-origin: left top 0;
	}
	.female-body {
	margin-top: 12px;
	}
}

@media only screen and (min-width:992px) {
	.krankheit #box>.col-md-4:first-child {
		padding: 0px 15px 0px 0px;
	}
	.krankheit #box>.col-md-4:last-child {
		padding: 0px 0px 0px 15px;
	}
	.krankheit #box>.col-md-4:nth-child(even) {
		padding: 0px 15px;
	}
	.krankheit #box>.col-md-4 {
		padding: 0px;
	}
	.mod.generic5 .row .col-xs-12.col-md-4 {
		width: 33.3333333%;
		padding: 0px 10px 0px 0px;
	}
	.mod.generic5 .row .col-xs-12.col-md-4 img {
		width: 100%
	}
	.mod.generic5 .row .col-xs-12.col-md-8 {
		width: 66.666666%;
		padding: 0px 0px 0px 10px;
	}
	.img-babygallerie .col-md-4:nth-child(3n+1) {
		clear: left;
	}
	#infos-mod .post-box:nth-child(3n+1) {
		clear: left;
	}
	#infos-mod .post-box:nth-child(even) {
		padding: 0px 15px
	}
	.spotlight .carousel-indicators {
		width: 970px;
		padding:0px 30px;
	}
	article.urologie .col-md-3:nth-child(4n+1) {
		clear: left;
	}
}
@media only screen and (min-width:1200px) {
	.spotlight .carousel-indicators {
		width: 1170px;
		padding:0px 30px;
	}
	article.urologie .col-md-3:nth-child(4n+1) {
		clear: left;
	}
	article.urologie .post-box:nth-child(even) {
		padding: 0px 0px 0px 15px;
	}
	article.urologie .post-box:nth-child(2n+1) {
		clear: left;
	}
}
@media only screen and (min-width:767px) {
	.row.urologie{
		margin: 0px;
	}
	section.mod.generic .row.urologie .col-md-6:first-child{
		padding: 0px 0px 0px 0px;
	}
	#drop {
		display: none !important;
	}
	.tx-powermail label {
		/* padding: 8px 15px 0px 0px;
		*/
	}
	.schritt3 fieldset .form-group div.col-sm-10 {
		padding-right: 0px;
		width: 80%;
		font: normal 16px arial;
	}
	.col-md-8.col-sm-8.colrgt.thumb-details.reset-right {
		padding: 0px 0px 0px 0px;
		background: #f2f1ef;
		height: 520px;
	}
	.footermenu, footer.innerpage {
		border-left: 15px solid #fff;
		border-right: 15px solid #fff;
	}
	.datum-bis {
		display: none
	}
	.news-list-view .pagination-centered {
		text-align: left;
		margin: 0px 0px 0px 20%;
		padding: 0px 0px 0px 10px;
	}
	article.mitarbeiter .col-md-3 {
		width: 25%;
		float: left;
	}
	article.mitarbeiter .col-md-3.col-xs-12 {
		width: 25%;
		float: left;
	}
	article.mitarbeiter .col-md-3:nth-child(4n+1) {
		clear: left;
	}
	.inhalt .Kontakt .col-md-3:nth-child(4n+1) {
		clear: left;
	}
}
.jspHorizontalBar {
	display: none !important;
}
html.nav-expanded {
	margin: 0;
	width: auto;
}
#wrapper {
	-webkit-transition: left 0.2s ease-in-out 0s;
	-moz-transition: left 0.2s ease-in-out 0s;
	-o-transition: left 0.2s ease-in-out 0s;
	transition: all 0.2s ease-in-out 0s;
	left: 0;
	position: relative;
	*zoom: 1;
}
#wrapper:after, #wrapper:before {
	display: table;
	content: "";
}
#wrapper:after, .row-fluid.home:after {
	clear: both
}
@media only screen and (max-width:767px) {
	.schritt3 fieldset .form-group label.col-sm-2.media-check{
		display: none
	}
	.row.urologie{
		margin: 0px;
	}
	section.mod.generic .row.urologie .col-md-6:first-child{
		padding: 0px 0px 0px 0px;
		width: 50%;
		float: left;
	}
	section.mod.generic .row.urologie .col-md-6:last-child {
padding: 0px 0px 0px 10px;
width: 50%;
float: left;
}
	article.mitarbeiter.detailpage ul li{
		list-style-type: square;
	}
	.step3_blumenprice, .step3_blumenpatientname {
		display: block;
	}
	section.mod .tab-content.tab-twitter {
		display: none
	}
	.pos-spec.step3_subhead {
		min-height: 150px;
	}
	.mod-details h2 {
		margin: 10px 0px;
		font: normal 20px roboto_slabregular;
		padding-right: 0px;
		word-wrap: break-word;
		overflow: hidden;
	}
	h3.urologie-generic2 {
		font-size: 16px
	}
	.mod.generic .mod-details .data-list .scroll-pane p, .mod.generic .mod-details .scroll-pane p {
	font: normal 13px roboto_slablight;
}
.mod.generic .mod-details .data-list .scroll-pane p.teaser-date, .mod.generic .mod-details .scroll-pane p.teaser-date {
		font:bold 13px roboto_slabbold;
	}
	.galerie .searchalign {
		width: 30%;
	}
	.list-detail.galerie .form-control.datepicker {
		width: 100%
	}
	.nav-expanded nav.navbar-default {
		/* left: -80%;
		width: 80%;
		*/
		left: -252px;
		width: 252px;
		margin: 0;
		bottom: 0;
		background: #f2f1ef;
		border-right: 1px solid #493d34;
		height: 100%;
	}
	.nav-expanded #navbar-collapse-1 {
		position: absolute;
		top: 0;
		bottom: 0;
		right: 0;
		width: auto;
	}
	.nav-expanded .navbar-nav > li {
		border: none;
	}
	.nav-expanded .outerdiv.hdr {
		position: static;
	}
	.nav-expanded #wrapper{
		position: relative;
		/* left: 80%;*/
		left: 252px;
	}
.nav-expanded footer.innerpage {
		position: relative;
	}
	.nav-expanded footer.innerpage.mobilemenu {
		left: 0;
	}
	.nav-expanded nav.navbar-default .container {
		margin-right: 0px;
	}
	.nav-expanded #nav-expander {
		left: 64px;
		position: relative;
		z-index: 99999;
	}
	.desktop-hide .search .text, .desktop-hide .search .btn-search {
		display: none;
	}
	.mob-button {
		display: none;
		cursor: pointer;
	}
	.search-active .desktop-hide .search .btn-search, .search-active .desktop-hide .search .text, .mob-button {
		display: block;
	}
	.search-active .desktop-hide .mob-button {
		position: absolute;
		right: -28px;
		top: 9px;
		width: 22px;
		height: 22px;
		background: url(../images/sprite.png) no-repeat -278px -131px;
		border-radius: 0;
	}
	.search-active .desktop-hide .search .text:hover, .search-active .desktop-hide .search .text:focus, .search-active input#inputText:focus {
		background: #f2f1ef;
		line-height: 33px;
	}
	.search-active .desktop-hide .search .btn-search {
		right: 0;
	}
	.search-active .desktop-hide .search .text {
		margin-left: 0px;
		width: 204px;
		height: 39px;
		padding-right: 0px;
		border-radius: 4px;
	}
	.carousel-control .icon-prev, .carousel-control .glyphicon-chevron-left, .carousel-control .icon-next, .carousel-control .glyphicon-chevron-right {
		margin-top: -35px;
	}
	div.csc-textpic .csc-textpic-imagewrap .csc-textpic-image {
		margin-bottom: 5px;
	}
	.csc-default iframe {
		width: 100% !important;
	}
}
@media only screen and (max-width:450px) {
	.search-active.nav-expanded nav.navbar-default {
		/* top: -15px;
		*/
	}
	.search-active.nav-expanded #nav-expander {
		/* top: 15px;
		*/
	}
	.search-active .mob-search.desktop-hide {
		left: 67px;
	}
	.search-active .mob-search.desktop-hide .text {
		padding-right: 15%;
	}
	.search-active #wrapper {
		/* margin-top: 15px;
		*/
	}
}
.bootstrap-select.btn-group .dropdown-menu.inner, .default-sm.bootstrap-select.btn-group .dropdown-menu {
	min-height: 10px !important;
	z-index: 9999;
	/* min-width: 220px;
	*/
}
.krankheit .default-sm.bootstrap-select.btn-group .dropdown-menu {
	min-width: 100%
}
.downloadcenter .bootstrap-select.btn-group .dropdown-menu.inner {
	min-width: 100%
}
.ui-autocomplete {
	z-index: 301;
}
form .documnets {
	margin-top: 10px;
}
.mitarbeiter.detailpage iframe {
	width: 100%;
}

/* search filter full width start */
.mitarbeiter  .searchalign {
	width: 30%;
	margin: 0px 1% 0px 0px;
}
article .row.mitarbeiter fieldset {
	float: left;
	margin: 0px 1% 0px 0px;
	width: 28%;
}
article .row.mitarbeiter fieldset+fieldset {
	margin-right: 0;
}
.mitarbeiter .btn-primary.btn.mod {
	width: 11%;
	text-align: center;
	float: right;
	padding-left: 0.5%;
	padding-right: 0.5%;
}
article.mitarbeiter .image-gallery .col-md-3 img {
	height: auto;
}
@media only screen and (max-width:767px) {
	.col-md-12.formelement .searchalign {
		width: 78%;
	}
	.mitarbeiter .btn-primary.btn.mod {
		width: 20%;
		padding-left: 7px;
		padding-right: 7px;
	}
	article .row.mitarbeiter fieldset {
		display: none;
	}
}

/* search filter full width end */
@media only screen and (max-width:496px) {
	.search-active .logo {
		opacity: 0;
	}
	.search-active .mob-search {
		width: 66%;
	}
	.search-active .desktop-hide .search .text {
		width: 100%;
	}
	.search-active .logo img {
		height: 40px;
	}
}
@media only screen and (min-width:480px) {
	.img-babygallerie .col-md-4 {
		margin-top: 30px;
	}
	.img-babygallerie .col-md-4:nth-child(3n+1) {
		clear: left;
	}
}
@media only screen and (min-width:1024px) {
	.schritt3 fieldset .form-group label {
		padding: 8px 0px 0px;
		width: 20%;
		font: normal 16px arial;
	}
	section.mod.schritt .col-xs-6.col-md-4 img {
		/* width: 210px;
		height: 210px;
		*/
		width: 100%;
		height: auto;
		max-width: 250px;
	}
	.galerie .searchalign {
		width: 29%;
	}
	.row.mod-detail #accordion2.flexi {
	}
	.row.mod-detail #accordion2 {
		position: absolute;
		bottom: 0px;
		width: 92%;
		right: 8%;
	}
	#gridview .col-md-4.col-sm-4.colLft.mob-hide.reset-left {
		padding: 0px 30px 0px 1px;
	}
	.schritt3 fieldset .form-group label {
		padding: 8px 0px 0px;
		width: 15%;
		font: normal 16px arial;
	}
	.schritt3 fieldset .form-group div.col-sm-10 {
		padding-right: 0px;
		width: 85%;
		font: normal 16px arial;
	}
}
@media only screen and (max-width:960px) and (min-width:768px) {
	.dropdown:last-child .dropdown-submenu > .dropdown-menu {
		right: 100%;
		left: auto;
		margin-left: 0;
		margin-right: -1px;
	}
}

/* @import url('custom-print.css');
*/
/* added by abin for hover effect */
@media print {
}

@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) and (orientation : portrait) { 
/* STYLES GO HERE */ 
	.spotlight .carousel-caption{
		left: 15px ;
	}
	section.mod iframe.twitter-timeline.twitter-timeline-rendered {
		min-width: 1px !important;
		width: 250px !important;
	}
}