<?php
// This code belongs to Escuela Didactica <https://escueladidactica.com>.

// We build transformation processes for companies where their collaborators 
// are trained with the employees are trained with the knowledge of your 
// company through digital through digital educational experiences.
//

/**
 *This file contains main class for the block search_course
 *
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Class block_search_courses
 * 
 * This class extends block_base and provides functionality to
 * display available courses
 */
class block_search_courses extends block_base {
	/**
	 * Initializes the block and obtains the block title
	 *
	 * @return void
	 */
    public function init() {
        $this->title = get_string('title', 'block_search_courses');
    }
    
	/**
	 * Assigns the block configuration to varibles
	 *
	 * @return void
	 */
    public function specialization() {
	    if (isset($this->config)) {
	        if (empty($this->config->title)) {
	            $this->title = get_string('title', 'block_search_courses');
	        } else {
	            $this->title = $this->config->title;
	        }   
	    }
	}

	/**
	 * Get the course content
	 *
	 * @return stdClass|null Course content or null if not available.
	 */
    public function get_content() {
		global $CFG;
    	$content = "<p>No se pudo cargar el contenido</p>";

	    if ($this->content !== null) {
	      return $this->content;
	    }

	    if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        if (isloggedin() && !isguestuser()) {

	        context_block::instance($this->instance->id);
	    	$main = new \block_search_courses\output\main($this->instance->id);
			$output = $this->page->get_renderer('block_search_courses');
			
			$content = $output->render($main);
		    $this->content         = new stdClass;
			$this->content->text   = $content;
		}
	    return $this->content;
	}

	/**
	 * Esta funcion permite el uso de get_config() para consultar base de datos de moodle 
	 */
	function has_config() {
		return true;
	}

}