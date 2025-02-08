# Elemental Animator for Silverstripe

![Packagist Version](https://img.shields.io/packagist/v/WakeWorks/elemental-animator?style=flat-square)
![GitHub](https://img.shields.io/github/license/WakeWorks/elemental-animator?style=flat-square)

## Introduction

Introduces easily integratable animations for your elemental blocks

## Requirements

* silverstripe/framework ^4.4 || ^5
* silverstripe/elemental ^4 || ^5

This module was only tested on >= 4.10.

## Installation

```
composer require wakeworks/elemental-animator
```

Then dev/build?flush=1.

## How does it work? / Setup

To introduce animations into your elements, you'll have to which animation you want to each element.

```html
<div
    data-scroll
    data-animated="fadeIn">

    $HTML
</div>
```

There are multiple options available

```html
<div
    data-scroll
    data-animated="fadeIn"
    data-animated-delay="100"
    data-animated-duration="100">

    $HTML
</div>
```

| Option                    | Description                                   | Default |
| :---                      | :---                                          | :--- |
| data-animated             | Which effect will be used                     | none   |
| data-animated-delay       | Delay in ms after which the effect will start | 0 |
| data-animated-duration    | Duration in ms that the animation will take   | 1000 |

### Available effects
* fadeIn
* fadeInUp
* fadeInDown
* fadeInLeft
* fadeInRight

### Control animations from CMS
You can control your animations in cms by enabling the animations for all elements or specific ones. This will add input fields to your element's settings tab.

```yaml
# Enable for all
DNADesign\Elemental\Models\BaseElement:
    animated: true

# Enable for specific one
Your\Specific\Element:
    animated: true
```

```html
<div
    data-scroll
    data-animated="$Animation"
    data-animated-delay="$AnimationDelay"
    data-animated-duration="$AnimationDuration">

    $HTML
</div>
```