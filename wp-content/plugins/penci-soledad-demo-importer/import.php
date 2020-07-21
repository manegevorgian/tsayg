<?php
/**
 * Register one click import demo data
 */


add_filter( 'penci_soledad_demo_packages', 'penci_soledad_addons_import_register' );

function penci_soledad_addons_import_register() {
	$demo_listing = array(
		'default' => 'Default',
		'adventure-blog' => 'Adventure Blog',
		'animal-news' => 'Animal News',
		'architecture' => 'Architecture',
		'art-artist-blog' => 'Art Artist Blog',
		'art-magazine' => 'Art Magazine',
		'baby' => 'Baby',
		'beauty' => 'Beauty',
		'beauty-blog2' => 'Beauty Blog 2',
		'bitcoin-news' => 'Bitcoin News',
		'book' => 'Book',
		'breaking-news' => 'Breaking News',
		'business-magazine' => 'Business Magazine',
		'business-news' => 'Business News',
		'cars' => 'Cars',
		'charity' => 'Charity',
		'classic' => 'Classic',
		'coffee-blog' => 'Coffee Blog',
		'construction' => 'Construction',
		'cosmetic-blog' => 'Cosmetic Blog',
		'craft-diy-blog2' => 'Craft DIY Blog 2',
		'craft-diy' => 'Craft Diy',
		'dark-version' => 'Dark Version',
		'designers-blog' => 'Designers Blog',
		'education-news' => 'Education News',
		'elegant-blog' => 'Elegant Blog',
		'entertainment' => 'Entertainment',
		'environment-charity-blog' => 'Environment Charity Blog',
		'factory-news' => 'Factory News',
		'fashion-blog2' => 'Fashion Blog 2',
		'fashion-lifestyle' => 'Fashion Lifestyle',
		'fashion-magazine' => 'Fashion Magazine',
		'fashion-magazine2' => 'Fashion Magazine 2',
		'fitness' => 'Fitness',
		'fitness-blog' => 'Fitness Blog',
		'food' => 'Food',
		'food-blog2' => 'Food Blog 2',
		'food-news' => 'Food News',
		'gardening-blog' => 'Gardening Blog',
		'gardening-magazine' => 'Gardening Magazine',
		'game' => 'Game',
		'game-blog' => 'Game Blog',
		'hair-stylist-blog' => 'Hair Stylist Blog',
		'hair-style-magazine' => 'Hair Style Magazine',
		'health-medical' => 'Health Medical',
		'healthy-clean-eating-blog' => 'Healthy Clean Eating Blog',
		'hipster' => 'Hipster',
		'interior-design-blog' => 'Interior Design Blog',
		'interior-design-magazine' => 'Interior Design Magazine',
		'lawyers-blog' => 'Lawyears Blog',
		'magazine' => 'Magazine',
		'men-health-magazine' => 'Men Health Magazine',
		'minimal-simple-magazine' => 'Minimal Simple Magazine',
		'movie' => 'Movie',
		'old-fashioned-blog' => 'Old Fashioned Blog',
		'pet' => 'Pet',
		'pet-blog' => 'Pet Blog',
		'photographer' => 'Photographer',
		'photography-blog' => 'Photography Blog',
		'photography-magazine' => 'Photography Magazine',
		'radio-blog' => 'Radio Blog',
		'seo-blog' => 'SEO Blog',
		'science-news' => 'Science News',
		'seo-magazine' => 'Seo Magazine',
		'simple' => 'Simple',
		'spa-blog' => 'Spa Blog',
		'sport' => 'Sport',
		'sport-2' => 'Sport 2',
		'stylist-blog' => 'Stylist Blog',
		'tech-news' => 'Tech News',
		'technology' => 'Technology',
		'technology-blog2' => 'Technology Blog 2',
		'time-magazine' => 'Time Magazine',
		'travel' => 'Travel',
		'travel-blog2' => 'Travel Blog 2',
		'travel-blog3' => 'Travel Blog 3',
		'travel-guide-magazine' => 'Travel Guide Magazine',
		'travel-magazine' => 'Travel Magazine',
		'vegan-magazine' => 'Vegan Magazine',
		'video' => 'Video',
		'video-dark' => 'Video Dark',
		'videos-blog' => 'Videos Blog',
		'vintage-blog' => 'Vintage Blog',
		'viral' => 'Viral',
		'wedding' => 'Wedding',
		'music' => 'Music',
		'beauty-blog3' => 'Beauty Blog 3',
		'book-magazine' => 'Book Magazine',
		'car-blog' => 'Car Blog',
		'coding-blog' => 'Coding Blog',
		'colorful-magazine' => 'Clorfull Magazine',
		'dentist-blog' => 'Dentist Blog',
		'design-magazine' => 'Design Magazine',
		'fashion-blog3' => 'Fashion Blog 3',
		'freelancer-blog' => 'Freelancer Blog',
		'game-magazine' => 'Game Magazine',
		'handmade-blog' => 'Handmade Blog',
		'ios-tips-mag' => 'IOS Tips Magazine',
		'motorcycle-blog' => 'Motorcycle Blog',
		'musicband-blog' => 'Musicband Blog',
		'painter-blog' => 'Painter Blog',
		'software-tips-blog' => 'Software Tips Blog',
		'transport-blog' => 'Transport Blog',
		'vertical-nav' => 'Vertical Nav',
		'vertical-nav-dark' => 'Vertical Nav Dark',
		'video-blog2' => 'Video Blog 2',


		'01-lifestyle-news-2sb'        => 'Lifestyle News Two Sidebars',
		'02-travel-news-2sb'           => 'Travel News Two Sidebars',
		'03-fashion-news-2sb'          => 'Fashion News Two Sidebars',
		'04-food-news-2sb'             => 'Food News Two Sidebars',
		'05-game-news-2sb'             => 'Game News Two Sidebars',
		'06-fitness-news-2sb'          => 'Fitness News Two Sidebars',
		'07-beauty-cosmetics-news-2sb' => 'Beauty & Cosmetics News',
		'08-travel-agency-mul'         => 'Travel Agency  Multi-purpose',
		'09-spa-wellness-mul'          => 'Spa & Wellness Center  Multi-purpose',
		'10-business-mul'              => 'Business Multi-purpose',
		'11-restaurant-mul'            => 'Restaurant Multi-purpose',
		'12-fitness-center-mul'        => 'Fitness Center Multi-purpose',
		'13-barber-shop-mul'           => 'Barber Shop Multi-purpose',
		'14-ceramics-art-mul'          => 'Ceramics Art Multi-purpose',
		'15-fashion-stylist-mul'       => 'Fashion Stylist Multi-purpose',
		'16-construction-business-mul' => 'Construction Business Multi-purpose',
		'17-coffee-shop-mul'           => 'Coffee Shop Multi-purpose',
		'18-web-studio-mul'            => 'Web Studio Multi-purpose',
		'19-wedding-studio-mul'        => 'Wedding Studio Multi-purpose',
		'20-tailor-shop-mul'           => 'Tailor Shop  Multi-purpose',
		'21-catering-business-mul'     => 'Catering Business Multi-purpose',
		'22-yoga-studio-mul'           => 'Yoga Studio Multi-purpose',
		'23-bakery-mul'                => 'Bakery Multi-purpose',
		'24-tattoo-studio-mul'         => 'Tattoo Studio Multi-purpose',
		'25-run-club-mutl'             => 'Run Club Multi-purpose',
		'26-pet-clinic-mul'            => 'Pet Clinic Multi-purpose',
		'27-honey-business-mul'        => 'Honey Business Multi-purpose',
		'28-makeup-artist-mul'         => 'Makeup Artist Multi-purpose',
		'29-insurance-mul'          => 'Insurance Multi-purpose',
		'30-pizza-shop-mul'         => 'Pizza Shop Multi-purpose',
		'31-law-firm-mul'           => 'Law Firm Multi-purpose',
		'32-nail-salon-mul'         => 'Nail Salon Multi-purpose',
		'33-zoo-mul'                => 'Zoo Multi-purpose',
		'34-finance-consulting-mul' => 'Finance Consulting Multi-purpose',
		'35-hosting-provider-mul'   => 'Hosting Provider Multi-purpose',
		'36-wedding-planner-mul'    => 'Wedding Planner Multi-purpose',
		'37-garden-design-mul'      => 'Garden Design Multi-purpose',
		'38-car-wash-business-mul'  => 'Car Wash Business Multi-purpose',
		'39-call-center-mul'        => 'Call Center Multi-purpose',
		'40-chocolate-business-mul' => 'Chocolate Business Multi-purpose',
		'41-video-production-mul'   => 'Video Production Multi-purpose',
		'42-interior-design-mul'    => 'Interior Design Multi-purpose',
		'43-beauty-salon-mul'       => 'Beauty Salon Multi-purpose',
		'44-herbal-tea-mul'         => 'Herbal Tea Multi-purpose',
		'45-logistics-business-mul' => 'Logistics Business Multi-purpose',
		'46-luxury-resort-mul'      => 'Luxury Resort Multi-purpose',
		'47-kindergarten-mul'       => 'Kindergarten Multi-purpose',
		'48-dairy-farm-mul'         => 'Dairy Farm Multi-purpose',
		'49-burger-shop-mul'        => 'Burger Shop Multi-purpose',
		'50-florist-mul'            => 'Florist Multi-purpose',
		'51-clean-energy-mul'       => 'Clean Energy Multi-purpose',
		'52-delivery-service-mul'   => 'Delivery Service Multi-purpose',
		'53-wine-company-mul'       => 'Wine Company Multi-purpose',

		'54-cocktail-bar-mul'        => 'Cocktail Bar Multi-purpose',
		'55-hospital-mul'            => 'Hospital Multi-purpose',
		'56-dental-clinic-mul'       => 'Dental Clinic Multi-purpose',
		'57-software-development'    => 'Software Development Multi-purpose',
		'58-craft-beer-business-mul' => 'Craft Beer Business Multi-purpose',
		'59-cooking-class-mul'       => 'Cooking Class Multi-purpose',
		'60-moving-service-mul'      => 'Moving Service Multi-purpose',
		'61-steak-house-mul'         => 'Steak House Multi-purpose',
		'62-golf-club-mul'           => 'Golf Club Multi-purpose',
		'63-ice-cream-mul'           => 'Ice Cream Multi-purpose',
		'64-personal-trainer-mul'    => 'Personal Trainer Multi-purpose',
		'65-real-estate'             => 'Real Estate Multi-purpos',
		'66-dance-studio-mul'        => 'Dance School Multi-purpos',
		'67-fisher-business-mul'     => 'Fisher Business Multi-purpos',
		'68-ads-agency-mul'          => 'Ads Agency Multi-purpos',
		'69-freelance-writer-mul'    => 'Freelance Writer Multi-purpos',
		'70-human-resources-mul'     => 'Human Resources Multi-purpos',
		'71-health-coach-mul'        => 'Health Coach Multi-purpos',
		'72-cleaning-service-mul'    => 'Cleaning Service Multi-purpos',
		'73-game-demo-mul'           => 'Game Demo Multi-purpos',
		'74-production-house-mul'    => 'Production House Multi-purpos',
		'75-headphones-company-mul'  => 'Headphones Company Multi-purpos',
		'76-fashion-designer-mul'    => 'Fashion Designer Multi-purpos',
		'77-seo-company-mul'         => 'SEO Company Multi-purpos',
		'78-music-band-mul'          => 'Music Band Multi-purpos',
		'79-taxi-company-mul'        => 'Taxi Company Multi-purpos',
		'80-fitness-band-mul'        => 'Fitness Band Multi-purpos',
		'81-psychologist-mul'        => 'Psychologist Multi-purpos',
		'82-watch-maker-mul'         => 'Watch Maker Multi-purpos',
		'83-smarthome-system-mul'    => 'Smarthome System Multi-purpos',
		'84-perfume-business-mul'    => 'Perfume Business Multi-purpos',
		'85-digital-startup-mul'    => 'Digital Startup Multi-purpos',
	);
	
	asort( $demo_listing );

	$new_demo_listing = penci_soledad_get_list_new_demo();
	
	$demo_configs = array();
	foreach ( $demo_listing as $key => $label ) {
		if( in_array( $key, $new_demo_listing ) ){
			$demo_configs[] = array(
				'id_demo'    => $key,
				'name'       => $label,
				'content'    => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/demo-content.xml',
				'widgets'    => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/widgets.wie',
				'preview'    => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/preview.jpg',
				'customizer' => 'https://soledad-new-data.s3.amazonaws.com/' . $key . '/customizer.dat',
				'menus'      => array( 'main-menu' => 'menu' ),
				'pages'      => array(
					'front_page' => 'Soledad_Home',
					'blog'       => '',
					'shop'       => 'Shop',
					'cart'       => 'Cart',
					'checkout'   => 'Checkout',
					'my_account' => 'My Account',
					'portfolio'  => 'Masonry 3 Columns',
				)
			);

			continue;
		}

		$config = array(
			'id_demo'    => $key,
			'name'       => $label,
			'content'    => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/demo-content.xml',
			'widgets'    => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/widgets.wie',
			'preview'    => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/preview.jpg',
			'customizer' => 'https://soledad-datas.s3.amazonaws.com/'. $key .'/customizer.dat',
			'menus'      => array( 'main-menu'   => 'menu-1' ),
		);
		if ( $key == 'default' ) {
			$config['pages'] = array(
				'front_page' 		=> '',
				'blog'       		=> '',
				'shop'       		=> 'Shop',
				'cart'       		=> 'Cart',
				'checkout'   		=> 'Checkout',
				'my_account' 		=> 'My Account',
				'portfolio'  		=> 'Masonry 3 Columns',
			);
			$config['options'] = array(
				'shop_catalog_image_size'   => array(
					'width'  => 600,
					'height' => 732,
					'crop'   => 1,
				),
				'shop_single_image_size'    => array(
					'width'  => 600,
					'height' => 732,
					'crop'   => 1,
				),
				'shop_thumbnail_image_size' => array(
					'width'  => 150,
					'height' => 183,
					'crop'   => 1,
				),
			);
		}else {
			$config['pages'] = array(
				'front_page' 		=> '',
				'blog'       		=> '',
			);
			$config['options'] = array();
		}

		// Add menu
		if ( $key == 'magazine' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'sport' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'video' ) {
			$config['menus']['topbar-menu'] = 'topbar-menu';
		} elseif ( $key == 'game' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'music' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'health-medical' ) {
			$config['menus']['topbar-menu'] = 'topbar-menu';
		} elseif ( $key == 'cars' ) {
			$config['menus']['footer-menu'] = 'footer-menu';
		} elseif ( $key == 'wedding' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'simple' ) {
			$config['menus']['topbar-menu'] = 'topbar-menu';
		} elseif ( $key == 'tech-news' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'business-news' ) {
			$config['menus']['footer-menu'] = 'footer-menu';
		} elseif ( $key == 'fashion-magazine' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		} elseif ( $key == 'charity' ) {
			$config['menus']['topbar-menu'] = 'top-bar-menu';
		}


		$demo_configs[] = $config;
	}
	return $demo_configs;
}

