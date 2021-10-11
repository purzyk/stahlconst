<?php

$pagination_mid_size = 1;

$pagination_mid_size += 2; // DON'T TOUCH

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = ['resources/views'];

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		parent::__construct();
	}


	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['mainMenu'] = new TimberMenu('main_menu');
		$context['mobileMenu'] = new TimberMenu('mobile_menu');
		$context['main_sidebar'] = Timber::get_widgets('main-sidebar');
		$context['footer_sidebar'] = Timber::get_widgets('footer-sidebar');
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
		$context['skontaktuj'] = images_path('skontaktuj.png');
		$context['kategorie_realizacji'] = Timber::get_terms('kategorie_realizacji');
        
        $karieraposts = Timber::get_posts(array(
            'post_type' => 'kariera',
            'posts_per_page' => '-1',
            'order' => 'DESC',
            'orderby' => 'date',));
    
        $context['karieraposts'] = $karieraposts;

		$karierapostsLatest = Timber::get_posts(array(
            'post_type' => 'kariera',
            'posts_per_page' => '3',
            'order' => 'ASC',
            'orderby' => 'date',));
        $context['karierapostsLatest'] = $karierapostsLatest;


		$realizacjePosts = Timber::get_posts(array(
            'post_type' => 'realizacje',
            'posts_per_page' => '5',
            'order' => 'ASC',
            'orderby' => 'date',));
        $context['realizacjePosts'] = $realizacjePosts;
		
		return $context;
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

function add_timber_context_options( $context ) {
    $context['options'] = get_fields('options');
    return $context;
}
add_filter( 'timber_context', 'add_timber_context_options'  );

function images_path($file = null)
{
    return get_stylesheet_directory_uri() . '/resources/assets/images/' . $file;
}

add_filter( 'timber/acf-gutenberg-blocks-templates', function () {
    return ['resources/views/blocks']; // default: ['views/blocks']
} );