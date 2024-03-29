"use strict";

var themeOptionArr = {
	typography: "poppins",
	version: "light",
	layout: "vertical",
	primary: "color_1",
	headerBg: "color_1",
	navheaderBg: "color_1",
	sidebarBg: "color_1",
	sidebarStyle: "full",
	sidebarPosition: "fixed",
	headerPosition: "fixed",
	containerLayout: "full"
};

(function ($) {
  "use strict";

  //var direction =  getUrlParams('dir');
  var theme = getUrlParams("theme");

  /* Dz Theme Demo Settings  */

  var dlabThemeSet0 = {
    /* Default Theme */ typography: "poppins",
	version: "light",
	layout: "vertical",
	primary: "color_1",
	headerBg: "color_1",
	navheaderBg: "color_1",
	sidebarBg: "color_1",
	sidebarStyle: "full",
	sidebarPosition: "fixed",
	headerPosition: "fixed",
	containerLayout: "full"
  };

  var dlabThemeSet1 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_12",
    headerBg: "color_1",
    navheaderBg: "color_12",
    sidebarBg: "color_12",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "full",
  };

  var dlabThemeSet2 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_9",
    headerBg: "color_1",
    navheaderBg: "color_9",
    sidebarBg: "color_9",
    sidebarStyle: "mini",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "full",
  };

  var dlabThemeSet3 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_6",
    headerBg: "color_6",
    navheaderBg: "color_1",
    sidebarBg: "color_1",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "full",
  };

  var dlabThemeSet4 = {
    typography: "poppins",
    version: "light",
    layout: "horizontal",
    primary: "color_5",
    headerBg: "color_1",
    navheaderBg: "color_1",
    sidebarBg: "color_5",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "full",
  };

  var dlabThemeSet5 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_8",
    headerBg: "color_1",
    navheaderBg: "color_8",
    sidebarBg: "color_8",
    sidebarStyle: "full",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "full",
  };
  var dlabThemeSet6 = {
    typography: "poppins",
    version: "light",
    layout: "vertical",
    primary: "color_13",
    headerBg: "color_1",
    navheaderBg: "color_13",
    sidebarBg: "color_13",
    sidebarStyle: "compact",
    sidebarPosition: "fixed",
    headerPosition: "fixed",
    containerLayout: "full",
  };

  /*  set switcher option start  */
  function getElementAttrs(el) {
    return [].slice.call(el.attributes).map((attr) => {
      return {
        name: attr.name,
        value: attr.value,
      };
    });
  }

  function handleSetThemeOption(item, index, arr) {
    var attrName = item.name.replace("data-", "").replace("-", "_");

    if (
      attrName === "sidebarbg" ||
      attrName === "primary" ||
      attrName === "nav_headerbg" ||
      attrName === "headerbg"
    ) {
      if (item.value === "color_1") {
        return false;
      }

      var attrNameColor = attrName.replace("bg", "");
      console.log(attrNameColor);
      document.getElementById(attrNameColor + "_" + item.value).checked = true;
    } else if (
      attrName === "sidebar_style" ||
      attrName === "sidebar_position" ||
      attrName === "header_position" ||
      attrName === "typography" ||
      attrName === "theme_version"
    ) {
      if (
        item.value === "cairo" ||
        item.value === "full" ||
        item.value === "fixed" ||
        item.value === "light"
      ) {
        return false;
      }
      document.getElementById(attrName).value = item.value;
    } else if (attrName === "layout") {
      if (item.value === "vertical") {
        return false;
      }
      document.getElementById("theme_layout").value = item.value;
    } else if (attrName === "container") {
      if (item.value === "wide") {
        return false;
      }
      document.getElementById("container_layout").value = item.value;
    }
    $(".default-select").selectpicker("refresh");
  }

  /* / set switcher option end / */

  function themeChange(theme) {
    var themeSettings = {};
    themeSettings = eval("dlabThemeSet" + theme);
    dlabSettingsOptions = themeSettings; /* For Screen Resize */
    new dlabSettings(themeSettings);

    setThemeInCookie(themeSettings);
  }

  function setThemeInCookie(themeSettings) {
    //console.log(themeSettings);
    jQuery.each(themeSettings, function (optionKey, optionValue) {
      setCookie(optionKey, optionValue);
    });
  }

  function setThemeLogo() {
    var logo = getCookie("logo_src");

    var logo2 = getCookie("logo_src2");

    if (logo != "") {
      jQuery(".nav-header .logo-abbr").attr("src", logo);
    }

    if (logo2 != "") {
      jQuery(".nav-header .logo-compact, .nav-header .brand-title").attr(
        "src",
        logo2
      );
    }
  }

  function setThemeOptionOnPage() {
    if (getCookie("version") != "light") {
      jQuery.each(themeOptionArr, function (optionKey, optionValue) {
        var optionData = getCookie(optionKey);
        themeOptionArr[optionKey] =
          optionData != "" ? optionData : dlabSettingsOptions[optionKey];
      });
      //console.log(themeOptionArr);
      dlabSettingsOptions = themeOptionArr;
      new dlabSettings(dlabSettingsOptions);

      setThemeLogo();
    }
  }

})(jQuery);
