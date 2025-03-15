<?php

namespace App\Models\Validators;

use Illuminate\Support\Facades\Validator;

class ProductValidator {
  public static function validate($data, $verb) {
    

    if($verb === 'put') {
      $idRule = 'required|integer';
      $nameRule = 'min:3|max:255';
      $priceRule = 'decimal:0,2|min:0';
      $descriptionRule = '';
      $itemNumberRule = 'numeric|integer';
      $imageRule = 'url';
    } else {
      $idRule = 'integer';
      $nameRule = 'required|min:3|max:255';
      $priceRule = 'required|decimal:0,2|min:0';
      $descriptionRule = 'required';
      $itemNumberRule = 'required|numeric|integer';
      $imageRule = 'required|url';

    }

    return Validator::make($data, [
      'id' => $idRule,
      'name' => $nameRule,
      'price' => $priceRule,
      'description' => $descriptionRule,
      'item_number' => $itemNumberRule,
      'image' => $imageRule
    ])->validate();
  }
}