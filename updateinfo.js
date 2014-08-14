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
    inputOS.disabled = true;

    oscpu = navigator.oscpu;
    console.log("OS CPU: "+oscpu);
    inputOS = document.getElementById("os");
    inputOS.value = oscpu;
    inputOS.disabled = true;
}
