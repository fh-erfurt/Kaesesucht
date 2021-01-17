<?php


namespace kae\controller;
use kae\model\ModelCheese as Cheese;
use kae\model\ModelPrice as Price;



class ShoppingController extends \kae\core\Controller
{
	protected $controller = null;
	protected $action = null;
	protected $currentUser = null;

	protected $params = [];


	public function actionCheckout()
	{

	}
	public function actionShoppingCart()
	{	
		$this->killmeTestData();

		#pre_r($_POST);
		if(isset($_SESSION['cart']))
		{
			if(isset($_POST['deleteProduct'])){
				#pre_r($_POST);
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					if($_SESSION['cart'][$key]->__get('id') == $_POST['delID'])
					{
						unset($_SESSION['cart'][$key]);
					}
				}
			}
			$cart = $_SESSION['cart']; //TODO: wie werden die Items gespeichert cookie? session?
			
		}
		else
		{
			$cart = null;
		}

		if(isset($_POST['submit']))
		{
			#pre_r($_POST);

			foreach ($_SESSION['cart'] as $key => $value) {
				if($_SESSION['cart'][$key]->__get('id') == $_POST['idProduct'])
				{
					$_SESSION['cart'][$key]->quantity = $_POST['chQuantity'];
				}
			}
		}



		
		#pre_r($_SESSION['cart']);




	}
	public function actionDeleteArticle(){


		actionShoppingCart();
	}

	public function productPrice($product){
		$price = new Price(Price::findOne('id = '.$product->__get('price_id')));
		#var_dump($price->__get('pricePerUnit'));
		#echo($product->quantity);
		return $price;
		
	}

	private function killmeTestData(){
		$_SESSION['cart'] = array();
		$cheese1 = new Cheese(['cheeseName' => 'Gouda','id'=>123,'price_id'=>1,'qtyInStock'=>10,]);
		$cheese2 = new Cheese(['cheeseName' => 'Butter','id'=>333,'price_id'=>2,'qtyInStock'=>3]);
		$cheese3 = new Cheese(['cheeseName' => 'Tilsiter','id'=>412,'price_id'=>3,'qtyInStock'=>41]);
		array_push($_SESSION['cart'] , $cheese1);
		array_push($_SESSION['cart'] , $cheese2);
		array_push($_SESSION['cart'] , $cheese3);
		#echo('<pre>');
		#echo($_SESSION['cart'] [0]->__get('cheeseName'));
		#echo('</pre>');
		$_SESSION['cart'] [0]->__set('pictureName','Gouda.jpg');

		#$_SESSION['cart'] [0]->__set('id',123);
		#$_SESSION['cart'] [0]->__set('price_id',1);	
		#$_SESSION['cart'] [0]->__set('qtyInStock',10);
		$_SESSION['cart'] [0]->quantity = 2;

		#$_SESSION['cart'] [1]->__set('id',333);
		#$_SESSION['cart'] [1]->__set('price_id',2);
		#$_SESSION['cart'] [1]->__set('qtyInStock',3);
		$_SESSION['cart'] [1]->quantity = 4;

		#$_SESSION['cart'] [2]->__set('id',412);
		#$_SESSION['cart'] [2]->__set('price_id',3);
		#$_SESSION['cart'] [2]->__set('qtyInStock',41);
		$_SESSION['cart'] [2]->quantity = 7;

	}

}