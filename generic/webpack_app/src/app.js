if (!global._babelPolyfill) {
	require('babel-polyfill');
}

class CookieConsent {

    constructor() {
    
    }

  hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
  }

  openHorizontalTabContent(evt, tabName) {

    let i, tabcontent, tablinks;
    let active = false;
    let drawer = false;

    if (this.hasClass(evt.currentTarget,"active")) {

        active = true;
    }

    if (this.hasClass(evt.currentTarget.parentNode,"tab") && active) {

        return;
    }

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        if (evt.currentTarget.dataset.rel == tablinks[i].dataset.rel) {

            if (active) {

                tablinks[i].className = tablinks[i].className.replace(" active", "");

            } else {

                tablinks[i].className += " active";
            }

        } else {

            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
    }

    if (active) {

        document.getElementById(tabName).style.display = "none";

    } else {

        document.getElementById(tabName).style.display = "block";
    }
    

    }


openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("verticaltabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("verticaltablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}



    toggleCookieDialogDetails(evt,detailsId) {

        let el = evt.currentTarget;

        if (el.innerHTML == "Details zeigen") {
            el.innerHTML = "Details ausblenden";
            document.getElementById(detailsId).style.display = "block";
        } else {
            el.innerHTML = "Details zeigen";
            document.getElementById(detailsId).style.display = "none";
            document.getElementById("CookieDescription").style.display = "none";
            document.getElementById("GeneralCookieIntroduction").style.display = "none";

        }

    } 
}

(function() {

lenscapades_cookie_consent.consent = new CookieConsent();

  let lang = document.documentElement.lang;

  
  console.log(lenscapades_cookie_consent.loader.hasResponse);
  console.log(lang);

  //return 
  fetch(lenscapades_cookie_consent.params.ajax_url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
    },
    body: 'action=consent_dialog&language=' + lang
  }).then(function(res) {
    return res.text();
  }).then(function(html) {

    let s = document.body.lastChild;
    let el = document.createElement('div');
    el.setAttribute("id","LenscapadesCookieDialog");
    el.innerHTML += html;
    s.parentNode.insertBefore(el, s);

    //document.body.innerHTML += html;
    
    document
        .getElementById("LenscapadesCookieDialogBodyLevelDetailsButton")
        .addEventListener("click", function (event){
            lenscapades_cookie_consent.consent.toggleCookieDialogDetails(event, 'LenscapadesCookieDialogDetails') 
        });

    document.getElementById("dialogTab1").addEventListener("click", function (event){
        lenscapades_cookie_consent.consent.openHorizontalTabContent(event, 'cookieDescription') 
    });
    document.getElementById("dialogTab2").addEventListener("click", function (event){
        lenscapades_cookie_consent.consent.openHorizontalTabContent(event, 'generalCookieIntroduction') 
    });

    document.getElementById("dialogDrawer1").addEventListener("click", function (event){
        lenscapades_cookie_consent.consent.openHorizontalTabContent(event, 'cookieDescription');
        let el = document.getElementById("LenscapadesCookieDialog");
        el.scrollTo(0, el.scrollHeight); 
    });
    document.getElementById("dialogDrawer2").addEventListener("click", function (event){
        lenscapades_cookie_consent.consent.openHorizontalTabContent(event, 'generalCookieIntroduction');
      let el = document.getElementById("LenscapadesCookieDialog");
      el.scrollTo(0, el.scrollHeight);  
    });

    document.getElementById("dialogVTab1").addEventListener("click", function (event) {
        lenscapades_cookie_consent.consent.openCity(event, 'Necessary') 
    });
    document.getElementById("dialogVTab2").addEventListener("click", function (event) {
        lenscapades_cookie_consent.consent.openCity(event, 'Preferences') 
    });
    document.getElementById("dialogVTab3").addEventListener("click", function (event) {
        lenscapades_cookie_consent.consent.openCity(event, 'Statistics') 
    });
    document.getElementById("dialogVTab4").addEventListener("click", function (event) {
        lenscapades_cookie_consent.consent.openCity(event, 'Marketing') 
    });

    document.getElementById("dialogVTab1").click();

    let w = window.innerWidth;
  
    if (w>1024) {

        document.getElementById("dialogTab1").click();

    } else {

        document.getElementById("LenscapadesCookieDialogDetails").style.display = "block";
    }

    window.addEventListener("resize", function() {

        
        let cl = document.querySelectorAll('.switch');
        for (let i = 0; i < cl.length; i++) {
            let event = new MouseEvent('click', {
                view: window,
                bubbles: true,
                cancelable: true
              });
            cl[i].dispatchEvent(event);
            let event2 = new MouseEvent('click', {
                view: window,
                bubbles: true,
                cancelable: true
              });
            cl[i].dispatchEvent(event2);
        }

      let w = window.innerWidth;
        
      if (w>1024) {
  
          let tablinks = document.getElementsByClassName("tablinks");
          for (let i = 0; i < tablinks.length; i++) {
  
              if (lenscapades_cookie_consent.consent.hasClass(tablinks[i],"active")) {
  
                  return;
              }
          }
      
          document.getElementById("dialogTab1").click();
          
        } else {

            document.getElementById("LenscapadesCookieDialogDetails").style.display = "block";
      }

      let el = document.getElementById("LenscapadesCookieDialog");
      el.scrollTo(0, el.scrollHeight);  
    });
  
  });


})();