if ( ! function_exists( 'penci_soledad_get_list_new_demo' ) ):
	function penci_soledad_get_list_new_demo() {
		$new_demo_listing = array(
			'01-lifestyle-news-2sb',
			'02-travel-news-2sb',
			'03-fashion-news-2sb',
			'04-food-news-2sb',
			'05-game-news-2sb',
			'06-fitness-news-2sb',
			'07-beauty-cosmetics-news-2sb',
			'08-travel-agency-mul',
			'09-spa-wellness-mul',
			'10-business-mul',
			'11-restaurant-mul',
			'12-fitness-center-mul',
			'13-barber-shop-mul',
			'14-ceramics-art-mul',
			'15-fashion-stylist-mul',
			'16-construction-business-mul',
			'17-coffee-shop-mul',
			'18-web-studio-mul',
			'19-wedding-studio-mul',
			'20-tailor-shop-mul',
			'21-catering-business-mul',
			'22-yoga-studio-mul',
			'23-bakery-mul',
			'24-tattoo-studio-mul',
			'25-run-club-mutl',
			'26-pet-clinic-mul',
			'27-honey-business-mul',
			'28-makeup-artist-mul',
			'29-insurance-mul',
			'30-pizza-shop-mul',
			'31-law-firm-mul',
			'32-nail-salon-mul',
			'33-zoo-mul',
			'34-finance-consulting-mul',
			'35-hosting-provider-mul',
			'36-wedding-planner-mul',
			'37-garden-design-mul',
			'38-car-wash-business-mul',
			'39-call-center-mul',
			'40-chocolate-business-mul',
			'41-video-production-mul',
			'42-interior-design-mul',
			'43-beauty-salon-mul',
			'44-herbal-tea-mul',
			'45-logistics-business-mul',
			'46-luxury-resort-mul',
			'47-kindergarten-mul',
			'48-dairy-farm-mul',
			'49-burger-shop-mul',
			'50-florist-mul',
			'51-clean-energy-mul',
			'52-delivery-service-mul',
			'53-wine-company-mul',

			'54-cocktail-bar-mul',
			'55-hospital-mul',
			'56-dental-clinic-mul',
			'57-software-development',
			'58-craft-beer-business-mul',
			'59-cooking-class-mul',
			'60-moving-service-mul',
			'61-steak-house-mul',
			'62-golf-club-mul',
			'63-ice-cream-mul',
			'64-personal-trainer-mul',
			'65-real-estate',
			'66-dance-studio-mul',
			'67-fisher-business-mul',
			'68-ads-agency-mul',
			'69-freelance-writer-mul',
			'70-human-resources-mul',
			'71-health-coach-mul',
			'72-cleaning-service-mul',
			'73-game-demo-mul',
			'74-production-house-mul',
			'75-headphones-company-mul',
			'76-fashion-designer-mul',
			'77-seo-company-mul',
			'78-music-band-mul',
			'79-taxi-company-mul',
			'80-fitness-band-mul',
			'81-psychologist-mul',
			'82-watch-maker-mul',
			'83-smarthome-system-mul',
			'84-perfume-business-mul',
			'85-digital-startup-mul',
		);

		return $new_demo_listing;
	}
