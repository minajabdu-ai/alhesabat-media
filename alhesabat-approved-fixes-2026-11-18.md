# Al Hesabat: approved fixes for the web person (18 Nov 2026)

Approved by the owner on 18 Nov 2026. Arabic lines need a native-speaker check before going live. No prices, no promised results, no unverified DOH or tax dates.

## 1. Meta titles and descriptions

| Page | Lang | Title | Description |
|---|---|---|---|
| Home | AR | التكاليف السريرية والاستشارات المالية في أبوظبي | الحسابات | الحسابات تدعم العيادات والشركات في أبوظبي في احتساب التكاليف السريرية والامتثال لمتطلبات دائرة الصحة والضريبة والمحاسبة والتدقيق. تواصل معنا اليوم. |
| Home | EN | Clinical Costing & Financial Consulting | Al Hesabat | Al Hesabat helps clinics and businesses in Abu Dhabi with clinical costing, DOH compliance support, VAT, accounting and audit. Contact us today. |
| About | AR | من نحن | الحسابات للاستشارات المالية أبوظبي | تعرّف على الحسابات، شريكك في الاستشارات المالية واحتساب التكاليف السريرية في أبوظبي للعيادات والصيدليات والشركات في الإمارات. |
| About | EN | About Al Hesabat | Financial Consulting Abu Dhabi | Learn about Al Hesabat, an Abu Dhabi financial consulting and clinical costing partner for clinics, pharmacies and growing businesses across the UAE. |
| Services | AR | خدمات التكاليف السريرية والضريبة والتدقيق | الحسابات | دعم احتساب التكاليف السريرية، والضريبة والقيمة المضافة، والمحاسبة والتدقيق وتحسين التكاليف للعيادات والشركات في أبوظبي والعين والظفرة. |
| Services | EN | Clinical Costing, VAT & Audit Services | Al Hesabat | Clinical costing support, VAT and tax compliance, accounting, audit and cost optimisation for clinics and businesses in Abu Dhabi, Al Ain and Al Dhafra. |
| Contact | AR | تواصل مع الحسابات | استشارات مالية أبوظبي | تواصل مع الحسابات في أبوظبي للتكاليف السريرية والمحاسبة والضريبة والاستشارات المالية. اتصل بنا أو راسلنا لمناقشة احتياجاتك. |
| Contact | EN | Contact Al Hesabat | Financial Consulting Abu Dhabi | Contact Al Hesabat in Abu Dhabi for clinical costing, accounting, VAT and financial consulting. Call or message us to discuss your needs. |

How: in the SEO plugin (Yoast or Rank Math), set the SEO title and meta description per page. English pages use the EN pair until the Arabic pages exist.

## 2. Headings

- Home: keep "Strategic Financial & Clinical Costing Partner in Abu Dhabi, UAE" as the only H1. Change "Clinical Costing Services UAE (DOH Abu Dhabi Compliance Support)" to H2.
- Services: add one H1. AR: خدمات التكاليف السريرية والمحاسبة والتدقيق في أبوظبي. EN: Clinical Costing, Accounting & Audit Services in Abu Dhabi.
- Contact: add one H1. AR: تواصل مع الحسابات. EN: Contact Al Hesabat.
- About: make the "About Us" H2 above the H1 a small label, not a heading.

## 3. Search Console and GA4 (owner action)

Sign in to OpenSEO, open the Al Hesabat project, and connect the Google account on the Search Performance and Integrations pages. Confirm the property is sc-domain:alhesabat.ae and the GA4 property is the right one.

## 4. Posts and sitemap

- Move to Draft (restorable from Trash): the 6 software-template posts (cybersecurity, blockchain, software performance, open source, developer skills, software projects).
- Move to Draft: the 6 motivational-quote posts (/779-2/, "Opportunities don't happen", "Success is the sum of small efforts", "A real entrepreneur", "I have not failed", "A successful man", both versions). If Google has indexed the software posts, 301 them to /services/.
- Noindex all tag archives (they duplicate the category titles) and /metform-form/simple-contact-form-1/.
- Remove from the sitemap: /author/Info@alhesabat.ae/ (404, exposes the login-style name) and the 7 ?wpr_templates= URLs.
- Then re-run the crawl.

## 5. JSON-LD for the home page header

Add your street address and opening hours only after you confirm them.

```json
{"@context":"https://schema.org","@type":"AccountingService","name":"Al Hesabat Financial Consulting","alternateName":"الحسابات للاستشارات المالية","url":"https://alhesabat.ae/","telephone":["+971588146414","+971508212422"],"email":"info@alhesabat.ae","areaServed":["Abu Dhabi","Al Ain","Al Dhafra"],"address":{"@type":"PostalAddress","addressLocality":"Abu Dhabi","addressCountry":"AE"},"sameAs":["https://www.instagram.com/alhesabatfc/"]}
```

Test it with Google's Rich Results Test after pasting, then send the result back for the next Monday report.
