<?php
/**
 * Plugin Name: Al Hesabat SEO Fixes (mu-plugin)
 * Description: Meta titles/descriptions, JSON-LD, Open Graph, sitemap clean-up, noindex of off-topic content, security headers, "#form" link and empty-alt fixes. Draft by the Al Hesabat SEO Chief. Install in wp-content/mu-plugins/ after review.
 * Version: 1.2
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* ---- SET THESE BEFORE INSTALLING (confirm with the owner) ---- */
const AH_PHONE        = '+971508212422';
const AH_PHONE_2      = '+971588146414';
const AH_EMAIL        = 'info@alhesabat.ae';
const AH_OG_IMAGE     = '';   // full URL of one 1200x630 branded image (leave empty to skip og:image)
const AH_STREET       = '';   // street address if the owner wants it shown (leave empty to skip)
const AH_REDIRECT_OLD_POSTS = false; // set true only after the owner approves each post URL

function ah_key() {
	if ( is_front_page() ) { return 'home'; }
	if ( is_page( 'about-us' ) ) { return 'about'; }
	if ( is_page( 'services' ) ) { return 'services'; }
	if ( is_page( 'contact' ) ) { return 'contact'; }
	return '';
}
function ah_is_ar() { return 0 === strpos( determine_locale(), 'ar' ); }

function ah_copy() {
	return array(
		'home' => array(
			'en' => array( 'Clinical Costing & Consulting in Abu Dhabi | Al Hesabat', 'Al Hesabat supports DOH-licensed clinics in Abu Dhabi with clinical costing, financial reporting and cost control. Speak with our team about your clinic.' ),
			'ar' => array( 'الحسابات | تكاليف سريرية واستشارات مالية في أبوظبي', 'شريكك في احتساب التكاليف السريرية والاستشارات المالية في أبوظبي: دعم العيادات المرخصة من دائرة الصحة بتقارير دقيقة تساعد على ضبط التكاليف. تواصل معنا.' ),
		),
		'about' => array(
			'en' => array( 'About Al Hesabat | Clinical Costing Partner in Abu Dhabi', 'Learn how Al Hesabat helps clinics and healthcare providers in Abu Dhabi with accurate costing, confidential support and clear financial reporting.' ),
			'ar' => array( 'من نحن | الحسابات للاستشارات المالية والتكاليف السريرية', 'تعرّف على الحسابات وكيف ندعم العيادات ومقدمي الرعاية الصحية في أبوظبي بتكاليف دقيقة ودعم سري وتقارير مالية واضحة.' ),
		),
		'services' => array(
			'en' => array( 'Clinical Costing & Accounting Services, Abu Dhabi | Al Hesabat', 'Clinical costing, DOH submission support, financial performance, VAT compliance support, internal controls and accounting for clinics and businesses in the UAE.' ),
			'ar' => array( 'خدمات التكاليف السريرية والمحاسبة في أبوظبي | الحسابات', 'احتساب التكاليف السريرية ودعم التقديم لدائرة الصحة والأداء المالي ودعم الامتثال لضريبة القيمة المضافة والرقابة الداخلية والمحاسبة للعيادات والشركات في الإمارات.' ),
		),
		'contact' => array(
			'en' => array( 'Contact Al Hesabat | Financial Consulting, Abu Dhabi', 'Contact Al Hesabat in Abu Dhabi to discuss clinical costing and financial consulting for your clinic or business. Call, email or send a message.' ),
			'ar' => array( 'تواصل معنا | الحسابات للاستشارات المالية أبوظبي', 'تواصل مع الحسابات في أبوظبي لمناقشة احتساب التكاليف السريرية والاستشارات المالية لعيادتك أو شركتك. اتصل بنا أو راسلنا.' ),
		),
	);
}
function ah_get( $idx ) {
	$k = ah_key();
	$c = ah_copy();
	if ( ! $k ) { return ''; }
	return $c[ $k ][ ah_is_ar() ? 'ar' : 'en' ][ $idx ];
}

/* Titles */
add_filter( 'pre_get_document_title', function ( $t ) { $x = ah_get( 0 ); return $x ? $x : $t; }, 99 );