endif;

add_filter( 'penci_soledad_plugins_required', 'penci_soledad_plugins_required_register' );
if( ! function_exists( 'penci_soledad_plugins_required_register' ) ) {
	function penci_soledad_plugins_required_register(){
		return array(
			'vafpress-post-formats-ui-develop',
			'penci-shortcodes',
			'penci-soledad-slider',
			'penci-portfolio',
			'penci-recipe',
			'penci-review',
			'penci-soledad-demo-importer',
			'instagram-slider-widget',
			'oauth-twitter-feed-for-developers',
			'contact-form-7',
			'mailchimp-for-wp',
		);
	}
}

add_action( 'penci_soledaddi_after_setup_pages', 'penci_soledad_addons_import_order_tracking' );

/**
 * Update more page options
 *
 * @param $pages
 */
function penci_soledad_addons_import_order_tracking( $pages ) {
	if ( isset( $pages['order_tracking'] ) ) {
		$order = get_page_by_title( $pages['order_tracking'] );

		if ( $order ) {
			update_option( 'penci_soledad_order_tracking_page_id', $order->ID );
		}
	}

	if ( isset( $pages['portfolio'] ) ) {
		$portfolio = get_page_by_title( $pages['portfolio'] );

		if ( $portfolio ) {
			update_option( 'penci_soledad_portfolio_page_id', $portfolio->ID );
		}
	}
}

