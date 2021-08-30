

var togglef = false;
 function togglenav()
{
    
   
    var getside=document.querySelector(".sidebar");
    var getsideul=document.querySelector(".sidebar ul");
    var getsideulspan=document.querySelector(".sidebar span");
    var getsideula=document.querySelectorAll(".sidebar  a");
    
    
    if  (togglef===false)
    {
        
        getsideul.style.visibility="visible";
        getside.style.width="160px";
        getsideulspan.style.opacity="0.6";
    
        var len=getsideula.length;
        
        for(var i=0;i<len;i++)
        {
            getsideula[i].style.opacity="1";
            
        }
    togglef = true;
       
    }
   else if (togglef===true)
   {
         
        getside.style.width="0px";
        getsideulspan.style.opacity="0";
    
         len=getsideula.length;
       
        for( i=0;i<len;i++)
        {
            getsideula[i].style.opacity="0";
            
        }
       getsideul.style.visibility="hidden";
    togglef = false;
    }
    
}

let product=[
    {
        name:'NEURON',
        price:1499,
        tag:1,
        incart:0
    },
    {
        name:'CHRONOS',
        price:1526,
        tag:2,
        incart:0
    },
    {
        name:'MILLENNIUM',
        price:2117,
        tag:3,
        incart:0
    },
    {
        name:'GENESIS',
        price:2105,
        tag:4,
        incart:0
    },
    {
        name:'S-CLASS',
        price:1138,
        tag:5,
        incart:0
    },
    {
        name:'M-CLASS',
        price:1187,
        tag:6,
        incart:0
    },
    {
        name:'L-CLASS',
        price:2208,
        tag:7,
        incart:0
    },
    {
        name:'CORSAIR ONE',
        price:3202,
        tag:8,
        incart:0
    },
    {
        name:'NEW NT-15',
        price:2076,
        tag:9,
        incart:0
    },
    {
        name:'NEW NS-15',
        price:1911,
        tag:10,
        incart:0
    },
    {
        name:'NEW NT-17',
        price:2126,
        tag:11,
        incart:0
    },
    {
        name:'NEW NS-17',
        price:2922,
        tag:12,
        incart:0
    },
    {
        name:'NEW EVO15-S',
        price:2036,
        tag:13,
        incart:0
    },
    {
        name:'NEW EON15-X',
        price:1870,
        tag:14,
        incart:0
    },
    {
        name:'NEW EVO17-S',
        price:2086,
        tag:15,
        incart:0
    },
    {
        name:'NEW EON17-X',
        price:2881,
        tag:16,
        incart:0
    },
    {
        name:'void headset',
        price:100,
        tag:17,
        incart:0
    },
    {
        name:'stand',
        price:69,
        tag:18,
        incart:0
    },
    {
        name:'keyboard',
        price:49,
        tag:19,
        incart:0
    },
    {
        name:'tshirt',
        price:15,
        tag:20,
        incart:0
    },
    {
        name:'mouse',
        price:29,
        tag:21,
        incart:0
    },
    {
        name:'mat',
        price:39,
        tag:22,
        incart:0
    },
    {
        name:'flashdrive',
        price:30,
        tag:23,
        incart:0
    },
    {
        name:'capturecard',
        price:250,
        tag:24,
        incart:0
    }
];





function fup(i){
    i=i-1;
    cartitems(product[i]);
        totalcost(product[i]);
}

function onloadagain(){
   let productnumbers=localStorage.getItem('cartnumbers');
   if(productnumbers){
    document.querySelector('.cart span').textContent=productnumbers;  
   }
}

function cartitems(product) {
    
    let   productnumbers=localStorage.getItem('cartnumbers');
    productnumbers=parseInt(productnumbers);
    if(productnumbers){
        localStorage.setItem('cartnumbers',productnumbers+1);
        document.querySelector('.cart span').textContent=productnumbers+1;
    }
    else{
        localStorage.setItem('cartnumbers',1); 
        document.querySelector('.cart span').textContent=1;
    }
    setitems(product);
}
function setitems(product){
    let cartitems=localStorage.getItem('productsincart');
    cartitems=JSON.parse(cartitems);

    if(cartitems != null){

        if(cartitems[product.tag]==undefined){
            cartitems={
                ...cartitems,
                [product.tag]:product
            }
        }
    cartitems[product.tag].incart += 1;
    }
    else{
        product.incart=1;
        cartitems={
            [product.tag]:product
        }
    }
    localStorage.setItem("productsincart",JSON.stringify(cartitems));
}

function totalcost(product){
    let totalcost=localStorage.getItem("totalcost");
    
    if(totalcost!=null){
        totalcost=parseInt(totalcost);
        localStorage.setItem("totalcost",product.price+totalcost);
    }
    else{
        localStorage.setItem("totalcost",product.price);
    }
    
}

function displaycart(){
    let cartitems=localStorage.getItem('productsincart');
    cartitems=JSON.parse(cartitems);
    let productdisplay=document.querySelector('.products');
    let totalcostdisplay=document.querySelector('.totalcost');
    let totalcost=localStorage.getItem("totalcost");
    if(cartitems && productdisplay ){
        var ttags='';
        var qtys='';
        productdisplay.innerHTML='';
        Object.values(cartitems).map(item=>{
            productdisplay.innerHTML += `
            <div class="titles">
            <ion-icon onClick="removefromcart(${item.tag})" name="close-outline"></ion-icon>
            <span>${item.name}</span>
            <img src="img/${item.tag}.webp" style="max-width:35%;max-height:35%;">
            <div class="prices">$${item.price}.00</div>
            <div class="qtys">${item.incart}</div>
            <div class="totals">$${item.incart*item.price}.00</div>
             `;
            ttags +=  JSON.parse(item.tag);
            qtys += JSON.parse(item.incart);
        });
       totalcostdisplay.innerHTML=
        `</div>
            <div class="totalcost">
            <span>TOTAL COST:$${totalcost}.00</span>
            </div>`;
    }
    
   
}



function removefromcart(tag){
    let  incartnow=JSON.parse(localStorage.getItem('cartnumbers'));
    let  totalnow=JSON.parse(localStorage.getItem('totalcost'));
    
    var cartitems=JSON.parse(localStorage.getItem('productsincart'));
 if(cartitems[tag].incart>1){
    var v=cartitems[tag].incart
    var newtotal= totalnow-cartitems[tag].price*v;
 }
 else{
    var newtotal= totalnow-cartitems[tag].price;
 }
    var newincart = incartnow-cartitems[tag].incart;
    delete cartitems[tag];
    
      localStorage.setItem('productsincart', JSON.stringify(cartitems));
      localStorage.setItem('cartnumbers',newincart);
      localStorage.setItem('totalcost',newtotal);

    displaycart(); 
    onloadagain();
}
displaycart();
onloadagain();

function active(){
   var v= localStorage.getItem("totalcost");
    if(v>0){
        document.getElementById("checkoutfd").style.display ='block';
        
    }
    else{
        alert("plz add to cart first!!!");
    }
    
}
function deactive(){
    document.getElementById("checkoutfd").style.display ='none';
    
}

