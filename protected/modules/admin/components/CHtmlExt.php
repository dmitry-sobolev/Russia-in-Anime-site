<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CHtmlExt
 *
 * @author Propp
 */
class CHtmlExt extends CHtml {

    public static function activeCheckBox($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        if (!isset($htmlOptions['value']))
            $htmlOptions['value'] = 1;
        if (!isset($htmlOptions['checked']) && self::resolveValue($model, $attribute) == $htmlOptions['value'])
            $htmlOptions['checked'] = 'checked';
        self::clientChange('click', $htmlOptions);

        if (array_key_exists('uncheckValue', $htmlOptions)) {
            $uncheck = $htmlOptions['uncheckValue'];
            unset($htmlOptions['uncheckValue']);
        }
        else
            $uncheck = '0';

        $hiddenOptions = isset($htmlOptions['id']) ? array('id' => self::ID_PREFIX . $htmlOptions['id']) : array('id' => false);
        $hidden = $uncheck !== null ? self::hiddenField($htmlOptions['name'], $uncheck, $hiddenOptions) : '';

        return $hidden . self::activeInputField('checkbox', $model, $attribute, $htmlOptions);
    }

    public static function activeHiddenField($model, $attribute, $htmlOptions = array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        return self::activeInputField('hidden', $model, $attribute, $htmlOptions);
    }

    public static function activeLabelEx($model, $attribute, $htmlOptions = array()) {
        self::resolveName($model, $attribute); // strip off square brackets if any
        $htmlOptions['required'] = $model->isAttributeRequired($attribute);
        return self::activeLabel($model, $attribute, $htmlOptions);
    }

    public static function activeTextArea($model, $attribute, $htmlOptions = array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        if ($model->hasErrors($attribute))
            self::addErrorCss($htmlOptions);
        $text = self::resolveValue($model, $attribute);
        return self::tag('textarea', $htmlOptions, isset($htmlOptions['encode']) && !$htmlOptions['encode'] ? $text : self::encode($text));
    }

    public static function activeTextField($model, $attribute, $htmlOptions=array()) {
        self::resolveNameID($model, $attribute, $htmlOptions);
        self::clientChange('change', $htmlOptions);
        return self::activeInputField('text', $model, $attribute, $htmlOptions);
    }

    public static function resolveName($model, &$attribute) {
        if (($pos = strpos($attribute, '[')) !== false) {
            if ($pos !== 0) {  // e.g. name[a][b]
                $sub = substr($attribute, $pos);
                $attribute = substr($attribute, 0, $pos);
                return get_class($model) . '[' . $attribute . ']' . $sub;
            }
            if (($pos = strrpos($attribute, ']')) !== false && $pos !== strlen($attribute) - 1) {  // e.g. [a][b]name
                $sub = substr($attribute, 0, $pos + 1);
                $attribute = substr($attribute, $pos + 1);
                return get_class($model) . $sub . '[' . $attribute . ']';
            }
            if (preg_match('/\](\w+\[.*)$/', $attribute, $matches)) {
                $name = get_class($model) . '[' . str_replace(']', '][', trim(strtr($attribute, array('][' => ']', '[' => ']')), ']')) . ']';
                $attribute = $matches[1];
                return $name;
            }
        }
        return get_class($model) . '[' . $attribute . ']';
    }

    public static function resolveNameID($model, &$attribute, &$htmlOptions) {
        if (!isset($htmlOptions['name']))
            $htmlOptions['name'] = self::resolveName($model, $attribute);
        if (!isset($htmlOptions['id']))
            $htmlOptions['id'] = self::getIdByName($htmlOptions['name']);
        else if ($htmlOptions['id'] === false)
            unset($htmlOptions['id']);
    }

}

?>
