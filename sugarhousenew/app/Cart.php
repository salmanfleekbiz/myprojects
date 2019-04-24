<?php

namespace App;


class Cart
{

	public $items = null;

  public function __construct($oldcart){
  	if($oldcart){
  		$this->items=$oldcart->items;
  		}
}
  public function add($item, $id){
  	  		$storedItem= ['product_id'=>$item['product_id'],'quantity'=>$item['quantity'],'product_name'=>$item['product_name'],'product_variation_name'=>$item['product_variation_name'],'retail_price'=>$item['retail_price'],'wholesale_price'=>$item['wholesale_price'],'graphic_width'=>$item['graphic_width'],'frame_color'=>$item['frame_color'],'accessories'=>$item['accessories'],'graphic_height'=>$item['graphic_height'],'proof'=>$item['proof'],'warranty'=>$item['warranty']];

         if($this->items){
          foreach ($this->items as $key => $value) {
                if($storedItem['product_variation_name'] == $value['product_variation_name'] && $storedItem['graphic_width'] == $value['graphic_width'] && $storedItem['frame_color'] == $value['frame_color'] && $storedItem['accessories'] == $value['accessories'] && $storedItem['graphic_height'] == $value['graphic_height'] && $storedItem['proof'] == $value['proof'] && $storedItem['warranty'] == $value['warranty']){
                    $storedItem['quantity'] = $storedItem['quantity'] + $value['quantity'];
                    $this->items[$key]=$storedItem;
                    break;
                }else{
                    $this->items[]=$storedItem;
                    break;
                } 
          }
        }else{
          $this->items[]=$storedItem;
        }
 		}
}