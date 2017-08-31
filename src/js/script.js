
function AX() {
    var self = this;
    self.sendPost = function (url,data, fSuccess) {
        $.ajax({
            url:url,
            method:"post",
            dataType:"json",
            data:data,
            success:fSuccess,
            error:function (x,y,z) {
                console.log(x);
            }
        });
    }
}



var ax = new AX();
var orders = [];
var itemsId = [];
var cartCount = document.getElementById("cartCount");

$('.add').on('click', function (){
	var result = $(this).attr('data-id');
	addItem(result);
    itemsId = [];
    for (var i = 0; i < orders.length; i++) {
        itemsId.push(orders[i].id);
	}
    cartCount.innerHTML = getTotalCountItems();
});

function getTotalCountItems() {
    var summCount = 0;
    for (var i = 0; i < orders.length; i++) {
        summCount += orders[i].count;
	  }
	return summCount;
}


function getCountFromOrdersById(id){
    console.log(orders);
    for (var i = 0; i < orders.length; i++) {
        if (id == orders[i].id){
    		return orders[i].count;
		}
    }
    return null;
}

function loadItems(){
    ax.sendPost("events/ajax/loadProducts.php",{"products":itemsId},loadItemsView);
}

function loadItemsView(jsonItems){

	$("#tableProducts").html(template(jsonItems));

    function template(items) {
        var html = "";
        for (var i = 0; i < items.length; i++) {
        	var count = getCountFromOrdersById(items[i]["id"]);
        	if (count){
                html +=
                    '<tr>' +
                    '<td><img src="src/img/'+items[i]["icon"]+'" alt=""></td>' +
                    '<td>'+items[i]["name"]+'</td>' +
                    '<td><input onchange="changeItems(this,'+items[i]["id"]+');" type="number" value="'+count+'" name="pizzaCount" class="pizza-count"></td>' +
                    '<td data-sum="'+items[i]["prise"]+'">'+items[i]["prise"]*count+'</td>' +
                    '<td><i class="glyphicon glyphicon-trash delete" onclick="removeItem(this,'+items[i]["id"]+');"></i></td>' +
                    '</tr>';
			}
        }
        return html;
    }
}


function changeItems(element, id) {
    var parentItem = element.parentNode.parentNode;
	var sumEl = parentItem.getElementsByTagName('td')[3];
	var sum = sumEl.getAttribute('data-sum');
    element.value = parseInt(element.value);
    var value = element.value;
    if(value > 0){
        sumEl.innerHTML = sum*value;
    }else{
        element.value = 1;
	}

}

function checkOut(){
	var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;

	ax.sendPost("events/ajax/checkOut.php",{
		"name":name,
		"address":address,
		"phone":phone,
		"orderItems":orders
	},checkOutFinish);
}

function checkOutFinish(data) {
	if (data["status"]){
		alert("Ожидайте! Закз №"+data["order"]+" Вам перезвонят в течении 15 минут");
	}else{
        alert("Ошибка ввода данных");
	}
}

function removeItem(element, id) {
	var parentItem = element.parentNode.parentNode;
    parentItem.parentNode.removeChild(parentItem);
    removeOrderItemById(id);
    cartCount.innerHTML = getTotalCountItems();
}

function removeOrderItemById(id){
	var newOrders = [];
    for (var i = 0; i < orders.length; i++) {
        if (id == orders[i].id){
			continue;
        }
        newOrders.push(orders[i]);
    }
    orders = newOrders;
    newOrders = null;

    var newItemsId = [];
    for (var i = 0; i < itemsId.length; i++) {
        if (id == itemsId[i].id){
            continue;
        }
        newItemsId.push(itemsId[i]);
    }
    itemsId = newItemsId;
    newItemsId = null;

}


function addItem(id){
	if (orders.length  == 0){
		orders.push({"id":id,"count":1});	
	}else{
		var find = false;
		for(var i = 0 ;i < orders.length; i++){
			if(orders[i]["id"] == id){
				orders[i]["count"]++;
				find = true;
				break;
			}
		}
		if(!find){
			orders.push({"id":id,"count":1});
		}
	
	}
}





