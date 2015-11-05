<?php

// ----------------------------------------------------------------------- //
// Open Web Analytics Tracker
//
// Copyright 20015 Fx NION. All rights reserved.
//
// Licensed under GPL v2.0 http://www.gnu.org/copyleft/gpl.html
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
// ----------------------------------------------------------------------  //

// ensures that mediawiki is the only entry point.
if ( ! defined( 'MEDIAWIKI' ) ) {
	exit;
}
 
// $wgOwaSiteId is used to overide the default site_id that OWA
// will append to all tracking requests.This is handy if you want
// to aggregate stats for more than one wiki under the same site_id

$wgOwaSiteId = false;

$wgHooks['SkinAfterBottomScripts'][] = 'owa_onSkinAfterBottomScripts';


function owa_onSkinAfterBottomScripts( Skin $skin, &$text = '' ) {
    global $wgOwaSiteId;
    
    if ($wgOwaSiteId) {
    $text.= "    
<!-- Start Open Web Analytics Tracker -->
<script type=\"text/javascript\">
//<![CDATA[
var owa_baseUrl = 'https://stats.afnor.org/owa_admin/';
var owa_cmds = owa_cmds || [];
owa_cmds.push(['setSiteId', '".$wgOwaSiteId."']);
owa_cmds.push(['trackPageView']);
owa_cmds.push(['trackClicks']);
owa_cmds.push(['trackDomStream']);

(function() {
	var _owa = document.createElement('script'); _owa.type = 'text/javascript'; _owa.async = true;
	owa_baseUrl = ('https:' == document.location.protocol ? window.owa_baseSecUrl || owa_baseUrl.replace(/http:/, 'https:') : owa_baseUrl );
	_owa.src = owa_baseUrl + 'modules/base/js/owa.tracker-combined-min.js';
	var _owa_s = document.getElementsByTagName('script')[0]; _owa_s.parentNode.insertBefore(_owa, _owa_s);
}());
//]]>
</script>
<!-- End Open Web Analytics Code -->
";
    }
		return true;
}
