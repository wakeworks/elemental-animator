<?php

namespace WakeWorks\ElementalAnimator\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\NumericField;
use SilverStripe\View\Requirements;

class BaseElementExtension extends DataExtension {
    private static $db = [
        'Animation' => 'Varchar(255)',
        'AnimationDuration' => 'Varchar(255)',
        'AnimationDelay' => 'Varchar(255)'
    ];

    public function updateCMSFields($fields)
    {
        $animations = [
            'fadeIn',
            'fadeInUp',
            'fadeInDown',
            'fadeInLeft',
            'fadeInRight'
        ];

        if($this->owner->config()->get('animated')) {
            $fields->addFieldToTab(
                'Root.Settings',
                DropdownField::create('Animation', 'Animation', $animations)
                    ->setEmptyString('keine')
            );

            $fields->addFieldToTab(
                'Root.Settings',
                NumericField::create('AnimationDuration', 'Animationsdauer in Milisekunden (Standard: 1000)')
            );

            $fields->addFieldToTab(
                'Root.Settings',
                NumericField::create('AnimationDelay', 'Animationsverzögerung in Milisekunden (Standard: 0)')
            );
        } else {
            $fields->removeByName(['Animation', 'AnimationDuration', 'AnimationDelay']);
        }

        return $fields;
    }

    // gets called in forTemplate, can be used to inject Requirements
    public function updateRenderTemplates($templates, $suffix) {
        Requirements::css('wakeworks/elemental-animator:client/dist/css/animator.css');
        Requirements::javascript('wakeworks/elemental-animator:client/dist/js/animator.js');
    }
}