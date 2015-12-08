<?php
/**
 * User: thohoang
 * Date: 12/8/15
 * Time: 9:51 AM
 *
 * Class Bliz Filter
 *
 * @Description: Declare all function filter of Bliz site
 *
 * @Property:
 *      - regexp    string      regular expression string
 *      - options   array       list options to filter
 */

class BLFilter {
    /**
     * regular express string to execute filter validate
     *
     */
    private $regexp = null;

    /**
     * list options using to filer
     *
     * Options:
     *   - prefix               string      string to start validated string
     *   - suffix               string      string to stop validated string
     *   - modifier             string      modifier of regular expression
     *   - max_length           int         maximum length of validated string
     *   - min_length           int         minimum legnth of validated string
     *   - length               int         length of validated string. Disable max_length and min_length
     *   - match                string      match string to validate using regular expression
     *   - required             bool        allow null of not null
     *   - validate_constant    array       PHP 5 Predefined Filter Constants
     *   - input_constant       mixed       PHP 5 Predefined Input Constants
     *   - max_range            int/float   maximum value of number. Only with filter_constants =  FILTER_VALIDATE_INT=257 | FILTER_VALIDATE_FLOAT=259
     *   - min_range            int/float   minimum value of number. Only with filter_constants =  FILTER_VALIDATE_INT=257 | FILTER_VALIDATE_FLOAT=259
     *
     */
    private $options = array();

    // --------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param array $options list options to filter
     */
    public function __construct($options = array()) {
        if(!empty($options)) {
            $this->regularString($options, true);
        }
    }

    // --------------------------------------------------------------------

    /**
     * Setup Options
     *
     * @param mixed $option     options needed use
     * @param mixed $value      value of option needed use
     *
     * @return $this
     */
    public function setOption($option, $value) {
        if(is_array($option)) {
            $this->options = $option;
        }elseif(is_string($option)) {
            $this->options[$option] = $value;
        }
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Setup Options
     *
     * @param mixed $option     options needed use
     * @param mixed $value      value of option needed use
     *
     * @return $this
     */
    public function setOptions($option, $value) {
        return $this->setOption($option, $value);
    }

    // --------------------------------------------------------------------

    /**
     * Get Options
     *
     * @return array
     */
    public function getOption() {
        return $this->regexp;
    }

    // --------------------------------------------------------------------

    /**
     * Get Options
     *
     * @return array
     */
    public function getOptions() {
        return $this->regexp;
    }

    // --------------------------------------------------------------------

    /**
     * Setup Regular Expression
     *
     * @param mixed $regexp regular expression data
     *
     * @return $this
     */
    public function setRegexp($regexp) {
        if(is_array($regexp)) {
            $this->regularString($regexp, true);
        }elseif(is_string($regexp)) {
            $this->regexp = $regexp;
        }
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Get Regular Expression String
     *
     * @return string
     */
    public function getRegexp() {
        return $this->regexp;
    }

    // --------------------------------------------------------------------

    /**
     * Regular Expression Builder
     *
     * @param array $options    list options to build regular expression string
     * @param bool  $shared     setup property options follow new options to using with another
     *
     * @return array('ok' => bool, 'errmsg' => '', 'data' =>'')
     */
    public function regularString($options = array(), $shared = false) {
        $regexp = array('prefix' => '/', 'body' => '', 'suffix' => '/', 'modifier'=>'');
        $length = '';

        if(empty($options)) {
            $options = $this->options;
        }

        if(!empty($options)) {
            if(!empty($options['prefix'])){
                $regexp['prefix'] = "/^({$options['prefix']})";
            }
            
            if(!empty($options['suffix'])) {
                $regexp['suffix'] = "({$options['suffix']})$/";
            }

            if(!empty($options['modifier'])) {
                $regexp['modifier'] = $options['modifier'];
            }

            if(!empty($options['length'])) {
                $length = '{'.$options['length'].'}';
            }else {
                if(empty($options['max_length'])) {
                    $options['max_length'] = '';
                }

                if(empty($options['min_length'])) {
                    $options['min_length'] = 0;
                }

                if($options['max_length'] || $options['min_length']) {
                    $length = '{'.$options['min_length'] . ',' . $options['max_length'] .'}';
                }
            }

            if(empty($options['match']) ) {
                $options['match'] = '.';
            }

            $regexp['body'] = $options['match'].$length;

            if($shared) {
                $this->options = $options;
                $this->regexp = implode('',$regexp);
            }

            return array('ok' => 1, 'errmsg' => '', 'data' => implode('', $regexp));
        }else {
            return array('ok' => 0, 'errmsg' => 'miss options argument', 'data' => '');
        }
    }

    // --------------------------------------------------------------------

    /**
     * Filter Validate
     *
     * Using filter_var() function php to validate variable data
     *
     * @param mixed $variable   data needed validate
     * @param mixed $options    options to validate data
     * @param mixed $shared     set options into $this->options to shared with other functions
     */
    public function validate($variable, $options, $shared) {
        
    }
}
