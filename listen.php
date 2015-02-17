<html class=" -webkit-"><head><meta charset="UTF-8">
<head>
<style media="" data-href="/assets/reset/normalize.css">article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}audio,canvas,video{display:inline-block}audio:not([controls]){display:none;height:0}[hidden]{display:none}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}a:focus{outline:thin dotted}a:active,a:hover{outline:0}h1{font-size:2em;margin:0.67em 0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}mark{background:#ff0;color:#000}code,kbd,pre,samp{font-family:monospace, serif;font-size:1em}pre{white-space:pre-wrap}q{quotes:"\201C" "\201D" "\2018" "\2019"}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:0}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}button,input,select,textarea{font-family:inherit;font-size:100%;margin:0}button,input{line-height:normal}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}textarea{overflow:auto;vertical-align:top}table{border-collapse:collapse;border-spacing:0}
</style><script src="/assets/libs/prefixfree.min.js"></script>
      <script style="display: none !important;">      function getSafeJS(js) {        js = js.replace(/location(s+)?=/mi, '');        js = js.replace(/top.location.+=('|")/mi, '');        js = js.replace(/location.replace/mi, '');        js = js.replace(/window(s+)?\[(s+)?("|')l/mi, '');        js = js.replace(/self(s+)?\[(s+)?("|')loc/mi, '');        return js;      }      _ogEval        = window.eval;      window.eval    = function(text) {_ogEval(getSafeJS(text));};      window.innerWidth = window.outerWidth; // Fixes browser bug with it innerWidth reports 0      window.innerHeight = window.outerHeight; // Fixes browser bug with it innerHeight reports 0      </script>
 <link type="text/css" href="skin/jplayer.blue.monday.css" rel="stylesheet" />
  <script type="text/javascript" src="js/jquery.min.js"></script>

 <title>Radio</title>
</head>
<style>body{
  font-family:"Ubuntu";
  background: white; 
  overflow: hidden;
}

.player{
  position:relative;
  width:430px;
  height:240px;
  margin:0 40px;
}

.player > .top-pane{
  position:absolute;
  right:65px;
  top:5px;
  z-index:10;
}

.top-pane > a{
  display:inline-block;
  text-decoration:none;
  color:#000;
  -webkit-font-smoothing:subpixel-antialiased;
  transition:color 420ms;
  margin:5px;
  /* Err i am a lil bit too sleepy i guess */
}

.top-pane > a:hover{
  color:#f0690b;
}

.player > .body{
  background:#fff;
  position:relative;
  width:350px;
  padding:10px;
  height:220px;
  border-radius:8px;
  box-shadow:0px 4px 10px -4px rgba(0,0,0,0.6);
}

.player > .volume{
  width:40px;
  height:200px;
  top:20px;
  z-index:0;
  left:-40px;
  position:absolute;
  background:#fff;
  box-shadow:0px 4px 10px -4px rgba(0,0,0,0.6);
  border-top-left-radius:8px;
  border-bottom-left-radius:8px;
}

.volume > h2{
  color:#bababa;
  display:block;
  text-align:left;
  margin:0px;
  font-size:18px;
  padding:5px 0px 5px 12px;
  -webkit-transform:scaleX(-1.0);
}
.volume > h2:hover{
  color:#f0690b;
}
.volume > ul{
  padding:0px 2px 0px 10px;
  margin:0px;
  height:114px;
  list-style:none;
  display:block;
  -webkit-transform:scaleX(-1.0);
}
.listvol{
  position:relative;
  display:display;
  margin:5px 0px;
  height:4px;
  border-radius:3px;
  background:#ccc;
}

.listvol::before,.listvol::after{
  content:' ';
  position:absolute;
  top:-5px;
  height:5px;
  width:100%;
  display:block;  
}
.listvol::after{
  top:10px;
}
.listvol > .filler{
  display:block;
  background:#f0690b;
  border-radius:3px;
  height:100%;
  width:0%;
  transition:width 100ms;
}

.listvol:hover > .filler,.listvol:hover ~ .listvol > .filler{
  width:100%;
}

.listvol:nth-of-type(1){
  width:80%;
}
.listvol:nth-of-type(2){
  width:74%;  
}
.listvol:nth-of-type(3){
  width:68%;  
}
.listvol:nth-of-type(4){
  width:62%;
}
.listvol:nth-of-type(5){
  width:56%;
}
.listvol:nth-of-type(6){
  width:51%;
}
.listvol:nth-of-type(7){
  width:45%;
}
.listvol:nth-of-type(8){
  width:39%;  
}
.listvol:nth-of-type(9){
  width:33%;
}
.listvol:nth-of-type(10){
  width:27%;
}
.listvol:nth-of-type(11){
  width:21%;
}
.listvol:nth-of-type(12){
  width:15%;  
}
.listvol:nth-of-type(13){
  width:9%;
}



div.lower{
  border-top:1px solid #eee;
}

.volume > input{
  position:absolute;
  clip:rect(0,0,0,0);
}

#mute{
  line-height:24px;
  -webkit-user-select:none;
  text-align:center;
  font-size:12px;
  display:block;
  cursor:pointer;
  color:#ccc;
}

input:checked ~ #mute{
  color:#f0690b;
}


.listvol.level .filler,.listvol.level ~ .listvol .filler{
  width:100%;
}

input:checked ~ ul .listvol > .filler,input:checked ~ ul .listvol.level ~ .listvol > .filler{
  width:0%;
}

.body > .details{
  height:155px;
  margin:10px 10px;
}
#albumart{
   padding:5px;
   width:108px;
   height:108px;
   float:left;
   margin-right:10px;
   border:1px solid #ccc;
   border-radius:4px;
   background:#f4f4f4;
}
#songDetail{
   position:relative;
   top:5px; 
}
h1,h2{
  font-weight:400;
}
h3 {
  font-weight:300;
}
h4 {
	 font-weight:300;
	font-size: 10pt;
	margin-top: -15px;
	margin-left: 15px;
}

#play-pause{
  width:50px;
  line-height:50px;
  padding:0px;
  margin:1px;
  border:0px;
  display:block;
  position:relative;
  z-index:10;
  border-radius:40px;
  background:#fff;
  color:#000;
  text-indent:2px;
  transition:all 600ms;
  font-family:FontAwesome;
}

