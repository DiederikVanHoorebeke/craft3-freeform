<?php

namespace Solspace\Freeform\Services\Pro;

use craft\base\Component;
use Solspace\Freeform\Events\Forms\FormRenderEvent;
use Solspace\Freeform\Fields\Pro\DatetimeField;

class ProFormsService extends Component
{
    /**
     * @param FormRenderEvent $event
     */
    public function addDateTimeJavascript(FormRenderEvent $event)
    {
        $freeformPath = \Yii::getAlias('@freeform');
        $form         = $event->getForm();

        if ($form->getLayout()->hasDatepickerEnabledFields()) {
            $datepickerJs = file_get_contents(
                $freeformPath . '/Resources/js/other/front-end/fields/datepicker.js'
            );

            $event->appendJsToOutput(
                $datepickerJs,
                [
                    'locale'     => DatetimeField::getSupportedLocale(\Craft::$app->locale->id),
                    'formAnchor' => $form->getAnchor(),
                ]
            );
        }
    }

    /**
     * @param FormRenderEvent $event
     */
    public function addPhonePatternJavascript(FormRenderEvent $event)
    {
        $freeformPath = \Yii::getAlias('@freeform');
        $form         = $event->getForm();

        if ($form->getLayout()->hasPhonePatternFields()) {
            $imaskJs = file_get_contents($freeformPath . '/Resources/js/other/front-end/fields/input-mask.js');
            $event->appendJsToOutput($imaskJs, ['formAnchor' => $form->getAnchor()]);
        }
    }

    /**
     * @param FormRenderEvent $event
     */
    public function addOpinionScaleStyles(FormRenderEvent $event)
    {
        static $styleLoaded;

        if (null === $styleLoaded) {
            $freeformPath = \Yii::getAlias('@freeform');
            $form         = $event->getForm();

            if ($form->getLayout()->hasOpinionScaleFields()) {
                $opinionScaleCss = file_get_contents(
                    $freeformPath . '/Resources/css/form-frontend/fields/opinion-scale.css'
                );

                $event->appendCssToOutput($opinionScaleCss);
            }

            $styleLoaded = true;
        }
    }
}
