<?php

namespace PedroLazari\PhpFluig\Model;

use PedroLazari\Model\ConstraintType;

class Workflow
{
    public  $processInstanceId;
    public $stateSequence;
    public $threadSequence;
    private $type;

    public function __construct($field = '', $iniValue = '', $finValue = '', $typeName = ''){
        $this->field = $field;
        $this->initialValue = $iniValue;
        $this->finalValue = $finValue;
        $this->setType($typeName);
    }

    public function setType($typeName){
        
        switch($typeName){
            case 'MUST':
                $this->type = ConstraintType::$MUST;
                break;
            case 'SHOULD':
                $this->type = ConstraintType::$SHOULD;
                break;
            case 'MUST_NOT':
                $this->type = ConstraintType::$MUST_NOT;
                break;
            default:
                $this->type = ConstraintType::$MUST;
        }
    }

}