/* Head: description, Open Graph, Twitter, JSON-LD */
add_action( 'wp_head', function () {
	$k = ah_key();
	if ( ! $k ) { return; }
	$title = ah_get( 0 ); $desc = ah_get( 1 ); $url = get_permalink();
	if ( is_front_page() ) { $url = home_url( '/' ); }
	echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:type" content="website"><meta property="og:site_name" content="Al Hesabat | الحسابات">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '"><meta property="og:description" content="' . esc_attr( $desc ) . '"><meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta name="twitter:card" content="' . ( AH_OG_IMAGE ? 'summary_large_image' : 'summary' ) . '"><meta name="twitter:title" content="' . esc_attr( $title ) . '"><meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
	if ( AH_OG_IMAGE ) {
		echo '<meta property="og:image" content="' . esc_url( AH_OG_IMAGE ) . '"><meta name="twitter:image" content="' . esc_url( AH_OG_IMAGE ) . '">' . "\n";
	}
	if ( 'home' === $k ) {
		$org = array(
			'@context'  => 'https://schema.org',
			'@type'     => array( 'AccountingService', 'Organization' ),
			'@id'       => home_url( '/#organization' ),
			'name'      => 'Al Hesabat Financial Consulting',
			'alternateName' => 'الحسابات للاستشارات المالية',
			'url'       => home_url( '/' ),
			'email'     => AH_EMAIL,
			'areaServed' => array( '@type' => 'AdministrativeArea', 'name' => 'Abu Dhabi, United Arab Emirates' ),
			'address'   => array_filter( array( '@type' => 'PostalAddress', 'streetAddress' => AH_STREET, 'addressLocality' => 'Abu Dhabi', 'addressCountry' => 'AE' ) ),
			'knowsAbout' => array( 'Clinical costing', 'Healthcare financial reporting', 'UAE VAT compliance support', 'Accounting and bookkeeping' ),
			'hasOfferCatalog' => array( '@type' => 'OfferCatalog', 'name' => 'Services', 'itemListElement' => array_map( function ( $n ) {
				return array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => $n ) );
			}, array( 'Clinical Costing Services', 'Financial Performance Management', 'Accounting & Reporting', 'UAE VAT & Tax Compliance Support', 'Internal Controls & Compliance', 'Clinic Management Solutions' ) ) ),
		);
		$org['telephone'] = array_values( array_filter( array( AH_PHONE, AH_PHONE_2 ) ) );
		if ( AH_OG_IMAGE ) { $org['image'] = AH_OG_IMAGE; }
		echo '<script type="application/ld+json">' . wp_json_encode( $org, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}, 1 );

/* Sitemap clean-up: no users, templates, forms, posts, categories or tags */
add_filter( 'wp_sitemaps_add_provider', function ( $p, $name ) { return 'users' === $name ? false : $p; }, 10, 2 );
add_filter( 'wp_sitemaps_post_types', function ( $t ) { unset( $t['post'], $t['wpr_templates'], $t['metform-form'] ); return $t; } );
add_filter( 'wp_sitemaps_taxonomies', '__return_empty_array' );

/* Noindex off-topic content */
add_filter( 'wp_robots', function ( $r ) {
	if ( is_singular( 'post' ) || is_category() || is_tag() || is_author() || is_date() || is_singular( array( 'wpr_templates', 'metform-form' ) ) ) {
		$r['noindex'] = true; $r['follow'] = true; unset( $r['max-image-preview'] );
	}
	return $r;
} );

/* Old posts and author pages: 301 to Services only when the owner approves (flag above) */
add_action( 'template_redirect', function () {
	if ( AH_REDIRECT_OLD_POSTS && ( is_singular( 'post' ) || is_category() || is_tag() || is_author() ) ) {
		wp_safe_redirect( home_url( '/services/' ), 301 ); exit;
	}
	if ( isset( $_GET['author'] ) && ! is_user_logged_in() ) { wp_safe_redirect( home_url( '/' ), 301 ); exit; }
} );
/* Hide user names from REST for visitors */
add_filter( 'rest_endpoints', function ( $e ) {
	if ( ! is_user_logged_in() ) { unset( $e['/wp/v2/users'], $e['/wp/v2/users/(?P<id>[\d]+)'] ); }
	return $e;
} );

/* Security headers */
add_action( 'send_headers', function () {
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: camera=(), microphone=(), geolocation=()' );
	if ( is_ssl() ) { header( 'Strict-Transport-Security: max-age=31536000' ); }
} );

/* Output fixes: "#form" links -> /contact/, empty alt text, tel/mailto links */
add_action( 'template_redirect', function () {
	if ( is_admin() || is_feed() ) { return; }
	ob_start( function ( $html ) {
		$contact = esc_url( home_url( '/contact/' ) );
		$html = preg_replace( '/href=(["\'])#form\1/i', 'href="' . $contact . '"', $html );
		$html = preg_replace_callback( '/<img\b([^>]*?)>/i', function ( $m ) {
			$tag = $m[0];
			if ( preg_match( '/\balt="[^"]+"/i', $tag ) || preg_match( "/\balt='[^']+'/i", $tag ) ) { return $tag; }
			$src = ''; if ( preg_match( '/\bsrc=(["\'])(.*?)\1/i', $tag, $s ) ) { $src = strtolower( $s[2] ); }
			if ( false !== strpos( $src, 'logo' ) ) { $alt = 'Al Hesabat logo | شعار الحسابات'; }
			elseif ( preg_match( '/doctor|medic|nurse|anatomy|pathology/', $src ) ) { $alt = 'Healthcare professionals reviewing clinical cost data | مختصون صحيون يراجعون بيانات التكاليف السريرية'; }
			elseif ( preg_match( '/tax|return/', $src ) ) { $alt = 'Tax and VAT documents | مستندات الضريبة'; }
			else { $alt = 'Financial analysis and reporting | تحليل مالي وتقارير'; }
			$tag = preg_replace( '/\salt=(?:""|\'\')/i', '', $tag );
			return preg_replace( '/<img\b/i', '<img alt="' . esc_attr( $alt ) . '"', $tag, 1 );
		}, $html );
		return $html;
	} );
}, 0 );