#play-pause:hover{
  color:#f0690b;
  transition:all 200ms;
}
#play-pause:active{
  box-shadow:inset 0px 0px 6px rgba(100,100,100,0.3);
}

#play-pause[data-state=stopped]::before{
  content:'\f04b';
}
#play-pause[date-state=playing]{
  text-indent:-2px;
}
#play-pause[data-state=playing]::before{
  content:'\f04d';
}

/* PS ... > is less exhaustive then " " */
.lower > .crazy-line{
  margin:-1px;
  border-top:1px solid #f0690b;
  width:0%;
  transition:800ms;

}
.loaded .lower > .crazy-line{
  width:100%;
}

.meter{
    overflow:hidden;
    position:relative;
    background:#eee;
    width:52px;
    height:52px;
    margin:-26px auto;
    border-radius:50px;
}

.meter > .filler{
  transition:200ms;
  transition-delay:160ms;
  position:absolute;
  border-radius:40px;
  height:52px;
  background:#f0690b;
}

.loaded .meter > .filler{
  width:52px;
}</style></head><body style="">
<style media="" data-href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">/*!
 *  Font Awesome 3.0.2
 *  the iconic font designed for use with Twitter Bootstrap
 *  -------------------------------------------------------
 *  The full suite of pictographic icons, examples, and documentation
 *  can be found at: http://fortawesome.github.com/Font-Awesome/
 *
 *  License
 *  -------------------------------------------------------
 *  - The Font Awesome font is licensed under the SIL Open Font License - http://scripts.sil.org/OFL
 *  - Font Awesome CSS, LESS, and SASS files are licensed under the MIT License -
 *    http://opensource.org/licenses/mit-license.html
 *  - The Font Awesome pictograms are licensed under the CC BY 3.0 License - http://creativecommons.org/licenses/by/3.0/
 *  - Attribution is no longer required in Font Awesome 3.0, but much appreciated:
 *    "Font Awesome by Dave Gandy - http://fortawesome.github.com/Font-Awesome"

 *  Contact
 *  -------------------------------------------------------
 *  Email: dave@davegandy.com
 *  Twitter: http://twitter.com/fortaweso_me
 *  Work: Lead Product Designer @ http://kyruus.com
 */
@font-face{
  font-family:'FontAwesome';
  src:url("http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/../font/fontawesome-webfont.eot?v=3.0.2");
  src:url("http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/../font/fontawesome-webfont.eot?#iefix&v=3.0.2") format('embedded-opentype'),
  url("http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/../font/fontawesome-webfont.woff?v=3.0.2") format('woff'),
  url("http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/../font/fontawesome-webfont.ttf?v=3.0.2") format('truetype');
  font-weight:normal;
  font-style:normal }
