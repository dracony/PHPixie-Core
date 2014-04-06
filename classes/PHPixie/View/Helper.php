<?php

namespace PHPixie\View;

/**
 * View helper class.
 * An instance of this class is passed automatically
 * to every View.
 *
 * You can extend it to make your own methods available in view templates.
 *
 * @package Core
 */
class Helper {

	/**
	 * Pixie Dependancy Container
	 * @var \PHPixie\Pixie
	*/
	protected $pixie;
	
	/**
	 * Constructs the view helper
	 * @param \PHPixie\Pixie $pixie Pixie dependency container
	 */
	public function __construct($pixie) {
		$this->pixie = $pixie;
		
	}
	
	/**
	 * List of aliases to create for methods
	 * @var array
	 */
	protected $aliases = array(
		'_' => 'output'
	);
	
	/**
	 * Gets the array of aliases to helper methods
	 * 
	 * @return array Associative array of aliases mapped to their methods
	 */
	public function get_aliases() {
		$aliases = array();
		foreach($this->aliases as $alias => $method)
			$aliases[$alias] = array($this, $method);
		return $aliases;
	}
	
	/**
	 * Finds full path to a specified file in the /assets folders.
	 * It will search in the application folder first, then in all enabled modules
	 * and then the /assets folder of the framework.
	 *
	 * @param string  $subfolder  Subfolder to search in e.g. 'classes' or 'views'
	 * @param string  $name       Name of the file without extension
	 * @param string  $extension  File extension
	 * @param boolean $return_all If 'true' returns all mathced files as array,
	 *                            otherwise returns the first file found
	 * @return mixed  Full path to the file or False if it is not found
	 */
	 public function find_file($subfolder, $name, $extension = 'php', $return_all = false)
	 {
	 	$this->pixie->find_file($subfolder, $name, $extension, $return_all);
	 }
	
	/**
	 * Escapes string to safely display HTML entities
	 * like < > & without breaking layout and prevent XSS attacks.
	 *
	 * @param string $str String to escape
	 * @return string Escaped string.
	 */
	public function escape($str) {
		return htmlentities($str);
	}
	
	/**
	 * Escapes and prints a string.
	 *
	 * @param string $str String to escape
	 * @see \PHPixie\View\Helper::escape
	 */
	public function output($str) {
		echo $this->escape($str);
	}
}
