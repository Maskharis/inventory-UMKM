<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="material-icons ">home</i>'
		),
		
		array(
			'path' => 'tbl_barang', 
			'label' => 'Master Barang', 
			'icon' => '<i class="material-icons mi-sm">dehaze</i>'
		),
		
		array(
			'path' => 'tbl_barang_masuk', 
			'label' => 'Barang Masuk', 
			'icon' => '<i class="material-icons mi-sm">arrow_downward</i>'
		),
		
		array(
			'path' => 'tbl_barang_keluar', 
			'label' => 'Barang Keluar', 
			'icon' => '<i class="material-icons mi-sm">arrow_upward</i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="material-icons mi-sm">verified_user</i>'
		)
	);
		
	
	
			public static $level = array(
		array(
			"value" => "admin", 
			"label" => "admin", 
		),
		array(
			"value" => "user", 
			"label" => "user", 
		),);
		
}