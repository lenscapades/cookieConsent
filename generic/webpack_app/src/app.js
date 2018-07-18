class CookieConsent {

  cname = 'CookieConsent';

  constructor() {
    
  }

  getCookie() {
    var name = this.cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
  }

  getCookieData() {

    let value = this.getCookie();

    if ( value != "" ) {

      let data = value.split(":");

      this.id = data[0];
      this.necessary = data[1];
      this.preferences = data[2];
      this.statistics = data[3];
      this.marketing = data[4];
      this.consented = data[5];
      this.declined = data[6];
      this.hasResponse = data[7];
      this.doNotTrack = data[8];
    }
  }

  openHorizontalTabContent(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
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

}

document.addEventListener("DOMContentLoaded", function(event){

  let lang = document.documentElement.lang;

  let consent = new CookieConsent();

  consent.getCookieData();
  
  console.log(consent.hasResponse);
  console.log(lang);

  return fetch(ajax_params.ajax_url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
    },
    body: 'action=consent_dialog&language=' + lang
  }).then(function(res) {
    return res.text();
  }).then(function(html) {
    document.body.innerHTML += html;

    document.getElementById("dialogTab1").addEventListener("click", function (event){
      consent.openHorizontalTabContent(event, 'cookieDescription') 
    });
    document.getElementById("dialogTab2").addEventListener("click", function (event){
      consent.openHorizontalTabContent(event, 'generalCookieIntroduction') 
    });

    document.getElementById("dialogVTab1").addEventListener("click", function (event) {
      consent.openCity(event, 'Necessary') 
    });
    document.getElementById("dialogVTab2").addEventListener("click", function (event) {
      consent.openCity(event, 'Preferences') 
    });
    document.getElementById("dialogVTab3").addEventListener("click", function (event) {
      consent.openCity(event, 'Statistics') 
    });
    document.getElementById("dialogVTab4").addEventListener("click", function (event) {
      consent.openCity(event, 'Marketing') 
    });

    document.getElementById("dialogVTab1").click();

    document.getElementById("dialogTab1").click();

  });
  
});
