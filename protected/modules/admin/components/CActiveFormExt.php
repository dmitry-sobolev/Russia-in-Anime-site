<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CActiveFormExt
 *
 * @author Propp
 */
class CActiveFormExt extends CActiveForm {
    public function checkBox($model, $attribute, $htmlOptions = array()) {
        return CHtmlExt::activeCheckBox($model, $attribute, $htmlOptions);
    }

    public function labelEx($model, $attribute, $htmlOptions = array()) {
        return CHtmlExt::activeLabelEx($model, $attribute, $htmlOptions);
    }
    
    public function hiddenField($model, $attribute, $htmlOptions = array()) {
        return CHtmlExt::activeHiddenField($model, $attribute, $htmlOptions);
    }

    public function textArea($model, $attribute, $htmlOptions = array()) {
        return CHtmlExt::activeTextArea($model, $attribute, $htmlOptions);
    }
    
    public function textField($model, $attribute, $htmlOptions = array()) {
        return CHtmlExt::activeTextField($model, $attribute, $htmlOptions);
    }
}

?>
