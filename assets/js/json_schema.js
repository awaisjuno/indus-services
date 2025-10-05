document.addEventListener('DOMContentLoaded', function() {
    const jsonLdData = {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Indus Services",
        "url": "https://www.indusservices.ae",
        "logo": "https://www.indusservices.ae/logo.png", 
        "description": "Indus Services offers home cleaning, pest control, moving, storage, plumbing, electrical, handyman, AC maintenance, and more in Abu Dhabi and Dubai.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Musaffah - M38",
            "addressLocality": "Abu Dhabi",
            "addressRegion": "Abu Dhabi",
            "postalCode": "NA",
            "addressCountry": "AE"
        },
        "telephone": "+971 2 558 4651",
        "sameAs": [
            "https://www.facebook.com/indusservices",
            "https://www.twitter.com/indusservices",
            "https://www.instagram.com/indusservices"
        ],
        "services": [
            {
                "@type": "Service",
                "serviceType": "Cleaning & Pest Control",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Maid Service (Hourly)",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Deep Cleaning",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Sofa Cleaning",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Carpet Cleaning",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Moving & Storage",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Plumbing",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Electrical Services",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Handyman Services",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "AC Maintenance & Cleaning",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            },
            {
                "@type": "Service",
                "serviceType": "Appliance Repair & Installation",
                "offers": {
                    "@type": "Offer",
                    "priceCurrency": "AED",
                    "price": "Contact for Quote"
                }
            }
        ]
    };

    const script = document.createElement('script');
    script.type = 'application/ld+json';
    script.textContent = JSON.stringify(jsonLdData);
    
    document.head.appendChild(script);
});
