if (!global._babelPolyfill) {
	require('babel-polyfill');
}

class ScriptLoader {
  constructor(src) {
    this.src = src;
    this.isLoaded = false;
  }
  run() {
      if (!this.isLoaded) {
        const script = document.createElement("script");
        script.src = this.src;
        const el = document.querySelector("head");
        el.appendChild(script);
        script.addEventListener('load', () => {
          this.isLoaded = true;
        });
      }
    }
}

class DialogPresenter {
  show() {
    let showTimer = setInterval(function(){
      if (lenscapades_cookie_consent.loader.isLoaded) {
        clearInterval(showTimer);
      }
    } ,10);
    let el = document.getElementById("LenscapadesCookieDialog");
    if (el) {
      el.style.display = "block";
    } 
  }
  hide() {
    let hideTimer = setInterval(function(){
      if (lenscapades_cookie_consent.loader.isLoaded) {
        clearInterval(hideTimer);
      }
    } ,10);
    let el = document.getElementById("LenscapadesCookieDialog");
    if (el) {
      el.style.display = "none";
    } 
  }
}

class CookieManager {
  constructor(name) {
    this.name = name;
  }

  getCookieName() {
    return this.name;
  }

  getCookie() {
      let name = this.getCookieName() + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for(let i = 0; i <ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }

  get() {
    let value = this.getCookie();
    if (value != "") {
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

lenscapades_cookie_consent.loader = new ScriptLoader(lenscapades_cookie_consent.params.script_url);
lenscapades_cookie_consent.presenter = new DialogPresenter();
lenscapades_cookie_consent.cookie = new CookieManager(lenscapades_cookie_consent.params.cookie_name);


document.addEventListener("DOMContentLoaded", function(event) {

  let renewConsent = document.getElementById("renewConsent");

  if (renewConsent) {
    renewConsent.addEventListener("click", function (event){
      lenscapades_cookie_consent.loader.run();
      lenscapades_cookie_consent.presenter.show();     
    });
  }

  let withdrawConsent = document.getElementById("withdrawConsent");

  if (withdrawConsent) {
    withdrawConsent.addEventListener("click", function (event){
      lenscapades_cookie_consent.loader.run();
      lenscapades_cookie_consent.presenter.hide();
    });
  }

  lenscapades_cookie_consent.cookie.get();
  if (lenscapades_cookie_consent.cookie.hasResponse != 1) {
    lenscapades_cookie_consent.loader.run();
    lenscapades_cookie_consent.presenter.show();
  }

});