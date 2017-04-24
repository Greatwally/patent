<?php
/**
 * @package     JTAG Help Desk
 * @subpackage  Components
 * ------------------------------------------------------------------------
 * @author      JoomlaTag.com
 * @copyright   Copyright (C) 2011 Joomla Tag. All Rights Reserved.
 * @link        http://www.joomlatag.com
 * @license     GNU/GPL
*/

// No direct access
defined('_JEXEC') or die;
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}

class JtagHelper {
  /**
   * @method getComponentParameters - universal J1.5 thru J1.7 parameter extractor
   * @return stdClass Object
   */

  public static function &getComponentParameters( $componentName, $defaultValues = null ) {

    static $paramsCache = array();

    //if ( !is_array ( $defaultValues ) ) $defaultValues = array();
    $defaultValues =& self::getComponentParameterDefaults ( $componentName );

    if ( !isset ( $paramsCache[$componentName] ) ) {

      $version = new JVersion();
      $params = new stdClass();

      switch ( $version->RELEASE ) {
        case '1.5':
          $component = &JComponentHelper::getComponent( $componentName );
          $componentParams = new JParameter($component->params);

          $paramObj = $componentParams->_registry['_default']['data'];
          break;

        default:
          $componentParams = &JComponentHelper::getParams( strtoupper ( $componentName ) );
          $paramObj = $componentParams->get('params');
      }

      $hasObject = is_object ( $paramObj );

      foreach ( $defaultValues as $key => $value ) {
        if ( $hasObject ) {
          $setValue = isset ( $paramObj->$key ) ? $paramObj->$key : $value;
        } else {
          $setValue = $value;
        }
        $params->$key = $setValue;
      }

      $paramsCache[$componentName] = $params;
    }

    return $paramsCache[$componentName];
  }

  /**
   * @todo Add Joomla 1.5 support
   */

  public static function &getComponentParameterDefaults($componentName) {

    jimport('joomla.form.form');
    $defaults = array();

    $version = new JVersion();
    $componentPath = JPATH_ADMINISTRATOR.DS.'components'.DS.strtolower($componentName);

    JForm::addFormPath($componentPath);

    switch ( $version->RELEASE ) {
      case '1.5':
        break;

      default:
        $form = JForm::getInstance('jtag.component_extractor', 'config', array(), false, '/config' );
        foreach ( $form->getFieldsets() as $name => $fieldSet ) {
          foreach ( $form->getFieldset ( $name ) as $field ) {
            // skip spacers
            if ( 'spacer' == strtolower ( $field->type ) )
                continue;
            $key = $field->fieldname;
            $defaults[$key] = $field->value;
          }
        }
    }

    return $defaults;
  }
}
