/********
 * Get info about the client
 * @author Per-Henrik Kvalnes
 *******************************/

function updatePCInfo()
{
    browser = navigator.appCodeName;
    browser += " "+ navigator.appVersion;
    console.log("setting browser: "+browser);
    inputOS = document.getElementById("browser");
    inputOS.value = browser;

    oscpu = navigator.platform;
    console.log("OS CPU: "+oscpu);
    inputOS = document.getElementById("os");
    inputOS.value = oscpu;

    screenString = window.screen.width;
    screenString += " x "+window.screen.height;
    console.log("Screen: "+screenString);
    inputOS = document.getElementById("screen");
    inputOS.value = screenString;

    flashString = getFlashVersion();
    inputFlash = document.getElementById("flash");
    inputFlash.value = flashString;


    cookieValue = isCookieEnabeled();
    cookie = document.getElementById("cookie");
    cookie.value = cookieValue;
}

// check for cookie 
function isCookieEnabeled()
{
    if(navigator.cookieEnabled)
    {
	return true;
    }
    return false;
}







function getFlashVersion(){
    // ie
    try {
        try {
            // avoid fp6 minor version lookup issues
            // see: http://blog.deconcept.com/2006/01/11/getvariable-setvariable-crash-internet-explorer-flash-6/
            var axo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash.6');
            try { axo.AllowScriptAccess = 'always'; }
            catch(e) { return '6,0,0'; }
        } catch(e) {}
        return new ActiveXObject('ShockwaveFlash.ShockwaveFlash').GetVariable('$version').replace(/\D+/g, ',').match(/^,?(.+),?$/)[1];
	// other browsers
    } catch(e) {
        try {
            if(navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin){
		return (navigator.plugins["Shockwave Flash 2.0"] || navigator.plugins["Shockwave Flash"]).description.replace(/\D+/g, ",").match(/^,?(.+),?$/)[1];
            }
        } catch(e) {}
    }
    return '-';
}

