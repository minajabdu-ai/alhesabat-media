# Al Hesabat: approved SEO changes (approved 22 Nov 2026)
Status: APPROVED WORDING, NOT YET APPLIED. Whoever has WordPress access applies these. Arabic still needs a native speaker's check.

## 1. Services page title
- EN: Clinical Costing & Accounting Services | Al Hesabat
- AR: خدمات التكاليف السريرية والمحاسبة | الحسابات

## 2. Home page JSON-LD (paste in site header; check first that none exists)
```html
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"AccountingService",
"name":"Al Hesabat Financial Consulting","url":"https://alhesabat.ae/",
"telephone":["+971588146414","+971508212422"],"email":"info@alhesabat.ae",
"areaServed":"Abu Dhabi","sameAs":["https://www.instagram.com/alhesabatfc/"]}
</script>
```
Add street address and opening hours only after they are confirmed.

## 3. Open Graph (home). Needs an approved 1200x630 image for og:image
```html
<meta property="og:title" content="Clinical Costing & Consulting in Abu Dhabi | Al Hesabat">
<meta property="og:description" content="Al Hesabat supports DOH-licensed clinics in Abu Dhabi with clinical costing, financial reporting and cost control. Speak with our team about your clinic.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://alhesabat.ae/">
<meta name="twitter:card" content="summary_large_image">
```

## 4. Google Business Profile description (owner publishes)
- AR: الحسابات شركة استشارات مالية في أبوظبي، تدعم العيادات المرخّصة من دائرة الصحة في احتساب التكاليف السريرية والتقارير المالية وضبط التكاليف. تواصل معنا لمناقشة احتياجات عيادتك.
- EN: Al Hesabat is an Abu Dhabi financial consulting firm supporting DOH-licensed clinics with clinical costing, financial reporting and cost control. Contact us to discuss your clinic's needs.

## 5. Connect measurement (owner signs in)
Add alhesabat.ae in Search Console, then connect the Google account in OpenSEO > Search performance. Repeat for GA4 on the Integrations page.

## Still to verify once WebFetch is allowed for alhesabat.ae
JSON-LD present, OG tags, links (#, instagram.com/@, phone without +971), wp-sitemap.xml entries.
