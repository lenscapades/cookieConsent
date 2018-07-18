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
}

document.addEventListener("DOMContentLoaded", function(event){

  let lang = document.documentElement.lang;

  let consent = new CookieConsent();

  consent.getCookieData();
  
  console.log(consent.id);
  console.log(lang);
  
});
