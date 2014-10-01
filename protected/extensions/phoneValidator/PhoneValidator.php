<?php

/**
 * Based on UKPhoneValidator by ineersa
 * http://www.yiiframework.com/extension/ukphonevalidator/
 */

class PhoneValidator extends CValidator
{

    /**
     * @var boolean whether the attribute value can be null or empty. Defaults to true,
     * meaning that if the attribute is empty, it is considered valid.
     */
    public $allowEmpty = true;

    /**
     * Validates the attribute of the object.
     * If there is any error, the error message is added to the object.
     * @param CModel $object the object being validated
     * @param string $attribute the attribute being validated
     * Authorized formats are (dots could be replaced with - or spaces):
     * 012345789
     * +33123456789
     * 01.23.45.67.89
     * +331.23.45.67.89
     */
    protected function validateAttribute($object,$attribute)
    {
        $value=$object->$attribute;
        if($this->allowEmpty && ($value===null || $value===''))
            return true;
        else if (($value===null || $value==='')){
            $message=$this->message!==null?$this->message:Yii::t('yii','{attribute} is empty');
            $this->addError($object,$attribute,$message);
        }
        // Allow the +33 code (international format) and then replace it with a 0
        // Other country codes return an error
        if (preg_match('/^(\+62)[\s]*(.*)$/',$value)) {
            // If matching, we remove all separators
            $value = str_replace(array('+62', ' ', '.', '-'), array('0', '', '', ''), $value);
        } elseif (preg_match('/^(\+)[\s]*(.*)$/',$value)) {
            $message=Yii::t('yii','{attribute} can only have +62 country code');
            $this->addError($object,$attribute,$message);
        }
        // Then checkink the format of the number:
        // Digits, possibly grouped by two
        // Must start with 0, followed by 1 to 9
        if (!preg_match('/^[\+0-9\-\(\)\s]*$/',$value)) {
            $message=Yii::t('yii','sepertinya bukan format {attribute}');
            $this->addError($object,$attribute,$message);
        }
    }

}