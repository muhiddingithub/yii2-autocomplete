# yii2-autocomplete
yii2-autocomplete jquery ui
Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require muhiddingithub/yii2-autocomplete "dev-master"
```

or add

```
"muhiddingithub/yii2-autocomplete": "dev-master"
```

to the require section of your `composer.json` file.

[Jquery source](https://jqueryui.com/autocomplete/)

Usage
-----


```php 
    echo  \muhiddin\autocomplete\AutoComplete::widget([
                                'id' => 'search',
                                'form'=>$form, // ActiveForm widget object
                                'model'=>$model, // model
                                'attribute'=>'model_attribute', // attribute of model
                                'value' => '',
                                'name' => 'name',
                                'options' => [
                                    'class' => 'form-control form-group-margin',
                                    'dir' => "ltr",
                                    'placeholder' => "search",
                                ],
                                'pluginOptions' => [
                                    'minChars' => 3,
                                    'serviceUrl' => \yii\helpers\Url::toRoute(['custom-controlller/customer-action']),
                                    'width' => '40%',
                                    'onSelect' => 'function(suggestion){
                                        // call onselect found element function
                                    
                                    }'
                                ]
                            ])
```
  
in custom-controlller/customer-action
-----
```
$query = Yii::$app->request->get('query');
        if (!empty($query)) {
            $find = MyModel::find()->andFilterWhere(['like','column_name',$query]);
            $allModels = $find->column();
            echo json_encode([
                'suggestions' => $allModels
            ]);
        } else {
            echo json_encode(['status' => 'failure']);
        }
```
