    document.addEventListener("DOMContentLoaded", function () {
      // Preloader
      setTimeout(() => {
        const preloader = document.querySelector('.indus-preloader');
        if (preloader) {
          preloader.classList.add('indus-hidden');
          setTimeout(() => { preloader.style.display = 'none'; }, 800);
        }
      }, 3500);

      // Scroll effect
      const header = document.querySelector('.header');
      window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 50);
      });
      if (window.scrollY > 50) header.classList.add('scrolled');

      // Language change helper (waits for Google Translate)
      function changeLanguage(langCode) {
        const tryChange = () => {
          const combo = document.querySelector("select.goog-te-combo");
          if (combo) {
            combo.value = langCode;
            combo.dispatchEvent(new Event("change"));
            return true;
          }
          return false;
        };
        if (!tryChange()) {
          const interval = setInterval(() => {
            if (tryChange()) clearInterval(interval);
          }, 500);
        }
      }

      // Language Selector
      const langItems = document.querySelectorAll(".language-selector .dropdown-item");
      langItems.forEach(item => {
        item.addEventListener("click", function (e) {
          e.preventDefault();
          langItems.forEach(i => i.classList.remove("active"));
          this.classList.add("active");

          const langText = this.textContent.trim();
          const langCode = /العربية/.test(langText) ? "ar" : "en";

          // Update dropdown text
          const toggleSpan = document.querySelector(".language-selector .dropdown-toggle span");
          if (toggleSpan) toggleSpan.textContent = langCode.toUpperCase();

          // Update HTML dir + lang
          document.documentElement.setAttribute("dir", langCode === "ar" ? "rtl" : "ltr");
          document.documentElement.setAttribute("lang", langCode);

          // Trigger Google Translate
          changeLanguage(langCode);
        });
      });
    });



document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector(".mobile-nav-toggle");
  const menu = document.querySelector(".navmenu ul");

  toggleBtn.addEventListener("click", function () {
    menu.classList.toggle("active");

    this.classList.toggle("bi-list");
    this.classList.toggle("bi-x");
  });
});


    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,ar',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
      }, 'google_translate_element');
    }



      document.addEventListener("DOMContentLoaded", function () {
    const heroCarousel = document.querySelector('#carouselExampleSlidesOnly');
    new bootstrap.Carousel(heroCarousel, {
      interval: 5000, // Adjust to your desired slide interval
      ride: 'carousel'
    });
  });



  // FAQ toggle functionality
document.addEventListener('DOMContentLoaded', function() {
  const faqItems = document.querySelectorAll('.faq-item h3');
  
  faqItems.forEach(item => {
    item.addEventListener('click', function() {
      // Toggle active class on parent item
      const parentItem = this.parentElement;
      parentItem.classList.toggle('active');
      
      // Toggle icon between plus and minus
      const icon = this.querySelector('.faq-toggle');
      if (parentItem.classList.contains('active')) {
        icon.classList.remove('bi-plus-lg');
        icon.classList.add('bi-dash-lg');
      } else {
        icon.classList.remove('bi-dash-lg');
        icon.classList.add('bi-plus-lg');
      }
    });
  });
});