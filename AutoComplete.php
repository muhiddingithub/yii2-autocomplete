<?php
namespace muhiddin\autocomplete;

use yii\bootstrap\ActiveForm;
use yii\bootstrap\InputWidget;
use muhiddin\autocomplete\AutoCompleteAsset;
use yii\bootstrap\Html;
use yii\helpers\Json;
use yii\web\View;

class AutoComplete extends InputWidget
{
    public $pluginOptions = [];

    /**
     * @var $form ActiveForm
     */
    public $form;

    public function init()
    {
        if (empty($this->name) AND !$this->hasModel()) {
            $this->name = 'keyword';
        }
        if (empty($this->id)) {
            $this->id = $this->getId();
        }
        $this->options['id'] = $this->id;

    }

    public function run()
    {

        $onSelect = $this->pluginOptions['onSelect'];
        unset($this->pluginOptions['onSelect']);
        $pluginOptions = Json::encode($this->pluginOptions);
        $pluginOptions = substr($pluginOptions, 0, strlen($pluginOptions) - 1);
        $pluginOptions = $pluginOptions . ',onSelect:' . $onSelect . '}';
        if ($this->form) {
            echo $this->form->field($this->model, $this->attribute)->textInput($this->options);
        } else {
            if ($this->hasModel())
                echo Html::activeTextInput($this->model, $this->attribute, $this->options);
            else
                echo Html::textInput($this->name, $this->value, $this->options);
        }
        AutoCompleteAsset::register($this->getView());
        $this->view->registerJs("
              $(function () {
                'use strict';
                $('#" . $this->id . "').autocomplete(" . $pluginOptions . ");
         });
        ", View::POS_END);
    }
}