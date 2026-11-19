# Al Hesabat WordPress fix pack (draft, not installed)
Not applied to the live site. Needs WordPress access.

Install: upload alhesabat-seo-fixes.php to wp-content/mu-plugins/ (create the folder if missing). Before uploading, set AH_PHONE (confirm one number), AH_OG_IMAGE (1200x630 image URL), optionally AH_STREET. Keep AH_REDIRECT_OLD_POSTS false until each old post URL is approved.

Covers: titles, meta descriptions, Open Graph/Twitter, JSON-LD (home), sitemap clean-up (users, templates, form, posts, categories, tags), noindex of old posts/tags/authors, user-name exposure, security headers, "#form" links to /contact/, empty alt text.

Manual in Elementor (cannot be done by code safely):
1. Home: change the second H1 ("Clinical Costing Services UAE ...") to H2.
2. Services: make "Services" an H1; keep one "Internal Controls & Compliance" H2, delete the other six; fix "standardsupport" and "growth.." typos.
3. Contact: make "Contact Us" an H1.
4. Phone and email: make them tel:/mailto: links (after the correct number is confirmed).
5. Footer: decide on the nammasite.in credit link.
6. Home counters show 0+ / 0%: check the animation loads.
7. Arabic pages with hreflang (needs WPML/Polylang or a new Arabic page set and native review).
8. Privacy policy and consent notice (legal check first).
After install: re-test schema in Google's Rich Results Test, then connect Search Console and submit wp-sitemap.xml.

## v1.3 additions
Heading fixes in code (home: one H1; Services and Contact: top heading becomes H1; repeated "Internal Controls & Compliance" headings become plain blocks), typo fixes ("UAE,,", "growth.."), both phone numbers in schema, /llms.txt. Still manual: clickable phone/email, Arabic pages, privacy notice, post redirects (flag AH_REDIRECT_OLD_POSTS), comment spam clean-up, Google Business Profile phone/description.