add_action( 'penci_soledaddi_before_import_content', 'penci_soledad_addons_import_product_attributes' );

/**
 * Prepare product attributes before import demo content
 *
 * @param $file
 */
function penci_soledad_addons_import_product_attributes( $file ) {
	global $wpdb;

	if ( ! class_exists( 'WXR_Parser' ) ) {
		require_once WP_PLUGIN_DIR . '/penci-soledad-demo-importer/includes/parsers.php';
	}

	$parser      = new WXR_Parser();
	$import_data = $parser->parse( $file );

	if ( isset( $import_data['posts'] ) ) {
		$posts = $import_data['posts'];

		if ( $posts && sizeof( $posts ) > 0 ) {
			foreach ( $posts as $post ) {
				if ( 'product' === $post['post_type'] ) {
					if ( ! empty( $post['terms'] ) ) {
						foreach ( $post['terms'] as $term ) {
							if ( strstr( $term['domain'], 'pa_' ) ) {
								if ( ! taxonomy_exists( $term['domain'] ) ) {
									$attribute_name = wc_sanitize_taxonomy_name( str_replace( 'pa_', '', $term['domain'] ) );

									// Create the taxonomy
									if ( ! in_array( $attribute_name, wc_get_attribute_taxonomies() ) ) {
										$attribute = array(
											'attribute_label'   => $attribute_name,
											'attribute_name'    => $attribute_name,
											'attribute_type'    => 'select',
											'attribute_orderby' => 'menu_order',
											'attribute_public'  => 0
										);
										$wpdb->insert( $wpdb->prefix . 'woocommerce_attribute_taxonomies', $attribute );
										delete_transient( 'wc_attribute_taxonomies' );
									}

									// Register the taxonomy now so that the import works!
									register_taxonomy(
										$term['domain'],
										apply_filters( 'woocommerce_taxonomy_objects_' . $term['domain'], array( 'product' ) ),
										apply_filters( 'woocommerce_taxonomy_args_' . $term['domain'], array(
											'hierarchical' => true,
											'show_ui'      => false,
											'query_var'    => true,
											'rewrite'      => false,
										) )
									);
								}
							}
						}
					}
				}
			}
		}
	}
}