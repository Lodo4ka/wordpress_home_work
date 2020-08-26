<?php

	define('HW2_DIR_CSS', get_template_directory_uri() . '/assets/css/');
	define('HW2_DIR_JS', get_template_directory_uri() . '/assets/js/');
	define('HW2_DIR_IMG', get_template_directory_uri() . '/assets/img/');

	add_action('wp_enqueue_scripts', function(){
		wp_enqueue_style('reset', HW2_DIR_CSS . 'reset.css');
		wp_enqueue_style('main', HW2_DIR_CSS . 'styles.css');

		wp_deregister_script('jquery');
		wp_register_script('jquery', HW2_DIR_JS . 'jquery-3.4.1.min.js', [], false, true);

		wp_enqueue_script('jquery');
		wp_enqueue_script('main', HW2_DIR_JS . 'script.js', ['jquery'], false, true);
	});

	add_action('after_setup_theme', function(){
		add_theme_support('post-thumbnails');

		register_nav_menu('header', 'Меню в шапке');
	});

	add_action('widgets_init', function(){
		register_sidebar([
			'name'          => 'Боковая колонка для блога',
			'id'            => 'sidebar-blog',
			'description'   => 'Выводится в блоге',
			'before_widget' => '<div class="aside-box %2$s">',
			'after_widget'  => "</div>\n",
			'before_title'  => '<div class="h2">',
			'after_title'   => "</div>\n",
		]);

		register_sidebar([
			'name'          => 'Текст для главной',
			'id'            => 'sidebar-home',
			'description'   => 'Выводится на главной',
			'before_widget' => '<div class="header-bottom">',
			'after_widget'  => "</div>\n"
		]);
	});