[class^="icon-"],[class*=" icon-"]{font-family:FontAwesome;font-weight:normal;font-style:normal;text-decoration:inherit;-webkit-font-smoothing:antialiased;display:inline;width:auto;height:auto;line-height:normal;vertical-align:baseline;background-image:none;background-position:0 0;background-repeat:repeat;margin-top:0}.icon-white,.nav-pills>.active>a>[class^="icon-"],.nav-pills>.active>a>[class*=" icon-"],.nav-list>.active>a>[class^="icon-"],.nav-list>.active>a>[class*=" icon-"],.navbar-inverse .nav>.active>a>[class^="icon-"],.navbar-inverse .nav>.active>a>[class*=" icon-"],.dropdown-menu>li>a:hover>[class^="icon-"],.dropdown-menu>li>a:hover>[class*=" icon-"],.dropdown-menu>.active>a>[class^="icon-"],.dropdown-menu>.active>a>[class*=" icon-"],.dropdown-submenu:hover>a>[class^="icon-"],.dropdown-submenu:hover>a>[class*=" icon-"]{background-image:none}[class^="icon-"]:before,[class*=" icon-"]:before{text-decoration:inherit;display:inline-block;speak:none}a [class^="icon-"],a [class*=" icon-"]{display:inline-block}.icon-large:before{vertical-align:-10%;font-size:1.3333333333333333em}.btn [class^="icon-"],.nav [class^="icon-"],.btn [class*=" icon-"],.nav [class*=" icon-"]{display:inline}.btn [class^="icon-"].icon-large,.nav [class^="icon-"].icon-large,.btn [class*=" icon-"].icon-large,.nav [class*=" icon-"].icon-large{line-height:.9em}.btn [class^="icon-"].icon-spin,.nav [class^="icon-"].icon-spin,.btn [class*=" icon-"].icon-spin,.nav [class*=" icon-"].icon-spin{display:inline-block}.nav-tabs [class^="icon-"],.nav-pills [class^="icon-"],.nav-tabs [class*=" icon-"],.nav-pills [class*=" icon-"],.nav-tabs [class^="icon-"].icon-large,.nav-pills [class^="icon-"].icon-large,.nav-tabs [class*=" icon-"].icon-large,.nav-pills [class*=" icon-"].icon-large{line-height:.9em}li [class^="icon-"],.nav li [class^="icon-"],li [class*=" icon-"],.nav li [class*=" icon-"]{display:inline-block;width:1.25em;text-align:center}li [class^="icon-"].icon-large,.nav li [class^="icon-"].icon-large,li [class*=" icon-"].icon-large,.nav li [class*=" icon-"].icon-large{width:1.5625em}ul.icons{list-style-type:none;text-indent:-0.75em}ul.icons li [class^="icon-"],ul.icons li [class*=" icon-"]{width:.75em}.icon-muted{color:#eee}.icon-border{border:solid 1px #eee;padding:.2em .25em .15em;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.icon-2x{font-size:2em}.icon-2x.icon-border{border-width:2px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.icon-3x{font-size:3em}.icon-3x.icon-border{border-width:3px;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px}.icon-4x{font-size:4em}.icon-4x.icon-border{border-width:4px;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px}.pull-right{float:right}.pull-left{float:left}[class^="icon-"].pull-left,[class*=" icon-"].pull-left{margin-right:.3em}[class^="icon-"].pull-right,[class*=" icon-"].pull-right{margin-left:.3em}.btn [class^="icon-"].pull-left.icon-2x,.btn [class*=" icon-"].pull-left.icon-2x,.btn [class^="icon-"].pull-right.icon-2x,.btn [class*=" icon-"].pull-right.icon-2x{margin-top:.18em}.btn [class^="icon-"].icon-spin.icon-large,.btn [class*=" icon-"].icon-spin.icon-large{line-height:.8em}.btn.btn-small [class^="icon-"].pull-left.icon-2x,.btn.btn-small [class*=" icon-"].pull-left.icon-2x,.btn.btn-small [class^="icon-"].pull-right.icon-2x,.btn.btn-small [class*=" icon-"].pull-right.icon-2x{margin-top:.25em}.btn.btn-large [class^="icon-"],.btn.btn-large [class*=" icon-"]{margin-top:0}.btn.btn-large [class^="icon-"].pull-left.icon-2x,.btn.btn-large [class*=" icon-"].pull-left.icon-2x,.btn.btn-large [class^="icon-"].pull-right.icon-2x,.btn.btn-large [class*=" icon-"].pull-right.icon-2x{margin-top:.05em}.btn.btn-large [class^="icon-"].pull-left.icon-2x,.btn.btn-large [class*=" icon-"].pull-left.icon-2x{margin-right:.2em}.btn.btn-large [class^="icon-"].pull-right.icon-2x,.btn.btn-large [class*=" icon-"].pull-right.icon-2x{margin-left:.2em}.icon-spin{display:inline-block;-moz-animation:spin 2s infinite linear;-o-animation:spin 2s infinite linear;-webkit-animation:spin 2s infinite linear;-webkit-animation:spin 2s infinite linear}@-moz-keyframes spin{0%{-moz-transform:rotate(0deg)}100%{-moz-transform:rotate(359deg)}}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0deg)}100%{-webkit-transform:rotate(359deg)}}@-o-keyframes spin{0%{-o-transform:rotate(0deg)}100%{-o-transform:rotate(359deg)}}@-ms-keyframes spin{0%{-ms-transform:rotate(0deg)}100%{-ms-transform:rotate(359deg)}}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0deg)}100%{-webkit-transform:rotate(359deg)}}@-moz-document url-prefix(){.icon-spin{height:.9em}.btn .icon-spin{height:auto}.icon-spin.icon-large{height:1.25em}.btn .icon-spin.icon-large{height:.75em}}.icon-glass:before{content:"\f000"}.icon-music:before{content:"\f001"}.icon-search:before{content:"\f002"}.icon-envelope:before{content:"\f003"}.icon-heart:before{content:"\f004"}.icon-star:before{content:"\f005"}.icon-star-empty:before{content:"\f006"}.icon-user:before{content:"\f007"}.icon-film:before{content:"\f008"}.icon-th-large:before{content:"\f009"}.icon-th:before{content:"\f00a"}.icon-th-list:before{content:"\f00b"}.icon-ok:before{content:"\f00c"}.icon-remove:before{content:"\f00d"}.icon-zoom-in:before{content:"\f00e"}.icon-zoom-out:before{content:"\f010"}.icon-off:before{content:"\f011"}.icon-signal:before{content:"\f012"}.icon-cog:before{content:"\f013"}.icon-trash:before{content:"\f014"}.icon-home:before{content:"\f015"}.icon-file:before{content:"\f016"}.icon-time:before{content:"\f017"}.icon-road:before{content:"\f018"}.icon-download-alt:before{content:"\f019"}.icon-download:before{content:"\f01a"}.icon-upload:before{content:"\f01b"}.icon-inbox:before{content:"\f01c"}.icon-play-circle:before{content:"\f01d"}.icon-repeat:before{content:"\f01e"}.icon-refresh:before{content:"\f021"}.icon-list-alt:before{content:"\f022"}.icon-lock:before{content:"\f023"}.icon-flag:before{content:"\f024"}.icon-headphones:before{content:"\f025"}.icon-volume-off:before{content:"\f026"}.icon-volume-down:before{content:"\f027"}.icon-volume-up:before{content:"\f028"}.icon-qrcode:before{content:"\f029"}.icon-barcode:before{content:"\f02a"}.icon-tag:before{content:"\f02b"}.icon-tags:before{content:"\f02c"}.icon-book:before{content:"\f02d"}.icon-bookmark:before{content:"\f02e"}.icon-print:before{content:"\f02f"}.icon-camera:before{content:"\f030"}.icon-font:before{content:"\f031"}.icon-bold:before{content:"\f032"}.icon-italic:before{content:"\f033"}.icon-text-height:before{content:"\f034"}.icon-text-width:before{content:"\f035"}.icon-align-left:before{content:"\f036"}.icon-align-center:before{content:"\f037"}.icon-align-right:before{content:"\f038"}.icon-align-justify:before{content:"\f039"}.icon-list:before{content:"\f03a"}.icon-indent-left:before{content:"\f03b"}.icon-indent-right:before{content:"\f03c"}.icon-facetime-video:before{content:"\f03d"}.icon-picture:before{content:"\f03e"}.icon-pencil:before{content:"\f040"}.icon-map-marker:before{content:"\f041"}.icon-adjust:before{content:"\f042"}.icon-tint:before{content:"\f043"}.icon-edit:before{content:"\f044"}.icon-share:before{content:"\f045"}.icon-check:before{content:"\f046"}.icon-move:before{content:"\f047"}.icon-step-backward:before{content:"\f048"}.icon-fast-backward:before{content:"\f049"}.icon-backward:before{content:"\f04a"}.icon-play:before{content:"\f04b"}.icon-pause:before{content:"\f04c"}.icon-stop:before{content:"\f04d"}.icon-forward:before{content:"\f04e"}.icon-fast-forward:before{content:"\f050"}.icon-step-forward:before{content:"\f051"}.icon-eject:before{content:"\f052"}.icon-chevron-left:before{content:"\f053"}.icon-chevron-right:before{content:"\f054"}.icon-plus-sign:before{content:"\f055"}.icon-minus-sign:before{content:"\f056"}.icon-remove-sign:before{content:"\f057"}.icon-ok-sign:before{content:"\f058"}.icon-question-sign:before{content:"\f059"}.icon-info-sign:before{content:"\f05a"}.icon-screenshot:before{content:"\f05b"}.icon-remove-circle:before{content:"\f05c"}.icon-ok-circle:before{content:"\f05d"}.icon-ban-circle:before{content:"\f05e"}.icon-arrow-left:before{content:"\f060"}.icon-arrow-right:before{content:"\f061"}.icon-arrow-up:before{content:"\f062"}.icon-arrow-down:before{content:"\f063"}.icon-share-alt:before{content:"\f064"}.icon-resize-full:before{content:"\f065"}.icon-resize-small:before{content:"\f066"}.icon-plus:before{content:"\f067"}.icon-minus:before{content:"\f068"}.icon-asterisk:before{content:"\f069"}.icon-exclamation-sign:before{content:"\f06a"}.icon-gift:before{content:"\f06b"}.icon-leaf:before{content:"\f06c"}.icon-fire:before{content:"\f06d"}.icon-eye-open:before{content:"\f06e"}.icon-eye-close:before{content:"\f070"}.icon-warning-sign:before{content:"\f071"}.icon-plane:before{content:"\f072"}.icon-calendar:before{content:"\f073"}.icon-random:before{content:"\f074"}.icon-comment:before{content:"\f075"}.icon-magnet:before{content:"\f076"}.icon-chevron-up:before{content:"\f077"}.icon-chevron-down:before{content:"\f078"}.icon-retweet:before{content:"\f079"}.icon-shopping-cart:before{content:"\f07a"}.icon-folder-close:before{content:"\f07b"}.icon-folder-open:before{content:"\f07c"}.icon-resize-vertical:before{content:"\f07d"}.icon-resize-horizontal:before{content:"\f07e"}.icon-bar-chart:before{content:"\f080"}.icon-twitter-sign:before{content:"\f081"}.icon-facebook-sign:before{content:"\f082"}.icon-camera-retro:before{content:"\f083"}.icon-key:before{content:"\f084"}.icon-cogs:before{content:"\f085"}.icon-comments:before{content:"\f086"}.icon-thumbs-up:before{content:"\f087"}.icon-thumbs-down:before{content:"\f088"}.icon-star-half:before{content:"\f089"}.icon-heart-empty:before{content:"\f08a"}.icon-signout:before{content:"\f08b"}.icon-linkedin-sign:before{content:"\f08c"}.icon-pushpin:before{content:"\f08d"}.icon-external-link:before{content:"\f08e"}.icon-signin:before{content:"\f090"}.icon-trophy:before{content:"\f091"}.icon-github-sign:before{content:"\f092"}.icon-upload-alt:before{content:"\f093"}.icon-lemon:before{content:"\f094"}.icon-phone:before{content:"\f095"}.icon-check-empty:before{content:"\f096"}.icon-bookmark-empty:before{content:"\f097"}.icon-phone-sign:before{content:"\f098"}.icon-twitter:before{content:"\f099"}.icon-facebook:before{content:"\f09a"}.icon-github:before{content:"\f09b"}.icon-unlock:before{content:"\f09c"}.icon-credit-card:before{content:"\f09d"}.icon-rss:before{content:"\f09e"}.icon-hdd:before{content:"\f0a0"}.icon-bullhorn:before{content:"\f0a1"}.icon-bell:before{content:"\f0a2"}.icon-certificate:before{content:"\f0a3"}.icon-hand-right:before{content:"\f0a4"}.icon-hand-left:before{content:"\f0a5"}.icon-hand-up:before{content:"\f0a6"}.icon-hand-down:before{content:"\f0a7"}.icon-circle-arrow-left:before{content:"\f0a8"}.icon-circle-arrow-right:before{content:"\f0a9"}.icon-circle-arrow-up:before{content:"\f0aa"}.icon-circle-arrow-down:before{content:"\f0ab"}.icon-globe:before{content:"\f0ac"}.icon-wrench:before{content:"\f0ad"}.icon-tasks:before{content:"\f0ae"}.icon-filter:before{content:"\f0b0"}.icon-briefcase:before{content:"\f0b1"}.icon-fullscreen:before{content:"\f0b2"}.icon-group:before{content:"\f0c0"}.icon-link:before{content:"\f0c1"}.icon-cloud:before{content:"\f0c2"}.icon-beaker:before{content:"\f0c3"}.icon-cut:before{content:"\f0c4"}.icon-copy:before{content:"\f0c5"}.icon-paper-clip:before{content:"\f0c6"}.icon-save:before{content:"\f0c7"}.icon-sign-blank:before{content:"\f0c8"}.icon-reorder:before{content:"\f0c9"}.icon-list-ul:before{content:"\f0ca"}.icon-list-ol:before{content:"\f0cb"}.icon-strikethrough:before{content:"\f0cc"}.icon-underline:before{content:"\f0cd"}.icon-table:before{content:"\f0ce"}.icon-magic:before{content:"\f0d0"}.icon-truck:before{content:"\f0d1"}.icon-pinterest:before{content:"\f0d2"}.icon-pinterest-sign:before{content:"\f0d3"}.icon-google-plus-sign:before{content:"\f0d4"}.icon-google-plus:before{content:"\f0d5"}.icon-money:before{content:"\f0d6"}.icon-caret-down:before{content:"\f0d7"}.icon-caret-up:before{content:"\f0d8"}.icon-caret-left:before{content:"\f0d9"}.icon-caret-right:before{content:"\f0da"}.icon-columns:before{content:"\f0db"}.icon-sort:before{content:"\f0dc"}.icon-sort-down:before{content:"\f0dd"}.icon-sort-up:before{content:"\f0de"}.icon-envelope-alt:before{content:"\f0e0"}.icon-linkedin:before{content:"\f0e1"}.icon-undo:before{content:"\f0e2"}.icon-legal:before{content:"\f0e3"}.icon-dashboard:before{content:"\f0e4"}.icon-comment-alt:before{content:"\f0e5"}.icon-comments-alt:before{content:"\f0e6"}.icon-bolt:before{content:"\f0e7"}.icon-sitemap:before{content:"\f0e8"}.icon-umbrella:before{content:"\f0e9"}.icon-paste:before{content:"\f0ea"}.icon-lightbulb:before{content:"\f0eb"}.icon-exchange:before{content:"\f0ec"}.icon-cloud-download:before{content:"\f0ed"}.icon-cloud-upload:before{content:"\f0ee"}.icon-user-md:before{content:"\f0f0"}.icon-stethoscope:before{content:"\f0f1"}.icon-suitcase:before{content:"\f0f2"}.icon-bell-alt:before{content:"\f0f3"}.icon-coffee:before{content:"\f0f4"}.icon-food:before{content:"\f0f5"}.icon-file-alt:before{content:"\f0f6"}.icon-building:before{content:"\f0f7"}.icon-hospital:before{content:"\f0f8"}.icon-ambulance:before{content:"\f0f9"}.icon-medkit:before{content:"\f0fa"}.icon-fighter-jet:before{content:"\f0fb"}.icon-beer:before{content:"\f0fc"}.icon-h-sign:before{content:"\f0fd"}.icon-plus-sign-alt:before{content:"\f0fe"}.icon-double-angle-left:before{content:"\f100"}.icon-double-angle-right:before{content:"\f101"}.icon-double-angle-up:before{content:"\f102"}.icon-double-angle-down:before{content:"\f103"}.icon-angle-left:before{content:"\f104"}.icon-angle-right:before{content:"\f105"}.icon-angle-up:before{content:"\f106"}.icon-angle-down:before{content:"\f107"}.icon-desktop:before{content:"\f108"}.icon-laptop:before{content:"\f109"}.icon-tablet:before{content:"\f10a"}.icon-mobile-phone:before{content:"\f10b"}.icon-circle-blank:before{content:"\f10c"}.icon-quote-left:before{content:"\f10d"}.icon-quote-right:before{content:"\f10e"}.icon-spinner:before{content:"\f110"}.icon-circle:before{content:"\f111"}.icon-reply:before{content:"\f112"}.icon-github-alt:before{content:"\f113"}.icon-folder-close-alt:before{content:"\f114"}.icon-folder-open-alt:before{content:"\f115"}</style>
<link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic" rel="stylesheet" type="text/css" data-inprogress="">

<div class="player loaded">
  <div class="top-pane">
  <!--  <a href="/share" class="icon-plus"></a> -->
    <a  onclick="location.reload();" class="icon-refresh"></a>
  </div>
  <div class="volume">
      <input id="mute-control" type="checkbox">
      <h2 id="volume_up" class="icon-volume-up"></h2>
      <ul>
        <li class="listvol" vol-index="100.00"><div class="filler"></div></li>
        <li class="listvol level" vol-index="93.31"><div class="filler"></div></li>
        <li class="listvol" vol-index="86.62"><div class="filler"></div></li>
        <li class="listvol" vol-index="79.92"><div class="filler"></div></li>
        <li class="listvol" vol-index="73.23"><div class="filler"></div></li>
        <li class="listvol" vol-index="66.54"><div class="filler"></div></li>
        <li class="listvol" vol-index="59.85"><div class="filler"></div></li>
        <li class="listvol" vol-index="53.15"><div class="filler"></div></li>
        <li class="listvol" vol-index="46.46"><div class="filler"></div></li>
        <li class="listvol" vol-index="39.77"><div class="filler"></div></li>
        <li class="listvol" vol-index="33.08"><div class="filler"></div></li>
        <li class="listvol" vol-index="26.38"><div class="filler"></div></li>
        <li class="listvol" vol-index="19.69"><div class="filler"></div></li>
      </ul>
      <h2 id="volume_down" class="icon-volume-down"></h2>
      <div class="lower"></div>
      <label for="mute-control" id="mute">Mute</label>
  </div>
  <div class="body">
    <div class="clearfix details">
<?php
	include 'php/db.php';
	include 'php/logged.php';
	
	$id = (isset($_GET['radio'])) ? ($_GET['radio']) : $_SESSION['id'];
	$sql = mysql_query("SELECT * FROM user_login WHERE username LIKE '$id'");
	$info = mysql_fetch_array($sql);
	
	$rid = $info['id'];	
	echo "<script> var rid = $rid; </script>";
		
    echo  '<img id="albumart" src="propic/'.$info['propic'].'">';
    echo  '<div id="songDetail">
        <h2 id="song"> '.$id.' Radio</h2>';
		
	$sql = mysql_query("SELECT * FROM user_broadcast WHERE userid = $rid");
	 if( mysql_num_rows($sql) < 1 )
		echo '<h3 id="artist"> Offline</h3>';
	  else
		echo '<h3 id="artist"> Loading.. </h3>';

?>
        
		<h4 id="stream-name">  </h4>
      </div>
    </div>
    <div class="lower">
      <div class="crazy-line"></div>
      <div id="metter" class="meter">
        <div class="filler"></div>
        <button data-state="playing" id="play-pause">
        </button>
      </div>
    </div>
  </div>
</div>


<div style="display: none;">
  <div id="jp1" class="jp-jplayer"></div>
  <div id="jp_container_1" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
          </ul>
        </div>
      </div>
      <div class="jp-title">
        <ul>
          <li>Bubble</li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
  
  <div id="jp2" class="jp-jplayer"></div>
  <div id="jp_container_2" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
          </ul>
        </div>
      </div>
      <div class="jp-title">
        <ul>
          <li>Bubble</li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
 
</div> 

 <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
 
<script>var player = document.getElementsByClassName("player")[0],
button = document.getElementById("play-pause"),
mute_chk = document.getElementById("mute-control"),
mute_label = document.getElementById("mute"),
levels = document.getElementsByClassName("listvol"),
volume_up = document.getElementById("volume_up"),
volume_down = document.getElementById("volume_down"),
playing = true,levels_cont = document.getElementsByTagName("ul")[0],
song = document.getElementById("song"),
artist = document.getElementById("artist"),
img = document.getElementById("albumart"),
last_song = '';

var maxvol = 1;
var curvol = 0.001;

function volumeHandler(){
  var vol = +this.getAttribute("vol-index");
	radio.jPlayer("volume",  vol/100);
	maxvol = vol/100;
  var cur_act = this.parentNode.querySelector(".level");
  if( cur_act )
    cur_act.className = cur_act.className.replace(/ level/gi,'');
  this.className += ' level';
  
    maxvol = radio.jPlayer("option", "volume");
  mute_chk.checked = false;
}

var delta = (100/levels.length - 1),
val = 100;
volume_up.addEventListener("click",function(e){
  if( (  radio.jPlayer("option", "volume") + (delta / 100 )) < 1.0 ){
    radio.jPlayer("volume", radio.jPlayer("option", "volume") + (delta/100) );
    var curr_ele = levels_cont.querySelector(".level"),
        nxt_ele = curr_ele?curr_ele.previousElementSibling:null;
    if( nxt_ele ){
      curr_ele.className = curr_ele.className.replace( / level/gi, '' );
      nxt_ele.className += ' level';
    }else{
      levels[levels.length - 1].className += " level";
    }
  }else{
    radio.jPlayer("volume", 1.0);
  }
  
   mute_chk.checked = false;
  maxvol = radio.jPlayer("option", "volume");
});
volume_down.addEventListener("click",function(e){
  console.log ( radio.jPlayer("option", "volume") );
  if( (radio.jPlayer("option", "volume") - (delta / 100 )) > 0 ){
     radio.jPlayer("volume",radio.jPlayer("option", "volume") - (delta/100) );
   var curr_ele = levels_cont.querySelector(".level"),
        nxt_ele = curr_ele?curr_ele.nextElementSibling:null;
    if( curr_ele )
      curr_ele.className = curr_ele.className.replace(/ level/gi,'');
    if( nxt_ele )
      nxt_ele.className += ' level'; 
  }else{
    radio.jPlayer("volume", 0);
    mute_chk.checked = true;
  }
  
  maxvol = radio.jPlayer("option", "volume");
});

Array.prototype.forEach.call( levels, function( element ){
  element.setAttribute( "vol-index", val.toFixed(2) );
  element.addEventListener( "mousedown", volumeHandler );
  val -= delta;
});

mute_label.addEventListener( "click", function( e ){
  if( mute_chk.checked ) {
	radio.jPlayer("volume", curvol);
	maxvol = curvol;
 }
  else {
	radio.jPlayer("option", "volume");
	radio.jPlayer("volume", 0); curvol = maxvol; maxvol = 0; 
  }
	
});

button.addEventListener("click",function(e){
  if( !playing ){
    player.className += ' loaded';
    button.setAttribute("data-state",'playing');
    //audio.play();
  }else{
	window.close();
    player.className = player.className.replace(/ loaded/gi,'');
    button.setAttribute("data-state",'stopped');
    
  //  audio.pause();
  }
  playing = !playing;
});

 
  	var link;
	var id = null;
	var seek = 1;
	var link2;
	var songg;
	var seek2;
  var radio = 'nick';
  
  $(document).ready(function(){
    $("#jp2").jPlayer("option", "cssSelectorAncestor", "#jp_container_2"); // Set the cssSelector for the play method.
	
	var url='_getstream.php?uid=' + rid;
	
	$.getJSON(url, function(data) {
	   link = data[0].url;
	   seek = data[0].seek;
	   id = data[0].id;
	   console.log("Loaded p1: " + data[0].song);
	   
	   $("#stream-name").text( data[0].song );
      $("#jp1").jPlayer({  errorAlerts: false, ready: function () {  $(this).jPlayer("setMedia", {   mp3: link }); }, swfPath: "/js", supplied: "mp3" });
      $("#jp1").jPlayer("play");
	  console.log($("#jp1").data("jPlayer").status.paused)
     //  $("#jp1").bind($.jPlayer.event.ended + ".repeat", function() {   $(this).jPlayer("play"); });
	   	
  });
		
	  
 });
	
	$("#jp1").bind($.jPlayer.event.loadeddata, function(event) { 
	  var per = (seek / $("#jp1").data("jPlayer").status.duration)*100;
	      $("#jp1").jPlayer("play");
	 	   
	   var inv = setInterval( function() {
		if(  $("#jp1").data("jPlayer").status.currentTime > seek+1 )
			{ func(); clearInterval(inv); }
		}, 1000 );
		
	   
	  
	});
	
	
function func() {
		      id++;
	  url='_getstream.php?uid='+rid+'&id='+ id;
	   
	  $.getJSON(url, function(data) {
	   
	   link1 = data[0].url;
	   id = data[0].id;
	   console.log("Loaded p2: " + data[0].song );
	   songg = data[0].song;
	   
	   $("#jp2").jPlayer({ errorAlerts: false, ready: function () { $(this).jPlayer("setMedia", {  mp3: link1 }); }, swfPath: "/js", supplied: "mp3", cssSelectorAncestor: "#jp_container_2"  });
    });
		timer();
	  	$("#jp1").unbind($.jPlayer.event.loadeddata );
}

	
	var radio = $('#jp1');
	var sw = 0;
	var vol = maxvol;
	var ratio = vol/10;
	var ini, blur;
	id++;
	
function timer() {
	
	$("#artist").text("Streaming");
	var nlink;
	var flag = 0;
	var trans = 0;
	var ltime;
	
	
	setInterval(function() {

 	
      if( radio.data("jPlayer").status.paused || (( radio.data("jPlayer").status.currentTime > radio.data("jPlayer").status.duration - 5 ) && radio.data("jPlayer").status.duration != 0 ) )
      {		
			if( radio.data("jPlayer").status.paused && (radio.data("jPlayer").status.duration - ltime) > 20 ) {

				var per = ( (ltime-2) / radio.data("jPlayer").status.duration )*100;

				radio.jPlayer("play", ltime);
			}
			else {
					
				ini = radio;
				console.log("Swap; " + ini.data("jPlayer").status.currentTime);
	
				if( sw%2 == 0 )
			 	 { console.log("PLayer2");
					radio = $("#jp2");
				}
				else
				{ console.log("PLayer1");
					radio = $("#jp1");
				}
				sw++;
				
				radio.jPlayer("volume", maxvol/4);
				radio.jPlayer("play");
				
				//console.log(radio);
				vol = maxvol;
				trans = 1;
				ratio = maxvol/10;
				
				setTimeout( function() {
					
					ini.jPlayer("destroy");
					$("#stream-name").text( songg );
						
					id++;
					var url='_getstream.php?uid='+rid+'&id='+ id;
			
					$.getJSON(url, function(data) {
						nlink = data[0].url;
						songg = data[0].song;
						flag = 1;
						id = data[0].id;
						
						ini.jPlayer({ errorAlerts: false, ready: function () {  $(this).jPlayer("setMedia", {   mp3: nlink }); }, swfPath: "/js", supplied: "mp3" });
						$("#jp2").jPlayer("option", "cssSelectorAncestor", "#jp_container_2"); // Set the cssSelector for the play method.
						flag = 0;
					
						console.log("Next: " + songg);
					});

				}, 5000);

			}	
	  
	  }
	  
	 if( trans == 1 ) 
	 {
					  console.log(ini.data("jPlayer").status.currentTime);
				
					  vol = vol - ratio; 
					  radio.jPlayer("volume", maxvol-vol); 
					  ini.jPlayer("volume", vol); 
					  if(vol <= 0) { clearInterval(blur); vol = maxvol; trans = 0;}
	 }
	 
	 if( radio.data("jPlayer").status.currentTime != 0 )
		ltime = radio.data("jPlayer").status.currentTime;
	
	//radio.jPlayer("play");
	
}, 500);

}



  </script>
</body></html>