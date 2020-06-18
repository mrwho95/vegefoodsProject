console.log("Running");
var allProductData = $("#allProductData").val();
// console.log(allProductData);

allProductData = JSON.parse(allProductData);
// console.log(allProductData);

allProductData.forEach(function (element) {
  element.inCart = 0;
});

console.log(allProductData);


// console.log('Running');
let carts = document.querySelectorAll('.add-to-cart');
// console.log(carts.length);

for (let i = 0; i < carts.length; i++){
	// console.log('Looping');
	carts[i].addEventListener('click', () => {
		// console.log("added to cart");
		cartNumbers(allProductData[i]);
		totalCost(allProductData[i]);
	})
}

function onLoadCartNumbers(){
	let productNumbers = localStorage.getItem('cartNumbers'); //check localstorage 
	if (productNumbers) {
		document.querySelector('.cta a span').textContent = productNumbers; //cart number changed on nav bar
	}
}

function cartNumbers(product){
	// console.log("the product is ", product);
	let productNumbers = localStorage.getItem('cartNumbers');
	productNumbers = parseInt(productNumbers);

	if (productNumbers) {
		localStorage.setItem('cartNumbers', productNumbers + 1);
		document.querySelector('.cta a span').textContent = productNumbers + 1;
	}else{
		localStorage.setItem('cartNumbers', 1);
		document.querySelector('.cta a span').textContent = 1;
	}	

	setItems(product);
}

function setItems(product){
	console.log("Inside of set items function");
	console.log("this product is ",product);
	let cartItems = localStorage.getItem('productsInCart');
	cartItems = JSON.parse(cartItems);

	if (cartItems != null) {

		if (cartItems[product.name] == undefined) {
			cartItems ={
				...cartItems,
				[product.name]: product
			}
		}
		cartItems[product.name].inCart += 1;
	}else{
		product.inCart = 1;
		cartItems = {
			[product.name]: product
		}
	}
	localStorage.setItem("productsInCart", JSON.stringify(cartItems));
	
}

function totalCost(product){
	// console.log("The product price is", product.price);
	let cartCost = localStorage.getItem('totalCost');
	
	// console.log("my cart cost is", cartCost);
	// console.log(typeof cartCost); //show datatype

	if (cartCost != null) {
		cartCost = parseInt(cartCost);
		localStorage.setItem("totalCost", cartCost + product.price);
	}else{
		localStorage.setItem("totalCost", product.price);
	}
	
}

function displayCart(){
	let cartItems = localStorage.getItem("productsInCart");
	cartItems = JSON.parse(cartItems);
	let productContainer = document.querySelector("#body");

	// console.log(cartItems);

	if (cartItems && productContainer) {
		// console.log('abc');
		productContainer.innerHTML ='';
		Object.values(cartItems).map(item => {
			productContainer.innerHTML += `
				<tr class="text-center">
					<td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
					<td><img src="./public/uploads/vegeFoodsPhoto/${item.photo}" style="width:150px; display=block;"></td>
					<td class="product-name">
						<h3>${item.name}</h3>
					</td>
					<td class="price">RM${item.price}</td>
					<td class="quantity">
						<div class="input-group mb-3">
							<input type="text" name="quantity" class="quantity form-control input-number" value="${item.inCart}" min="1" max="100">
						</div>
					</td>

					<td class="total">RM${item.price * item.inCart}</td>
				</tr>
			`;
		});
	}else{
		productContainer.innerHTML ='';
		productContainer.innerHTML += `<p>No cart</p>`;
	}

	let cartCost = localStorage.getItem('totalCost');
	let cartTotal = document.querySelector("#cartTotal");
	if (cartItems && cartTotal) {
		cartTotal.innerHTML = '';
		Object.values(cartItems).map(item => {
			cartTotal.innerHTML = `
				<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>RM${cartCost}</span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>RM0.00</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>RM0.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>RM${cartCost}</span>
					</p>
			`;
		});
	}else{
		cartTotal.innerHTML = '';
		cartTotal.innerHTML = `
				<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>RM0.00</span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>RM0.00</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>RM0.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>RM0.00</span>
					</p>
			`;
	}
}


onLoadCartNumbers();
displayCart();